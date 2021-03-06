@extends('internships.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Internships</h2>
            </div>
            <div class="pull-right">
                @if (Auth::guard('admin')->user() == true)
                    <a class="btn btn-primary" href="{{ route('admin.internships.index') }}"> Back</a>             
                @elseif (Auth::guard('coordinator')->user() == true)
                    <a class="btn btn-primary" href="{{ route('coordinator.internships.index') }}"> Back</a>    
                @endif               
                
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $internship->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $internship->description }}
            </div>
        </div>
    </div>
@endsection