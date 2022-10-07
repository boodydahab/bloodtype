<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $records = Role::paginate(20);

    //    flash("success")->success();
       return view('roles.index', compact('records') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $rules =[
            'name' => 'required|unique:roles,name',
            'permissions' => 'required'
        ];

        $messages =[
            'name.required' => 'Name is Required',
            'permissions.required' => 'Permissions is Required'
        ];

        $this->validate($request ,$rules ,$messages);
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permissions'));

        return redirect(route('role.index'));
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
        $model = Role::findOrfail($id);
        return view('roles.edit', compact('model'));
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

        $rules =[
            'name' => 'required|unique:roles,name','.$id',
            'permissions_list' => 'required|array'
        ];

        $messages =[
            'name.required' => 'Name is Required',
            'permissions_list.required' => 'Permissions is Required'
        ];
        $record = Role::findOrfail($id);
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
       $record = Role::findOrfail($id);
       $record->delete();
       return redirect()->back();
    }
}

