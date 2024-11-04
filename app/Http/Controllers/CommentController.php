<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function addComment(Request $request, $id) {

        $request->validate([
            'comment' => 'required',
            'rating' => 'required'
        ]);

        $data =  Comment::insert([
            'product_id' => $id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        $product = Product::find($id);
        $promotion = Promotion::find($product->promotion_id);
        
        return view('product.show', compact('product', 'promotion'));


    }

    public function destroy($id) {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Comentario eliminado con éxito.');
    }

    // public function loadComments($id) {

    //     $comments = Comment::where('product_id', $id)->get();
    //     dd($comments);
    //     return response()->json($comments);

    // }



}
