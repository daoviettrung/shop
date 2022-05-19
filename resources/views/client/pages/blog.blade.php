@extends('client.index')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Blog</h1>
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">blog</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @foreach ($blog as $b)
                        <div class="post">
                            <div class="post-media post-thumb">
                                <a href="blog-single.html">
                                    <img src="{{ asset('assets/uploads/post/' . $b->image) }}" alt="">
                                </a>
                            </div>
                            <h2 class="post-title"><a href="blog-single.html">{{ $b->name }}</a></h2>
                            <div class="post-meta">
                                <ul>
                                    <li>
                                        <i class="tf-ion-ios-calendar"></i> view: {{ $b->view }}
                                    </li>
                                </ul>
                            </div>
                            <div class="post-content">
                                <p class="content-post">{{ $b->content }}</p>
                                <a href="blog-single.html" class="btn btn-main">Continue Reading</a>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <aside class="sidebar">
                        <!-- Widget Latest Posts -->
                        <div class="widget widget-latest-post">
                            <h4 class="widget-title">Latest Posts</h4>
                            @foreach ($blogRight as $b)
                                <div class="media">
                                    <a class="pull-left" href="#!">
                                        <img class="media-object" src="{{ asset('assets/uploads/post/' . $b->image) }}"
                                            alt="Image">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a class="title-blog-right" href="#!">{{ $b->name }}</a></h4>
                                        <p class = "content-blog-right">{{$b->content}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- End Latest Posts -->
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            showContentPost();
            showTitlePostRight();
            showContentPostRight();
        });

        function showContentPost() {
            let text = $('.content-post');
            let length = text.length;
            for (let i = 0; i < length; i++) {
                if (text[i].innerText.length > 400) {
                    text[i].innerHTML = text[i].innerText.slice(0, 400) + '...';
                } else {
                    text[i].innerHTML = text[i].innerText;
                }
            }
        }

        function showTitlePostRight(){
            let text = $('.title-blog-right');
            let length = text.length;
            for (let i = 0; i < length; i++) {
                if (text[i].innerText.length > 10) {
                    text[i].innerHTML = text[i].innerText.slice(0, 10) + '...';
                } else {
                    text[i].innerHTML = text[i].innerText;
                }
            }
        }

        function showContentPostRight(){
            let text = $('.content-blog-right');
            let length = text.length;
            for (let i = 0; i < length; i++) {
                if (text[i].innerText.length > 30) {
                    text[i].innerHTML = text[i].innerText.slice(0, 10) + '...';
                }
            }
        }
    </script>
@endsection
