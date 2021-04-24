<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Controllers\PageLoader;

class Categories extends BaseController
{

    public function add_category(){

        $pageLoader = new PageLoader();
        $categoryModel = new CategoryModel();

        if ($this->request->getPost("slug")) {
            $slug = url_title($this->request->getPost("slug"),"-",TRUE);    
        } else {
            $slug = url_title($this->request->getPost("title"),"-",TRUE);    
        }
        
        $categoryExists = $categoryModel->where('slug',$slug)->first();

        if ($categoryExists) {
            $pageLoader->add_category("","This slug already exists");
        } else {

            $featuredImage = $this->request->getFile('featured_image');

            if($featuredImage!=null){

                $featuredImageRandomName = $featuredImage->getRandomName();
    
                $featuredImage->move('assets/images/category_featured', $featuredImageRandomName);

            }else {
                $featuredImageRandomName = "noimage.png";
            }

            $objToInsert = array(
                "title" => $this->request->getPost("title"),
                "slug" => $slug,
                "description" => $this->request->getPost("description"),
                "featured_image" => $featuredImageRandomName
            );  

            if ($categoryModel->insert($objToInsert)) {
                $pageLoader->add_category("Category Added Successfully","");
            } else {
                $pageLoader->add_category("","Category Not added");
            }
        }

    }

    public function update(){

        $catId = $this->request->getPost("id");
        

        $pageLoader = new PageLoader();
        $categoryModel = new CategoryModel();


        $prevCatDetails = $categoryModel->find($catId);

        if ($this->request->getPost("slug")) {
            $slug = url_title($this->request->getPost("slug"),"-",TRUE);    
        } else {
            $slug = url_title($this->request->getPost("title"),"-",TRUE);    
        }
        
        $categoryExists = $categoryModel->where('slug',$slug)->first();

        if ($categoryExists&&$categoryExists["id"]!=$catId) {
            $pageLoader->add_category("","This slug already exists");
        } else {

            $featuredImage = $this->request->getFile('featured_image');

            if($featuredImage->isValid()){

                $featuredImageRandomName = $featuredImage->getRandomName();
    
                $featuredImage->move('assets/images/category_featured', $featuredImageRandomName);

            }else {
                $featuredImageRandomName = $prevCatDetails["featured_image"];
            }

            $objToInsert = array(
                "title" => $this->request->getPost("title"),
                "slug" => $slug,
                "description" => $this->request->getPost("description"),
                "featured_image" => $featuredImageRandomName
            );  

            if ($categoryModel->update($catId,$objToInsert)) {
                $pageLoader->edit_category($slug,"Category Added Successfully","");
            } else {
                $pageLoader->edit_category($prevCatDetails["slug"],"","Category Not added");
            }
        }

    }
}