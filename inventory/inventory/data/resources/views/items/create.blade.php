@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a Item</div>

                <div class="card-body">
                    <form action="{{route('items.store')}}" method="POST" enctype="multipart/form-data">
                        @CSRF
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
                                        <option value="{{$row->name}}" @if(old('category')) selected @endif>{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                </div>
                                <label for="title" class="col-md-4 col-form-label text-md-right">Enter Item Title</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" id="title" required="" value="{{ old('title') }}">
                                    <br>
                                </div>
                                <label for="description" class="col-md-4 col-form-label text-md-right">Enter Item Description</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" id="description" value="{{ old('description') }}" ></textarea>
                                    <br>
                                </div>
                                <label for="price" class="col-md-4 col-form-label text-md-right">Enter Item Price</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="price" id="price" required="" value="{{ old('price') }}">
                                    <br>
                                </div>
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">Enter Item Quantity</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="quantity" id="quantity" required="" value="{{ old('quantity') }}">
                                    <br>
                                </div>
                                <label for="sku" class="col-md-4 col-form-label text-md-right">Enter Item SKU</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="sku" id="sku" required="" value="{{ old('sku') }}">
                                    <br>
                                </div>
                                <label for="picture" class="col-md-4 col-form-label text-md-right">Enter Item Picture</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="picture" id="picture" required="" value="{{ old('picture') }}">
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