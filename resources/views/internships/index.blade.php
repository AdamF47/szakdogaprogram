@extends('internships.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Internship Manager Page</h2>
            </div>
            <div class="pull-right">
                @if (Auth::guard('admin')->user() == true)
                    <a class="btn btn-success" href="{{ route('admin.internships.create') }}"> Create New Internship</a>
                    @php
                        $var = 'admin'
                    @endphp
                @elseif (Auth::guard('coordinator')->user() == true)
                    <a class="btn btn-success" href="{{ route('coordinator.internships.create') }}"> Create New Internship</a>
                    @php
                        $var = 'coordinator'
                    @endphp
                @endif            
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($internships as $internship)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $internship->name }}</td>
            <td>{{ $internship->description }}</td>
            <td>
                @if (Auth::guard('admin')->user() == true)
                <form action="{{ route('admin.internships.destroy',$internship->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('admin.internships.show',$internship->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('admin.internships.edit',$internship->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @elseif ($var == 'coordinator')
                    <form action="{{ route('coordinator.internships.destroy',$internship->id) }}" method="POST">
   
                        <a class="btn btn-info" href="{{ route('coordinator.internships.show',$internship->id) }}">Show</a>
    
                        <a class="btn btn-primary" href="{{ route('coordinator.internships.edit',$internship->id) }}">Edit</a>
   
                        @csrf
                        @method('DELETE')
      
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif               
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $internships->links() !!}
      
@endsection