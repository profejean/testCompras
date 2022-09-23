<div class="modal fade" id="exampleModal-{{$f->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle de la factura</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="container">

                    @foreach(detalle($f->id) as $d)
                    <div class="row">
                    <div>
                        <h6>Compra: {{$d->compra_id}}</h6>

                    </div>
                    <div>
                        <h6 >Producto: {{$d->producto_id}}</h6>

                    </div>
                    <div>
                        <h6 >Nombre del producto:{{nombre_producto($d->producto_id)}}</h6>

                    </div>
                    <div>
                        <h6 >Precio: {{precio_producto($d->producto_id)}}</h6>

                    </div>
                    <div>
                        <h6 >Impuesto: {{impuesto_producto($d->producto_id)}}</h6>

                    </div>
                    <div>
                        <h6>Subtotal: {{subtotal($d->producto_id)}}</h6>

                    </div>
                     </div>
                    @endforeach


            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

