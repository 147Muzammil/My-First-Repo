<?php

namespace App\Http\Controllers;

use App\Models\BHKModel;
use Illuminate\Http\Request;

class BHKModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'bhk_room' => 'required'
            ]);

            $create = [
                'bhk_room' => $data['bhk_room']
            ];

            $BhkModel = BHKModel::create($create);

            if ($BhkModel) {
                $res = [
                    'status' => 200,
                    'data' => $BhkModel
                ];
                return response()->json($res);
            } else {
                $res = [
                    'status' => 404,
                    'data' => 'something wrong'
                ];
                return response()->json($res);
            }
        } catch (\Exception $e) {
            $res = [
                'status' => 500,
                'exception' => $e->getMessage()
            ];
            return response()->json($res);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BHKModel  $bHKModel
     * @return \Illuminate\Http\Response
     */
    public function show(BHKModel $bHKModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BHKModel  $bHKModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BHKModel $bHKModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BHKModel  $bHKModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BHKModel $bHKModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BHKModel  $bHKModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BHKModel $bHKModel)
    {
        //
    }
}
