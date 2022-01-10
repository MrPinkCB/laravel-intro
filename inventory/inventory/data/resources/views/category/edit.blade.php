@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Category</div>

                <div class="card-body">
                    <form action="{{route('categories.update',$find->id)}}" method="POST">
                        {{csrf_field()}}
                        {{ method_field('PATCH') }}
                        <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Edit Category Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="category" id="category" required="" value="{{$find->name}}">
                                    <br>
                                   @if(session('status'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                </div>
                                <br><br><br>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                         </div>
                    </form>
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