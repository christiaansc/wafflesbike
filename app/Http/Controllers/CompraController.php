<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Waffle;
use App\Prover;



use Illuminate\Http\Request;
use App\Http\Requests\Compra\StoreRequest;
use App\Http\Requests\Compra\UpdateRequest;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::get();
        return view('admin.compra.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Prover::get();
        $waffles = Waffle::where('stado', 'ACTIVO')->get();
        return view('admin.compra.create', compact('proveedores','waffles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $compra = Compra::create($request->all());

        foreach($request->product_id as $key => $product){
            $results[] = array("product_id" => $request->product_id[$key],
            "cantidad"=> $request->cantidad[$key],
            "total"=> $request->precio[$key]); 
        }

        $compra->DetallesCompra()->createMany($results);
        return redirect()->route('compras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        return view('admin.compra.show', compact('compras'));
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        $proveedores = Proveedor::get();

        return view('admin.compra.show', compact('compras'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Compra $compra)
    {
        // $compra = Compra::update($request->all());
        // return redirect()->route('compras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        // $compra->delete('compras.index');
        // return redirect()->route('compras.index');

    }
}
