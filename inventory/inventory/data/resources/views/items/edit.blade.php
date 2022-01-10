@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Item</div>

                <div class="card-body">
                    <form action="{{route('items.update', $find->id)}}" method="POST" enctype="multipart/form-data">
                        @CSRF
                        {{ method_field('PATCH') }}
                        <div class="form-group row">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <br>
                                <label for="category" class="col-md-4 col-form-label text-md-right">Select Category</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="category">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $row)
                                        <option value="{{$row->name}}" @if($find->category == $row->name) selected @endif>{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                </div>
                                <label for="title" class="col-md-4 col-form-label text-md-right">Enter Item Title</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" id="title" required="" value="{{ $find->title }}">
                                    <br>
                                </div>
                                <label for="description" class="col-md-4 col-form-label text-md-right">Enter Item Description</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" id="description">{{ $find->description }}</textarea>
                                    <br>
                                </div>
                                <label for="price" class="col-md-4 col-form-label text-md-right">Enter Item Price</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="price" id="price" required="" value="{{ $find->price }}">
                                    <br>
                                </div>
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">Enter Item Quantity</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="quantity" id="quantity" required="" value="{{ $find->quantity }}">
                                    <br>
                                </div>
                                <label for="sku" class="col-md-4 col-form-label text-md-right">Enter Item SKU</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="sku" id="sku" required="" value="{{ $find->sku }}">
                                    <br>
                                </div>
                                <label for="picture" class="col-md-4 col-form-label text-md-right">Enter Item Picture</label>
                                <div>
                                    <img src="{{ url('storage/image/'.$find->picture) }}" width="100" height="100">
                                </div>

                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="picture" id="picture" src="{{ $find->picture }}">
                                    <br>
                                </div>
                                <br><br><br>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary ">
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