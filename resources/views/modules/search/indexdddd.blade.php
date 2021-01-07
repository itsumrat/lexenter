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
                    		<h1>advance search</h1>
                    	</div>
                        <div class="search-box">
                            <form id="avanSearch" method="GET">
                                @csrf
                                {{-- <select id="article" class="search-article-id">
                                    <option></option>
                                    @foreach($articles as $article)
                                    <option value="{{ $article }}">{{ $article }}</option>
                                    @endforeach
                                </select>
                                <select id="context" class="search-context-id">
                                    <option></option>
                                    @foreach($contexts as $context)
                                    <option value="{{ $context }}">{{ $context }}</option>
                                    @endforeach
                                </select>
                                <select id="term" class="search-term">
                                    <option></option>
                                    @foreach($terms as $term)
                                    <option value="{{ $term }}">{{ $term }}</option>
                                    @endforeach
                                </select> --}}
                                <input type="text" id="termtext" placeholder="Search term with text" class="search-term">
                                <input type="text" id="contextsear" placeholder="Search context with text" class="search-term mt-2">
                                <button type="submit" class="mt-2">search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="articleHide" class="row" style="display: none">
                    <div class="col-12">
                        <div class="page-title">
                            <h5>Full article</h5>
                        </div>
                        <div class="main-content create-article">
                            <div class="english-article">
                                <h5 id="articleTitleE" class="article-title"></h5>
                                <div class="article-content">
                                    <p id="articleContentE"></p>
                                </div>
                            </div>
                            <div class="chinese-article">
                                <h5 id="articleTitleC" class="article-title"></h5>
                                <div class="article-content">
                                    <p id="articleContentC"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="contextHide"  class="row" style="display: none">
                    <div class="col-12">
                        <div class="page-title">
                            <h5>Context</h5>
                        </div>
                        <div class="main-content create-article">
                            <div class="eng-context-info">
                                <h5>Chinese</h5>
                                {{-- <span>Article ID: 1000000</span><br> --}}
                                <span id="articleC"></span><br>
                                {{-- <span id="ccontext_id"></span><br>
                                <span id="csource"></span><br>
                                <span id="corder"></span><br>
                                <p><span>Term:</span><span id="cterm"></span></p>
                                <span id="cnote"></span> --}}
                            </div>
                            <div class="chi-context-info">
                                <h5>English</h5>
                                {{-- <span>Article ID: 1000000</span><br> --}}
                                <span id="articleE"></span><br>
                                {{-- <span id="econtext_id"></span><br>
                                <span id="esource"></span><br>
                                <span id="eorder"></span><br>
                                <p><span>Term:</span><span id="eterm"></span></p>
                                <span id="enote"></span> --}}
                            </div>
                        </div>
                    </div>
                    <a href="#" class="context" data-id="" data-toggle="modal" data-target="#context-info-modal"><i class="material-icons">info</i> View more</a>
                </div>
                <div id="termHide" class="row" style="display: none">
                    <div class="col-12">
                        <div class="page-title">
                            <h5>Terms</h5>
                        </div>
                        <div class="main-content create-article">
                            <div class="chi-context-info">
                                <h5>Chinese</h5>
                                {{-- <span id="cterm_no"></span><br>
                                <span id="csourcet"></span><br> --}}
                                <span id="articleCt"></span><br>
                                {{-- <p><span>Term:</span><span id="ctermt"></span></p>
                                <span id="cnotet"></span> --}}
                            </div>
                            <div class="eng-context-info">
                                <h5>English</h5>
                                {{-- <span id="eterm_no"></span><br>
                                <span id="esourcet"></span><br> --}}
                                <span id="articleEt"></span><br>
                                {{-- <p><span>Term:</span><span id="etermt"></span></p>
                                <span id="enotet"></span> --}}
                            </div>
                        </div>
                    </div>
                    <a href="#" class="termDetails" data-id="" data-toggle="modal" data-target="#term-info-modal"><i class="material-icons">info</i> View more</a>
                </div>
                <div id="noComment" class="row" style="display: none">
                    <div class="col-12">
                        <div class="page-title">
                            <h5>No contents found</h5>
                        </div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      <style>
          .search-term {
              border: 1px solid rgb(230, 230, 230);
                border-radius: 0;
                height: 38px;
                width: 25%;
                padding-left: 0.75rem;
          }
      </style> 

       <div class="modal fade" id="context-info-modal" tabindex="-1" role="dialog" aria-labelledby="context-info-modalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="context-info-modalTitle">Context Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="chi-context-info col-md-6">
                                  <h5>Chinese</h5>
                                  <span>Article ID: 1000000</span><br>
                                  <span id="articleCm"></span><br>
                                  <span id="ccontext_id"></span><br>
                                  <span id="csource"></span><br>
                                  <span id="corder"></span><br>
                                  <p><span>Term:</span><span id="cterm"></span></p>
                                  <span id="cnote"></span>
                              </div>
                              <div class="eng-context-info col-md-6">
                                  <h5>English</h5>
                                  <span>Article ID: 1000000</span><br>
                                  <span id="articleEm"></span><br>
                                  <span id="econtext_id"></span><br>
                                  <span id="esource"></span><br>
                                  <span id="eorder"></span><br>
                                  <p><span>Term:</span><span id="eterm"></span></p>
                                  <span id="enote"></span>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="term-info-modal" tabindex="-1" role="dialog" aria-labelledby="term-info-modalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="term-info-modalTitle">Term Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="chi-context-info col-md-6">
                                <h5>Chinese</h5>
                                <span id="cterm_no"></span><br>
                                <span id="csourcet"></span><br>
                                <span id="articleCtm"></span><br>
                                <p><span>Term:</span><span id="ctermt"></span></p>
                                <span id="cnotet"></span>
                            </div>
                            <div class="eng-context-info col-md-6">
                                <h5>English</h5>
                                <span id="eterm_no"></span><br>
                                <span id="esourcet"></span><br>
                                <span id="articleEtm"></span><br>
                                <p><span>Term:</span><span id="etermt"></span></p>
                                <span id="enotet"></span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         $("#avanSearch").submit(function(e) {
           e.preventDefault(); 
           var article = $('#article').val();
           var context = $('#context').val();
           var term = $('#term').val();
           var termtext = $('#termtext').val();
           var contextsear = $('#contextsear').val();
           $.ajax({
               url: '/advancedSearchp/',
               type: "GET",
               data: {article:article, context:context, term:term, termtext:termtext, contextsear:contextsear},
               dataType: "json",
               success: function(data) {
                console.log(data);
                var tt = data.temrs;
                if (data.article_code) {
                    $("#articleHide").show();
                }else{
                  $("#noComment").show();
                }
                 $("#articleTitleE").html(data.title_en);
                 $("#articleContentE").html(data.content_en);
                 $("#articleTitleC").html(data.title_cn);
                 $("#articleContentC").html(data.content_cn);

                 if (data.context_no) {
                    $("#contextHide").show();
                    $("#ccontext_id").html("Context ID:" +  data.context_no);
                   $("#articleC").html("Article:" +  data.paracontext.ctitle);
                   $("#articleCm").html("Article:" +  data.paracontext.ctitle);
                   $("#corder").html("Context Order:" +  data.order);
                   $("#csource").html("Source:"  + '<a href="" target="_blank">' + data.paracontext.csource + '</a>');
                   $.each(tt, function(index, value){
                        $("#cterm").append(" " + value.cterms + ',');
                   });
                   $("#cnote").html("Note:" +  data.paracontext.cnote);

                   $("#econtext_id").html("Context ID:" +  data.context_no);
                   $("#articleE").html("Article:" +  data.paracontext.etitle);
                   $("#articleEm").html("Article:" +  data.paracontext.etitle);
                   $("#esource").html("Source:"  + '<a href="" target="_blank">' + data.paracontext.esource + '</a>');
                   $("#eorder").html("Context Order:" +  data.order);
                   $.each(tt, function(index, value){
                        $("#eterm").append(" " + value.eterms + ',');
                   });
                   $("#enote").html("Note:" +  data.paracontext.enote);
                 }else{
                  $("#noComment").show();
                }
                 $("#eparagraph").html(data.eparagraph);
                 $("#cparagraph").html(data.cparagraph);
                 if (data.term_no) {
                    $("#termHide").show();
                    $("#cterm_no").html("Term No:" +  data.term_no);
                   $("#csourcet").html("Source:"  + '<a href="'+ data.termcontext.csource +'" target="_blank">' + data.termcontext.csource + '</a>');
                   $("#articleCt").html("Title:" +  data.termcontext.cparagraph);
                   $("#articleCtm").html("Title:" +  data.termcontext.cparagraph);
                   $("#ctermt").html("Term:" +  data.ctermst);
                   $("#cnotet").html("Note:" +  data.termcontext.cnote);

                   $("#eterm_no").html("Term No:" +  data.term_no);
                   $("#esourcet").html("Source:"  + '<a href="'+ data.termcontext.esource +'" target="_blank">' + data.termcontext.esource + '</a>');
                   $("#articleEt").html("Title:" +  data.termcontext.eparagraph);
                   $("#articleEtm").html("Title:" +  data.termcontext.eparagraph);
                   $("#etermt").html("Term:" +  data.etermst);
                   $("#enotet").html("Note:" +  data.termcontext.enote);
                 }else{
                  $("#noComment").show();
                }
                 $("#eterms").html(data.etermst);
                 $("#cterms").html(data.ctermst);
               }
           });
       });
    });
</script>

@endsection