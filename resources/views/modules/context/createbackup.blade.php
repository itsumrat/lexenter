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
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title text-warning text-center" id="exampleModalLabel">Warning</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p class="text-danger text-center">Chinese & English paragraph length does not same!</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <form action="{{ route('context.store') }}" method="POST">
                        @csrf
                        <div class="main-content create-context">
                            <div class="chinese-context">
                                <h5>Chinese</h5>
                                <div class="first-row">
                                    <input type="text" name="csource" placeholder="Source">
                                </div>
                                <div class="second-row">
                                    <select id='article-title-chi' name="ctitle" required="">
                                        <option></option>
                                       @foreach($contexts as $context)
                                       <option value='{{ $context->ctitle }}'>{{ $context->ctitle }}</option>
                                       @endforeach
                                    </select>
                                </div>
                                <textarea name="cnote" class="note" placeholder="Note"></textarea>

                                <textarea id="chi-context-area" name="cpara"> 
                                </textarea>
                                
                            </div>
                            <div class="english-context">
                                <h5>English</h5>
                                <div class="first-row">
                                    <input type="text" name="esource" placeholder="Source">
                                </div>
                                <div class="second-row">
                                    <select id='article-title-eng' name="etitle" required="">
                                        <option></option>
                                        @foreach($contexts as $context)
                                       <option value='{{ $context->etitle }}'>{{ $context->etitle }}</option>
                                       @endforeach
                                    </select>
                                </div>
                                <textarea name="enote" class="note" placeholder="Note"></textarea>

                                <textarea id="eng-context-area" name="epara">  
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
@section('script')
<script>
    var msg = '{{Session::get('warning')}}';
    var exist = '{{Session::has('warning')}}';
    if(exist){
      $('.modal').modal('show');
    }
    $(document).ready(function() {
       $("p:empty").remove();
    });
</script>
@endsection