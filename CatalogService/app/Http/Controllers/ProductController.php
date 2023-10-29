<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return Product
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Request $request
     */
    public function store(Request $request)
    {

        $sku = $this->generateRandomString();
        $product = Product::create([
            'sku'         => $sku,
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'quantity'    => $request->quantity,
        ]);

        return $product;
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return Product
     */
    public function show(int $id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param Request $request
     * @param int $id
     * @return boolean
     */
    public function update(Request $request, int $id)
    {
        $product = Product::find($id);
        
        return $product->update($request->only('title', 'description', 'price', 'quantity'));
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     */
    public function destroy(int $id)
    {
        Product::destroy($id);
        // @TODO ADD a queue event
    }

    private function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = Str::random($length);
    
        // Ensure the random string contains at least one number and one letter
        while (!preg_match('/[0-9]/', $randomString) || !preg_match('/[A-Za-z]/', $randomString)) {
            $randomString = Str::random($length);
        }
    
        return $randomString;
    }
}
