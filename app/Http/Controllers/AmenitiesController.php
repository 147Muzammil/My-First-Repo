<?php

namespace App\Http\Controllers;

// use Amanities;
use App\Models\Amenities;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AmenitiesModel = Amenities::paginate();
        if ($AmenitiesModel) {
            $res = [
                'status' => 200,
                'data' => $AmenitiesModel
            ];
            return response()->json($res);
        } else {
            $res = [
                'status' => 404,
                'msg' => 'Something Wrong'
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
            'name' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);

        $AmenitiesModel = Amenities::create($data);
        if ($AmenitiesModel) {
            $res = [
                'status' => 200,
                'data' => $AmenitiesModel
            ];
            return response()->json($res);
        } else {
            $res = [
                'status' => 404,
                'msg' => 'Something Wrong'
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
     * @param  \App\Models\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Amenities = Amenities::where('id', $id)->first();
        if ($Amenities) {
            $res = [
                'status' => 200,
                'data' => $Amenities
            ];
            return response()->json($res);
        } else {
            $res = [
                'status' => 404,
                'msg' => 'Something Wrong'
            ];
            return response()->json($res);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function edit(Amenities $amenities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'image' => $request->image,
            'description' => $request->description
        ];

        $AmenitiesModel = Amenities::where('id', $id)->update($data);

        if ($AmenitiesModel) {
            $res = [
                'status' => 200,
                'data' => $AmenitiesModel
            ];
            return response()->json($res);
        } else {
            $res = [
                'status' => 404,
                'msg' => 'Something Wrong'
            ];
            return response()->json($res);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $AmenitiesModel = Amenities::where('id', $id)->delete();
        if ($AmenitiesModel) {
            $res = [
                'status' => 200,
                'data' => $AmenitiesModel
            ];
            return response()->json($res);
        } else {
            $res = [
                'status' => 404,
                'msg' => 'Something Wrong'
            ];
            return response()->json($res);
        }
    }
}
