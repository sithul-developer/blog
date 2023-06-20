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
            <style>
                img {
                    max-width: 286px;
                    max-height: 107px;
                }

                input[type=file] {}
            </style>

        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success ">
                            <div class="card-header">
                                <h3 class="card-title">Add Sluders</h3>
                            </div>
                            <form action='{{ url('sliders/update/'.$sliders->id) }}' method="POST"  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('POST')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            placeholder="Title " value="{{ $sliders->title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sub_Title</label>
                                        <input type="text" class="form-control" name="sub_title" id="sub_title"
                                            placeholder="Sub Title " value="{{ $sliders->sub_title }}"required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <input type="text" class="form-control" name="description" id="description"
                                            value="{{ $sliders->description }}" placeholder="Sub Title " required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Stutus</label>
                                        <div class="form-group">
                                            <select class="form-control" name="status">
                                                <option {{ $sliders->status == 0 ? 'selected' : '' }} value='0'> Active </option>
                                                <option {{ $sliders->status == 1 ? 'selected' : '' }} value='1'> InActive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                        style="display: flex;
                                    justify-content: center;
                                    flex-direction: column;">
                                        <label for="exampleInputPassword1">Image</label>
                                        <input type='file' name="image" id="image"  class="form-control"  onchange="readURL(this);"
                                        @if (!empty($sliders->getImage())) />
                                        <img id="blah" src="{{ $sliders->getImage() }}" alt="your image"
                                            class="pt-1" />
                                        @endif

                                    </div>
                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $error)
                                            <p class="text-danger">{{ $error }}</p>
                                        @endforeach
                                    @endif
                                    <label>
                                        Maximum Size: 1 MB
                                        <br data-v-28363b9a="">
                                        Dimensions: W: 1906px * H: 715px
                                    </label>
                                </div>


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button class="btn btn-success"><a href="{{ url('sliders') }}"style="color:white">
                                    Back</a></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
