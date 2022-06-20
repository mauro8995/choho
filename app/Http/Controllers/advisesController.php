<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\advise;
use App\Models\product;
use App\Models\client;
use App\Models\status;
use App\Models\product_order;
use App\Models\order;


 /**
     * controlador de asesor
     *documentacion del uso ORM
     *https://laravel.com/docs/9.x/eloquent
     */

class advisesController extends Controller
{
   /**
     * obtiene y arma los datos solicitados en el Endpoints.
     * llama a una funcion process_data para verificar si el asesor esta registrado
     * en caso de no encontrar envia un error 404 un mensaje
     *
     */
    public function get_data(){
        $endpoints = $this->process_data();
        if($endpoints){//verifica si existe el asesor
            return response()->json($endpoints);//Si encuetra en asesor envia la respuesta
        }
        else{
            return response()->json(["messaje"=>"no se encontro el asesor"],404);//en caso que no envia como recurso no encontrado
        }
    }


     /**
     * obtiene y arma los datos solicitados en el Endpoints.
     * EL ASESORES, CLIENTES, PEDIDOS, PRODUCTOS
     *
     */
    public function process_data(){


        //esta es la estructura pedida en el Endpoints con todos sus parametros
        $asesores = advise::all();//Axede de todos los  ASESORES
        $array_asesores = [];
        foreach ($asesores as $key_0 => $value_0) {//recorre los asesores
            $endpoints = new \stdClass();
            $endpoints->codigo_asesor = $value_0->codigo_asesor;//Accede al codigo de ASESOR
            $endpoints->name = $value_0->name;//Accede al nombre ASESOR
            $cliente = client::where('id_advise',$value_0->id_advise)->get();//accede a todos los CLIENTES atraves del id asesor
            $endpoints->clientes_asignados= count($cliente);//cantidad tidad de cleintes ansigados al ASESOR
            $endpoints->clientes=[];//se crea el array de CLIENTES
            $tota_pedidos_global = 0;//contador de total de pedidos del asesor.
            foreach ($cliente as $key => $value) {//recorre los clientes
                $cliente_obj = new \stdClass();//se crea el objeto CLIENTE
                $cliente_obj->id_cliente = $value->id_cliente;//obtiene el ID del CLIENTE
                $cliente_obj->name = $value->name;//obtiene el NOMBRE del CLIENTE
                $order_array = order::where('id_cliente',$value->id_cliente)->get();//obtiene los PEDIDOS del CLIENTE
                $cliente_obj->total_pedidos = count($order_array);//obtiene la cantidad de  PEDIDOS del CLIENTE
                $cliente_obj->detalle_pedidos = [];//crea el array de PEDIDOS
                foreach ($order_array as $key_1 => $value_1) {
                    $tota_pedidos_global++;//contador de    TOTAL DE PEDIDOS del asesor.
                    $order_obj = new \stdClass();//se crea el objeto PEDIDOS
                    $order_obj->id_pedido = $value_1->id_order;//se obtiene el ID del PEDIDO
                    $order_obj->total_productos = $value_1->total_pruductos;//se obtiene el ID del PEDIDO
                    $order_obj->total_pedido = $value_1->total_pedido;//se obtiene el TOTAL de PEDIDOS
                    $order_obj->estado = "pagado";//obtiene el  ESTADO del PEDIDO
                    $order_obj->fecha_pago = $value_1->fecha_pago;//obtiene el  FECHA del PEDIDO
                    $order_obj->productos = [];//crea el array de PRODUCTOS

                    //Obtiene las PEDIDOS con los ID de los PRODUCTOS relacionados.
                    $order_detalle_array = product_order::where('id_order',$value_1->id_order)->get();
                    foreach ($order_detalle_array as $key_2 => $value_2) {//recorre PRODUCTOS
                        $productos_obj = new \stdClass();//se crea el objeto PRODUCTO
                        $productos_obj->id_producto = $value_2->id_product;//obtiene el ID del PRODUCTO
                        $pro = product::where('id_product',$value_2->id_product)->first();//obtiene el  PRODUCTO datos
                        $productos_obj->tipo = $pro->description;//obtiene el TIPO DEL  PRODUCTO
                        $productos_obj->cantidad = $value_2->cantidad;//obtiene el CANTIDAD DEL  PEDIDO
                        $productos_obj->valor_unitario = $value_2->valor_unitario;//obtiene el PRECIO DEL  PRODUCTO
                        $productos_obj->total = $value_2->total;//obtiene el TOTAL  DEL  PRODUCTO
                        array_push($order_obj->productos,$productos_obj);//se agrega al array de PRODUCTOS
                    }
                    array_push($cliente_obj->detalle_pedidos,$order_obj);//se agrega al array de PEDIDOS
                }
                array_push($endpoints->clientes,$cliente_obj);//se agrega al array de clientes
            }
            $endpoints->total_pedidos=$tota_pedidos_global;//contador de  TOTAL DE PEDIDOS del asesor.
            array_push($array_asesores,$endpoints);
        }



        return $array_asesores;
    }


}
