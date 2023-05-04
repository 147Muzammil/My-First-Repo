<?php

namespace App\Http\Controllers;

use App\Models\Days;
use Illuminate\Http\Request;

class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daysModel = Days::all();
        if ($daysModel) {
            $res = [
                'status' => 200,
                'data' => $daysModel
            ];
            return response()->json($res);
        } else {
            $res = [
                'status' => 404,
                'data' => 'something wrong'
            ];
            return response()->json($res);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'days' => 'required',
            'standard_price' => 'required',
            'actual_price' => 'required',
            'villa_id' => 'required'
        ]);

        $create = [
            'days' => $data['days'],
            'standard_price' => $data['standard_price'],
            'actual_price' => $data['actual_price'],
            'villa_id' => $data['villa_id']
        ];

        $daysModel = Days::create($create);

        if ($daysModel) {
            $res = [
                'status' => 200,
                'data' => $daysModel
            ];
            return response()->json($res);
        } else {
            $res = [
                'status' => 404,
                'data' => 'something wrong'
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
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function show(Days $days)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function edit(Days $days)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Days $days)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function destroy(Days $days)
    {
        //
    }
}
