@extends("layouts.app")

@section("title", "Lexenter")

@section("content")

    @include("partials.sidebar")
    @include("partials.header")
        <main class="page-content">
            <div class="container-fluid">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-6">
                        <div class="chi-context-info">
                            <h5>Chinese</h5>
                            <span id="ccontext_id">Context ID: {{ $detail->termcontext->context_no }}</span><br>
                            <span id="enote">Source: {{ $detail->termcontext->csource }}</span><br>
                            <span id="corder">Title: {!! $detail->termcontext->cparagraph !!}</span><br>
                            Terms: 
                            <span id="cterm">{{ $detail->ctermst }}</span>
                            <br>
                            <span id="cnote">Note: {{ $detail->termcontext->cnote }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="eng-context-info">
                            <h5>English</h5>
                            <p></p>
                            <span id="context_id">Context ID: {{ $detail->termcontext->context_no }}</span><br>
                            <span id="enote">Source: {{ $detail->termcontext->esource }}</span><br>
                            <span id="order">Title: {!! $detail->termcontext->eparagraph !!}</span><br>
                            Terms: 
                            <span id="eterm">{{ $detail->etermst }}</span>
                            <br>
                            <span id="enote">Note: {{ $detail->termcontext->enote }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
@endsection
