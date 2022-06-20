<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\advisesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Middleware\apiAccess;

Route::middleware([apiAccess::class])->group(function () {


     /**
    *  endpoint información de los asesores
    *Los asesores con el número total de clientes asignados y cuantos
    *pedidos tiene cada cliente.
    *- La lista de pedidos que tienen cada asesor, con el detalle de cada
    *pedido: Producto, cantidad, valor unitario, monto total del pedido,
    *estado y fecha de pago.
     *
     */
Route::get('advedise/order', [advisesController::class, 'get_data']);


});

