<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class SupplierAdmin extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return Inertia::render('Admin/Supplier/Index', ['suppliers' => $suppliers]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Admin/Supplier/Create');
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

        Supplier::create($request->all());

        return redirect()->route('suppliers.index');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Supplier $supplier)
    {
        return Inertia::render('Admin/Supplier/Edit', [
            'supplier' => $supplier
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

        Supplier::find($id)->update($request->all());
        return redirect()->route('suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();
        return redirect()->route('suppliers.index');
    }
}
