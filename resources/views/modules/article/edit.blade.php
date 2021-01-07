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
                    		<h1>add new article</h1>
                    	</div>
                        {!! Form::open(['route' => 'article.update','action' => 'POST']) !!}

                        <div class="main-content create-article">
                            
                            <div class="chinese-article">
                                <h5>Chinese</h5>
                                <div class="first-row">
                                    {!! Form::text('title_cn',old('title_cn',isset($article->title_cn)
                                                        ?$article->title_cn:''),['placeholder' =>
                                            'Article title']); !!}
                                    {!! Form::text('source_cn',old('source_cn',isset($article->source_cn)
                                                        ?$article->source_cn:''),['placeholder' =>
                                    'Source']); !!}
                                </div>
                                {!! Form::textarea('content_cn',old('content_cn',isset($article->content_cn)
                                                        ?$article->content_cn:''),['id'=>'chi-article-area','placeholder' =>
                                    'Article']); !!}

                                {!! Form::text('note_cn',old('note_cn',isset($article->note_cn)
                                                        ?$article->note_cn:''),['placeholder' =>
                                    'Note', 'class'=>'note']); !!}
                            </div>
                            <div class="english-article">
                                <h5>English</h5>
                                <div class="first-row">
                                    {!! Form::text('title_en',old('title_en',isset($article->title_en)
                                                        ?$article->title_en:''),['placeholder' =>
                                            'Article title']); !!}
                                    {!! Form::text('source_en',old('source_en',isset($article->source_en)
                                                        ?$article->source_en:''),['placeholder' =>
                                    'Source']); !!}
                                </div>
                                {!! Form::hidden('id',$article->id); !!}
                                {!! Form::textarea('content_en',old('content_en',isset($article->content_en)
                                                        ?$article->content_en:''),['id'=>'eng-article-area','placeholder' =>
                                    'Article']); !!}

                                {!! Form::text('note_en',old('note_en',isset($article->note_en)
                                                        ?$article->note_en:''),['placeholder' =>
                                    'Note', 'class'=>'note']); !!}
                            </div>
                            <hr>
                            <div style="width:100%; text-align: center;">
                                <button type="submit">submit</button>
                            </div>

                        </div>
                        @csrf
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      
@endsection