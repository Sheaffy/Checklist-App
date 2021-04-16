
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Create Template</div>
            <div class="card-body">
          
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="" method="POST">
                @csrf
                <input class="form-control" name="name" value="" placeholder="checklist name">



                <input type="submit" value="Create" class="btn btn-primary mt-3">
                </form>

            </div>

            </div>
        </div>
    </div>
</div>
@endsection



