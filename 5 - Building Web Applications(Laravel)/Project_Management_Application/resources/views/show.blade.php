{{--Some comment ...--}}
@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary"
                    href="{{ route('ProjectManagement.index')}}">
                    Back
                </a>
            </div>
        </div>
    </div>
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
	    <div class="form-group">
              {{ $project->name }}
            </div>
            <div class="form-group">
                {{ $project->person }}
            </div>
            <div class="form-group">
                {{ $project->begin }}
            </div>
	    <div class="form-group">
                {{ $project->end }}
            </div>
            <div class="form-group">
                {{ $project->description }}
            </div>
            <div class="form-group">
                <strong>Project:</strong>
                @if ($project->status === 'active')
                    {{ $project->description }}
                @else
                    <del> {{ $project->description }} </del>
                @endif
            </div>
            <div class="form-group">
                <strong>Status:</strong>
                @if ($project->status === 'active')
                    Active
                @elseif($project->status === 'deleted')
                    Deleted
                @elseif($project->status === 'finished')
                    Finished
                @endif
            </div>
        </div>
    </div>
@endsection