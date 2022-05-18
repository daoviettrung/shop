@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">category</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <a href="{{ url('category/create') }}"> <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add item</button></a>
                </div>
            </div>
            <div id='tool' class="tool">
                <form class="form-header" action="{{ url('category') }}" method="GET">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas ..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <a href="{{ url('category') }}"> <button class="au-btn--submit bg-danger">reset</button></a>
            </div>

            <div class="table-responsive table-responsive-data2 mt-5">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $key => $cate)
                            <tr class="tr-shadow">
                                <td>
                                    {{ ++$key }}
                                </td>
                                <td>
                                    {{ $cate->name }}
                                </td>
                                <td>
                                    <img src="{{ asset('assets/uploads/category/' . $cate->image) }}" alt="Image here"
                                        class="image-custom">
                                </td>
                                </td>
                                <td>
                                    {{ $cate->description }}
                                </td>
                                <td>
                                    {{ $cate->created_at }}
                                </td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{ url('category/' . $cate->id . '/edit') }}"><button
                                                class="item" data-toggle="tooltip" data-placement="top"
                                                title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                        <form method="POST" action="{{ url('category/' . $cate->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Are you sure you want to delete?')"
                                                class="item" data-toggle="tooltip" data-placement="top"
                                                title="Delete" type="submit"><i class="zmdi zmdi-delete"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $category->links() }}

            <!-- END DATA TABLE -->
        </div>
    </div>
@endsection
