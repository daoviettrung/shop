@extends('admin.index')
@section('content')
    <div class="#">
        <form action="{{ url('product/' . $product->id) }}" method="post" enctype="multipart/form-data"
            class="form-horizontal">
            @method('PUT')
            @csrf
            <div class="card">
                <div class="card-header">
                    <strong>Add product</strong>
                </div>
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" class="form-control" required
                                value="{{ !empty($product->name) ? $product->name : '' }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="slug" class=" form-control-label">Slug</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="slug" name="slug" class="form-control"
                                value="{{ !empty($product->slug) ? $product->slug : '' }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="price" class=" form-control-label">Price</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="price" name="price" class="form-control" required value="{{ !empty($product->price) ? $product->price : '' }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="cost" class=" form-control-label">Cost</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="cost" name="cost" class="form-control" required value="{{ !empty($product->cost) ? $product->cost : '' }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="cost" class=" form-control-label">Category</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="category" id="category" class="form-control" required>
                                <option disabled selected value>--Choose--</option>
                                @foreach ($category as $cate)
                                    <option value="{{ $cate->id }}" {{($cate->id == $product->category) ? 'selected' : ''}}>{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="number" class=" form-control-label">Number</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="number" name="number" class="form-control" required value="{{ !empty($product->number) ? $product->number : '' }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="9"
                                class="form-control">{{ !empty($product->description) ? $product->description : '' }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="image" class=" form-control-label">Image</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="image" name="image" class="form-control-file">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/admin/custom.js') }}"></script>
@endsection
