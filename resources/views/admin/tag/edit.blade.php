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
                                <h3 class="card-title">Edit Tag</h3>
                            </div>
                            <form action="{{ url('tags/update/' . $tags->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('post')
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tag Name</label>
                                        <input type="text" class="form-control" name="tag_name"
                                            value="{{ $tags->tag_name }}" id="tag_name" placeholder="Tags Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Slug</label>
                                        <input type="text" class="form-control" name="slug"
                                            value="{{ $tags->slug }}" id="slug" placeholder="slug " required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Stutus</label>
                                        <div class="form-group">
                                            <select class="form-control" name="status">
                                                <option {{ $tags->status == 0 ? 'selected' : '' }} value='0'> Active </option>
                                                <option {{ $tags->status == 1 ? 'selected' : '' }} value='1'> InActive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button class="btn btn-success"><a href="{{ url('tags') }}"style="color:white">
                                            Back</a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
