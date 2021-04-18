@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    <div class="card p-3 mt-3">
                    <h2>Recently Run Checklists</h2>
                    <div class="accordion" id="accordionExample">
                        
                        @foreach($ran_checklists as $execution)

                        <div class="card">
                            <div class="card-header" id="headingOne">
                           
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#{{ 'collapse'.$execution->id }}"  aria-controls="{{ 'collapse'.$execution->id }}">
                                <span style="width:300px;white-space: nowrap; text-overflow: ellipsis;overflow:hidden;display:block">{{$execution->name}}</span>   <span class="badge badge-primary float-right" style="margin-top:-17px;">{{$execution->ChecklistTemplate->name}}</span>
                                </button>
                            </h2>
                            </div>

                            <div id="{{ 'collapse'.$execution->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                              
                                        @foreach($execution->ChecklistExecutionSteps as $step)
                                            {{$step->ChecklistTemplateStep->description}} - {{ $step->checked == true ? 'YES' : 'NO' }}<br>
                                        @endforeach

                                        <a href="/delete-execution/{{$execution->id}}" class="btn btn-outline-danger float-right m-4">Delete</a>
                            </div>
                            </div>
                        </div>

                        @endforeach

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
                    <h2>Manage Checklist Templates</h2>
                    <div>You have <span class="badge badge-success">{{ $number_of_templates}}</span> Templates</div>
                    <a href="/manage-checklists" class="btn btn-primary mt-3">Manage Checklists</a>

                    <div class="mt-4 card p-3">
                        Run a checklist
                        
                        <select class="form-control" id="run-checklist-select">
                            @foreach($templates as $template)
                                <option value="{{$template->id}}">{{$template->name}}</option>
                            @endforeach
                        </select>

                        <button id="run-checklist-btn" class="btn btn-outline-success mt-2">Run</button>
                    </div>
        </div>
    </div>
</div>
@endsection
