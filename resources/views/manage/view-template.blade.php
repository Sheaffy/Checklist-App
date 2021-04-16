
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$template->name}}
                </div>
                <div class="card-body">
                    Steps
                    <ul class="list-group">
                        @if(count($template->ChecklistTemplateStep) > 0)
                            @foreach($template->ChecklistTemplateStep as $step)
                            <li class="list-group-item">{{ $step->description }} <a class="btn btn-danger float-right" href="/delete-step/{{ $step->id }}">Delete</a></li>
                            @endforeach
                        
                        @else
                         No steps yet, create some?
                        @endif
                    </ul>

                    <div class="card mt-3 p-3">
                    <form action="/add-step" method="POST">
                        @csrf
                        <input type="hidden" name="checklist_template_id" value="{{ $template->id }}">
                        <input class="form-control" name="description" value="" placeholder="step description">

                        <input type="submit" value="Add Step" class="btn btn-primary mt-2">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



