<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Map;
use App\Models\Result;
use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;

class PenposController extends Controller
{
    public function index_old()
    {
        $user = User::find(Auth::user()->id);

        $map = DB::table("maps")
            ->select()
            ->where("id", "=", $user->map_id)
            ->first();

        $result = DB::table("results")
            ->selectRaw("results.result as result, groups.number as number, results.group_id as group_id")
            ->join("groups", "groups.id", "=", "results.group_id")
            ->where("post_id", "=", $user->id)
            ->get();

        $done = array();
        foreach ($result as $temp) {
            array_push($done, $temp->group_id);
        }
        $groups = Group::all();
        $belumMain = array();

        foreach ($groups as $temp) {
            if (!in_array($temp->id, $done)) {
                array_push($belumMain, $temp);
            }
        }
        return view("penpos", [
            "user" => $user,
            "groups" => $groups,
            "map" => $map,
            "results" => $result,
            "listGroup" => $belumMain
        ]);
    }

    public function index()
    {
        // Ambil Nama Value nya aja
        $maps = Auth::user()->maps()
                    ->get()
                    ->pluck('name')
                    ->toArray();

        // Tim yg udh main
        $results = Auth::user()
                    ->groups()
                    ->get();
//                    ->pluck('id')
//                    ->toArray();
        $idYgUdhMain = $results->pluck('id')->toArray();

        // Tim yg blm main
        $belumMain = Group::whereNotIn('id', $idYgUdhMain)->get();

//        dd($results);

        return view('penpos', compact('maps', 'results', 'belumMain'));
    }

    public function submit(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'team' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            // $request->session()->flash('valid', 'false');
            return redirect()->route('penpos')->with("error", "Data yang diisikan belum lengkap!");
        } else {
            DB::beginTransaction();
            try {
                $group_id = $request->get("team");
                $status = $request->get("status");
                $post_id = Auth::user()->id;

                $result = new Result();
                $result->group_id = $group_id;
                $result->result = $status;
                $result->post_id = $post_id;
                $result->save();

                $post = User::find(Auth::user()->id);
                $post->status = "Kosong";
                $post->save();
                DB::commit();
                return redirect()->route('penpos')->with("success", "Input data berhasil!");
            } catch (Exception $x) {
                DB::rollBack();
                return redirect()->route('penpos')->with("error", "Input data gagal!");
            }
        }
    }

    public function status(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'statusPos' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('penpos')->with("status", "Data yang diisikan belum lengkap");
        } else {
            $status = $request->get("statusPos");
            $post = User::find(Auth::user()->id);
            $post->status = $status;
            $post->save();

            return redirect()->route('penpos')->with("status", "Ubah status berhasil");
        }
    }
}
