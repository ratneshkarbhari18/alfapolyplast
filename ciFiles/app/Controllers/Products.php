<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Controllers\PageLoader;

class Products extends BaseController
{


	public function auth_checker(){
		$session = session();
		$role = $session->get("role");
		if ($role!="admin") {
			return redirect()->to(site_url("admin-login")); 
		}
	}

    public function add(){


        $this->auth_checker();
        

        $pageLoader = new PageLoader();
        $productModel = new ProductModel();

        if ($this->request->getPost("slug")) {
            $slug = url_title($this->request->getPost("slug"),"-",TRUE);    
        } else {
            $slug = url_title($this->request->getPost("title"),"-",TRUE);    
        }
        
        $productExists = $productModel->where('slug',$slug)->first();

        if ($productExists) {
            $pageLoader->add_category("","This slug already exists");
        } else {

            $featuredImage = $this->request->getFile('featured_image');

            if($featuredImage!=null){

                $featuredImageRandomName = $featuredImage->getRandomName();
    
                $featuredImage->move('assets/images/product_featured', $featuredImageRandomName);

            }else {
                $featuredImageRandomName = "noimage.png";
            }

            $galleryImageNames = array();

            $galleryImages = $this->request->getFilemULTIPLE('gallery_images');

			foreach ($galleryImages as $galleryImage) {

				$galleryImageRandomName = $galleryImage->getRandomName();

				$galleryImage->move('assets/images/gallery_product', $galleryImageRandomName);

				$galleryImageNames[] = $galleryImageRandomName;

			}

            $galleryImageNamesJson = json_encode($galleryImageNames);

            $pricingObj = array(
                "na" => $this->request->getPost("price_na"),
                "in" => $this->request->getPost("price_in"),
                "sa" => $this->request->getPost("price_sa"),
                "au" => $this->request->getPost("price_au"),
                "uk" => $this->request->getPost("price_uk"),
                "jp" => $this->request->getPost("price_jp"),
                "saf" => $this->request->getPost("price_saf"),
                "eu" => $this->request->getPost("price_eu")
            );

            $pricesJson = json_encode($pricingObj);

            $objToInsert = array(
                "title" => $this->request->getPost("title"),
                "slug" => $slug,
                "category" => $this->request->getPost("category"),
                "description" => $this->request->getPost("description"),
                "featured_image" => $featuredImageRandomName,
                "gallery_images" => $galleryImageNamesJson,
                "prices" => $pricesJson
            );  

            if ($productModel->insert($objToInsert)) {
                $pageLoader->add_product("Product Added Successfully","");
            } else {
                $pageLoader->add_product("","Product Not added");
            }
        }

    }

    public function update(){

        $this->auth_checker();

        $prodId = $this->request->getPost("id");
        

        $pageLoader = new PageLoader();
        $productModel = new ProductModel();


        $prevProdDetails = $productModel->find($prodId);

        if ($this->request->getPost("slug")) {
            $slug = url_title($this->request->getPost("slug"),"-",TRUE);    
        } else {
            $slug = url_title($this->request->getPost("title"),"-",TRUE);    
        }
        
        $productExists = $productModel->where('slug',$slug)->first();

        if ($productExists&&$productExists["id"]!=$prodId) {
            $pageLoader->add_product("","This slug already exists");
        } else {

            $featuredImage = $this->request->getFile('featured_image');

            if($featuredImage->isValid()){

                $featuredImageRandomName = $featuredImage->getRandomName();
    
                $featuredImage->move('assets/images/product_featured', $featuredImageRandomName);

            }else {
                $featuredImageRandomName = $prevProdDetails["featured_image"];
            }


            $galleryImageNames = array();

            $galleryImages = $this->request->getFilemULTIPLE('gallery_images');

			foreach ($galleryImages as $galleryImage) {


                if(!$galleryImage->isValid()){
                    $galleryImageNamesJson = $prevProdDetails['gallery_images'];
                    break;
                }

				$galleryImageRandomName = $galleryImage->getRandomName();

				$galleryImage->move('assets/images/gallery_product', $galleryImageRandomName);

				$galleryImageNames[] = $galleryImageRandomName;

			}

            if(!empty($galleryImageNames)){
                $galleryImageNamesJson = json_encode($galleryImageNames);
            }else {
                $galleryImageNamesJson = $prevProdDetails["gallery_images"];
            }

            $pricingObj = array(
                "na" => $this->request->getPost("price_na"),
                "in" => $this->request->getPost("price_in"),
                "sa" => $this->request->getPost("price_sa"),
                "au" => $this->request->getPost("price_au"),
                "uk" => $this->request->getPost("price_uk"),
                "jp" => $this->request->getPost("price_jp"),
                "saf" => $this->request->getPost("price_saf"),
                "eu" => $this->request->getPost("price_eu")
            );

            $pricesJson = json_encode($pricingObj);

            $objToUpdate = array(
                "title" => $this->request->getPost("title"),
                "slug" => $slug,
                "category" => $this->request->getPost("category"),
                "description" => $this->request->getPost("description"),
                "featured_image" => $featuredImageRandomName,
                "gallery_images" => $galleryImageNamesJson,
                "prices" => $pricesJson
            );  

            if ($productModel->update($prodId,$objToUpdate)) {
                $pageLoader->edit_product($slug,"Product updated Successfully","");
            } else {
                $pageLoader->edit_product($slug,"","Product Not updated");
            }
        }

    }

    public function delete(){
        $this->auth_checker();
        $prodId = $this->request->getPost("id");
        $productModel = new ProductModel();
        $prevProdDetails = $productModel->find($prodId);
        $deleted = $productModel->delete($prodId);
        $pageLoader = new PageLoader();
        if ($deleted) {
            unlink("./assets/images/product_featured/".$prevCatDetails["featured_image"]);
            $galleryImages = json_decode($prevProdDetails["gallery_images"],TRUE);
            foreach ($galleryImages as $galleryImage) {
                unlink("./assets/images/gallery_product/".$galleryImage);
            }
            $pageLoader->manage_products("Product Deleted","");
        } else {
            $pageLoader->manage_products("","Product not deleted");
        }        
    }

}