<?php

namespace projetoweb2\Http\Controllers;

use Illuminate\Http\Request;
use projetoweb2\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(8);
        return view('product.index', compact('products'))->with('i', (request()->input('page',1) -1)*8);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:30',
            'description'=>'required|string|max:255',
            'brand'=>'required|string|max:30',
            'color'=>'required|string|max:15',
            'price'=>'required|numeric',
            'amount'=>'required|numeric'
        ]);

        Product::create($request->all());
        return redirect()->route('product.index')->with('success', 'criou');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string|max:30',
            'description'=>'required|string|max:255',
            'brand'=>'required|string|max:30',
            'color'=>'required|string|max:15',
            'price'=>'required|numeric',
            'amount'=>'required|numeric'
        ]);

        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->brand = $request->get('brand');
        $product->color = $request->get('color');
        $product->price = $request->get('price');
        $product->amount = $request->get('amount');
        $product->save();
        return redirect()->route('product.index')->with('success', 'editou');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'deletou');
    }
}
