<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Http\Request;

class employee_course extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course=Courses::all();
        return response()->json([
            'course'=>$course
        ], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Course_Name' => 'required',
            'place' => 'required',
            'Start_Date' => 'required',
            'Expiry_date' => 'required',
            'details' => 'required',

        ]);

        $course = new Courses();


        $course->Course_Name = $request->Course_Name;
        $course->place = $request->place;
        $course->employee_id =$request->employee_id;

        $course->Start_Date = $request->Start_Date;
        $course->Expiry_date = $request->Expiry_date;
        $course->details = $request->details;



        $course->save();

        return response()->json([
            'course' => $course,
            'message' => 'Success'
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Courses::find($id);
//        dd($kinship);
//        $relative =   Courses::all();
        return response()->json([
//            'relative' => $relative,
            'course'=>$course
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { $data = $request->json()->all();

        $course = Courses::find($id);
        $course->Course_Name = $request->Course_Name;
        $course->place = $request->place;
        $course->employee_id =$request->employee_id;

        $course->Start_Date = $request->Start_Date;
        $course->Expiry_date = $request->Expiry_date;
        $course->details = $request->details;

        $course->save();
        return response('successfull',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Courses::find($id);
        $course->delete();


        return response('successifull', 200);
        $course->save();
    }
}