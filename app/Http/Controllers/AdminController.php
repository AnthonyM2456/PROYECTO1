<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Repository\IAdminRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public $admin;

    public function __construct(IAdminRepository $admin)
    {
        $this->admin = $admin;
    }


    public function adminShowAllProduct() {
        $products =  $this->admin->adminShowAllProduct();
        return view('admin.homeadmin')->with('products', $products);
    }

    public function create() {
        return view('admin.homeadmin');
    }

    public function adminGetAllComments() {
        $comments =  $this->admin->adminGetAllComments();
        return view('admin.comments')->with('comments', $comments);
    }
    /*
    public function adminDeleteComment($id) {
        $this->admin->adminDeleteComment($id);
        return redirect('admin.comments');
    }
    */
    public function adminDeleteProduct($id) {
        //$this->admin->adminDeleteProduct($id);
        //return redirect('admin.homeadmin');
        $product = Product::find($id);
        $product->delete();
        $products =  $this->admin->adminShowAllProduct();
        return view('admin.homeadmin')->with('products', $products);
    }
    
}
