<?php

namespace App\Controllers;
use App\Controllers\PageLoader;
use App\Models\CartModel;

class Cart extends BaseController
{
    public function add(){
        $pid = $this->request->getPost("pid");
        $qty = $this->request->getPost("qty");
        $ip = $_SERVER['REMOTE_ADDR'];
        $cid = $this->request->getPost("cid");
        $cartModel = new CartModel();
        $cartItemExists = $cartModel->where("pid",$pid)->where("ip",$ip)->first();
        if ($cartItemExists) {
            $cartItemExists["qty"] = $cartItemExists["qty"]+$qty;
            $done = $cartModel->update($cartItemExists["id"],array("qty"=>$cartItemExists["qty"]));
        } else {
            $objToInsert = array(
                "pid" => $pid,
                "qty" => $qty,
                "cid" => $cid,
                "ip" => $ip
            );
            $done = $cartModel->insert($objToInsert);
        }
        if ($done) {
            return 'added-to-cart';
        } else {
            return FALSE;
        }
        
    }
}