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

}