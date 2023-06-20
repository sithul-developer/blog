@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <h1>Role</h1>
                    </div>
                    {{--  <div class="col-6">
                        <ol class="breadcrumb float-right ">
                            <a href="{{ url('admin/add/role') }}">
                                <button class="btn btn-primary">Add User</button>
                            </a>
                        </ol>
                    </div> --}}
                </div>
            </div>
        </section>

        <section class="content-header">
            <div class="container-fluid">
                @include('admin._message')
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary   ">
                            <div class="card-header">
                                <h3 class="card-title">All User</h3>
                            </div>

                            <div class="card-body table-responsive p-0 ">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role </th>
                                            <th>Phone </th>
                                            <th>Status </th>
                                            <th>Created At</th>
                                            <th>Updated At </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!$all_role->isEmpty())
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($all_role as $value)
                                                <tr>
                                                    <th scope="row">{{ $i++ }} </th>
                                                    <td> <img src='{{ $value->getImage() }}'
                                                            style="width: 50px;
                                                        height: 50px;"
                                                            alt="image">
                                                    </td>
                                                    <td>{{ $value->name }} </td>
                                                    <td>{{ $value->email }} </td>

                                                    <td>
                                                        @if ($value->dashboard == 1)
                                                            <span class="badge btn-danger">dashboard</span>
                                                        @endif
                                                        @if ($value->is_admin == 1)
                                                            <span class="badge btn-primary">user role</span>
                                                        @endif
                                                        @if ($value->slider == 1)
                                                            <span class="badge btn-secondary ">slider</span>
                                                        @endif
                                                        @if ($value->post == 1)
                                                            <span class="badge btn-success">post</span>
                                                        @endif
                                                        @if ($value->footer == 1)
                                                            <span class="badge btn-warning ">footer</span>
                                                        @endif
                                                        @if ($value->preview == 1)
                                                            <span class="badge btn-info">preview</span>
                                                        @endif


                                                    </td>
                                                    <td>{{ $value->phone_number }} </td>
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
                                                    <td>
                                                        <div class="btn-group w-150">
                                                            <a href=" {{ url('admin/edit/user/' . $value->id) }} ">
                                                                <span
                                                                    class="btn btn-success col fileinput-button dz-clickable">
                                                                    <i class="nav-icon fas fa-edit "></i>
                                                                </span>
                                                            </a>
                                                            <button type="submit" value="{{ $value->id }} "
                                                                id="btnDelete" class="btn btn-primary col start">
                                                                <i class="nav-icon fas fa-trash"></i>
                                                            </button>

                                                        </div>
                                                    </td>
                                                </tr>
                                                @include('admin.user_role._modal')
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
                                    {{--    {{ $footers->links('pagination::bootstrap-5') }}  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#btnDelete ', function() {
            var categories = $(this).val();
            /*      alert(category_id) */
            $('#deletetModsl').modal('show')
            $('#deleteid').val(categories);
        });
    });
</script>
