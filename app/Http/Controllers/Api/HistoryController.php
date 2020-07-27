<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\History;

class HistoryController extends Controller
{
    public function historyPost(Request $request)
    {

        $request->validate([
            'idBarang' => 'required',
            'keyword' => 'required',
        ]);

        History::create([
            'idAnggota' => Auth::user()->id,
            'idBarang' => $request->idBarang,
            'keyword' => $request->keyword,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successfully created',
            'data' => [
                'idAnggota' => Auth::user()->id,
                'idBarang' => $request->idBarang,
                'keyword' => $request->keyword
            ],
        ], 201);
    }

    public function historyGetIdAnggota($id)
    {
       $data =  History::where('idAnggota', $id)->first();
        return response()->json([
            'data' => [
                'id' => $data->id,
                'idAnggota' => Auth::user()->id,
                'idBarang' => $data->idBarang,
                'keyword' => $data->keyword,
            ]
        ]);
    }

    public function updateKeyword(Request $request, $id)
    {
        $data = History::where('idBarang', $id)->first();
        $data->keyword = $request->keyword;
        $data->save();

        return response()->json([
            "status" => true,
            "message" => "Successfully update",
            "data" => [
                "keyword" => $request->keyword
            ]
        ]);


    }
}
