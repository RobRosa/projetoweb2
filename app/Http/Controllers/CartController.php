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
    public function setCart(Request $request, $id ) {
        $products = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($products, $products->id);

        $request->session()->put('cart', $cart);
        $request->session()->get('cart');
        return redirect()->route('product.index');
    }

    public function getCart() {
        if (!Session::has('cart')) {
            return view('cart.myCart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart.myCart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}