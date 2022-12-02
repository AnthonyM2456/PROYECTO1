<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Autor;
use App\Models\Promotion;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();
        $category = null;
        //dd($products[1]->promotion_id);
        return view('product.index', compact('products', 'category'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    public function indexCat($idCat){
        
        $products = Product::where('category_id',$idCat)->paginate();
        $category = Category::find($idCat);
        return view('product.index', compact('products', 'category'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $autor = Autor::pluck('firstname', 'id');
        $promotion = Promotion::pluck('discount', 'id');
        $category = Category::pluck('title', 'id');
        return view('product.create', compact('product', 'autor', 'promotion', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Product::$rules);

        //image upload

        $data = $request->all();

        if($request->file('picture')){
            $file = $request->file('picture');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['picture'] = "$filename"; 
            
        }
        /*if($image = $request->file('picture')){
            $name = time(). '.' .$image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            $data['picture'] = "$name";
        }*/
        

        $product = Product::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $promotion = Promotion::find($product->promotion_id);
        
        return view('product.show', compact('product', 'promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
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
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        request()->validate(Product::$rules);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
