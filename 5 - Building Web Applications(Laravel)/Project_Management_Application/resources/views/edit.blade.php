@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary"
                    href="{{ route('ProjectManagement.index') }}">
                    Back
                </a>
            </div>
        </div>
    </div>
  
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Problems!</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('ProjectManagement.update', $project->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $project->name }}"
                class="form-control">
            </div>
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="description" value="{{ $project->description }}"
                class="form-control">
            </div>
	    <div class="form-group">
                <strong>Person:</strong>
                <input type="text" name="person" value="{{ $project->person }}"
                class="form-control">
            </div>
	    <div class="form-group">
                <strong>Begin:</strong>
                <input type="date" name="begin" value="{{ $project->begin }}"
                class="form-control">
            </div>
	    <div class="form-group">
                <strong>End:</strong>
                <input type="date" name="end" value="{{ $project->end }}"
                class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project status:</strong>
                <select name="status" class="form-select">
                    @php
                    $statuses = ['active', 'deleted'];
                    @endphp
                    @foreach ($statuses as $status)
                        @if($status===$$project->status)
                            <option selected value="{{ $status }}">{{ $status }} </option>
          
                            
                            @else
                            <option selected value="{{ $status }}">{{ $status }} </option>
                  
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
  
@endsection