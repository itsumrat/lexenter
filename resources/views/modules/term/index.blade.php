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
                    		<h1>terms</h1>
                    	</div>
                    	<div class="main-content article-list">
                            <a href="{{ route('term.create') }}" class="new-article-btn"><span class="material-icons">post_add</span>Create New Term</a>
                    		<table id="article-list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Chinese</th>
                                        <th>English</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($termcontexts as $termc)
                                    <tr>
                                        <td>
                                            <span class="term-group">{{ $termc->ctermst }}</span><br>
                                            {!! $termc->termcontext->cparagraph !!}
                                        </td>
                                        <td>
                                            <span class="term-group">{{ $termc->etermst }}</span><br>
                                            {!!  $termc->termcontext->eparagraph !!}
                                        </td>
                                        <td>
                                        	<div class="dropdown">
                                                <a href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="material-icons">more_vert</span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a href="{{ route('editTerm', $termc->id) }}"><span class="material-icons">create</span> Edit</a><br>
                                                    <a href="#" class="termDetails" data-id="{{$termc}}" data-toggle="modal" data-target="#term-info-modal"><i class="material-icons">view_headline</i> Details</a><br>
                                                    {{-- <a href="{{ route('termDetails', $termc->id) }}"><span class="material-icons">view_headline</span>Details</a><br> --}}
                                                    {!! Form::open(['method' => 'POST','route' => ['deleteTerm', $termc->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
                                                    <button class="admin-actionbtn delete-btn" type="submit">
                                                       <i class="material-icons">close</i> Delete
                                                    </button>
                                                    {!! Form::close() !!}
                                                     {{-- <a href="#" data-id="{{ $termc->id }}" class="deleteTerm"><i class="material-icons">close</i> Delete</a><br> --}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    	</div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->

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
                                <div class="col-md-6">
                                    <div class="eng-context-info">
                                        <h5>Chinese</h5>
                                        <span id="cterm_no"></span><br>
                                        <span id="csource"></span><br>
                                        <span id="articleC"></span><br>
                                        <p><span>Term:</span><span id="cterm"></span></p>
                                        <span id="cnote"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="chi-context-info">
                                        <h5>English</h5>
                                        <span id="eterm_no"></span><br>
                                        <span id="esource"></span><br>
                                        <span id="articleE"></span><br>
                                        <p><span>Term:</span><span id="eterm"></span></p>
                                        <span id="enote"></span>
                                    </div>
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
        $( ".deleteTerm" ).click(function() {
            var termtId = $(this).attr('data-id');
            if(termtId) {
                $.ajax({
                    url: '/deleteTerm/'+termtId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        location.reload();
                        alert('Term Context successfully deleted');
                    }
                });
            }
        });

        $( ".termDetails" ).click(function() {
           var terms = $(this).attr('data-id');
           var con = JSON.parse(terms);
           console.log(con);
           var tt = con.temrs;
           $("#cterm_no").html("Term No:" +  con.term_no);
           $("#csource").html("Source:"  + '<a href="'+ con.termcontext.csource +'" target="_blank">' + con.termcontext.csource + '</a>');
           $("#articleC").html("Title:" +  con.termcontext.cparagraph);
           $("#cterm").html("Term:" +  con.ctermst);
           $("#cnote").html("Note:" +  con.termcontext.cnote);

           $("#eterm_no").html("Term No:" +  con.term_no);
           $("#esource").html("Source:"  + '<a href="'+ con.termcontext.esource +'" target="_blank">' + con.termcontext.esource + '</a>');
           $("#articleE").html("Title:" +  con.termcontext.eparagraph);
           $("#eterm").html("Term:" +  con.etermst);
           $("#enote").html("Note:" +  con.termcontext.enote);
        });
    });
</script>
@endsection