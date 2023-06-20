@extends('admin.layout.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <h1>SLIDER</h1>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb float-right ">
                            <a href="{{ url('sliders/add') }}">
                                <button class="btn btn-primary">Add slider</button>
                            </a>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content-header">
            <div class="container-fluid">
                @include('admin._message')
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary  ">
                            <div class="card-header">
                                <h3 class="card-title">List slider</h3>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Description</th>
                                            <th>Stutus </th>
                                            <th>Created At</th>
                                            <th>Updated At </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!$slides->isEmpty())
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($slides as $value)
                                                <th scope="row">{{ $i++ }} </th>
                                                <td> <img src='{{ $value->getImage()  /* './assets/admin/uploads/image/' . $value->image) */ }}'
                                                        style="width: 100px;
                                                        height: 50px;"
                                                        alt="image"></td>
                                                <td>{{ $value->title }} </td>
                                                <td>{{ $value->sub_title }} </td>
                                                <td>{{ $value->description }} </td>

                                                <td>
                                                    @if (!empty($value->status == 0))
                                                        <span class="tag tag-success badge bg-primary"> Active </span>
                                                    @else
                                                        <span class="tag tag-success badge bg-danger "> Inactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ Carbon\Carbon::parse($value->created_at)->diffforhumans() }}
                                                </td>
                                                <td>{{ Carbon\Carbon::parse($value->updated_at)->diffforhumans() }}
                                                </td>
                                                <td class="d-flex">
                                                    <a href="{{ url('sliders/edit/'.$value->id) }}">
                                                        <button h class="btn  btn-sm btn-primary mr-1"> <i
                                                                class="nav-icon fas fa-edit "></i></button>
                                                    </a>
                                                    <button class="btn  btn-sm btn-danger  mr-1" href=""
                                                        value="{{ $value->id }}" id="btnDelete">
                                                        <i class="nav-icon fas fa-trash"></i>
                                                    </button>


                                                    {{--   <button class="btn  btn-sm btn-success  " href=""
                                                            value="{{ $value->id }}" id="btnDelete">
                                                            <i class="nav-icon fas fa-eye "></i>
                                                        </button> --}}
                                                </td>
                                                </tr>
                                                @include('slider._modal')
                                            @endforeach
                                        @else
                                            <table class="justify-center">
                                                <div class="alert alert-light d-flex justify-center " role="alert"
                                                    style="justify-content: center;">
                                                    No Record
                                                </div>
                                            </table>
                                        @endif

                                    </tbody>

                                </table>


                            </div>
                            <div class="card-footer">
                                <div class="">
                                    {{ $slides->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    $(document).on('click', '#btnDelete ', function() {
                        var slider_id = $(this).val();
                        /*      alert(category_id) */
                        $('#deletetModsl').modal('show')
                        $('#deleteid').val(slider_id);
                    });
                });


                $(document).ready(function() {
                    $(".close").click(function() {
                        $("#Message").hide();
                    });

                });
            </script>

        </section>


    </div>
@endsection
