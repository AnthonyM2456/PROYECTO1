<?php

namespace App\Http\Controllers;

use App\Models\User;
use Darryldecode\Cart;
use App\Models\Product;
use App\Models\UserProduct;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all();
       //dd($products);
        return view('cart.shopHS')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
    }

    public function show($id){
        $product = Product::find($id);
        
        return view('product.show', compact('product'));
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        return view('cart.cartHS')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);;
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Producto Eliminado!');
    }

    public function add(Request $request){

        //dd($request);
        $item = \Cart::get($request->id);
        if($item === null){
            \Cart::add(array(
                'id' => $request->id,
                'name' => $request->title,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'image' => $request->img,
                )
            ));
            return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a su Carrito!');
        } else{
            return redirect()->route('cart.index')->with('success_msg', 'El item ya existe en su Carrito!');
        }
        
    }

    public function compra(){
        $data = \Cart::getContent();
        $user = Auth::user();
    
        // Verifica si el usuario tiene productos en el carrito
        if ($data->isEmpty()) {
            return redirect()->route('cart.index')->with('error_msg', 'Tu carrito está vacío.');
        }
    
        // Calcula el total de la compra
        $totalCompra = $data->sum('price');
    
        // Verifica si el usuario tiene saldo suficiente
        if ($user->balance < $totalCompra) {
            return redirect()->route('cart.index')->with('error_msg', 'Saldo insuficiente para completar la compra.');
        }
    
        // Inicia una transacción para asegurar que todos los cambios ocurran correctamente
        DB::beginTransaction();
        
        try {
            // Crea los productos para el usuario
            foreach ($data as $d) {
                UserProduct::create([
                    'user_id' => $user->id,
                    'product_id' => $d->id,
                ]);
            }
    
            // Descuenta el saldo del usuario
            $user->balance -= $totalCompra;
            $user->save();
    
            // Elimina los productos del carrito
            \Cart::clear();
    
            // Crea una notificación para el usuario
            $productNames = $data->map(function ($item) {
                return $item->name;
            })->implode(', ');
    
            Notification::create([
                'user_id' => $user->id,
                'destination_email' => $user->email,
                'title' => 'Compra efectuada',
                'message' => "Usted ha realizado una compra de los siguientes productos: {$productNames}. Monto total: \$" . number_format($totalCompra, 2),
            ]);
    
            // Commit de la transacción si todo ha ido bien
            DB::commit();
    
            return redirect()->route('products.index')->with('success_msg', 'Compra efectuada exitosamente!');
    
        } catch (\Exception $e) {
            // Si algo falla, hacemos un rollback
            DB::rollBack();
    
            // Puedes registrar el error si es necesario
            Log::error('Error en el proceso de compra: ', ['error' => $e->getMessage()]);
    
            return redirect()->route('cart.index')->with('error_msg', 'Hubo un error al procesar la compra.');
        }
    }
    
    public function regalar(Request $request){
        
        $user = Auth::user();
        $data = \Cart::getContent();
        $user_gift = User::find($request->id_user);
        foreach($data as $d) {
            $userProduct = UserProduct::create([
                "user_id" => $request->id_user,
                "product_id" => $d->id
            ]);
            $user->balance = $user->balance - $d->price;
            $user->save();
        }
        \Cart::clear();
        $notification = Notification::create([
            "user_id" => $request->id_user,
            "destination_email" => $user_gift->email,
            "title" => "Regalo recibido",
            "message" => "Usted recibio un regalo de ".Auth::user()->name
        ]);
        return redirect()->route('products.index');
    }

    public function update(Request $request){
        \Cart::update($request->id, 
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }

 

}