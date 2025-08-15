@extends('layout') 
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 style="text-align: center;">Project Management Application</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('ProjectManagement.create') }}" 
                style="text-align: center; font-weight: bold; text-transform:uppercase; text-size:20; border: dashed orange 3px; border-radius: 24px;">
                    Add New Project
                </a>
            </div>
        </div>
    </div> 
    <br>

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif 
 
    <table class="table table-bordered" style="border: solid black 3px">
        <tr>
            <th style="text-align:center; border: solid black 3px; background-color:orange;">No.</th>
            <th style="text-align:center; border: solid black 3px; background-color:orange;">Name</th>
            <th style="text-align:center; border: solid black 3px; background-color:orange;">Description</th>
            <th style="text-align:center; border: solid black 3px; background-color:orange;">Status</th>
            <th style="text-align:center; border: solid black 3px; background-color:orange;">Person</th>
            <th style="text-align:center; border: solid black 3px; background-color:orange;">Begin</th>
            <th style="text-align:center; border: solid black 3px; background-color:orange;">End</th>
            <th style="text-align:center; border: solid black 3px; background-color:orange;">Action</th>
        </tr> 
 
        @foreach($projects as $project)
            <tr>
                <td style="text-align: center; border: solid black 3px; background-color:cyan;">{{ ++$i }}</td>
                <td style="text-align: center; border: solid black 3px; background-color:yellow;">{{ $project->name}}
                @if ($project->status == 'deleted')
                    <td style="text-align:center; background-color: red; border: solid black 3px;"><del>{{ $project->description }}</del></td>
                    <td style="text-align:center; background-color: red; border: solid black 3px;">Deleted</td>
                @elseif ($project->status == 'active')
                    <td style="text-align:center; background: radial-gradient(circle,rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%); border: solid black 3px;"><del>{{$project->description }}</del>
                    <td style="text-align: center; background: radial-gradient(circle,rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%); border: solid black 3px;">Active
                @elseif ($project->status == 'finished')
                    <td style="text-align:center; background-color: lightgreen; border: solid black 3px;"><del>{{$project->description }}</del>
                    <td style="text-align: center; background-color: lightgreen; border: solid black 3px;">Finished
                @endif        
                <td style="text-align: center; color: white; border: solid black 3px; background-color:rgb(38,97,156);">{{ $project->person}}       
                <td style="text-align: center; border: solid black 3px; background: linear-gradient(270deg,rgba(228, 238, 242, 1) 0%, rgba(133, 230, 92, 1) 0%, rgba(235, 26, 26, 1) 100%, rgba(235, 26, 26, 1) 0%);">{{ $project->begin}}    
                <td style="text-align: center; border: solid black 3px; background: radial-gradient(circle, rgba(128,255,128,1) 0%, rgba(6,110,58,1) 100%);">{{ $project->end}}    
 
                <td>
                    <form action="{{ route('ProjectManagement.destroy', $project->id) }}" method="POST">
                        <a class="btn btn-info"
                            href="{{ route('ProjectManagement.show', $project->id) }}" style="text-align: center; text-transform: uppercase;">
                            Show 
                        </a> 
                        <a class="btn btn-primary"
                            href="{{ route('ProjectManagement.edit', $project->id) }}" style="text-align: center; text-transform: uppercase;">
                            Edit
                        </a> 
 
                        {{-- @csrf
                        @method('DELETE')
                        --}} 
 
                        {{ csrf_field() }}
                       {{ method_field('DELETE') }}
  
 
                        <button type="submit" class="btn btn-danger">
                            Edit Status
                        </button> 
 
                    </form>
                </td>
            </tr>
        @endforeach
    </table> 
 
    {!!  $projects->links() !!} 
 
@endsection