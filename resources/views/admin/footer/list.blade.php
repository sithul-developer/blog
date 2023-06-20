@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <h1>Footer</h1>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb float-right ">
                            <a href="{{ url('footer/add') }}">
                                <button class="btn btn-primary">Add Footer</button>
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
                        <div class="card card-primary   ">
                            <div class="card-header">
                                <h3 class="card-title">List footer</h3>
                            </div>

                            <div class="card-body table-responsive p-0 ">
                                <table class="table table-hover text-nowrap ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>image</th>
                                            <th>Title</th>
                                            <th>Slug </th>
                                            <th>Created At</th>
                                            <th>Updated At </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!$footers->isEmpty())
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($footers as $value)
                                                <tr>
                                                    <th scope="row">{{ $i++ }} </th>
                                                    <td> <img
                                                            src='{{ $value->getImage() /* './assets/admin/uploads/image/' . $value->image) */ }}'
                                                            style="width: 100px;
                                                        height: 50px;"
                                                            alt="image"></td>
                                                    <td>{{ $value->title }} </td>
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
                                                            <a href="{{ url('footer/edit/' . $value->id) }}">
                                                                <span
                                                                    class="btn btn-success col fileinput-button dz-clickable">
                                                                    <i class="nav-icon fas fa-edit "></i>
                                                                </span>
                                                            </a>
                                                            <button type="submit" value="{{ $value->id }}"
                                                                id="btnDelete" class="btn btn-primary col start">
                                                                <i class="nav-icon fas fa-trash"></i>
                                                            </button>
                                                            <button type="reset" class="btn btn-warning col cancel">
                                                                <i class="fas fa-times-circle"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @include('admin.footer._modal')
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
                                    {{ $footers->links('pagination::bootstrap-5') }}
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
