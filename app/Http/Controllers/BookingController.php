<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use Illuminate\Http\Request;
use App\Models\VillaAddOnMapping;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $BookingModel = BookingModel::paginate();
        if ($BookingModel) {
            $res = [
                'status' => 200,
                'msg' => 'Success',
                'data' => $BookingModel
            ];
            return response()->json($res);
        } else {
            $res = [
                'status' => 404,
                'msg' => 'Failed',
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

        try {

            $data = $request->validate([
                'booking_name' => 'required',
                'mobile_no' => 'required',
                'email_id' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'payment_status' => 'required',
                'payment_paid' => 'required',
                'pending_payment' => 'required',
                'total_payment' => 'required',
                'no_of_guest' => 'required',
                'adons_id' => 'required',
                'villa_id' => 'required'
            ]);
            $adons_id = $request->adons_id;
            // $data = new MyData;
            $implodeData = implode('|', $adons_id);
            // $data->save();


            $create = [
                'booking_name' => $data['booking_name'],
                'mobile_no' => $data['mobile_no'],
                'email_id' => $data['email_id'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'payment_status' => $data['payment_status'],
                'payment_paid' => $data['payment_paid'],
                'pending_payment' => $data['pending_payment'],
                'total_payment' => $data['total_payment'],
                'no_of_guest' => $data['no_of_guest'],
                'adons_id' => $implodeData,
                'villa_id' => $data['villa_id']
            ];

            $BookingModel = BookingModel::create($create);
            if ($BookingModel) {
                $res = [
                    'status' => 200,
                    'msg' => 'Booking Success',
                    'data' => $BookingModel
                ];
                return response()->json($res);
            } else {
                $res = [
                    'status' => 404,
                    'msg' => 'Booking Failed',
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

        /*
        $data = MyData::find($id);
        $values = explode('|', $data->values);
        */
    }

    public function prac()
    {
        // $map = new VillaAddOnMapping;
        // $map->villa_id = 20.7749;
        // $map->adons_id = -172.4194;
        // $map->save();

        // $maps = VillaAddOnMapping::all(); // retrieves all maps from the "maps" table
        // foreach ($maps as $map) {
        //     print_r($map->villa_id . ', ' . $map->adons_id . '<br>');
        //     // $res = [
        //     //     'status' => 200,
        //     //     'exception' => $map->villa_id . ', ' . $map->adons_id . '<br>'
        //     // ];
        //     // return response()->json($res);
        // }

        // die;

        $booking = BookingModel::where('id', 3)->first();
        $values = explode('|', $booking->adons_id);
        $res = [
            'status' => 200,
            'exception' => $values
        ];
        return response()->json($res);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $BookingModel = BookingModel::where('id', $id)->first();
        if ($BookingModel) {
            $res = [
                'status' => 200,
                'msg' => 'Success',
                'data' => $BookingModel
            ];
            return response()->json($res);
        } else {
            $res = [
                'status' => 404,
                'msg' => 'Failed',
            ];
            return response()->json($res);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $data = $request->validate([
                'booking_name' => 'required',
                'mobile_no' => 'required',
                'email_id' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'payment_status' => 'required',
                'payment_paid' => 'required',
                'pending_payment' => 'required',
                'total_payment' => 'required',
                'no_of_guest' => 'required',
                'adons_id' => 'required',
                'villa_id' => 'required'
            ]);
            $adons_id = $request->adons_id;
            // $data = new MyData;
            $implodeData = implode('|', $adons_id);
            // $data->save();


            $create = [
                'booking_name' => $data['booking_name'],
                'mobile_no' => $data['mobile_no'],
                'email_id' => $data['email_id'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'payment_status' => $data['payment_status'],
                'payment_paid' => $data['payment_paid'],
                'pending_payment' => $data['pending_payment'],
                'total_payment' => $data['total_payment'],
                'no_of_guest' => $data['no_of_guest'],
                'adons_id' => $implodeData,
                'villa_id' => $data['villa_id']
            ];

            $BookingModel = BookingModel::where('id', $id)->update($create);
            if ($BookingModel) {
                $res = [
                    'status' => 200,
                    'msg' => ' Booking Update Success',
                    'data' => $BookingModel
                ];
                return response()->json($res);
            } else {
                $res = [
                    'status' => 404,
                    'msg' => 'Booking Update Failed',
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $BookingModel = BookingModel::where('id', $id)->delete();
        if ($BookingModel) {
            $res = [
                'status' => 200,
                'msg' => ' Booking Delete Success',
                'data' => $BookingModel
            ];
            return response()->json($res);
        } else {
            $res = [
                'status' => 404,
                'msg' => 'Booking Delete Failed',
            ];
            return response()->json($res);
        }
    }
}
