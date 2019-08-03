<?php

namespace App\Http\Controllers;

use App\coin;
use App\experiences;
use Illuminate\Http\Request;

class employee_experience extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $coin =   coin::all();
$experience=experiences::all();
        return response()->json([
            'coin' => $coin,
            'experience'=>$experience
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
        $this->validate($request,[
            'Workplace'=>'required',
            'Job_title'=>'required',
            'Start_Date'=>'required',
            'Expiry_date'=>'required',
            'Salary'=>['required','integer', 'min:0'],
            'coin'=>'required',
            'details'=>'required'

        ]);

        $experience = new experiences();
        $experience->Workplace =$request->Workplace;
        $experience->Salary =$request->Salary;
        $experience->employee_id =$request->employee_id;

        $experience->coin =$request->coin;

        $experience->Job_title =$request->Job_title;
        $experience->Start_Date =$request->Start_Date;
        $experience->Expiry_date =$request->Expiry_date;
        $experience->details =$request->details;



        $experience->save();

        return response()->json([
            'experience'    => $experience,
            'message' => 'Success'
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coin =   coin::all();
        $experience=experiences::find($id);
        return response()->json([
            'coin' => $coin,
            'experience'=>$experience
        ], 200);
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
//        $data = $request->json()->all();

        $experience = experiences::find($id);
        $experience->Workplace =$request->Workplace;
        $experience->Salary =$request->Salary;
        $experience->employee_id =$request->employee_id;

        $experience->coin =$request->coin;

        $experience->Job_title =$request->Job_title;
        $experience->Start_Date =$request->Start_Date;
        $experience->Expiry_date =$request->Expiry_date;
        $experience->details =$request->details;
        $experience->save();
        return response('successfull',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experiences = experiences::find($id);
        $experiences->delete();



        return response('successifull',200);
        $experiences->save();
    }
}
