@extends ('layout')

@section ('content')
    @if(Auth::user()->rol == 'cliente')
    <div class="container">
        <form class="col text-center" method="post" action="{{route('comprar')}}">
            @csrf
            <div class="row">
                <div class="col-6">
                    <select class="form-select" name="producto_id">
                        @foreach($productos as $p)
                            <option selected value="{{$p->id}}">{{$p->nombre}} - {{$p->precio}} -{{$p->tax}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary">
                        Comprar
                    </button>
                </div>
            </div>
        </form>
    </div>
    @elseif(Auth::user()->rol == 'admin')
    <div class="container">
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <a class="btn btn-primary" href="{{route('facturas')}}">
                        Facturas pendientes ({{count($compras)}})
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-3">
                    <h4>Factura nro</h4>
                </div>
                <div class="col-3">
                    <h4>Precio Total</h4>
                </div>
                <div class="col-3">
                    <h4>Impuesto</h4>
                </div>

                <div class="col-3">
                    <h4>Opciones</h4>
                </div>
            </div>
            @foreach($facturas as $f)
            <div class="row">
                <div class="col-3">
                    <h4>{{$f->id}}</h4>
                </div>
                <div class="col-3">
                    <h4>{{$f->total}}</h4>
                </div>
                <div class="col-3">
                    <h4>{{$f->total_impuesto}}</h4>
                </div>

                <div class="col-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$f->id}}">
                   Detalle
                    </button>
                </div>
            </div>
            @include('modal_detalle')
            @endforeach

        </div>



    </div>
    @else
    <h2 class="text-danger">
        No tienes un rol en el sistema
    </h2>
    @endif

@endsection
