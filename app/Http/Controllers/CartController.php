<?php

namespace projetoweb2\Http\Controllers;

use Illuminate\Http\Request;
use projetoweb2\Product;
use projetoweb2\Cart;
use Session;

class CartController extends Controller
{
    
    /**
     * Get product in the coockie
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setCart(Request $request, $id) {
        $products = Product::find($id);
        
        $cart = new Cart();
        $cart->add($products, $products->id);

        if ($request->input('goToCart')  === '1') {
            return redirect()->route('cart.myCart');
        }
    
        return redirect()->route('cart.myCart');
    }

    public function getCart(Request $request) {
        if (!Session::has('cart')) {
            return view('cart.myCart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($request);

        return view('cart.myCart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function removeCart(Request $request, $id) {
        $carts = new Cart();
        $carts->remove($id);
        
        return redirect()->back();
    }

    public function removeItem(Request $request, $id){
        $carts = new Cart();
        $carts->removeProduct($id);
        return redirect()->back();
    }
}