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
                        <form action="{{ route('term.store') }}" method="POST">
                        @csrf
                        <div class="main-content create-context">
                            <div class="chinese-context">
                                <h5>Chinese</h5>
                                <div class="first-row">
                                    <input type="text" name="csource" placeholder="Source">
                                </div>
                                <textarea name="enote" class="note" placeholder="Note"></textarea>

                                <textarea id="chi-context-area" name="cpara"> 
                                </textarea>
                            </div>
                            <div class="english-context">
                                <h5>English</h5>
                                <div class="first-row">
                                    <input type="text" name="esource" placeholder="Source">
                                </div>
                                <textarea name="enote" class="note" placeholder="Note"></textarea>
                                <textarea id="eng-context-area" name="epara">  
                                </textarea>
                                
                            </div>
                        </div>
                        <div id="rowmore" class="optionBox">
                          <div class="row">
                            <div class="col-md-5">
                              <input type="text" name="cterms[]" data-role="tagsinput" value="" placeholder="Add term">
                              <textarea class="form-control mt-2" name="cnotet[]" id="" cols="30" rows="3" placeholder="Note"></textarea>
                            </div>
                            <div class="col-md-5">
                              <input type="text" name="eterms[]" data-role="tagsinput" value="" placeholder="Add term">
                              <textarea class="form-control mt-2" name="enotet[]" id="" cols="30" rows="3" placeholder="Note"></textarea>
                            </div>
                            <a href="javascript:void(0)" id="rowadd" class="btn btn-sm btn-info mt-2 style-add-btn">Add</a>
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
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script type="text/javascript">
  $(document).ready(function() {
    $("#rowadd").click( function(){
      var result = '<div class="row mt-2">'+
                '<div class="col-md-5">'+
                '<input type="text" name="cterms[]" data-role="tagsinput" value="" placeholder="Add term">'+
                '<textarea class="form-control mt-2" name="cnotet[]" id="" cols="30" rows="3" placeholder="Note"></textarea>'+
                '</div>'+
                '<div class="col-md-5">'+
                '<input type="text" name="eterms[]" data-role="tagsinput" value="" placeholder="Add term">'+
                '<textarea class="form-control mt-2" name="enotet[]" id="" cols="30" rows="3" placeholder="Note"></textarea>'+
                '</div>'+
                '<a href="javascript:void(0)" class="btn btn-sm btn-danger remove mt-2 style-add-btn">Remove</a>'+
                '</div>'

      $("#rowmore").append(result);
      $('input[data-role=tagsinput]').tagsinput();
      $('.optionBox').on('click','.remove',function() {
          $(this).parent().remove();
      });
    });
  });
</script>
<style>
  .inputheight {
   height: 75px;
  }
  .style-add-btn {
      width: 85px;
height: 45px;
line-height: 2.5;
  }
</style>
@endsection
@section('script')

@endsection