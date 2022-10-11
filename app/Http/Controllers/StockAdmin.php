<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class StockAdmin extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        $stocks = Stock::all();
        return Inertia::render('Admin/Stock/Index', ['stocks' => $stocks]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Admin/Stock/Create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required'],
            'address' => ['required'],
        ])->validate();

        Stock::create($request->all());

        return redirect()->route('stocks.index');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Stock $stock)
    {
        return Inertia::render('Admin/Stock/Edit', [
            'stock' => $stock
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required'],
            'address' => ['required'],
        ])->validate();

        Stock::find($id)->update($request->all());
        return redirect()->route('stocks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        Stock::find($id)->delete();
        return redirect()->route('stocks.index');
    }
}
