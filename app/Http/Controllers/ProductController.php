<?php

namespace projetoweb2\Http\Controllers;

use Illuminate\Http\Request;
use projetoweb2\Product;
use projetoweb2\Category;
use projetoweb2\Helpers\StringHelper;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $categoryProducts = [];

        foreach ($categories as $category) {
            $categoryProducts[] = [
                'category' => [
                    'id'   => $category->id,
                    'name' => $category->name,
                    'link' => strtolower(StringHelper::removeAcentos($category->name))
                ],
                'products' => Product::where('category', $category->name)->limit(4)->get()
            ];
        }

        return view('product.index', compact('categoryProducts'))->with('success', $request->session()->get('success'));
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
            'name'        => 'required|string|max:30',
            'description' => 'required|string|max:255',
            'brand'       => 'required|string|max:30',
            'color'       => 'required|string|max:15',
            'price'       => 'required|numeric',
            'amount'      => 'required|numeric',
            'category'    => 'required|string'
        ]);

        $product = [
            'name'        => $request->name,
            'description' => $request->description,
            'brand'       => $request->brand,
            'color'       => $request->color,
            'price'       => $request->price,
            'amount'      => $request->amount,
            'category'    => $request->category
        ];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = \Auth::user()->id . '_' . round(microtime(true)) . '_' . kebab_case($request->file('image')->getClientOriginalName());

            $upload = $request->file('image')->storeAs('products', $imageName);

            $product['image_name'] = $imageName;
            if (!$upload) {
                $product['image_name'] = null;
            }
        }

        Product::create($product);
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
            'name'          => 'required|string|max:30',
            'description'   => 'required|string|max:255',
            'brand'         => 'required|string|max:30',
            'color'         => 'required|string|max:15',
            'price'         => 'required|numeric',
            'amount'        => 'required|numeric'
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

    public function categoryFilter($catId, $catName){
        $category = Category::where('id', $catId)->first()->name;
        $products = Product::where('category', $category)->paginate(12);

        return view('product.list', compact('products', 'category'))->with('i', (request()->input('page',1) -1)*8);
    }
}
