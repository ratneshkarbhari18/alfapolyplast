<?php

namespace App\Controllers;
use App\Controllers\PageLoader;
use App\Models\UserModel;

class Authentication extends BaseController
{

    public function admin_login(){
        
        $session = session();

        $logged_in = $session->get("logged_in");

        if ($logged_in) {
			return redirect()->to(site_url("admin-login")); 
        }

        $entered_email = $this->request->getPost("admin-email");
        $entered_password = $this->request->getPost("admin-password");

        $pageLoader = new PageLoader();

        if ($entered_email==""||$entered_password=="") {
            $pageLoader->admin_login("Please Enter both Email and Password");
        } else {
            $userModel = new UserModel();
            $userData = $userModel->where("email",$entered_email)->where("role","admin")->first();
            if ($userData) {
                $password_correct = password_verify($entered_password,$userData["password"]);
                if ($password_correct) {
                    $sessionData = array(
                        "first_name" => $userData["first_name"],
                        "last_name" => $userData["last_name"],
                        "email" => $userData["email"],
                        "role" => "admin",
                        "logged_in" => TRUE
                    );
                    $session->set($sessionData); 
                    return redirect()->to(site_url("dashboard")); 
                } else {
                    $pageLoader->admin_login("Password is incorrect");
                }
            } else {
                $pageLoader->admin_login("Admin Account with this email was not found");
            }
        }
        
        
    }

    public function customer_login(){
        
        $session = session();

        $logged_in = $session->get("logged_in");

        if ($logged_in) {
			return redirect()->to(site_url("login")); 
        }

        $entered_email = $this->request->getPost("customer-email");
        $entered_password = $this->request->getPost("customer-password");

        $pageLoader = new PageLoader();

        if ($entered_email==""||$entered_password=="") {
            $pageLoader->customer_login("Please Enter both Email and Password");
        } else {
            $userModel = new UserModel();
            $userData = $userModel->where("email",$entered_email)->where("role","customer")->first();
            if ($userData) {
                $password_correct = password_verify($entered_password,$userData["password"]);
                if ($password_correct) {
                    $sessionData = array(
                        "first_name" => $userData["first_name"],
                        "last_name" => $userData["last_name"],
                        "email" => $userData["email"],
                        "role" => "customer",
                        "logged_in" => TRUE
                    );
                    $session->set($sessionData); 
                    return redirect()->to(site_url()); 
                } else {
                    $pageLoader->customer_login("Password is incorrect");
                }
            } else {
                $pageLoader->customer_login("Admin Account with this email was not found");
            }
        }
        
        
    }

    public function logout(){
        $session = session();   
        $session->destroy();
        return redirect()->to(site_url('')); 
    }

}