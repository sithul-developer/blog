
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
                                <h3 class="card-title">Edit Footer</h3>
                            </div>
                            <form action='{{ url('footer/update/'.$footer->id) }}' method="POST"  enctype="multipart/form-data">
                                @method('POST')
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" value="{{ $footer->title }}"  name="title" placeholder="Title"
                                            >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Stutus</label>
                                        <div class="form-group">
                                            <select class="form-control" name="status" value="{{ $footer->status }}" >
                                                <option {{ $footer->status == 0 ? 'selected' : '' }} value='0'> Active </option>
                                                <option {{ $footer->status == 1 ? 'selected' : '' }} value='1'> InActive
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
                                    @if (!empty($footer->getImage())) />
                                    <img id="blah" src="{{ $footer->getImage() }}" alt="your image"
                                        class="pt-1" />
                                    @endif

                                </div>
                                @include('admin._message')

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
                                    <button class="btn btn-success"><a href="{{ url('footer') }}"style="color:white">
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
