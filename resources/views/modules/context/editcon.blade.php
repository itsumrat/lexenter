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
                    		<h1>add new context</h1>
                    	</div>
                        <form action="{{ route('posteditcontext') }}" method="POST">
                        @csrf
                        <div class="main-content create-context">
                            <input type="hidden" name="conid" value="{{ $context->id }}">
                            <div class="chinese-context">
                                <h5>Chinese</h5>
                                <div class="first-row">
                                    <input type="text" name="csource" value="{{ $context->csource }}" required="">
                                </div>
                                <div class="second-row">
                                    <select id='article-title-chi' name="ctitle">
                                        <option></option>
                                       <option selected="" value='{{ $context->paracontext->ctitle }}'>{{ $context->paracontext->ctitle }}</option>
                                    </select>
                                </div>
                                 <input type="text" name="cnote" value="{{ $context->paracontext->cnote }}" class="note">

                                <textarea name="cpara" id="chi-context-area" value="{{ $context->cparagraph }}">{{ $context->cparagraph }} 
                                </textarea>
                                
                            </div>
                            <div class="english-context">
                                <h5>English</h5>
                                <div class="first-row">
                                    <input type="text" name="esource" value="{{ $context->esource }}" required="">
                                </div>
                                <div class="second-row">
                                    <select id='article-title-eng' name="etitle">
                                        <option></option>
                                       <option selected="" value='{{ $context->paracontext->etitle }}'>{{ $context->paracontext->etitle }}</option>
                                    </select>
                                </div>
                                <input type="text" name="enote" value="{{ $context->paracontext->enote }}" class="note">

                                <textarea name="epara" id="eng-context-area"value="{{ $context->eparagraph }}">{{ $context->eparagraph }}  
                                </textarea>
                                
                            </div>
                            <hr>
                            <div style="width:100%; text-align: center;">
                                <button type="submit">submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
@endsection
