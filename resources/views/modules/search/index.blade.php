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
                        <h1>
                            advance search
                        </h1>
                    </div>
                    <div class="search-box">
                        <form id="avanSearch" method="GET">
                            @csrf
                            <input class="search-term" id="termtext" placeholder="Search term with text" type="text">
                            <input class="search-term mt-2" id="contextsear" placeholder="Search context with text"
                                   type="text">
                            <button class="mt-2" type="submit">
                                search
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row" id="articleHide" style="display: none">
                <div class="col-12">
                    <div class="page-title">
                        <h5>
                            Full article
                        </h5>
                    </div>
                    <div class="main-content create-article">
                        <div class="english-article">
                            <h5 class="article-title" id="articleTitleE">
                            </h5>
                            <div class="article-content">
                                <p id="articleContentE">
                                </p>
                            </div>
                        </div>
                        <div class="chinese-article">
                            <h5 class="article-title" id="articleTitleC">
                            </h5>
                            <div class="article-content">
                                <p id="articleContentC">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="contextHide" style="display: none">
                <div class="col-lg-5">
                    <div class="chi-context-info">
                        <h5>Chinese Context</h5>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="eng-context-info">
                        <h5>English Context</h5>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-2"></div>
                <div id="showResult">
                </div>
            </div>
            <div class="row" id="termHide" style="display: none">
                <div id="showResultt">
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
        mark, .mark {
            background-color: #ffd600;
        }
    </style>
    <div aria-hidden="true" aria-labelledby="context-info-modalTitle" class="modal fade" id="context-info-modal"
         role="dialog" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="context-info-modalTitle">
                        Context Information
                    </h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="chi-context-info col-md-6">
                                <h5>
                                    Chinese
                                </h5>
                                <span id="articleIDc">
                            </span>
                                <br>
                                <span id="articleCm">
                                </span>
                                <br>
                                <span id="ccontext_id">
                                    </span>
                                <br>
                                <span id="csource">
                                        </span>
                                <br>
                                <span id="corder">
                                            </span>
                                <br>
                                <p>
                                                    <span>
                                                        Term:
                                                    </span>
                                    <span id="cterm">
                                                    </span>
                                </p>
                                <span id="cnote">
                                                </span>
                                </br>
                                </br>
                                </br>
                                </br>
                                </br>
                            </div>
                            <div class="eng-context-info col-md-6">
                                <h5>
                                    English
                                </h5>
                                <span id="articleIDe">
                            </span>
                                <br>
                                <span id="articleEm">
                                </span>
                                <br>
                                <span id="econtext_id">
                                    </span>
                                <br>
                                <span id="esource">
                                        </span>
                                <br>
                                <span id="eorder">
                                            </span>
                                <br>
                                <p>
                                                    <span>
                                                        Term:
                                                    </span>
                                    <span id="eterm">
                                                    </span>
                                </p>
                                <span id="enote">
                                                </span>
                                </br>
                                </br>
                                </br>
                                </br>
                                </br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" aria-labelledby="term-info-modalTitle" class="modal fade" id="term-info-modal" role="dialog"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="term-info-modalTitle">
                        Term Details
                    </h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="chi-context-info col-md-6">
                                <h5>
                                    Chinese
                                </h5>
                                <span id="cterm_no">
                            </span>
                                <br>
                                <span id="csourcet">
                                </span>
                                <br>
                                <span id="articleCtm">
                                    </span>
                                <br>
                                <p>
                                            <span>
                                                Term:
                                            </span>
                                    <span id="ctermt">
                                            </span>
                                </p>
                                <span id="cnotet">
                                        </span>
                                </br>
                                </br>
                                </br>
                            </div>
                            <div class="eng-context-info col-md-6">
                                <h5>
                                    English
                                </h5>
                                <span id="eterm_no">
                            </span>
                                <br>
                                <span id="esourcet">
                                </span>
                                <br>
                                <span id="articleEtm">
                                    </span>
                                <br>
                                <p>
                                            <span>
                                                Term:
                                            </span>
                                    <span id="etermt">
                                            </span>
                                </p>
                                <span id="enotet">
                                        </span>
                                </br>
                                </br>
                                </br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/mark.js/8.6.0/jquery.mark.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#avanSearch").submit(function (e) {
                e.preventDefault();
                var termtext = $('#termtext').val();
                var contextsear = $('#contextsear').val();
                if (contextsear) {
                    $.ajax({
                        url: '/advancedSearchContext/',
                        type: "GET",
                        data: {contextsear: contextsear, termtext: termtext},
                        dataType: "json",
                        success: function (data) {
                            var result = '';
                            if (data && data.length > 0) {
                                $.each(data, function (index, value) {
                                    var cont = value;
                                    result += '<div class="row">' +
                                        '<div class="col-md-5">' +
                                        '<div class="chi-context-info">' +
                                        '<span>' + value.cparagraph + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="col-md-5">' +
                                        '<div class="eng-context-info">' +
                                        '<span>' + value.eparagraph + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="col-md-2">' +
                                        '<a id="showmoreContext" class="showmoreContext context" data-id="' + value.id + '" data-target="#context-info-modal" data-toggle="modal" href="#">' +
                                        '<i class="material-icons">' +
                                        'info' +
                                        '</i>' +
                                        'View more' +
                                        '</a>' +
                                        '</div>' +
                                        '</div> <hr>'
                                });
                            } else {
                                result += '<div class="alert alert-warning"><b>Not found any result</b></div>'
                            }
                            $("#contextHide").show();
                            $("#showResult").html(result);

                            $(".showmoreContext").click(function (e) {
                                e.preventDefault();
                                var contextId = $(this).attr('data-id');
                                if (contextId) {
                                    $.ajax({
                                        url: '/showmoreContext/' + contextId,
                                        type: "GET",
                                        dataType: "json",
                                        success: function (data) {
                                            console.log(data);
                                            var tt = data.temrs;
                                            $("#articleIDc").html("Article ID:" + data.paracontext.article_code);
                                            $("#ccontext_id").html("Context ID:" + data.context_no);
                                            $("#articleCm").html("Article:" + data.paracontext.ctitle);
                                            $("#corder").html("Context Order:" + data.order);
                                            $("#csource").html("Source:" + '<a href="" target="_blank">' + data.paracontext.csource + '</a>');
                                            $.each(tt, function (index, value) {
                                                $("#cterm").append(" " + value.cterms + ',');
                                            });
                                            $("#cnote").html("Note:" + data.paracontext.cnote);

                                            $("#articleIDe").html("Article ID:" + data.paracontext.article_code);
                                            $("#econtext_id").html("Context ID:" + data.context_no);
                                            $("#articleEm").html("Article:" + data.paracontext.etitle);
                                            $("#esource").html("Source:" + '<a href="" target="_blank">' + data.paracontext.esource + '</a>');
                                            $("#eorder").html("Context Order:" + data.order);
                                            $.each(tt, function (index, value) {
                                                $("#eterm").append(" " + value.eterms + ',');
                                            });
                                            $("#enote").html("Note:" + data.paracontext.enote);
                                        }
                                    });
                                }
                            });
                        },
                        complete: function () {
                            $("#showResult").mark(contextsear, {});
                        },
                    });
                }
                if (termtext) {
                    $.ajax({
                        url: '/advancedSearchTerm/',
                        type: "GET",
                        data: {termtext: termtext},
                        dataType: "json",
                        success: function (data) {
                            var resultt = '';
                            if (data && data.length > 0) {
                                $.each(data, function (index, value) {
                                    var contt = value;
                                    resultt += '<div class="row">' +
                                        '<div class="col-md-5">' +
                                        '<div class="chi-context-info">' +
                                        '<h5>Chinese</h5>' +
                                        '<span id="">Article:' + value.termcontext.cparagraph + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="col-md-5">' +
                                        '<div class="eng-context-info">' +
                                        '<h5>English</h5>' +
                                        '<span id="">Article:' + value.termcontext.eparagraph + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="col-md-2">' +
                                        '<a id="showmoreTerm" class="showmoreTerm" data-id="' + value.id + '" data-target="#term-info-modal" data-toggle="modal" href="#">' +
                                        '<i class="material-icons">' +
                                        'info' +
                                        '</i>' +
                                        'View more' +
                                        '</a>' +
                                        '</div>' +
                                        '</div>'
                                });
                            } else {
                                resultt += '<div class="alert alert-warning"><b>Not found any result</b></div>'
                            }
                            $("#termHide").show();
                            $("#showResultt").html(resultt);

                            $(".showmoreTerm").click(function (e) {
                                e.preventDefault();
                                var termId = $(this).attr('data-id');
                                if (termId) {
                                    $.ajax({
                                        url: '/showmoreTerm/' + termId,
                                        type: "GET",
                                        dataType: "json",
                                        success: function (data) {
                                            $("#cterm_no").html("Term No:" + data.term_no);
                                            $("#csourcet").html("Source:" + '<a href="' + data.termcontext.csource + '" target="_blank">' + data.termcontext.csource + '</a>');
                                            $("#articleCt").html("Title:" + data.termcontext.cparagraph);
                                            $("#articleCtm").html("Title:" + data.termcontext.cparagraph);
                                            $("#ctermt").html("Term:" + data.ctermst);
                                            $("#cnotet").html("Note:" + data.termcontext.cnote);

                                            $("#eterm_no").html("Term No:" + data.term_no);
                                            $("#esourcet").html("Source:" + '<a href="' + data.termcontext.esource + '" target="_blank">' + data.termcontext.esource + '</a>');
                                            $("#articleEt").html("Title:" + data.termcontext.eparagraph);
                                            $("#articleEtm").html("Title:" + data.termcontext.eparagraph);
                                            $("#etermt").html("Term:" + data.etermst);
                                            $("#enotet").html("Note:" + data.termcontext.enote);
                                        }
                                    });
                                }
                            });
                        }
                    });
                }

            });
        });
    </script>
@endsection
