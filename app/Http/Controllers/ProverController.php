<?php

namespace App\Http\Controllers;

use App\Prover;
use Illuminate\Http\Request;
use App\Http\Requests\Prover\StoreRequest;
use App\Http\Requests\Prover\UpdateRequest;

class ProverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provers = Prover::get();
        return view('admin.proveedor.index', compact('provers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('admin.proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provers = Prover::create($request->all());
        return redirect()->route('provers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prover  $prover
     * @return \Illuminate\Http\Response
     */
    public function show(Prover $prover)
    {
        return view('admin.proveedor.show', compact('prover'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prover  $prover
     * @return \Illuminate\Http\Response
     */
    public function edit(Prover $prover)
    {
         return view('admin.proveedor.edit' , compact('prover'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prover  $prover
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prover $prover)
    {
        $prover->update($request->all());
        return redirect()->route('provers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prover  $prover
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prover $prover)
    {
        $prover->delete();
        return redirect()->route('provers.index');
    }
}
