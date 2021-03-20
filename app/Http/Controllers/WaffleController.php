<?php

namespace App\Http\Controllers;


use App\Waffle;
use App\Categoria;
use App\Prover;
use Barryvdh\DomPDF\Facade as PDF;
use Milon\Barcode\DNS1D;

use RealRashid\SweetAlert\Facades\Alert;




use App\Http\Requests\Waffle\StoreRequest;
use App\Http\Requests\Waffle\UpdateRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class WaffleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Waffle::get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::get();
        $proveedores = Prover::get();
        return view('admin.product.create', compact('categorias', 'proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_name ='';
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }
        $waffle = Waffle::create($request->all()+[
            'image'=>$image_name,
        ]);
        if ($waffle->codigo == "") {
            $numero = $waffle->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $waffle->update(['codigo'=>$numeroConCeros]);
        }
        return redirect()->route('waffles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Waffle  $waffle
     * @return \Illuminate\Http\Response
     */
    public function show(Waffle $waffle)
    {
        return view('admin.product.show', compact('waffle'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Waffle  $waffle
     * @return \Illuminate\Http\Response
     */
    public function edit(Waffle $waffle)
    {
        $categorias = Categoria::get();
        $provers = Prover::get();
        return view('admin.product.edit', compact('waffle', 'categorias', 'provers'));     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Waffle  $waffle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Waffle $waffle)
    {        
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }else{
            $image_name = $waffle->image;
        }
        $waffle->update($request->all()+[
            'image'=>$image_name,
        ]);
        if ($request->codigo == "") {
            $numero = $waffle->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $waffle->update(['codigo'=>$numeroConCeros]);
        }
        return redirect()->route('waffles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Waffle  $waffle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Waffle $waffle)
    {   
        $image_path = public_path().'/image/'.$waffle->image;   
        if(File::exists($image_path)){     
            File::delete(public_path('/image/'.$waffle->image)); 
        }
        $waffle->delete();
        return redirect()->route('waffles.index');
    }

    public function change_status( Waffle $waffle)
    {

        if ($waffle->stado === 'ACTIVO') {
            $waffleUP = Waffle::find($waffle->id)->update(['stado'=>'DESACTIVADO']);
            return redirect()->back();
        } else {
            $waffle->update(['stado'=>'ACTIVO']);
            return redirect()->back();
        } 
    }

    public function get_products_by_barcode(Request $request){
        if ($request->ajax()) {
            $products = Waffle::where('codigo', $request->code)->firstOrFail();
            return response()->json($products);
        }
    }
    public function get_products_by_id(Request $request){
        if ($request->ajax()) {
            $products = Waffle::findOrFail($request->product_id);
            return response()->json($products);
        }
    }

    
    public function print_barcode()
    {
        $waffles = Waffle::get();
        $pdf = PDF::loadView('admin.product.barcode', compact('waffles'));
        return $pdf->download('codigos_de_barras.pdf');
    }
}
