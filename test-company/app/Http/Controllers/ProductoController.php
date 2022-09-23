<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Producto;
use App\Models\Compra;
use App\Models\Factura;
use App\Models\DetalleFactura;

class ProductoController extends Controller
{
    public function comprar(Request $request){
        $credentials = $request->validate([
            'producto_id' => ['required'],

        ]);

        try {

        DB::beginTransaction();

        $compra = new Compra();
        $compra->producto_id = $request->producto_id;
        $compra->status = 'pendiente';
        $compra->save();

        DB::commit();

        } catch (\Exception $e) {

            \DB::rollBack();

            return back()->withErrors([
            'producto_id' => 'Hubo un problema al crear compra'
            ]);

        }

        return back()->with('success', 'Su compra fue un exito');
    }

    public function facturas(){



        $compras = Compra::where('status','pendiente')->get();

        if(count($compras) > 0){

            $factura = new Factura();
            $factura->total = 0;
            $factura->total_impuesto = 0;
            $factura->save();

            $ultimaFactura = Factura::latest()->first();
            $total = 0;
            $impuesto = 0;
            foreach($compras as $c){
               $detalle_factura = new DetalleFactura();
               $detalle_factura->factura_id = $ultimaFactura->id;
               $detalle_factura->producto_id = $c->producto_id;
               $detalle_factura->compra_id = $c->id;
               $detalle_factura->save();

                $total = $total + precio_producto($c->producto_id);

                $impuesto = ((precio_producto($c->producto_id) * impuesto_producto($c->producto_id)) /  100);

                $c->status = 'facturado';
                $c->update();

            }



            $ultimaFactura->total = $total;
            $ultimaFactura->total_impuesto = $impuesto;
            $ultimaFactura->save();


              return Redirect::route('inicio')->with('success', 'La factura se ha creado exitosamente');



        }else{
            return back()->with('error', 'No tienes compras pendientes');
        }


    }
}
