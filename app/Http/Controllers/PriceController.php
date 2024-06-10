<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index(){
        $prices = Price::all();
        return view('price.index', compact('prices'));
    }

    public function create(){
        return view('price.create');
    }

    public function store(Request $request){
        $request->validate([
            'metal' => 'required',
            'carat' => 'required',
            'price' => 'required',
        ]);
        Price::create($request->all());
        return redirect('price')->with('success', 'Price created successfully');
    }

    public function edit(Price $price){
        return view('price.edit', compact('price'));
    }

    public function update(Request $request, Price $price){
        $request->validate([
            'metal' => 'required',
            'carat' => 'required',
            'price' => 'required',
        ]);
        $price->update($request->all());
        return redirect('price')->with('success', 'Price Updated successfully');
    }

    public function delete(Price $price){
        $price->delete();
        return back()->with('success', 'Price Deleted successfully');
    }
}
