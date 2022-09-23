<div>

    <form  method="post" action="{{route('selection_cow_add')}}" enctype="multipart/form-data">
        @csrf
         <table>
            <tr>
                <th>Vaca</th>
                <th>Peso en kilogramos</th>
                <th>Produccion de leche por día</th>
                <th>Selección</th>
            </tr>
            @foreach($cow as $key=>$c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->peso}}</td>
                <td>{{$c->produccion}}</td>
                <td>
                    <select name="cow_selection_{{$key}}" >
                        @if(!empty(old('cow_selection_'.$key)))
                            <option value="{{old('cow_selection_'.$key)}}">{{old('cow_selection_'.$key)}}</option>
                        @endif
                        <option value="No">No</option>
                        <option value="Si">Si</option>
                    </select>
                    <input type="hidden" value="{{$c->id}}" name="cow_id_{{$key}}">
                </td>
            </tr>
            @endforeach

        </table>
        <div>
            <button type="submit" style="margin-top:10px;">Enviar</button>
        </div>
    </form>

    <a href="{{route('prediction')}}"><button type="button" style="margin-top:10px;">Predicción</button></a>


    @if(count($cowsSelected) > 0)
        <table>
            <tr>
                <th>Vaca</th>
                <th>Peso en kilogramos</th>
                <th>Produccion de leche por día</th>

            </tr>
            @foreach($cowsSelected as $cs)
            <tr>
                <td>{{$cs}}</td>
                <td>{{cow_peso($cs)}}</td>
                <td>{{cow_produccion($cs)}}</td>

            </tr>
            @endforeach

            <tr>
                <td colspan="3">Total Peso: {{total_peso($cowsSelected)}}</td>
            </tr>
            <tr>
                <td colspan="3">Total produccion: {{total_produccion($cowsSelected)}}</td>
            </tr>

        </table>
    @else
    <h2>Seleccione sus Vacas, por favor</h2>
    @endif


    @if(count($hight_cow) > 0 and $hight > 0)
        <table>
            <tr>
                <th>Vaca</th>
                <th>Peso en kilogramos</th>
                <th>Produccion de leche por día</th>

            </tr>
            @php $sum = 0; @endphp
            @foreach($hight_cow as $hc)
            <tr>
                <td>{{peso_id($hc)}}</td>
                <td>{{$hc}}</td>
                <td>{{peso_produccion($hc)}}</td>
            </tr>
            @endforeach

            <tr>
                <td colspan="3">Total Peso: {{$hight}}</td>
            </tr>
            <tr>
                <td colspan="3">Total produccion: {{$hight}}</td>
            </tr>

        </table>
    @else
    <h2>No hay predicción</h2>
    @endif

</div>
