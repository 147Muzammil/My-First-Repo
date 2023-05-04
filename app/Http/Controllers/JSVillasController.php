<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JSVillas;
use App\Models\JsAddOnsModel;
use Facade\FlareClient\View;
use JsVillas as GlobalJsVillas;

class JSVillasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JSVillas = JSVillas::paginate(10);
        if ($JSVillas) {
            $res = [
                'status' => 200,
                'data' => $JSVillas,
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
                'name' => 'required',
                'oneday_price' => 'required',
                'description' => 'required',
                'amenities' => 'required',
                'tags' => 'required',
                'base_image' => 'required',
                'additional_images' => 'required',
                'status' => 'required',
                'guest_limit' => 'required',
                'additional_guest_charge' => 'required',
                'bullet_points' => 'required',
                'actual_price' => 'required',
                'location' => 'required',
                'video' => 'required',
                'video_url' => 'required',
                'amenities_id' => 'required',
                'add_ons_id' => 'required'
            ]);

            if ($request->file('base_image')) {
                $file = $request->file('base_image');
                //  print_r($file);
                $filename = time() . '_' . $file->getClientOriginalName();

                // File upload location
                $location = 'files/villa/base_image/';

                $path = $location . $filename;

                // Upload file
                $file->move($location, $filename);
                // $productmodel->product_attachment = $path;
            }

            if ($request->hasfile('additional_images')) {
                $i = 0;
                $allPaths = array();
                foreach ($request->file('additional_images') as $key => $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();

                    // File upload location

                    $location = 'files/villa/additional_images/';
                    $file->move($location, $filename);
                    $fullPath = $location . $filename;
                    $allPaths[$i] = $fullPath;
                    $i++;
                }
                $allPathsString = implode('||', $allPaths);
                // $productmodel->product_images = $allPathsString;
            }

            $jsVillaModel = JSVillas::create([
                'name' => $data['name'],
                'oneday_price' => $data['oneday_price'],
                'description' => $data['description'],
                'amenities' => $data['amenities'],
                'tags' => $data['tags'],
                'base_image' => $path,
                'additional_images' => $allPathsString,
                'status' => $data['status'],
                'guest_limit' => $data['guest_limit'],
                'additional_guest_charge' => $data['additional_guest_charge'],
                'bullet_points' => $data['bullet_points'],
                'actual_price' => $data['actual_price'],
                'location' => $data['location'],
                'video' => $data['video'],
                'video_url' => $data['video_url'],
                'amenities_id' => $data['amenities_id'],
                'add_ons_id' => $data['add_ons_id']
            ]);

            $villaId = $jsVillaModel['id'];

            $jsAddOns = $request->input('jsAddOns');

            $JsAddOnsModel = new JsAddOnsModel();
            $date = date("y-m-d h:i:s");
            $addOns = array();

            foreach ($jsAddOns as $JAO) {
                $addOns[] = array(
                    'villa_id' => $villaId,
                    'title' => $JAO['title'],
                    'add_on_label' => $JAO['add_on_label'],
                    'add_on_description' => $JAO['add_on_description'],
                    'add_on_price' => $JAO['add_on_price'],
                    'status' => $JAO['status'],
                    'created_at' => $date,
                    'updated_at' => $date,
                );
            }

            $JsAddOnsModel->insert($addOns);

            $AOID = $JsAddOnsModel['id'];

            if ($jsVillaModel) {
                $res = [
                    'status' => 200,
                    'data' => $jsVillaModel,
                    // 'id' => $AOID
                ];
                return response()->json($res);
            } else {
                $res = [
                    'status' => 404,
                    'data' => 'Something Wrong'
                ];
                return response()->json($res);
            }
        } catch (\Exception $e) {
            $res = [
                'status' => 500,
                'data' => $e->getMessage()
            ];
            return response()->json($res);
        }
    }

    public function addVilla(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'oneday_price' => 'required',
            'description' => 'required',
            'amenities' => 'required',
            'tags' => 'required',
            'base_image' => 'required',
            'additional_images' => 'required',
            'status' => 'required',
            'guest_limit' => 'required',
            'additional_guest_charge' => 'required',
            // 'bullet_points' => 'required',
            'actual_price' => 'required',
            'location' => 'required',
            'video' => 'required',
            'video_url' => 'required',
            'amenities_id' => 'required',
            'add_ons_id' => 'required'
        ]);

        // $bullet_points = $request->bullet_points;
        // $implodebullet_points = implode('|', $bullet_points);

        $jsVillaModel = JSVillas::create([
            'name' => $data['name'],
            'oneday_price' => $data['oneday_price'],
            'description' => $data['description'],
            'amenities' => $data['amenities'],
            'tags' => $data['tags'],
            'base_image' => $data['base_image'],
            'additional_images' => $data['additional_images'],
            'status' => $data['status'],
            'guest_limit' => $data['guest_limit'],
            'additional_guest_charge' => $data['additional_guest_charge'],
            // 'bullet_points' => $implodebullet_points,
            'actual_price' => $data['actual_price'],
            'location' => $data['location'],
            'video' => $data['video'],
            'video_url' => $data['video_url'],
            'amenities_id' => $data['amenities_id'],
            'add_ons_id' => $data['add_ons_id']
        ]);

        if (isset($jsVillaModel)) {
            $res = [
                'status' => 200,
                'message' => $jsVillaModel
            ];
            return response()->json($res);
        } else {
            $res = [
                'status' => 404,
                'message' => 'Not Save'
            ];
            return response()->json($res, 404);
        }
    }


    public function addVillaImage(Request $request)
    {


        if ($request->file('base_image')) {
            $file = $request->file('base_image');
            //  print_r($file);
            $filename = time() . '_' . $file->getClientOriginalName();
            // File upload location
            $location = 'files/villa/base_image/';
            $path = $location . $filename;
            // Upload file
            $file->move($location, $filename);

            if (isset($path)) {
                $res = [
                    'status' => 200,
                    'base_image' => $path,
                    // 'additional_image' => $allPathsString
                ];
                return response()->json($res);
            } else {
                $res = [
                    'status' => 404,
                    'message' => 'Not Save'
                ];
                return response()->json($res, 404);
            }
        }
    }

    public function filterVilla(Request $request)
    {
        $actual_price = $request->actual_price;

        $VillaModel = JSVillas::where('actual_price','<=', $actual_price)->get();
        if ($VillaModel) {
            $res = [
                'status' => 200,
                'filter_villa' => $VillaModel
            ];
            return response()->json($res);
        } else {
            $res = [
                'status' => 404,
                'error' => 'Something Wrong'
            ];
            return response()->json($res);
        }
    }
    public function additionalImages(Request $request)
    {
        if ($request->hasfile('additional_images')) {
            $i = 0;
            $allPaths = array();
            foreach ($request->file('additional_images') as $key => $file) {
                $filename = time() . '_' . $file->getClientOriginalName();

                // File upload location

                $location = 'files/villa/additional_images/';
                $file->move($location, $filename);
                $fullPath = $location . $filename;
                $allPaths[$i] = $fullPath;
                $i++;
            }
            $allPathsString = implode('||', $allPaths);

            if (isset($allPathsString)) {
                $res = [
                    'status' => 200,
                    'additional_Image' => $allPathsString,
                ];
                return response()->json($res);
            } else {
                $res = [
                    'status' => 404,
                    'message' => 'Not Save'
                ];
                return response()->json($res, 404);
            }
        }
    }

    public function addVillaVideo(Request $request)
    {
        if ($request->file('villa_video')) {
            $file = $request->file('villa_video');
            //  print_r($file);
            $filename = time() . '_' . $file->getClientOriginalName();

            // File upload location
            $location = 'files/villa/villa_video/';

            $path = $location . $filename;

            // Upload file
            $file->move($location, $filename);
            // $productmodel->product_video = $path;

            if ($path) {
                $res = [
                    'status' => 200,
                    'video_path' => $path
                ];
                return response()->json($res);
            } else {
                $res = [
                    'status' => 404,
                    'error' => 'Something Wrong'
                ];
                return response()->json($res);
            }
        }
    }
    public function getAllData()
    {
        $date = date("y-m-d h:i:s");

        $model = JSVillas::all();

        $i = 0;
        foreach ($model as $MO) {
            $villa_id = $MO['id'];

            $JAO = JsAddOnsModel::where('villa_id', $villa_id)->first();

            $model[$i]['JAO_data'] = $JAO;
            $i++;
        }
        $res = [
            'status' => 200,
            'data' => $model
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $VillaModel = JSVillas::where('id', $id)->first();
        if ($VillaModel) {
            $res = [
                'status' => 200,
                'message' => $VillaModel
            ];
            return response()->json($res);
        } else {
            $res = [
                'status' => 404,
                'message' => 'Not Found'
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
                'name' => 'required',
                'oneday_price' => 'required',
                'description' => 'required',
                'amenities' => 'required',
                'tags' => 'required',
                'base_image' => 'required',
                'additional_images' => 'required',
                'status' => 'required',
                'guest_limit' => 'required',
                'additional_guest_charge' => 'required',
                'bullet_points' => 'required',
                'actual_price' => 'required',
                'location' => 'required',
                'video' => 'required',
                'video_url' => 'required',
                'amenities_id' => 'required',
                'add_ons_id' => 'required'
            ]);

            $jsVillaModel = JSVillas::where('id', $id)->update([
                'name' => $data['name'],
                'oneday_price' => $data['oneday_price'],
                'description' => $data['description'],
                'amenities' => $data['amenities'],
                'tags' => $data['tags'],
                'base_image' => $data['base_image'],
                'additional_images' => $data['additional_images'],
                'status' => $data['status'],
                'guest_limit' => $data['guest_limit'],
                'additional_guest_charge' => $data['additional_guest_charge'],
                'bullet_points' => $data['bullet_points'],
                'actual_price' => $data['actual_price'],
                'location' => $data['location'],
                'video' => $data['video'],
                'video_url' => $data['video_url'],
                'amenities_id' => $data['amenities_id'],
                'add_ons_id' => $data['add_ons_id']
            ]);

            if (isset($jsVillaModel)) {
                $res = [
                    'status' => 200,
                    'message' => $jsVillaModel
                ];
                return response()->json($res);
            } else {
                $res = [
                    'status' => 404,
                    'message' => 'Not Save'
                ];
                return response()->json($res, 404);
            }
        } catch (\Exception $e) {
            $res = [
                'status' => 500,
                'exception' => $e->getMessage()
            ];
            return response()->json($res, 404);
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
        try {
            $VillaModel = JSVillas::where('id', $id)->delete();
            if ($VillaModel) {
                $res = [
                    'status' => 200,
                    'msg' => 'Delete Successful'
                ];
                return response()->json($res);
            } else {
                $res = [
                    'status' => 404,
                    'msg' => 'Delete Failed'
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

    public function filterPractice()
    {
        $VillaModel = JSVillas::whereDate('created_at', '=', '2023-04-05')->get();
        $res = [
            'status' => 200,
            'msg' => $VillaModel
        ];
        return response()->json($res);
    }

    public function villaTemp()
    {
        return View('villa');
    }
}
