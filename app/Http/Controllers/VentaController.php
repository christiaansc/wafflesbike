<?php

namespace App\Http\Controllers;

use App\Venta;
use App\Cliente;
use App\Waffle;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;




use Illuminate\Http\Request;
use App\Http\Requests\Venta\StoreRequest;
use App\Http\Requests\Venta\UpdateRequest;

class VentaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::get();
        return view('admin.venta.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::get();
        $waffles = Waffle::where('stado', 'ACTIVO')->get();
        return view('admin.venta.create', compact('clientes', 'waffles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $cliente_id = "1";

        
        $sale = Venta::create($request->all()+[
            'cliente_id' =>$cliente_id,
            'user_id'=>Auth::user()->id,
            'fecha_venta'=>Carbon::now('America/Santiago'),
        ]);
        foreach ($request->product_id as $key => $product) {
            $results[] = array("waffle_id"=>$request->product_id[$key], "cantidad"=>$request->quantity[$key], "precio"=>$request->price[$key], "descuento"=>$request->discount[$key], 'fecha_venta'=>Carbon::now('America/Santiago'));

            
        }

 
        $sale->ventaDetalle()->createMany($results);
        return redirect()->route('ventas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        $subtotal = 0 ;
        $VentaDetalles = $venta->VentaDetalle;
        foreach ($VentaDetalles as $ventaDetalle) {
            $subtotal += $ventaDetalle->cantidad*$ventaDetalle->precio-$ventaDetalle->cantidad* $ventaDetalle->precio*$ventaDetalle->descuento/100;
        }
        return view('admin.venta.show', compact('venta', 'VentaDetalles', 'subtotal'));
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        $clientes = Cliente::get();
        return view('admin.venta.show', compact('ventas'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Venta $venta)
    {
        // $venta = Venta::update($request->all());
        // return redirect()->route('ventas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        // $venta->delete('ventas.index');
        // return redirect()->route('ventas.index');

    }
    public function pdf(Venta $venta)
    {
        $subtotal = 0 ;
        $ventaDetalles = $venta->ventaDetalle;
        foreach ($ventaDetalles as $ventaDetalle) {
            $subtotal += $ventaDetalle->cantidad*$ventaDetalle->precio-$ventaDetalle->cantidad* $ventaDetalle->precio*$ventaDetalle->discount/100;
        }
        $pdf = PDF::loadView('admin.venta.pdf', compact('venta', 'subtotal', 'ventaDetalles'));
        return $pdf->download('Reporte_de_venta_'.$venta->id.'.pdf');
    }

    public function print(Venta $sale){
        try {
            $subtotal = 0 ;
            $saleDetails = $sale->venta;
            foreach ($saleDetails as $saleDetail) {
                $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
            }  

            $printer_name = "TM20";
            $connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);

            $printer->text("€ 9,95\n");

            $printer->cut();
            $printer->close();


            return redirect()->back();

        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function change_status(Venta $venta)
    {
        if ($venta->stado === 'VALIDO') {

            $ventaUP = Venta::find($venta->id)->update(['stado'=>'CANCELADO']);
            return redirect()->back();
        } else {
            $venta->update(['stado'=>'VALIDO']);
            return redirect()->back();
        } 
    }
}
