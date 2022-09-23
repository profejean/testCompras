<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SelectionCow;
use DB;

class SelectionCowController extends Controller
{
    public function index(){

        $cow = SelectionCow::all();
        $cowsSelected = [];
        $hight = 0;
        $hight_cow = [];
        return view('selection_cow', compact('cow','cowsSelected','hight','hight_cow'));
    }


    public function selected(Request $request){

         try {
            DB::beginTransaction();

                $cow = SelectionCow::all();
                $cowsSelected = collect();
                $hight = 0;
                $hight_cow = [];
                foreach($cow as $index=>$c){
                    if($request['cow_selection_'.$index] == 'Si'){
                        $cowsSelected->push($request['cow_id_'.$index]);
                    }
                }

          DB::commit();

        } catch (\Exception $e) {

            \DB::rollBack();

            return Redirect::back()->with('error','El proceso ha fallado, por favor comuniquese con soporte técnico');

        }

        return view('selection_cow', compact('cow','cowsSelected','hight','hight_cow'));
    }

    public function prediction(){

        try {
            DB::beginTransaction();

            $cow = SelectionCow::all();
            $cowsSelected = [];

                $sum = 700 ;
                $array = SelectionCow::all()->pluck('peso')->toArray();
                $list = array();

                extractList($array, $list);

                $list = array_filter($list,function($var) use ($sum) { return(array_sum($var) <= $sum);

                });

                $hight = 0;
                $hight_cow;
                foreach($list as $l){


                    $hight_inside = 0;
                    $group_cow = collect();
                    foreach($l as $a){
                        $milk = SelectionCow::where('peso',$a)->first();
                        $hight_inside += $milk->produccion;
                        $group_cow->push($milk->peso);
                    }

                    if($hight_inside >= $hight){
                        $hight = $hight_inside;
                        $hight_cow = $group_cow;
                    }
                }

          DB::commit();

        } catch (\Exception $e) {

            \DB::rollBack();

            return Redirect::back()->with('error','El proceso ha fallado, por favor comuniquese con soporte técnico');

        }

        return view('selection_cow', compact('hight','hight_cow','cowsSelected','cow'));
    }



}
