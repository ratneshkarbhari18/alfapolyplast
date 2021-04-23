<?php

namespace App\Controllers;

class PageLoader extends BaseController
{

	private function page_loader($viewName,$data){
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

	public function home()
	{
		$data = array("title"=>"Tagline");
		$this->page_loader("home",$data);
	}
	public function admin_login($error="")
	{
		$data = array("title"=>"Admin Login","error" => $error);
		$this->page_loader("adminLogin",$data);
	}
	public function dashboard(){
		$this->auth_checker();
		$data = array("title"=>"Dashboard");
		$this->admin_page_loader("dashboard",$data);
	}
	public function manage_categories($success="",$error=""){
		$this->auth_checker();
		$data = array("title"=>"Manage Categories","success"=>$success,"error"=>$error);
		$this->admin_page_loader("manage_categories",$data);
	}
	public function add_category($success="",$error=""){
		$this->auth_checker();
		$data = array("title"=>"Add Category","success"=>$success,"error"=>$error);
		$this->admin_page_loader("add_category",$data);
	}
}
