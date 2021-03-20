<?php
use App\Waffle;
use \Milon\Barcode\DNS1D;

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as PDF;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return redirect()->route('login');
});


Route::get('ventas/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('ventas/reports_date', 'ReportController@reports_date')->name('reports.date');
Route::post('ventas/report_results', 'ReportController@report_results')->name('report.results');


Route::resource('categorias', 'CategoriaController')->names('categorias');
Route::resource('provers', 'ProverController')->names('provers');
Route::resource('waffles', 'WaffleController')->names('waffles');                                     
Route::resource('compras', 'CompraController')->names('compras');
Route::resource('ventas', 'VentaController')->names('ventas');

Route::get('change_status/ventas/{venta}', 'VentaController@change_status')->name('change.status.ventas');
Route::get('change_status/waffles/{waffle}', 'WaffleController@change_status')->name('change.status.waffles');
Route::get('change_status/compras/{compra}', 'CompraController@change_status')->name('change.status.purchases');

Route::get('ventas/pdf/{venta}', 'VentaController@pdf')->name('ventas.pdf');
Route::get('print_barcode', 'WaffleController@print_barcode')->name('print_barcode');

Route::get('get_products_by_barcode', 'WaffleController@get_products_by_barcode')->name('get_products_by_barcode');
Route::get('get_products_by_id', 'WaffleController@get_products_by_id')->name('get_products_by_id');

Route::resource('users', 'UserController')->names('users');


Route::get('purchases/upload/{purchase}', 'PurchaseController@upload')->name('upload.purchases');
Route::get('/barcode', function () {
    $products = Waffle::get();
    return view('admin.product.barcode', compact('products'));
});

Route::resource('clientes', 'ClienteController')->names('clientes');


Route::get('ventas/pdf/{venta}', 'VentaController@pdf')->name('ventas.pdf');
Route::get('ventas/print/{venta}', 'VentaController@print')->name('ventas.print');  


Auth::routes();

Auth::routes(['register' => true]);
Route::get('/home', 'HomeController@index')->name('home');
