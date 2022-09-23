<?php
use App\Models\SelectionCow;


function cow_peso($id){
    $cow = SelectionCow::where('id',$id)->first();
    return $cow->peso;
}

function cow_produccion($id){
    $cow = SelectionCow::where('id',$id)->first();
    return $cow->produccion;
}

function total_peso($data){
    $peso = 0;
    foreach($data as $d){
        $peso += cow_peso($d);
    }
    return $peso;
}

function total_produccion($data){
    $produccion  = 0;
    foreach($data as $d){
        $produccion += cow_produccion($d);
    }
    return $produccion;
}

function peso_id($peso){
    return SelectionCow::where('peso',$peso)->first()->id;
}

function peso_produccion($peso){
    return SelectionCow::where('peso',$peso)->first()->produccion;
}


function extractList($array, &$list, $temp = array()) {
    if (count($temp) > 0 && ! in_array($temp, $list))
        $list[] = $temp;
    for($i = 0; $i < sizeof($array); $i ++) {
        $copy = $array;
        $elem = array_splice($copy, $i, 1);
        if (sizeof($copy) > 0) {
            $add = array_merge($temp, array($elem[0]));
            sort($add);
            extractList($copy, $list, $add);
        } else {
            $add = array_merge($temp, array($elem[0]));
            sort($add);
            if (! in_array($temp, $list)) {
                $list[] = $add;
            }
        }
    }
}

