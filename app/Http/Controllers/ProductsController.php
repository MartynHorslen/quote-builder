<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Products $products)
    {
        return $products;
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function edit(Products $products)
    {
        //
    }
    
    public function update(Products $products)
    { 
        //        
    }

    public function destroy(Products $products)
    {  
        //
    }

    public function show(Products $products)
    {
        //
    }
}