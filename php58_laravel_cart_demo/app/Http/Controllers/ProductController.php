<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//su dung ProductController
use App\Models\Product;

class ProductController extends Controller
{
    //hien thi danh sach cac san pham
    public function productList(){
    	//lay tat ca cac ban ghi
    	$products = Product::get();
    	//ham compact($bien) se chuyen $bien thanh array
    	return view('products', compact('products'));
    }
}
