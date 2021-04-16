
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-2">
                <a class="btn btn-secondary" href="/manage-checklists">Back</a>
            </div>
            <div class="card">
                <div class="card-header">
                    {{$template->name}}
                </div>
                <div class="card-body">
                    <form action="/finalise-checklist" method="POST">
                        @csrf
                        <input type="hidden" name="checklist_template_id" value="{{$template->id}}">
                        <label>Checklist name</label>
                        <input type="text" name="name" class="form-control mb-3" value="{{ $template->name }}">
                        @if(count($template->ChecklistTemplateStep) > 0)
                            @foreach($template->ChecklistTemplateStep as $step)
                            <li class="list-group-item">{{ $step->description }} <input type="checkbox" name="checkbox_{{$step->id}}" value="" class="float-right"></li>
                            @endforeach
                        @else
                        @endif

                        <input type="submit" class="btn btn-success btn-block mt-3" value="Run">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



