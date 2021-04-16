
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-2">
                <a class="btn btn-secondary" href="/home">Back</a>
                <a class="float-right btn btn-success" href="/create-checklist">Create New Template</a>
            </div>
            <div class="card">
                <div class="card-header">Manage Templates</div>

                <div class="card-body">
                    @if(count($templates) > 0)
                    <ul class="list-group">
                    @foreach ($templates as $template)
                        <li class="list-group-item"> {{$template->name}} <a class="btn btn-success float-right ml-2" href="/run-template/{{ $template->id }}">Run</a><a class="btn btn-primary float-right" href="/view-template/{{ $template->id }}">View</a></li>
                    @endforeach
                    </ul>

                    @else
                        <div>
                        You have no checklists
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>
@endsection



