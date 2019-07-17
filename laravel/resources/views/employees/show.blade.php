@extends('layouts.admin')



@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-left" style="display: flex;
		    justify-content: center;
		    align-items: center;">
		            <a class="btn btn-primary" href="{{ route('employees.index') }}" style="margin-right: 8px;
		                position: relative;
		                top: 4px;"> Back</a>
		            <h2>Show Employee</h2>
		        </div>
		        <div class="pull-right">
		            
		        </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First name:</strong>
                {{ $employees->first_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last name:</strong>
                {{ $employees->last_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Key to Companies:</strong>
                {{ $employees->companion->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $employees->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                {{ $employees->phone }}
            </div>
        </div>
    </div>
@endsection