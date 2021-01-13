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
                    		<h1>context list</h1>
                    	</div>
                        <div class="main-content article-list">
                            <a href="{{route('context.create')}}" class="new-article-btn"><span class="material-icons">post_add</span>Create Contex</a>

                            <div class="file-upload">
                                <form action="{{ route('contex-import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose File</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" name="file" id="chooseFile">
                                        <span class="text-danger">{{ $errors->first('file') }}</span>
                                    </div>
                                    <button type="submit" class="btn import-btn"><span class="material-icons">publish</span> Import Contex</button>
                                </form>
                            </div>
                    		<table id="context-lists" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        {{-- <th>Article Title</th> --}}
                                        <th>Chi Context</th>
                                        <th>Eng Context</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($contexts as $context)
                                    <tr>
                                        <td>{!! $context->cparagraph !!}<br>
                                        </td>
                                        <td>
                                            {!! $context->eparagraph !!}<br>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="material-icons">more_vert</span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    {{-- <a href="{{ route('viewmore', $context->id) }}" class="context"><i class="material-icons">info</i> View more</a><br> --}}
                                                    <a href="#" class="context" data-id="{{$context}}" data-toggle="modal" data-target="#context-info-modal"><i class="material-icons">info</i> View more</a><br>
                                                    <a href="{{ route('editcontext', $context->id) }}"><span class="material-icons">create</span> Edit</a><br>
                                                    <a href="{{ route('addTermContext', $context->id) }}" class="contextEditTerm"><span class="material-icons">note_add</span>Add Term</a><br>
                                                                                                        <a class="admin-actionbtn favourite {{ $context->isBookmarked($context->id)>0?'booked':''}}" data-id="{{$context->id}}" >
                                                        <span class="material-icons">star_rate</span>Save                                       
                                                    </a> <br>
                                                    {!! Form::open(['method' => 'POST','route' => ['deleteContext', $context->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
                                                    <button class="admin-actionbtn delete-btn" type="submit">
                                                       <i class="material-icons">close</i> Delete
                                                    </button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$contexts->render()}}
                    	</div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      <!-- Context Information Modal -->
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
                                <div class="col-md-6">
                                    <div class="eng-context-info">
                                        <h5>Chinese</h5>
                                        <span id="carticle_code"></span><br>
                                        <span id="articleC"></span><br>
                                        <span id="ccontext_id"></span><br>
                                        <span id="csource"></span><br>
                                        <span id="corder"></span><br>
                                        <p><span>Term:</span><span id="cterm"></span></p>
                                        <span id="cnote"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="chi-context-info">
                                        <h5>English</h5>
                                        <span id="earticle_code"></span><br>
                                      
                                        <span id="articleE"></span><br>
                                        <span id="econtext_id"></span><br>
                                        <span id="esource"></span><br>
                                        <span id="eorder"></span><br>
                                        <p><span>Term:</span><span id="eterm"></span></p>
                                        <span id="enote"></span>
                                    </div>
                                </div>
                                <!--<div class="col-md-12">-->
                                <!--    <table class="table test">-->
                                <!--        <thead>-->
                                <!--            <tr>-->
                                <!--                <th>Chinese</th>-->
                                <!--                <th>English</th>-->
                                <!--            </tr>-->
                                <!--        </thead>-->
                                <!--        <tbody>-->
                                <!--            <tr>-->
                                <!--                <td id="carticle_code"></td>-->
                                <!--                <td id="earticle_code"></td>-->
                                <!--            </tr>-->
                                <!--            <tr>-->
                                <!--                <td id="articleC"></td>-->
                                <!--                <td id="articleE"></td>-->
                                <!--            </tr>-->
                                <!--            <tr>-->
                                <!--                <td id="ccontext_id"></td>-->
                                <!--                <td id="econtext_id"></td>-->
                                <!--            </tr>-->
                                <!--            <tr>-->
                                <!--                <td id="csource"></td>-->
                                <!--                <td id="esource"></td>-->
                                <!--            </tr>-->
                                <!--            <tr>-->
                                <!--                <td id="corder"></td>-->
                                <!--                <td id="eorder"></td>-->
                                <!--            </tr>-->
                                <!--            <tr>-->
                                <!--                <td id="cterm"></td>-->
                                <!--                <td id="eterm"></td>-->
                                <!--            </tr>-->
                                <!--            <tr>-->
                                <!--                <td id="cnote"></td>-->
                                <!--                <td id="enote"></td>-->
                                <!--            </tr>-->
                                <!--        </tbody>-->
                                <!--    </table>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Term Addition Modal -->
        <div class="modal fade" id="add-term-modal" tabindex="-1" role="dialog" aria-labelledby="add-term-modalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add-term-modalTitle">Context Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form class="term-add" action="{{ route('addTerm') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>English</h5>
                                        <span id="eparagraph"></span>
                                        <input multiple data-role="tagsinput" placeholder="Terms" name="eterms" class="term-input">
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Chinese</h5>
                                        <span id="cparagraph"></span>
                                        <input multiple data-role="tagsinput" placeholder="Terms" name="cterms" class="term-input">
                                    </div>
                                </div>
                                <input id="conId" type="hidden" name="conid">
                                <button type="submit">Add Terms</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')
<script>
    $(document).ready(function() {

        $( ".context" ).click(function() {
           var context = $(this).attr('data-id');
           var con = JSON.parse(context);

           
           var tt = con.temrs;
           $("#carticle_code").html("Article ID:" +  con.paracontext.article_code);
           $("#ccontext_id").html("Context ID:" +  con.context_no);
           $("#articleC").html("Article:" +  con.paracontext.ctitle);
           $("#corder").html("Context Order:" +  con.order);
           $("#csource").html("Source:"  + '<a href="" target="_blank">' + con.paracontext.csource + '</a>');
           $.each(tt, function(index, value){
                $("#cterm").append(" " + value.cterms + ',');
           });
           $("#cnote").html("Note:" +  con.paracontext.cnote);
           $("#earticle_code").html("Article ID:" +  con.paracontext.article_code);

           $("#econtext_id").html("Context ID:" +  con.context_no);
           $("#articleE").html("Article:" +  con.paracontext.etitle);
           $("#esource").html("Source:"  + '<a href="" target="_blank">' + con.paracontext.esource + '</a>');
           $("#eorder").html("Context Order:" +  con.order);
           $.each(tt, function(index, value){
                $("#eterm").append(" " + value.eterms + ',');
           });
           $("#enote").html("Note:" +  con.paracontext.enote);
        });

        $( ".contextEditTerm" ).click(function() {
           var contextt = $(this).attr('data-id');
           var conTerm = JSON.parse(contextt);
           console.log(conTerm);
           $("#eparagraph").html(conTerm.eparagraph);
           $("#cparagraph").html(conTerm.cparagraph);
           $("#conId").val(conTerm.id);
        });

        $( ".deleteContext" ).click(function() {
            var contextId = $(this).attr('data-id');
            if(contextId) {
                $.ajax({
                    url: '/deleteContext/'+contextId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        location.reload();
                        alert('Context successfully deleted');
                    }
                });
            }
        });
        
        //Bookmark
                $('.favourite').on('click',function(e){
             $(this).addClass("booked");


            // $(this).hide();
            var context_id = $(this).data("id");
            $.ajax({
                    type: 'POST',
                    url: "{{url('cbookmark/save')}}",
                    data: {
                        "context_id": context_id,
                        "_token": "{{ csrf_token() }}",
                        },
                    success: function (response) {
                        console.log(response);

                    }
                });
        });
    });
</script>
@endsection