<?php
use App\Models\DetalleFactura;
use App\Models\Producto;


function detalle($id){
    $factura = DetalleFactura::where('factura_id',$id)->get();
    return $factura;
}

function nombre_producto($id){
    $producto = Producto::where('id',$id)->first();
    return $producto->nombre;
}

function precio_producto($id){
    $producto = Producto::where('id',$id)->first();
    return $producto->precio;
}

function impuesto_producto($id){
    $producto = Producto::where('id',$id)->first();
    return $producto->tax;
}

function subtotal($id){
    $producto = Producto::where('id',$id)->first();
    $operacion = ((($producto->precio * $producto->tax) / 100) + $producto->precio);
    return $operacion;
}






