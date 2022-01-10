@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Company</div>

                <div class="card-body">
                    {!! Form::model($company, ['route' => ['companies.update', $company->id], 'method' => 'PUT']) !!}
                        {{ Form::label('company', 'Company: ') }}
                        {{ Form::text('company', null, ['class'=>'form-control', 'style'=>'', 'id'=>'company' ]) }}
                        {{ Form::submit('Save Company', ['class'=> 'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px'])}}
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