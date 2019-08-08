<?php

namespace App\Http\Controllers;

use App\info;
use App\specialization;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Storage;
use Image;

class employee_info extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info=info::all();
        $specialization =   specialization::all();

        return response()->json([
            'info' => $info,
            'specialization' => $specialization

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd(Input::get('firstName'));
//        dd($request->all());
        $this->validate($request,[
            'firstName'=>'required',
            'secondName'=>'required',
            'thirdName'=>'required',
            'fourthName'=>'required',
            'email'=>'required|email',
            'idNum'=>'required',
            'functionalNum'=>'required',
            'specialization'=>'required',
            'socialStatus'=>'required',
            'gender'=>'required',
            'mobile' =>'required',
            'dateOfHiring'=>'required',
            'dateBirth'=>'required',
            'phone' =>['required','integer', 'min:0'],
            'address' => ['required', 'string'],
            'image'=>'image',
        ]);

        $info = new info();


        $info->firstName= $request->firstName;
        $info->secondName= $request->secondName;
        $info->thirdName= $request->thirdName;
        $info->fourthName= $request->fourthName;
        $info->email =$request->email;
        $info->idNum =$request->idNum;
        $info->functionalNum =$request->functionalNum;
        $info->specialization =$request->specialization;
        $info->mobile =$request->mobile;
        $info->phone =$request->phone;
        $info->address =$request->address;
        $info->dateOfHiring =$request->dateOfHiring;
        $info->dateBirth =$request->dateBirth;
        $info->socialStatus =$request->get('socialStatus');
        $info->gender =$request->gender;


        if($request->hasFile('image')) {
            //add the new photo
            $image = $request->file('image');

            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);

            Image::make($image)->resize(100, 200)->save($location);
            $info->image =$fileName;
        }
        $info->save();
        return response()->json([
            'id'=>$info->id,
            'successMsg' => 'User successfully saved'
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
        $info=info::find($id);
        $specialization =   specialization::all();

        return response()->json([
            'info' => $info,
            'specialization' => $specialization

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
//        dd($request->all());
//        $data = $request->json()->all();

        $info = info::find($id);
        $info->firstName= $request->firstName;
        $info->secondName= $request->secondName;
        $info->thirdName= $request->thirdName;
        $info->fourthName= $request->fourthName;
        $info->email =$request->email;
        $info->idNum =$request->idNum;
        $info->functionalNum =$request->functionalNum;
        $info->specialization =$request->specialization;
        $info->mobile =$request->mobile;
        $info->phone =$request->phone;
        $info->address =$request->address;
        $info->dateOfHiring =$request->dateOfHiring;
        $info->dateBirth =$request->dateBirth;
        $info->socialStatus =$request->get('socialStatus');
        $info->gender =$request->gender;
        if($request->hasFile('image')) {
            //add the new photo
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
            Image::make($image)->resize(100, 200)->save($location);
            $oldFileName = $info->images;
            //updatw the database
            $info->image = $fileName;
            //delete the old photo
            Storage::delete($oldFileName);
        }
        $info->save();
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
        $info = info::find($id);
        Storage::delete($info->image);
        $info->delete();

        return response('successifull',200);
        $info->save();
    }
}
