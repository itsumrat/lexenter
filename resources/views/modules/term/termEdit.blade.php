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
                    		<h1>add new term</h1>
                    	</div>
                        <form action="{{ route('term.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $termcontext->id }}">
                        <div class="main-content create-context">
                            <div class="chinese-context">
                                <h5>Chinese</h5>
                                <div class="first-row">
                                    <input type="text" name="csource" required="" placeholder="Source" value="{{ $termcontext->termcontext->csource }}">
                                </div>
                                <input type="text" name="cnote" placeholder="Note" class="note" value="{{ $termcontext->termcontext->enote }}">

                                <textarea id="chi-context-area" name="cpara" value="{{ $termcontext->termcontext->cparagraph }}">{{ $termcontext->termcontext->cparagraph }} 
                                </textarea>
                                
                            </div>
                            <div class="english-context">
                                <h5>English</h5>
                                <div class="first-row">
                                    <input type="text" name="esource" placeholder="Source" required="" value="{{ $termcontext->termcontext->esource }}">
                                </div>
                                <input type="text" name="enote" required="" placeholder="Note" class="note" value="{{ $termcontext->termcontext->enote }}">

                                <textarea id="eng-context-area" name="epara" value="{{ $termcontext->termcontext->eparagraph }}">{{ $termcontext->termcontext->eparagraph }}  
                                </textarea>
                                
                            </div>
                        </div>
                        <div id="rowmore" class="optionBox">
                          <div class="row">
                            <div class="col-md-6">
                              <input type="text" name="cterms" data-role="tagsinput" value="{{ $termcontext->ctermst }}">
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="eterms" data-role="tagsinput" value="{{ $termcontext->etermst }}">
                            </div>
                          </div>
                        </div>
                        <div style="width:100%; text-align: center;">
                            <button class="btn btn-lg btn-info mt-2" type="submit">submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
@endsection
@section('script')

@endsection