@extends('layouts.admin')

@section('content')
<!-- DataTables -->
  <link rel="stylesheet" href="{{Request::root()}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Create New Employee</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table id="employeesTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Key to Companies</th>
                <th>Email</th>
                <th>Phone</th>
                <th width="280px">Action</th>
               
            </tr>
        </thead>
        <tbody>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{$employee->companion->name}}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone }}</td>
            <td>
                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('employees.show',$employee->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
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
        $('#employeesTable').DataTable({
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
                null,
                {'bSortable': false}
            ]
        })
    });
</script>

@endsection