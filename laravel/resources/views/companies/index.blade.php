@extends('layouts.admin')

@section('content')

<!-- DataTables -->
  <link rel="stylesheet" href="{{Request::root()}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Companion</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('companies.create') }}"> Create New Companion</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table id="companiesTable" class="table table-striped table-bordered">
       <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Logo</th>
            <th>WebSite</th>
            <th width="280px">Action</th>
            <th width="100px">Send email</th>
           
        </tr>
        </thead>
        <tbody>
        @foreach ($companies as $compan)
        <tr>
            <td>{{ $compan->id }}</td>
            <td>{{ $compan->name }}</td>
            <td>{{ $compan->email }}</td>
            <td>
                @if($compan->logo != '')
                    @if(Storage::exists('public/'.$compan->id.'/logo.'.explode('.',$compan->logo)[1]))
                        <img class="logoList" src="{{ asset('storage/'.$compan->id.'/logo.'.explode('.',$compan->logo)[1])}}">
                    @else
                        {{$compan->logo}}
                    @endif
                @endif

            </td>
            <td>{{ $compan->website }}</td>
            <td>
                <form action="{{ route('companies.destroy',$compan->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('companies.show',$compan->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('companies.edit',$compan->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            <td>
                <a class="btn btn-success" href="{{ route('mail', $compan->email) }}"> <i class="fa fa-envelope-o" aria-hidden="true"></i> </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
  
    
      
<style type="text/css">
    .logoList{
        width: 30px;
    }
</style>

<!-- DataTables -->
<script src="{{Request::root()}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{Request::root()}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('#companiesTable').DataTable({
            'order': [[ 0, 'desc' ]],
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'aoColumns': [
                null,
                null,
                null,
                null,
                null,
                {'bSortable': false},
                {'bSortable': false}
            ]
        })
    });
</script>
@endsection