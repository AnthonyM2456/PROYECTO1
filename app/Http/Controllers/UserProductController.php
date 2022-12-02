<?php

namespace App\Http\Controllers;

use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserProductController
 * @package App\Http\Controllers
 */
class UserProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userProducts = UserProduct::where('user_id', Auth::user()->id)->paginate();

        return view('user-product.index', compact('userProducts'))
            ->with('i', (request()->input('page', 1) - 1) * $userProducts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userProduct = new UserProduct();
        return view('user-product.create', compact('userProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(UserProduct::$rules);

        $userProduct = UserProduct::create($request->all());

        return redirect()->route('user-products.index')
            ->with('success', 'UserProduct created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userProduct = UserProduct::find($id);

        return view('user-product.show', compact('userProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userProduct = UserProduct::find($id);

        return view('user-product.edit', compact('userProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UserProduct $userProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProduct $userProduct)
    {
        request()->validate(UserProduct::$rules);

        $userProduct->update($request->all());

        return redirect()->route('user-products.index')
            ->with('success', 'UserProduct updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $userProduct = UserProduct::find($id)->delete();

        return redirect()->route('user-products.index')
            ->with('success', 'UserProduct deleted successfully');
    }
}
