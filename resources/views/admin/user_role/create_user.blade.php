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
        <style>
            input[type='password'] {
                font-family: Verdana;
                letter-spacing: 0.125em;
            }
        </style>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary  ">
                            <div class="card-header">
                                <h3 class="card-title">Created Role</h3>
                            </div>
                            <form method="post" action=' '  enctype="multipart/form-data">
                                @method('post')
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="form-group"
                                                style="display: flex;
                                            justify-content: center;
                                            flex-direction: column;">
                                                <label for="exampleInputPassword1">Profile</label>
                                                <input type='file' name="image" onchange="readURL(this);" />
                                                <img id="blah" class="img_post"
                                                    src="{{ asset('./assets/admin/uploads/image_internal/Untitled design.png') }} "
                                                    alt="your image" class="mx-3"
                                                    style="width: 150px; height:150px;
                                                    border: 1px solid #b4b1b1;
                                                    margin-top: 5px;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">First Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Last Name</label>
                                                <input type="text" class="form-control" name="last_name"
                                                    placeholder="Last Name " required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Email " required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" id="myPsw" placeholder="⁕⁕⁕⁕⁕⁕⁕⁕"
                                                    class="form-control" name="password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Comfirm Password</label>
                                                <input type="password" id="myPsw" placeholder="⁕⁕⁕⁕⁕⁕⁕⁕"
                                                    class="form-control" name="confirm_password" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">

                                                <label for="exampleInputPassword1">Phone Number</label>
                                                <input type="number" name="phone_number" id="myPsw" placeholder="+885"
                                                    class="form-control" required>
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
                                                            id="customCheckbox1" name="dashboard" value="1">
                                                        <label for="customCheckbox1"
                                                            class="custom-control-label">Dashboard</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 p-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox2" name="category" value="1">
                                                        <label for="customCheckbox2" class="custom-control-label">Category
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 p-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox3" name="tag" value="1">
                                                        <label for="customCheckbox3" class="custom-control-label">Tag
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 p-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox4" name="slider" value="1">
                                                        <label for="customCheckbox4" class="custom-control-label">Slider
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 p-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox5" name="post" value="1">
                                                        <label for="customCheckbox5" class="custom-control-label">Posts
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 p-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox6" name="footer" value="1">
                                                        <label for="customCheckbox6" class="custom-control-label">Footer
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 p-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox9" name="preview" value="1">
                                                        <label for="customCheckbox9" class="custom-control-label">Preview
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 p-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox10" name="gallery" value="1">
                                                        <label for="customCheckbox10" class="custom-control-label">Gallery
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 p-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox11" name="setting" value="1">
                                                        <label for="customCheckbox11" class="custom-control-label">Setting
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 p-3">
                                                    <div class="custom-control custom-checkbox" >
                                                        <input class="custom-control-input"  name="is_admin" type="checkbox"
                                                            id="customCheckbox13" value="0" >
                                                        <label for="customCheckbox13" class="custom-control-label"> User
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 p-3">
                                                    <div class="custom-control custom-checkbox" >
                                                        <input class="custom-control-input"  name="is_admin" type="checkbox"
                                                            id="customCheckbox13" value="0" >
                                                        <label for="customCheckbox13" class="custom-control-label"> Admin
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
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
    </div>
    <script>
        /*==== Placeholder password ===*/
        function myFunction() {
            var x = document.getElementById("myPsw").placeholder;
            document.getElementById("demo").innerHTML = x;
        }
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
