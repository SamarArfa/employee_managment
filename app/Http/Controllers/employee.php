<?php

namespace App\Http\Controllers;

use App\Kinship;
use App\relation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class employee extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $relative =   relation::all();
$kinship=Kinship::all();
        return response()->json([
            'relative' => $relative,
            'kinship'=>$kinship
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
            'FirstName'=>'required',
            'SecondName'=>'required',
            'ThirdName'=>'required',
            'FourthName'=>'required',
            'relative_relation'=>'required',
            'Date_of_Birth'=>'required',
            'Social_status'=>'required',
            'Study'=>'required',
            'work'=>'required',
            'images'=>'image'
        ]);

        $kinship = new Kinship();

        $kinship->FirstName =$request->FirstName;
        $kinship->SecondName =$request->SecondName;
        $kinship->ThirdName =$request->ThirdName;
        $kinship->FourthName =$request->FourthName;
        $kinship->employee_id =$request->employee_id;
        $kinship->relative_relation =$request->relative_relation;
        $kinship->Date_of_Birth =$request->Date_of_Birth;
        $kinship->Social_status =$request->Social_status;
        $kinship->Study =$request->Study;
        $kinship->work =$request->work;


        if($request->hasFile('featured_image')) {
            //add the new photo
            $image = $request->file('featured_image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);

            Image::make($image)->resize(100, 200)->save($location);
            $kinship->image =$fileName;
        }

            $kinship->save();

        return response()->json([
            'kinship'    => $kinship,
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
//        dd($id);
        $kinship = Kinship::find($id);
//        dd($kinship);
        $relative =   relation::all();
        return response()->json([
            'relative' => $relative,
            'kinship'=>$kinship
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

        $kinship = Kinship::find($id);
        $kinship->FirstName =$request->FirstName;
        $kinship->SecondName =$request->SecondName;
        $kinship->ThirdName =$request->ThirdName;
        $kinship->FourthName =$request->FourthName;
        $kinship->employee_id =$request->employee_id;
        $kinship->relative_relation =$request->relative_relation;
        $kinship->Date_of_Birth =$request->Date_of_Birth;
        $kinship->Social_status =$request->Social_status;
        $kinship->Study =$request->Study;
        $kinship->work =$request->work;


        if($request->hasFile('featured_image')) {
            //add the new photo
            $image = $request->file('featured_image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);

            Image::make($image)->resize(100, 200)->save($location);
            $kinship->image =$fileName;
        }


        $kinship->save();
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
        $kinship = Kinship::find($id);
        $kinship->delete();



        return response('successifull',200);
        $kinship->save();
    }
}
