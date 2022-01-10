@extends('layouts.public')

@section('content')
    @php
        //dd($companies);
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Items</div>

                    <div class="card-body">

                        <h1 class="pull-right"><a href='{{ route('items.create')}}' class='btn btn-info' role='button'>+ Add New</a></h1>
                        <table class="table">
                            <thead>
                                <th>SL</th>
                                <th>Item's Name</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($items as $row)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$row->title}}</td>
                                    <td>
                                    <a href="{{ route('items.edit',$row->id)}}"class="btn btn-sm btn-primary">Edit</a>

                                    <a href="javascript:void(0);"
                                       onclick="if (confirm('Are you sure to delete this record?'))
                                       {document.getElementById('delete-items-{{ $row->id }}').submit();} else {return false;}"
                                       class="btn btn-sm btn-danger">
                                        Delete
                                    </a>
                                    <form action="{{ route('items.destroy', $row->id) }}"
                                          method="POST"
                                          id="delete-items-{{ $row->id }}" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
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