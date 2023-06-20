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
                .img_slider{
                    max-width: 334px;
                    max-height: 115px;
                    border: 1px solid gainsboro;
                    margin-top: 7px;
                    border-radius: 5px;
                }
                img{
                    max-width: 332px;
                    max-height: 115px;
                    border-radius: 5px;
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
                            <form method="post" action='' enctype="multipart/form-data">
                                @method('POST')
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title "
                                            value="{{ old('title') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sub_Title</label>
                                        <input type="text" class="form-control" name="sub_title" placeholder="Sub Title "
                                            value="{{ old('sub_title') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <input type="text" class="form-control" name="description"
                                            value="{{ old('description') }}" placeholder="Sub Title " required>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group"
                                            style="display: flex;
                                        justify-content: center;
                                        flex-direction: column;">
                                            <label for="exampleInputPassword1">Image</label>
                                            <input type='file' name='image' class="form-control"
                                                onchange="readURL(this);" />
                                                <div class="img_slider">
                                                    <img id="blah"
                                                    src="{{ asset('./assets/admin/uploads/image_internal/image slider.png') }}"
                                                    alt="your image" />
                                                </div>

                                        </div>
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
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button class="btn btn-success"><a href="{{ url('sliders') }}"style="color:white">
                                            Back</a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
