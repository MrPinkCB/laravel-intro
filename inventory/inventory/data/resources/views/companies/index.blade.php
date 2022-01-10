@extends('layouts.public')

@section('content')
    @php
        //dd($companies);
    @endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Companies</div>

                <div class="card-body">
                    @php
                        //dd($companies);
                    @endphp
                    <h1 class="pull-right"><a href='/companies/create' class='btn btn-info' role='button'>+ Add New</a></h1>
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Company</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->company }}</td>
                                    {{-- 
                                        <td>@foreach ($company->series as $series)
                                                $series->name . ', '
                                            @endforeach
                                        </td>
                                        --}}
                                    <td>
                                        <div style="float:left;"><a href="{{ route('companies.edit', $company->id) }}" class="btn btn-success btn-sm">Edit</a></div>
                                        <div style="float:left; margin-left:5px">
                                            {!! Form::open([
                                                                'route'=> ['companies.destroy', $company->id], 
                                                                'method' => 'DELETE', 
                                                                'onsubmit' => 'return confirm("Delete Company? Are you sure?")'
                                                            ]) !!}
                                                {{ Form::submit('Delete', ['class'=>'btn btn-sm btn-danger']) }}
                                            {!! Form::close() !!}
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
</script>
@endsection

@section('css')
<style>
    p {

    }
</style>
@endsection