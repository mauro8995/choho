<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\advise;
use App\Models\product;
use App\Models\client;
use App\Models\status;
use App\Models\product_order;
use App\Models\order;




class advisesController extends Controller
{
    //obtiene la informacion de los asesores y los clientes asignados y
    //los pedidos de los clientes con sus respectivos productos
    public function get_data(){
        $obj = new \stdClass();

        $a = advise::where('id_advise',1)->first();
        $obj->codigo_asesor = $a->codigo_asesor;
        $obj->name = $a->name;
        $cliente = client::where('id_advise',$a->id_advise)->get();
        $obj->clientes_asignados= count($cliente);
        $obj->clientes=[];
        $tota_pedidos_global = 0;
        // $cliente_obj = new \stdClass();
        foreach ($cliente as $key => $value) {
            $cliente_obj = new \stdClass();
            $cliente_obj->id_cliente = $value->id_cliente;
            $cliente_obj->name = $value->name;
            $order_array = order::where('id_cliente',$value->id_cliente)->get();
            $cliente_obj->total_pedidos = count($order_array);
            $cliente_obj->detalle_pedidos = [];
            foreach ($order_array as $key_1 => $value_1) {
                # code...
                $tota_pedidos_global++;
                $order_obj = new \stdClass();
                $order_obj->id_pedido = $value_1->id_order;
                $order_obj->total_productos = $value_1->total_pruductos;
                $order_obj->total_pedido = $value_1->total_pedido;
                $order_obj->estado = "pagado";
                $order_obj->fecha_pago = $value_1->fecha_pago;
                $order_obj->productos = [];
                $order_detalle_array = product_order::where('id_order',$value_1->id_order)->get();
                foreach ($order_detalle_array as $key_2 => $value_2) {
                    $productos_obj = new \stdClass();
                    $productos_obj->id_producto = $value_2->id_product;
                    $pro = product::where('id_product',$value_2->id_product)->first();
                    $productos_obj->tipo = $pro->description;
                    $productos_obj->cantidad = $value_2->cantidad;
                    $productos_obj->valor_unitario = $value_2->valor_unitario;
                    $productos_obj->total = $value_2->total;
                    array_push($order_obj->productos,$productos_obj);
                }
                array_push($cliente_obj->detalle_pedidos,$order_obj);
            }
            array_push($obj->clientes,$cliente_obj);
        }
        $obj->total_pedidos=$tota_pedidos_global;
        // $obj->clientes=[];


        return response()->json([$obj]);

    }


}
