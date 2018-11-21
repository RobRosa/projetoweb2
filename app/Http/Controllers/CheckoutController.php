<?php

namespace projetoweb2\Http\Controllers;

use Illuminate\Http\Request;
use projetoweb2\Checkout;
use projetoweb2\ItemSale;
use projetoweb2\Sale;
use projetoweb2\Cart;
use Session;

class CheckoutController extends Controller
{
    public function getCheckout() {
    	if (!Session::has('cart')) {
    		return view('cart.myCart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$total = $cart->totalPrice;
    	return view('checkout.index', ['total' => $total]);
    }

    public function validationCheckout(Request $request) {
        $request->validate([
    		'name'=>'required|string|max:30',
    		'card'=>'required|integer',
    		'expiration'=>'required|string|max:5'
    	]);
    	Checkout::create($request->all());

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $sale = Sale::create([
            'price_total' => $cart->totalPrice
        ]);

        foreach ($cart->items as $values) {
            for ($i=1; $i<=$values['amount'];$i++) {
                $attr = $values['item']->getAttributes();
                $itemSale = ItemSale::create([
                    'amount' => $values['amount'],
                    'sale_id' => $sale->id,
                    'product_id' => $attr['id']
                ]);
            }
        }

        Session::forget('cart');
    	return redirect()->route('product.index');
    }
}