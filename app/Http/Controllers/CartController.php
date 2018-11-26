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
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($products, $products->id);

        $request->session()->put('cart', $cart);
        $request->session()->get('cart');

        if (!$request->goToCart === '1') {
            return redirect()->route('product.index');
        }

        return redirect()->route('cart.myCart');
    }

    public function getCart() {
        if (!Session::has('cart')) {
            return view('cart.myCart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart.myCart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function removeCart(Request $request, $id) {
        $carts = session()->get('cart');
        if ($carts->totalQty == 1) {
            $request->session()->forget('cart');
        }
        elseif ($carts->items[$id]['amount'] == 1) {
            unset($carts->items[$id]);
        }
        else {
            $carts->items[$id]['amount'] --;
        }
        $carts->totalQty --;
        return redirect()->back();
    }
}