@extends('layouts.admin')

@section('content')
<script src="{{Request::root()}}/dist/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>

    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-left" style="display: flex;
		    justify-content: center;
		    align-items: center;">
		            <a class="btn btn-primary" href="{{ route('employees.index') }}" style="margin-right: 8px;
		                position: relative;
		                top: 4px;"> Back</a>
		            <h2>Edit Employees</h2>
		        </div>
		        <div class="pull-right">
		            
		        </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('employees.update',$employees->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First name:</strong>
                <input type="text" name="first_name" value="{{ $employees->first_name }}" class="form-control" placeholder="First name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last name:</strong>
                <input type="text" name="last_name" value="{{ $employees->last_name }}" class="form-control" placeholder="Last name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Key to Companies:</strong>
                <select name="companies_id" class="form-control" id="companies_id">
                   @foreach ($companies as $compan)
                        <option value="{{$compan->id}}" {{ $compan->id == $employees->companies_id ? 'selected="selected"' : '' }}>{{$compan->name}}</option>
                   @endforeach
                </select>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" value="{{ $employees->email }}" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                <input type="text" name="phone" value="{{ $employees->phone }}" class="form-control" placeholder="Phone">
            </div>
        </div>
 
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
   
    </form>

 <style type="text/css">

</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('input[name="phone"]').mask('+380(000)000-00-00');
    })
</script>
@endsection