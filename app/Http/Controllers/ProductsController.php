<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Quotes;
use App\Models\Quote_Items;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return [
            'products' => Products::latest()->filter(request(['search']))->paginate(10)
        ];
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email', 'min:2', 'max:100'],
            'quote' => 'required|array'
        ]);

        $data = new Quotes;
        $data->email = $attributes['email'];
        $data->save();
        $quote_id = $data->id;

        foreach ($attributes['quote'] as $item => $value) {
            $data = array(
                'quote_id' => $quote_id,
                'product_id' => $value['id'],
                'quantity' => $value['quantity'],
            );
            if (! Quote_Items::insert($data)){
                return 'Failed to store quote.';
            };
        }

        return 'Quote saved.';
    }
}
