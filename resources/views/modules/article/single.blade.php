@extends("layouts.app")

@section("title", "Lexenter")

@section("content")

    @include("partials.sidebar")
    @include("partials.header")

    <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    	<div class="page-title">
                    		<h1>Chinese : {{ $post->title_cn }}</h1>
                            <h1>English : {{ $post->title_en }}</h1>
                    	</div>
                        {{-- <div class="main-content create-article">
                            <div class="chinese-article">
                                <h5 class="article-title">{{$post->title_cn}}</h5>
                                <div class="article-content">
                                {!!$post->content_cn!!}
                                </div>
                            </div>
                            <div class="english-article">
                                <h5 class="article-title">{{$post->title_en}}</h5>
                                <div class="article-content">

                                {!!$post->content_en!!}
                                </div>
                            </div>
                        </div> --}}
                        <table id="article-list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Chinese</th>
                                        <th>English</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($post->allcontext as $context)
                                    <tr>
                                        <td>{!! $context->cparagraph !!}</td>
                                        <td>{!! $context->eparagraph !!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      
      
@endsection