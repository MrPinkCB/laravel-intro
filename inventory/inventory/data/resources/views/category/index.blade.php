@extends('layouts.public')

@section('content')
    @php
        //dd($companies);
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Category</div>

                    <div class="card-body">

                        <h1 class="pull-right"><a href='{{ route('categories.create')}}' class='btn btn-info' role='button'>+ Add New</a></h1>
                        <table class="table">
                            <thead>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($categories as $row)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->created_at->format('d M Y')}}</td>
                                    <td>
                                        <a href="{{route('categories.edit',$row->id)}}">Edit</a>
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