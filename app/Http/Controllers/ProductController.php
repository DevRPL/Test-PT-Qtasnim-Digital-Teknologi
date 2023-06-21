<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('items.index', ['items' => DB::table('products')->orderBy('amount','Desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('products')->insert([
            'name' => $request->name,
            'stock' => $request->stock,
            'amount' => $request->amount,
            'date' => $request->date,
            'product_type' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('items.index');
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
        return view('items.edit', ['item' =>  DB::table('products')->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('products')->where('id', '=', $id)->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'amount' => $request->amount,
            'date' => $request->date,
            'product_type' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('products')->where('id', '=', $id)->delete();

        return redirect()->back();
    }
}
