<?php

namespace App\Http\Controllers;

use App\HospitalCategory;
use Illuminate\Http\Request;
use Gate;
class HospitalCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }

        $params['categories'] = HospitalCategory::all();
        $params['page_name'] = 'Hospital Category';
        return view('admin.hospital_categories.index')->with($params);
    }

    /**
     * Show the form for creating new Hospital Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created Hospital Category in storage.
     *
     * @param  \App\Http\Requests\  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        $data = $request->except('_except');
        if (isset($data)) {
            \DB::beginTransaction();
            try {
                    $category = new HospitalCategory();
                    $category->slug = bin2hex(random_bytes(64));
                    $category->name = $data['name'];
                    $category->save();

                    $ip = $_SERVER['REMOTE_ADDR'];
                    activity_logs(auth()->user()->id, $ip, "Added Hospital Category");
                
                    \DB::commit();
                    return response()->json([
                        'msg'   => "Hospital Category Added Successfully!",
                        'type'  => "true"
                    ],200);
                
            } catch (Exception $e) {
                \DB::rollback();
                return response()->json([
                    "msg", $e->getMessage()
                ],200);
            }
        }
        
        
    }

    public function getEditInfo(Request $request)
    {
        try {
            $params['category'] = HospitalCategory::find($request->category_id);
            return view('admin.hospital_Categories.partials._hospital_Category_details_')->with($params);
        } catch (Exception $e) {
            return false;
        }
    }


    /**
     * Show the form for editing Hospital Category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update Hospital Category in storage.
     *
     * @param  \App\Http\Requests\  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        $data = $request->except('_except');
        if (isset($data)) {
            \DB::beginTransaction();
            try {
                $Hospital = HospitalCategory::find($request->category_id,'slug');
                $Hospital->name = $data['name'];
                $Hospital->save();

                $ip = $_SERVER['REMOTE_ADDR'];
                activity_logs(auth()->user()->id, $ip, "Updated Hospital Category");

                \DB::commit();
                return response()->json([
                    'msg'   => "Hospital Category Updated Successfully!",
                    'type'  => "true"
                ],200);
            } catch (Exception $e) {
                \DB::rollback();
                return response()->json([
                    "msg", $e->getMessage()
                ],200);
            }
        }
    }


    /**
     * Remove Hospital Category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('admin')) {
            return abort(401);
        }
        $Hospital = HospitalCategory::findOrFail($id);
        $Hospital->delete();

        $ip = $_SERVER['REMOTE_ADDR'];
        activity_logs(auth()->user()->id, $ip, "Deleted Hospital Category");

        return response()->json([
            'msg' => "Hospital Category Deleted Successfully!",
            'type' => "true"
        ], 200);
    }
}
