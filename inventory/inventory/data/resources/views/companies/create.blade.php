@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a Company</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'companies.store', 'method' => 'post']) !!}
                        {{ Form::label('company', 'Add Company') }}
                        {{ Form::text('company', null, ['class'=>'form-control', 'style'=>'', 'id'=>'company' ]) }}
                        {{ Form::submit('Add Company', ['class'=> 'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px'])}}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection

@section('css')
@endsection