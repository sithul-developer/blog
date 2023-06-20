@extends('home.layout.app')
@section('content')



<style>
    .title {
        text-decoration: initial;
        padding: 0;
        color: #2c2d2f;
        font-family: Roboto, Battambang, sans-serif;
        font-weight: regular;
        font-size:25px;
        line-height: 38px;
        scroll-behavior: smooth;

    }
    .sub_ttile {
        font-family: Roboto, Battambang, sans-serif;
        color: #818181;
       line-height: 29px;

    }


</style>





<div class="col-lg-12">
<article>
    <div class="row p-2" style="display: flex;
    align-items: center;
    justify-content: space-around;">
        <div class="col-md-9">


    <!-- Post header-->
    <header class="mb-4">
        <!-- Post title-->
        <h1 class="fw-bolder mb-1 title" > {{$article->title }} </h1>
        <!-- Post meta content-->
        <div class="text-muted fst-italic mb-2"> {{$article->create_at }}</div>
        <!-- Post categories-->
        @foreach ($article -> tags as $tag)
        <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$tag->tag_name}} </a>
        @endforeach
    </header>
    <!-- Preview image figure-->

    <div class="text-muted fst-italic mb-2 sub_ttile" > {{$article->sub_title }}</div>

    <figure class="mb-4"><img class="img-fluid rounded" src=" {{ $article->getImage()}}" alt="..." /></figure>
    <!-- Post content-->
    <section class="mb-5">


        {!! $article->content!!}
    </div>
</div>
     {{--    <p class="fs-5 mb-4">Science is an enterprise that should be cherished as an activity of the free human mind. Because it transforms who we are, how we live, and it gives us an understanding of our place in the universe.</p>
        <p class="fs-5 mb-4">The universe is large and old, and the ingredients for life as we know it are everywhere, so there's no reason to think that Earth would be unique in that regard. Whether of not the life became intelligent is a different question, and we'll see if we find that.</p>
        <p class="fs-5 mb-4">If you get asteroids about a kilometer in size, those are large enough and carry enough energy into our system to disrupt transportation, communication, the food chains, and that can be a really bad day on Earth.</p>
        <h2 class="fw-bolder mb-4 mt-5">I have odd cosmic thoughts every day</h2>
        <p class="fs-5 mb-4">For me, the most fascinating interface is Twitter. I have odd cosmic thoughts every day and I realized I could hold them to myself or share them with people who might be interested.</p>
        <p class="fs-5 mb-4">Venus has a runaway greenhouse effect. I kind of want to know what happened there because we're twirling knobs here on Earth without knowing the consequences of it. Mars once had running water. It's bone dry today. Something bad happened there as well.</p> --}}
    </section>
</article>
</div>
@endsection
