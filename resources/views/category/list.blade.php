@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <h1>List Categoty</h1>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb float-right">
                            <a href="{{ url('add') }}">
                                <button class="btn btn-primary">Add Category</button>
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
                        <div class="card ">
                            <div class="card-header bg-success ">
                                <div class="content-header  p-2 ">
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Description</th>
                                            <th>Slug </th>
                                            <th>Staus</th>
                                            <th>Created At</th>
                                            <th>Updated At </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!$categories->isEmpty())
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($categories as $value)
                                                <tr>
                                                    <th scope="row">{{ $i++ }} </th>
                                                    <td>{{ $value->category_name }} </td>
                                                    <td>{{ $value->description }} </td>
                                                    <td>{{ $value->slug }} </td>
                                                    <td><span class="tag tag-success">{{ $value->status }}</span></td>
                                                    <td>{{ Carbon\Carbon::parse($value->created_at)->diffforhumans() }}
                                                    </td>
                                                    <td>{{ Carbon\Carbon::parse($value->updated_at)->diffforhumans() }}
                                                    </td>
                                                    <td class="d-flex">
                                                        <button class="btn  btn-sm btn-primary mr-1"> <i
                                                                class="nav-icon fas fa-edit "></i></button>
                                                        <button class="btn  btn-sm btn-danger " href=""
                                                            value="{{ $value->id }}" id="btnDelete">
                                                            <i class="nav-icon fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <table class="justify-center">
                                                <div class="alert alert-light d-flex justify-center " role="alert">
                                                    No Record
                                                </div>
                                            </table>
                                        @endif
                                    </tbody>
                                </table>


                                <div class="modal fade" id="deletetModsl">
                                    <form action="{{ url('delete')}} " method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-dialog modal-sm  ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body ">
                                                    <p class="text-dark fs-5">Are your sure delete ? <i
                                                            class="bi bi-question-lg"></i>
                                                    </p>
                                                    <input type='hidden' name='categories' id='deleteid' />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn  btn-sm btn-danger "
                                                        data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn bnt-sm btn-sm btn-primary">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
                        var id = $(this).val();
                        /*      alert(category_id) */
                        $('#deletetModsl').modal('show')
                        $('#deleteid').val(id);
                    });
                });
            </script>

        </section>


    </div>
@endsection
