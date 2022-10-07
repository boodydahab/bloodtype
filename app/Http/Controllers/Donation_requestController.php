<?php

namespace App\Http\Controllers;
use App\Models\Donation_request;
use Illuminate\Http\Request;

class Donation_requestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $records = Donation_request::paginate(20);
    //    flash("success")->success();
       return view('Donation_requests.index' , compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Donation_requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'name' => 'required'
        ];

        $messages =[
            'name.require' => 'Name is Required'
        ];

        // $this->validation($request ,$roles ,$messages);
       Donation_request::create([
        'patient_name' => $request -> patient_name ,
        'patient_phone' => $request -> patient_phone ,
        'patient_age' => $request -> patient_age ,
        'city_id' => $request -> city_id,
        'hospitsl_name' => $request -> hospitsl_name ,
        'hospital_address' => $request -> hospital_address ,
        'bags_num' => $request -> bags_num,
        'details' => $request -> details,
        'blood_type_id' => $request -> blood_type_id,
        'latitude' => $request -> latitude,
        'longitude' => $request -> longitude,
       ]);
        return redirect()->back();
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
        $model = Donation_request::findOrfail($id);
        return view('Donation_requests.edit', compact('model'));
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
        $record = Donation_request::findOrfail($id);
        $record->update($request->all());
        // flash()->success('Edited');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $record = Donation_request::findOrfail($id);
       $record->delete();
       return redirect()->back();
    }
}
