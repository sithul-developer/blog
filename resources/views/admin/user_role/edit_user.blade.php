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
                        <div class="card card-primary  ">
                            <div class="card-header">
                                <h3 class="card-title">Created Role</h3>
                            </div>
                            <form method="post" action='{{ url('admin/user/update/' .$role->id) }}'  enctype="multipart/form-data">
                                @method('post')
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="col">
                                        <div class="form-group"
                                            style="display: flex;
                                justify-content: center;
                                flex-direction: column;">
                                            <label for="exampleInputPassword1">Image</label>
                                            <input type='file' name="image" id="image" class="form-control"
                                                onchange="readURL(this);"
                                                @if (!empty($role->getImage())) />
                                    <img id="blah" src="{{ $role->getImage() }}" alt="your image"
                                        class="mt-1"  style="width: 150px; height:150px;
                                        border: 1px solid #b4b1b1;
                                    "/> @endif
                                                </div>

                                            @if (count($errors) > 0)
                                                @foreach ($errors->all() as $error)
                                                    <p class="text-danger">{{ $error }}</p>
                                                @endforeach
                                            @endif
                                            <label>
                                                Maximum Size: 1 MB
                                                <br data-v-28363b9a="">
                                                Dimensions: W: 850px * H: 350px
                                            </label>
                                        </div>
                                        <div class="row">

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">First Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $role->name }}" placeholder="First Name" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Last Name</label>
                                                    <input type="text" class="form-control" name="last_name"
                                                        placeholder="Last Name " value="{{ $role->last_name }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Email " value="{{ $role->email }}" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Phone Number</label>
                                                    <input type="number" name="phone_number"
                                                        value="{{ $role->phone_number }}" class="form-control" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1 " class="px-2">Role</label>
                                                <div class="row ">

                                                    <div class="col-lg-3 p-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="customCheckbox1" name="dashboard" value="1"
                                                                @if ($role->dashboard == 1) @checked(true) @endif>
                                                            <label for="customCheckbox1"
                                                                class="custom-control-label">Dashboard</label>
                                                        </div>


                                                    </div>
                                                    <div class="col-lg-3 p-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="customCheckbox2" name="category" value="1"
                                                                @if ($role->category == 1) @checked(true) @endif>
                                                            <label for="customCheckbox2"
                                                                class="custom-control-label">Category
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 p-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="customCheckbox3" name="tag" value="1"
                                                                @if ($role->tag == 1) @checked(true) @endif>
                                                            <label for="customCheckbox3" class="custom-control-label">Tag
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 p-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="customCheckbox4" name="slider" value="1"
                                                                @if ($role->slider == 1) @checked(true) @endif>
                                                            <label for="customCheckbox4" class="custom-control-label">Slider
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 p-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="customCheckbox5" name="post" value="1"
                                                                @if ($role->post == 1) @checked(true) @endif>
                                                            <label for="customCheckbox5"
                                                                class="custom-control-label">Posts
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 p-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="customCheckbox6" name="footer" value="1"
                                                                @if ($role->footer == 1) @checked(true) @endif>
                                                            <label for="customCheckbox6"
                                                                class="custom-control-label">Footer
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 p-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="customCheckbox9" name="preview" value="1"
                                                                @if ($role->preview == 1) @checked(true) @endif>
                                                            <label for="customCheckbox9"
                                                                class="custom-control-label">Preview
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 p-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="customCheckbox10" name="gallery" value="1"
                                                                @if ($role->gallery == 1) @checked(true) @endif>
                                                            <label for="customCheckbox10"
                                                                class="custom-control-label">Gallery
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 p-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="customCheckbox11" name="setting" value="1"
                                                                @if ($role->setting == 1) @checked(true) @endif>
                                                            <label for="customCheckbox11"
                                                                class="custom-control-label">Setting
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button class="btn btn-success"><a
                                                href="{{ url('admin/all/user') }}"style="color:white">
                                                Back</a></button>
                                    </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
    </div>

    </div>
    </section>
    </div>
    <script>
          /*==== upload File ===*/
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
