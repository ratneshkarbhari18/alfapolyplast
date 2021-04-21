<?php

namespace App\Controllers;

class PageLoader extends BaseController
{

	private function page_loader($viewName,$data){
		echo view("templates/header",$data);
		echo view("pages/".$viewName,$data);
		echo view("templates/footer",$data);
	}

	public function home()
	{
		$data = array("title"=>"Tagline");
		$this->page_loader("home",$data);
	}
	public function admin_login($error="")
	{
		$data = array("title"=>"Admin Login","error" => $error);
		$this->page_loader("admin_login",$data);
	}
}
