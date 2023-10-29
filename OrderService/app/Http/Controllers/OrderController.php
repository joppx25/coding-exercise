<?php

namespace App\Http\Controllers;

use App\Jobs\OrderSummaryJob;
use App\Jobs\UpdateProductJob;
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
        $user = json_decode($request->user, true);
        $product = json_decode($request->product, true);

        $res = Order::create([
            'user_id'    => $user['id'],
            'product_id' => $product['id'],
        ]);

        if ($res) {
            // Example update the product qty once ordered
            UpdateProductJob::dispatch([
                'product' => $product,
                'qty' => 1
            ])->onQueue('product_queue');

            OrderSummaryJob::dispatch([
                'product' => $product,
                'user'    => $user,
            ])->onQueue('email_queue');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
