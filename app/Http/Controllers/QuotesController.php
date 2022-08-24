<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\Rule;
use App\Models\Quotes;
use App\Models\Quote_Items;

class QuotesController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {

        if (request()->has('email')) {
            return Quotes::with('items', 'items.product')->where('email', '=', request()->input('email'))->orderBy('updated_at', 'desc')->get();
        } else {
            return 'No email supplied.';
        }
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
            if (!Quote_Items::insert($data)) {
                return 'Failed to store quote.';
            };
        }

        return 'Quote saved.';
    }

    public function update()
    {
        $attributes = request()->validate([
            'id' => ['required', 'integer', Rule::exists('quote_items', 'id')],
            'quantity' => 'required|integer'
        ]);

        $quote_item = Quote_Items::find($attributes['id']);
        $quote_item->quantity = $attributes['quantity'];
        if ($quote_item->save()){
            return 'Success';
        } else {
            return 'error';
        }
    }
}
