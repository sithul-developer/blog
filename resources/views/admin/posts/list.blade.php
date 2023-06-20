@extends('admin.layout.app')
@section('content')


    <style>
        .list_value {
            width: 250px;
            height: 111px;
            font-size: 13px;
            font-family: Battambang, Arial, Helvetica, sans-serif;
            border: aliceblue;


        }

        .list_value_1 {
            width: 300px;
            height: 200px;
            display: -webkit-box;
            text-overflow: ellipsis;
            overflow: hidden;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 6;
            font-size: 13px;
            resize: both;
            overflow: auto;
            border: aliceblue;
        }

        .item_list {
            text-align-last: center;
        }
    </style>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <h1>SLIDER</h1>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb float-right ">
                            <a href="{{ url('posts/add') }}">
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
                                            {{-- <th>User</th> --}}
                                            <th>Image</th>
                                            <th>User</th>
                                            <th>Title</th>
                                            <th>Sub_Title</th>
                                            <th>Content</th>
                                            <th>Tags</th>
                                            <th>Category</th>
                                            <th>Option</th>
                                            <th>Order</th>
                                            <th>Stutus </th>
                                            <th>Created_At</th>
                                            <th>Updated_At </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (!$posts->isEmpty())
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($posts as $value)
                                                <th scope="row">{{ $i++ }} </th>
                                                <td> <img src='{{ $value->getImage() }}'
                                                        style="width: 100px;
                                                        height: 50px;"
                                                        alt="image"></td>
                                                <td>{{ $value->user?->name }}</td>

                                                <td class="list_value">{!! Str::limit("$value->title ", 50, ' ...') !!}</td>
                                                <td class="list_value">{!! Str::limit("$value->sub_title ", 50, ' ...') !!} </td>
                                                <td class="list_value_1"> {!! $value->content !!} </td>
                                                <td>
                                                    <ul>
                                                        @foreach ($value->tags as $tag)
                                                            <li> {{-- {{ $tag->id }}  --}}{{ $tag->tag_name }} </li>
                                                        @endforeach
                                                    </ul>

                                                </td>
                                                <td class="item_list">{{ $value->category->category_name }} </td>

                                                <td class="item_list">
                                                    @if (!empty($value->option == 0))
                                                        <span class="tag tag-success badge bg-primary "> Left </span>
                                                    @else
                                                        <span class="tag tag-success badge bg-danger "> Right</span>
                                                    @endif

                                                </td>
                                                <td class="item_list">{{ $value->orders }} </td>


                                                <td class="item_list">
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
                                                <td>
                                                    <div class="btn-group w-150 ">
                                                        <a href="{{ url('posts/edit/' . $value->id) }}">
                                                            <span
                                                                class="btn  btn-md btn-success col fileinput-button dz-clickable">
                                                                <i class="nav-icon fas fa-edit "></i>
                                                            </span>
                                                        </a>
                                                        <button type="submit" value="{{ $value->id }}" id="btnDelete"
                                                            class="btn btn-primary  col start">
                                                            <i class="nav-icon fas fa-trash"></i>
                                                        </button>

                                                    </div>
                                                </td>
                                                </tr>
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
                                    @include('admin.posts._modal')
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="">
                                    {{ $posts->links('pagination::bootstrap-5') }}
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
