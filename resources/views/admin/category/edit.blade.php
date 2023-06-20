@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              {{--   <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="">
                                <button class="btn btn-primary">Add Category</button>
                            </a>
                        </ol>
                    </div>
                </div> --}}
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success ">
                            <div class="card-header">
                                <h3 class="card-title">Edit Category</h3>
                            </div>
                            <form action="{{ url('category/update/' .$categories->id) }}" method="POST" enctype="multipart/form-data">
                         {{--        @method('post') --}}
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="category_name" value="{{ $categories->category_name }}"  id="category_name" placeholder="Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description </label>
                                        <textarea class="form-control" name="description" id="description"    rows="3" placeholder="Description ..." spellcheck="false" required>{{ $categories->description }} </textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Slug</label>
                                        <input type="text" class="form-control"  name="slug"   id="slug" value="{{ $categories->slug }}"  placeholder="slug " required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Stutus</label>
                                        <div class="form-group">
                                            <select class="form-control" name="status">
                                                <option {{ $categories->status == 0 ? 'selected' : '' }} value='0'> Active </option>
                                                <option {{ $categories->status == 1 ? 'selected' : '' }} value='1'> InActive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button class="btn btn-success"><a href="{{ url('category') }}"style="color:white"> Back</a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
