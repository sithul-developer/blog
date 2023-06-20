@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success ">
                            <div class="card-header">
                                <h3 class="card-title">Add Gallery</h3>
                            </div>
                            <form method="POST" action='{{ url('gallery/update/'.$galleries->id) }}' enctype="multipart/form-data">
                                @method('POST')
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title"
                                            id="title" value="{{ $galleries->title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description </label>
                                        <textarea class="form-control" name="description" id="title" rows="3" placeholder="Description ..."
                                            spellcheck="false" required> {{ $galleries->description }}</textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Orders</label>
                                        <input type="number" class="form-control" name="orders" placeholder="orders"
                                            value="{{ $galleries->orders }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Stutus</label>
                                        <div class="form-group">
                                            <select class="form-control" name="status" value="{{ $galleries->status }}" >
                                                <option {{ $galleries->status == 0 ? 'selected' : '' }} value='0'> Active </option>
                                                <option {{ $galleries->status == 1 ? 'selected' : '' }} value='1'> InActive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group"
                                            style="display: flex;
                                        justify-content: center;
                                        flex-direction: column;">
                                            <label for="exampleInputPassword1">Image</label>
                                            <input type='file' name="image" id="image" class="form-control"
                                                onchange="readURL(this);"
                                                @if (!empty($galleries->getImage())) />
                                                <img id="blah" src="{{ $galleries->getImage() }}" alt="your image"
                                                    class="pt-1"  style="width: 200px"/> @endif
                                                </div>
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
                                        <button class="btn btn-success"><a href="{{ url('gallery') }}"style="color:white">
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
