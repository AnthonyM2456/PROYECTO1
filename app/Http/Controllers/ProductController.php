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
        return view('product.indexHS', compact('products', 'category'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    public function welcome()
    {
        $products = Product::take(3)->get(); // Obtener solo 3 productos
        return view('welcomeHS', compact('products'));
    }

    public function indexCat($idCat){
        
        $products = Product::where('category_id',$idCat)->paginate();
        $category = Category::find($idCat);
        return view('product.indexHS', compact('products', 'category'))
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
        // Validar los datos del producto y la imagen
        request()->validate(Product::$rules);
    
        $data = $request->all();
    
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['picture'] = $filename; 
        }
    
        // Crear el producto
        Product::create($data);
    
        // Redirigir con mensaje de éxito
        return redirect()->route('product.indexHS')
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
        $product = Product::findOrFail($id);
        $autor = Autor::pluck('firstname', 'id');
        $promotion = Promotion::pluck('discount', 'id')->mapWithKeys(function ($item, $key) {
            return [$key => $item . '%'];
        });
        $category = Category::pluck('title', 'id');

        return view('product.edit', compact('product', 'autor', 'promotion', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validación para la edición: Si no se envía una nueva imagen, no es obligatorio
        $rules = Product::$rules;
        $rules['picture'] = 'nullable|image';  // Imagen es opcional al editar
    
        $request->validate($rules);
    
        // Buscar el producto a editar
        $product = Product::find($id);
    
        // Obtener los datos del formulario
        $data = $request->all();
    
        // Si se sube una nueva imagen
        if ($request->hasFile('picture')) {
            // Eliminar la imagen antigua si existe
            if (file_exists(public_path('images/' . $product->picture))) {
                unlink(public_path('images/' . $product->picture));  // Eliminar la imagen antigua
            }
    
            // Subir la nueva imagen
            $file = $request->file('picture');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['picture'] = $filename; // Guardar la nueva imagen
        } else {
            // Si no se sube una nueva imagen, mantener la imagen actual
            $data['picture'] = $product->picture;
        }
    
        // Actualizar el producto
        $product->update($data);
    
        return redirect()->route('product.indexHS')->with('success', 'Product updated successfully.');
    }
    
    

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('product.indexHS')
            ->with('success', 'Product deleted successfully');
    }
}