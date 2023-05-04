<?php

namespace App\Http\Controllers;

use App\Models\LocationModel;
use Illuminate\Http\Request;

class LocationModelController extends Controller
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
                'location_name' => 'required'
            ]);
            $create = [
                'location_name' => $data['location_name']
            ];

            $LocationModel = LocationModel::create($create);

            if ($LocationModel) {
                $res = [
                    'status' => 200,
                    'data' => $LocationModel
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
     * @param  \App\Models\LocationModel  $locationModel
     * @return \Illuminate\Http\Response
     */
    public function show(LocationModel $locationModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LocationModel  $locationModel
     * @return \Illuminate\Http\Response
     */
    public function edit(LocationModel $locationModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LocationModel  $locationModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LocationModel $locationModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocationModel  $locationModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocationModel $locationModel)
    {
        //
    }
}
