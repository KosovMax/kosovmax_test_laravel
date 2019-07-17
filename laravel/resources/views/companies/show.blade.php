@extends('layouts.admin')



@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-left" style="display: flex;
		    justify-content: center;
		    align-items: center;">
		            <a class="btn btn-primary" href="{{ route('companies.index') }}" style="margin-right: 8px;
		                position: relative;
		                top: 4px;"> Back</a>
		            <h2>Show Companion</h2>
		        </div>
		        <div class="pull-right">
		            
		        </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $companies->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $companies->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Logo:</strong>

                 @if(Storage::exists('public/'.$companies->id.'/logo.'.explode('.',$companies->logo)[1]))
                        <?php
                            $logo = asset('storage/'.$companies->id.'/logo.'.explode('.',$companies->logo)[1]);
                        ?>
                        <div class="viewLogo no" id="viewLogo" style="background-image: url({{$logo}});"  >
                    @else
                        <div class="viewLogo" id="viewLogo"  >
                    @endif
                        <i class="fa fa-camera" aria-hidden="true"></i>
                    </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Website:</strong>
                {{ $companies->website }}
            </div>
        </div>
    </div>

 <style type="text/css">
    .viewLogo{
        background: #b7b7b7;
        height: 300px;
        width: 300px;
        margin: 0 0 8px 0;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-size: 44px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }

    .viewLogo.no .fa{
        display: none !important;
    }

</style>
@endsection