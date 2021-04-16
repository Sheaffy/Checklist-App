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

                    {{ __('You are logged in!') }}

                    <h2>Manage Checklist Templates</h2>
                    <a href="/manage-checklists" class="btn btn-primary">Manage Checklists</a>
                    
                    <div class="card p-3 mt-3">

                    <h2>Recently Run Checklists</h2>


                    <div class="accordion" id="accordionExample">
                        
                        @foreach($ran_checklists as $execution)

                        <div class="card">
                            <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#{{ 'collapse'.$execution->id }}"  aria-controls="{{ 'collapse'.$execution->id }}">
                                {{$execution->name}} <a href="/delete-execution/{{$execution->id}}" class="btn btn-danger float-right">Delete</a>
                                </button>
                            </h2>
                            </div>

                            <div id="{{ 'collapse'.$execution->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                              
                                        @foreach($execution->ChecklistExecutionSteps as $step)
                                            {{$step->ChecklistTemplateStep->description}} - {{ $step->checked == true ? 'YES' : 'NO' }}<br>
                                        @endforeach
                            </div>
                            </div>
                        </div>

                        @endforeach

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
