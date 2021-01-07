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
                            <span>Article ID: {{ $context->article_code }}</span><br>
                            <span id="enote">Article: {{ $context->paracontext->ctitle }}</span><br>
                            <span id="ccontext_id">Context ID: {{ $context->context_no }}</span><br>
                            <span id="enote">Source: {{ $context->paracontext->csource }}</span><br>
                            <span id="corder">Context Order: {{ $context->order }}</span><br>
                            Terms: 
                            @foreach($context->temrs as $cterm)
                            <span id="cterm">{{ $cterm->cterms }}</span>,
                            @endforeach
                            <br>
                            <span id="cnote">Note: {{ $context->paracontext->cnote }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="eng-context-info">
                            <h5>English</h5>
                            <p></p>
                            <span>Article ID: {{ $context->article_code }}</span><br>
                            <span id="enote">Article: {{ $context->paracontext->etitle }}</span><br>
                            <span id="context_id">Context ID: {{ $context->context_no }}</span><br>
                            <span id="enote">Source: {{ $context->paracontext->esource }}</span><br>
                            <span id="order">Context Order: {{ $context->order }}</span><br>
                            Terms: 
                            @foreach($context->temrs as $eterm)
                            <span id="eterm">{{ $eterm->eterms }}</span>,
                            @endforeach
                            <br>
                            <span id="enote">Note: {{ $context->paracontext->enote }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
@endsection
