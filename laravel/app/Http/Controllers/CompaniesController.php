<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies.index',['companies' => Companies::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            'name' => 'required'
        ]);
  
        $id = Companies::create($request->all())->id;

        $fileName = 'logo.'.$request->image->getClientOriginalExtension();

        $request->image->storeAs('public/'.$id, $fileName);
   
        return redirect()->route('companies.index')
                        ->with('success','Companion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('companies.show',['companies' => Companies::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('companies.edit',['companies' => Companies::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
    
        $update = [
            'name' => $request->name, 
            'email' => $request->email,
            'logo' => $request->logo,
            'website' => $request->website,
        ];
        Companies::where('id',$id)->update($update);

        if ($request->hasFile('image')) {
            
            $fileName = 'logo.'.$request->image->getClientOriginalExtension();

            $request->image->storeAs('public/'.$id, $fileName);
        }
  
        return redirect()->route('companies.index')
                        ->with('success','Companion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Companies::destroy($id);
  
        return redirect()->route('companies.index')
                        ->with('success','Companion deleted successfully');
    }
}
