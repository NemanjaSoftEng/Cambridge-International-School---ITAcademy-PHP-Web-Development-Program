@extends('layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new Project</h2>
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
            <strong>Problems!!!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('ProjectManagement.store') }}" method="POST">
        {{ csrf_field() }}
  
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Project name...">
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" class="form-control" placeholder="Description...">
                </div>
                <div class="form-group">
                    <strong>Person:</strong>
                    <input type="text" name="person" class="form-control" placeholder="Person...">
                </div>
		<div class="form-group">
                    <strong>Date begin:</strong>
                    <input type="date" name="begin" class="form-control">
                </div>
		<div class="form-group">
                    <strong>Date end:</strong>
                    <input type="date" name="end" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>
@endsection