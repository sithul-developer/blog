@extends('home.layout.app')
@section('content')
    <style>
        .title {
            text-decoration: initial;
            padding: 0;
            color: #2c2d2f;
            font-family: Roboto, Battambang, sans-serif;
            font-weight: regular;
            font-size: 14px;
            line-height: 30px;
            scroll-behavior: smooth;

        }

        .title .sub_ttile {

            color: #818181;
            overflow: hidden;
            line-height: 29px;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            ...
        }

        #title {
            text-decoration: initial;
            font-weight: bold;
            padding: 0;
            font-family: Roboto, Battambang, sans-serif;
            font-weight: regular;
            font-size: 26px;
            line-height: 41px;
            scroll-behavior: smooth;
        }

        #sub_title {
            line-height: 35px;
            font-size: 16px;
            font-weight: 800px;
            scroll-behavior: smooth;
            padding-top: 10px;
            line-height: 30px;
            color: #818181;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            ...
        }





        .title h2 {
            line-height: 35px;
            font-size: 18px;
            font-weight: bold;
            scroll-behavior: smooth;

            line-height: 29px;
            color: #2e2e2f;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            ...
        }
    </style>
    <div class="row m-0">
        <!-- Nested row for non-featured blog posts-->
        <div class="col-md-4">
            x
        </div>

        <div class="col-lg-8 card ">

            <ul class="nav  p-2 mb-4" style="border-bottom:1px solid #e0dbdb;">
                @foreach ($navbar_categories as $navbar_category)
                <li class="nav-item"><a class="nav-link" href=" {{ route('home',['category_id' =>$navbar_category->id])}} ">{{$navbar_category->category_name}} </a></li>
                @endforeach

            </ul>
            <div class="row  p-3">
                @foreach ($posts as $value)
                    @if (!empty($value->status == 0 ? $value->Is_deleted == 0 : ''))
                        <!-- Blog post -->
                        <div class="card mb-3 ">
                            <div class="row g-0">
                                <div class="col-md-4" style="padding: 15px 0 15px 1px;">
                                    <a href="{{ route('Article', ['id' => $value->id]) }}"><img class="card-img-top"
                                            src=" {{ $value->getImage() }} " alt="..." style="height:180px" /></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">

                                        <a href=" {{ route('Article', ['id' => $value->id]) }}" class="title">
                                            <h2 class="card-title h4">{{ $value->title }} </h2>
                                            <p class="card-text sub_ttile">{{ $value->sub_title }} </p>
                                            <div class="small text-muted"> {{ $value->created_at }} </div>
                                         {{--    <a class="btn btn-primary"
                                                href="{{ route('Article', ['id' => $value->id]) }}">Read
                                                more →</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                {{--      @foreach ($posts as $value)
                    @if (!empty($value->status == 0 ? $value->Is_deleted == 0 : ''))
                        <div class="col-lg-12">
                            <div class="row card  p-0">
                                <div class="col-lg-4">
                                    <a href="{{ route('Article', ['id' => $value->id]) }}"><img class="card-img-top"
                                            src=" {{ $value->getImage() }} " alt="..." style="height:180px" /></a>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-body">

                                        <a href=" {{ route('Article', ['id' => $value->id]) }}" class="title">
                                            <h2 class="card-title h4">{{ $value->title }} </h2>
                                            <p class="card-text sub_ttile">{{ $value->sub_title }} </p>
                                            <div class="small text-muted"> {{ $value->created_at }} </div>
                                            <a class="btn btn-primary"
                                                href="{{ route('Article', ['id' => $value->id]) }}">Read
                                                more →</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                @endforeach --}}


        </div>



    </div>

    <nav aria-label="Pagination">
        <hr class="my-0" />
        <div class="card-footer mt-4">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    </nav>
    <!-- Pagination-->
    </div>
@endsection
