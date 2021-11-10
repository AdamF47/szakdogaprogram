@extends('internships.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Internship</h2>
            </div>
            <div class="pull-right">
                @if (Auth::guard('admin')->user() == true)
                    <a class="btn btn-primary" href="{{ route('admin.internships.index') }}"> Back</a>
                    @php
                        $var = 'admin'
                    @endphp
                @elseif (Auth::guard('coordinator')->user() == true)
                    <a class="btn btn-primary" href="{{ route('coordinator.internships.index') }}"> Back</a>
                    @php
                        $var = 'coordinator'
                    @endphp
                @endif     

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
    @if ($var == 'admin')
        <form action="{{ route('admin.internships.update',$internship->id) }}" method="POST">
            @csrf
            @method('PUT')
   
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{ $internship->name }}" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $internship->description }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>   
        </form>
    @else
        <form action="{{ route('coordinator.internships.update',$internship->id) }}" method="POST">
                @csrf
                @method('PUT')
   
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ $internship->name }}" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $internship->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>   
            </form>
    @endif     
    
@endsection