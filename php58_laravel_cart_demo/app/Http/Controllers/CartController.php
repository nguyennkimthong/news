<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CartController extends Controller
{
    public function cartList(){
    	$cartItems = \Cart::getContent();
    	return view('cart',compact('cartItems'));
    }
    //them san pham vao gio hang
    public function addToCart(Request $request){
    	\Cart::add([
    		'id' 			=> 	$request->id,
    		'name'			=>	$request->name,
    		'price'			=>	$request->price,
    		'quantity'		=>	$request->quantity,
    		'attributes'	=> 	array('image' => $request->image,)

    	]);
    	session()->flash('success','Sản phẩm đã được thêm vào giỏ hàng thành công!');
    	return redirect()->route('cart.list');
    }
    //cap nhat so luong sanpham
    public function updateCart(Request $request){
    	\Cart::update(
    		$request->id,
    		[
    			'quantity'=>[
    				'relative'	=> false,
    				'value'	=> $request->quantity,
    			],
    		]
    	);
    	session()->flash('success','Sản phẩm đã được update thành công!');
    	return redirect()->route('cart.list');
    }
    //xoa san pham
    public function removeCart(Request $request){
    	\Cart::remove($request->id);
    	session()->flash('success','Sản phẩm đã được xóa khỏi giỏ hàng thành công!');
    	return redirect()->route('cart.list');
    }
    public function clearAllCart(Request $request){
    	\Cart::clear($request->id);
    	session()->flash('success','Toàn bộ sản phẩm đã được xóa khỏi giỏ hàng thành công!');
    	return redirect()->route('cart.list');
    }
}
