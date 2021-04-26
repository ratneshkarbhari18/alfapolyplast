<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\CartModel;

class PageLoader extends BaseController
{

	private function page_loader($viewName,$data){
		$categoryModel = new CategoryModel();
		$allCategories = $categoryModel->findAll();
		$data["allCategories"] = $allCategories;
		echo view("templates/header",$data);
		echo view("pages/".$viewName,$data);
		echo view("templates/footer",$data);
	}

	private function admin_page_loader($viewName,$data){
		echo view("templates/adminHeader",$data);
		echo view("adminPages/".$viewName,$data);
		echo view("templates/adminFooter",$data);
	}

	public function auth_checker(){
		$session = session();
		$role = $session->get("role");
		if ($role!="admin") {
			return redirect()->to(site_url("admin-login")); 
		}
	}

	// Public Pages
	public function home()
	{
		$productModel = new ProductModel();
		$allProducts = $productModel->findAll();
		$data = array("title"=>"Tagline","products"=>$allProducts);
		$this->page_loader("home",$data);
	}

	public function product($slug)
	{
		$productModel = new ProductModel();
		$focusProduct = $productModel->where("slug",$slug)->first();
		$data = array("title"=>$focusProduct["title"],"focusProduct"=>$focusProduct);
		$this->page_loader("product",$data);
	}

	public function category($slug)
	{
		$productModel = new ProductModel();
		$categoryModel = new CategoryModel();
		$catDetails  = $categoryModel->where("slug",$slug)->first();
		$allProducts = $productModel->where("category",$catDetails["id"])->findAll();
		$data = array("title"=>$catDetails['title'],"products"=>$allProducts);
		$this->page_loader("category",$data);
	}

	public function admin_login($error="")
	{
		$data = array("title"=>"Admin Login","error" => $error);
		$this->page_loader("adminLogin",$data);
	}

	public function cart_page($success="",$error=""){
		$cartModel = new CartModel();
		$productModel = new ProductModel();
		$cart_items = $cartModel->where("ip",$_SERVER["REMOTE_ADDR"])->findAll();
		$allProducts = $productModel->findAll();
		$data = array("title"=>"Cart","success"=>$success,"error"=>$error,"cartItems"=>$cart_items,"products"=>$allProducts);
		$this->page_loader("cart",$data);
	}


	// Admin Pages
	public function dashboard(){
		$this->auth_checker();
		$data = array("title"=>"Dashboard");
		$this->admin_page_loader("dashboard",$data);
	}
	public function manage_categories($success="",$error=""){
		$this->auth_checker();
		$categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
		$data = array("title"=>"Manage Categories","success"=>$success,"error"=>$error,"categories"=>$categories);
		$this->admin_page_loader("manage_categories",$data);
	}
	public function add_category($success="",$error=""){
		$this->auth_checker();
		$data = array("title"=>"Add Category","success"=>$success,"error"=>$error);
		$this->admin_page_loader("add_category",$data);
	}
	public function edit_category($slug,$success="",$error=""){
		$this->auth_checker();
        $categoryModel = new CategoryModel();
		$category = $categoryModel->where("slug",$slug)->first();
		$data = array("title"=>"Edit Category","success"=>$success,"error"=>$error,"category"=>$category);
		$this->admin_page_loader("edit_category",$data);
	}
	public function manage_products($success="",$error=""){
		$this->auth_checker();
		$productModel = new ProductModel();
        $products = $productModel->findAll();
		$data = array("title"=>"Manage Products","success"=>$success,"error"=>$error,"products"=>$products);
		$this->admin_page_loader("manage_products",$data);		
	}
	public function add_product($success="",$error=""){
		$this->auth_checker();
		$categoryModel = new CategoryModel();
		$allCategories = $categoryModel->findAll();
		$data = array("title"=>"Add Product","success"=>$success,"error"=>$error,"categories"=>$allCategories);
		$this->admin_page_loader("add_product",$data);
	}
	public function edit_product($slug,$success="",$error=""){
		$this->auth_checker();
        $productModel = new ProductModel();
		$categoryModel = new CategoryModel();
		$allCategories = $categoryModel->findAll();
		$product = $productModel->where("slug",$slug)->first();
		$data = array("title"=>"Edit product","success"=>$success,"error"=>$error,"product"=>$product,"categories"=>$allCategories);
		$this->admin_page_loader("edit_product",$data);
	}
}
