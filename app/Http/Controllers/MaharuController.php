<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaharuController extends Controller
{
    public function index(){
        $target = DB::table('maps')->selectRaw("maps.name as name, ifnull(sum(users.target), 0) as target")
                  ->leftJoin("users", "maps.id", "=", "users.map_id")
                  ->groupBy("name")
                  ->orderBy("name")
                  ->get();

//        dd($target);
        $progress = DB::table('maps')
                    ->selectRaw("maps.name as name, ifnull(count(results.result), 0) as progress")
                    ->leftJoin("users", "maps.id", "=", "users.map_id")
                    ->leftJoin("results", function($join){
                        $join->on("users.id", "=", "results.post_id");
                        $join->on("results.result", "=", DB::raw("'Success'"));
                    })
                    ->groupBy("name")
                    ->orderBy("name")
                    ->get();

//        dd($progress);

        $percent = array();
        $img = array();

        for($i = 0; $i < count($target); $i++){
            $name = $target[$i]->name;
            $target1 = $target[$i]->target;
            $progress1 = $progress[$i]->progress;

            if($progress1 > $target1){
                $progress1 = $target1;
            }

            $temp1 = (int)floor($progress1 / $target1 * 100);
            $temp2 = intdiv($temp1, 10);
            $temp2 = $temp2 * 10;

            $percent[$name] = $temp1;
            $img[$name] = $temp2;
        }

//        dd($percent);
//        return view("progress", [
//            "percent"=>$percent,
//            "img"=>$img
//        ]);
        return view("progress", compact('percent', 'img'));
    }

    public function status(){
        $pos = User::all();
        return view("status", compact('pos'));
    }
}
