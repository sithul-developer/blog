@extends('admin.layout.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
            <style>
                img {
                    max-width: 425px;
                    max-height: 175px;

                }

                input[type=file] {}



                /* ============================================ */
                .ck-editor__editable_inline {
                    height: 250px;
                }

                .img-size-50 {
                    width: 28px !important;

                }

                small.badge.badge-warning {
                    margin-top: 8px !important;
                    padding: 0.5em 0.4em !important;
                }
            </style>

        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary   ">
                            <div class="card-header">
                                <h3 class="card-title">Add Post</h3>
                            </div>
                            <form method="POST" action="{{ url('posts/update/' .$posts->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title "
                                            value="{{ $posts->title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sub Title</label>
                                        <input type="text" class="form-control" name="sub title" placeholder="Sub Title "
                                            value="{{ $posts->sub_title }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Order</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="orders" id=""
                                                value=" {{ $posts->orders }} ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Option</label>
                                        <div class="border"
                                            style="padding: 5px 0px 5px 20px;
                                                border-radius: 5px;">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio1"
                                                    name="option" value="0"
                                                    {{ $posts->option == 0 ? 'checked ' : '' }} value='0'>
                                                <label for="customRadio1" class="custom-control-label my-1">Left</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio2"
                                                    name="option" value="1"
                                                    {{ $posts->option == 1 ? 'checked ' : '' }} value='1'>
                                                <label for="customRadio2" class="custom-control-label my-1">Right</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Category</label>

                                        <select class="form-control" name="category_id">
                                            <option {{-- {{ $sliders->status == 1 ? 'selected' : '' }} --}} value='1'>--- Selected Category---</option>
                                            @foreach ($category as $item)
                                                <option value='{{ $item->id }}'
                                                    {{ $item->id == $posts->category_id ? 'selected' : '' }}>
                                                    {{ $item->category_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tags</label>
                                        <div class="border"
                                            style="padding: 5px 0px 5px 20px;
                                                border-radius: 5px;">
                                            <div class=" d-flex">
                                                @foreach ($tag as $item)
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="tags[]"
                                                            id="tag{{ $item->id }}" value="{{ $item->id }}"
                                                            {{ in_array($item->id,$posts->tags()->pluck('id')->toArray())? 'checked': '' }}>
                                                        <label class="custom-control-label mr-4"
                                                            for="tag{{ $item->id }}"> {{ $item->tag_name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <section class="content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="exampleInputPassword1">Content</label>
                                                    <div class="form-group">
                                                        <textarea id="editor" name="content" style="border-radius: 10px">
                                                        {{ $posts->content }} </textarea>
                                                    </div>
                                                </div>
                                                <!-- /.col-->
                                            </div>
                                            <!-- ./row -->
                                        </section>
                                    </div>
                                    <div class="form-group"
                                        style="display: flex;
                                justify-content: center;
                                flex-direction: column;">
                                        <label for="exampleInputPassword1">Image</label>
                                        <input type='file' name="image" id="image" class="form-control"
                                            onchange="readURL(this);"
                                            @if (!empty($posts->getImage())) />
                                    <img id="blah" src="{{ $posts->getImage() }}" alt="your image"
                                        class="pt-1" /> @endif
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
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button class="btn btn-success"><a
                                                href="{{ url('posts') }}"style="color:white">
                                                Back</a></button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>








    <script src="{{ url(' ') }}  ../../plugins/summernote/summernote-bs4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
    <script>
        // ckedit
        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {

            toolbar: {

                items: [

                    'exportPDF', 'exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                    'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed',
                    '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            ckfinder: {
                uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            },

            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Heading 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            placeholder: 'Welcome to CKEditor 5!',
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },

            htmlSupport: {
                allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }]
            },
            htmlEmbed: {
                showPreviews: true
            },
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            mention: {
                feeds: [{
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                        '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                        '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                        '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }]
            },

            removePlugins: [

                'CKBox',
                'CKFinder',
                'EasyImage',

                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',

                'MathType'
            ]
        });
    </script>


    <script type="text/javascript">
        /* The uploader form */
        $(function() {
            $(":file").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        function imageIsLoaded(e) {
            $('#sh_img').attr('src', e.target.result);
            $('#yourImage').attr('src', e.target.result);
        };


        ///////////////////////////////////////////////////////////
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
