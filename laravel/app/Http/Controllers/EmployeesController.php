<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Companies;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.index',['employees' => Employees::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Companies::all('id', 'name')[0]->name);
        return view('employees.create', ['companies' => Companies::all('id', 'name')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required'
        ]);
  
        $employees = Employees::create($request->all());
        // $companies = Companies::find($request->companies_id);
    
        // $employees->companies()->associate($companies)->save();

        return redirect()->route('employees.index')
                        ->with('success','Employee created successfully.');    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('employees.show',['employees' => Employees::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employees.edit',['employees' => Employees::find($id), 'companies' => Companies::all('id', 'name')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required'
        ]);
    
        $update = [
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name,
            'companies_id' => $request->companies_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ];
        Employees::where('id',$id)->update($update);
  
        return redirect()->route('employees.index')
                        ->with('success','Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employees::destroy($id);
  
        return redirect()->route('employees.index')
                        ->with('success','Employee deleted successfully');
    }
}
