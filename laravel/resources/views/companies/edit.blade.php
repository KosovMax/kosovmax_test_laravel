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
		            <h2>Edit Companion</h2>
		        </div>
		        <div class="pull-right">
		            
		        </div>
        </div>
    </div>
   
  
    <form action="{{ route('companies.update',$companies->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Name:</strong>
	                <input type="text" name="name" value="{{ $companies->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                     @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Email:</strong>
	                <input type="email" name="email" value="{{ $companies->email }}" class="form-control" placeholder="Email">
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Wesite:</strong>
	                <input type="text" name="website" value="{{ $companies->website }}" class="form-control" placeholder="Wesite">
	            </div>
	        </div>

	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <label for="Logo">Logo:</label>
                    @if($companies->logo != '')
	                 @if(Storage::exists('public/'.$companies->id.'/logo.'.explode('.',$companies->logo)[1]))
	                    <?php
	                    	$logo = asset('storage/'.$companies->id.'/logo.'.explode('.',$companies->logo)[1]);
	                    ?>
	                    <div class="viewLogo no" id="viewLogo" style="background-image: url({{$logo}});"  >
	                @else
	                    <div class="viewLogo" id="viewLogo"  >
                    @endif
	                @else
                        <div class="viewLogo" id="viewLogo"  >
                    @endif
	                    <i class="fa fa-camera" aria-hidden="true"></i>
	                </div>
	                <input type="hidden" name="logo" value="{{ $companies->logo }}" id="logoName">
	                <input type="file" name="image" class="form-control-file" id="Logo" accept="jpg, png" >
	            </div>
	        </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
   
    </form>

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
<script type="text/javascript">
    $(document).ready(function(){
        $('#Logo').off("change").change(function(){
           if (this.files && this.files[0]) {

            console.log(this.files[0].name);

            $('#logoName').val(this.files[0].name);

            var reader = new FileReader();
            
            reader.onload = function(e) {
              $('#viewLogo').css('background-image', 'url(' + e.target.result + ')' );
              $('#viewLogo').addClass('no')
            }
            
            reader.readAsDataURL(this.files[0]);
          }
        });
    });
</script>
@endsection
