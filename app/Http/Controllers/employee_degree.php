<?php

namespace App\Http\Controllers;

use App\degrees;
use App\qualification;
use App\specialization;
use App\university;
use Illuminate\Http\Request;

class employee_degree extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $qualification =   qualification::all();
        $specialization =   specialization::all();
        $university =   university::all();
$degree=degrees::all();
        return response()->json([
            'qualification' => $qualification,
            'specialization' => $specialization,
            'university' => $university,
'degree'=>$degree
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
            'qualification'=>'required',
            'specialization'=>'required',
            'university'=>'required',
            'date_of_specialization'=>'required',
            'details'=>'required'

        ]);

        $degree = new degrees();

        $degree->qualification =$request->qualification;
        $degree->employee_id =$request->employee_id;

        $degree->specialization =$request->specialization;
        $degree->university =$request->university;
        $degree->date_of_specialization =$request->date_of_specialization;
        $degree->details =$request->details;



        $degree->save();

        return response()->json([
            'degree'    => $degree,
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
        $qualification =   qualification::all();
        $specialization =   specialization::all();
        $university =   university::all();
        $degree=degrees::find($id);//        dd($kinship);
//        $relative =   relation::all();
        return response()->json([
            'qualification' => $qualification,
            'specialization' => $specialization,
            'university' => $university,
            'degree'=>$degree
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

        $degree = degrees::find($id);
        $degree->qualification =$request->qualification;
        $degree->employee_id =$request->employee_id;
        $degree->specialization =$request->specialization;
        $degree->university =$request->university;
        $degree->date_of_specialization =$request->date_of_specialization;
        $degree->details =$request->details;
        $degree->save();
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
        $degree = degrees::find($id);
        $degree->delete();



        return response('successifull',200);
        $degree->save();
    }
}
