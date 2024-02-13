<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $order = $request->validate([
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['required', 'string', 'max:30'],
            'company_name' => ['string', 'nullable', 'max:50'],
            'address' => ['required', 'string', 'max:50'],
            'accommodation' => ['string', 'nullable', 'max:50'],
            'city' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'order_notes' => ['string', 'nullable', 'max:300'],
            'postal_or_zip' => ['required', 'numeric'],
        ]);

        Order::create($order);

        dd(\Mail::to(auth()->user()->email)->send(new OrderConfirmation()));
        \Mail::to(auth()->user()->email)->send(new OrderConfirmation());

        return redirect(route('thank-you'));
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
