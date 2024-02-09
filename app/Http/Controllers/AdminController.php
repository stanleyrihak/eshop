<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::check()){
            return redirect(route('homepage'));
        }
        if(!auth()->user()->is_admin){
            return redirect(route('homepage'));
        }

        return view('admin', ['products'=> Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeProduct(Request $request)
    {
        $request->validate([
            'image'=>'required',
            'name'=>'required',
            'price'=>'required|decimal:2',
        ]);

        $image_name = $request->image->getClientOriginalName();

        $request->image->move(public_path('storage/images/products'), $image_name);

        Product::create([
            'image_path'=> 'storage/images/products/' . $image_name,
            'name'=>$request->name,
            'price'=>$request->price,
        ]);

        return redirect(route('admin.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
