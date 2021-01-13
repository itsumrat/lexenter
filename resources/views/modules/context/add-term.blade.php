
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
                        <h1>add term</h1>
                    </div>
                    <form action="{{ route('addTerm') }}" method="POST">
                        @csrf
                        <input type="hidden" name="conid" value="{{ $context->id }}">
                    <div class="main-content create-context">
                        <div class="chinese-context">
                            <h5>Chinese</h5>
                            <textarea onkeyup="textAreaAdjust(this)" style="overflow:hidden" class="form-control" name="cparagraph" value="{{ $context->cparagraph }}" readonly="">{!! strip_tags($context->cparagraph) !!}
                            </textarea><br>
                            <textarea name="cnote" class="note" placeholder="Note"></textarea>
                            
                        </div>
                        <div class="english-context">
                            <h5>English</h5>
                            <textarea onkeyup="textAreaAdjust1(this)" style="overflow:hidden" class="form-control" name="eparagraph" value="{{ $context->eparagraph }}" readonly="">{!! strip_tags($context->eparagraph) !!}
                            </textarea><br>
                            <textarea name="enote" class="note" placeholder="Note"></textarea>
                            
                        </div>
                    </div>
                    <div id="rowmore" class="optionBox">
                      <div class="row">
                        <div class="col-md-5">
                          <input type="text" name="cterms[]" data-role="tagsinput" value="" placeholder="Add term">
                        </div>
                        <div class="col-md-5">
                          <input type="text" name="eterms[]" data-role="tagsinput" value="" placeholder="Add term">
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script type="text/javascript">
function textAreaAdjust(element) {
  element.style.height = "1px";
  element.style.height = (25+element.scrollHeight)+"px";
}

function textAreaAdjust1(element) {
  element.style.height = "1px";
  element.style.height = (25+element.scrollHeight)+"px";
}
  $(document).ready(function() {
    $("#rowadd").click( function(){
      var result = '<div class="row mt-2">'+
                '<div class="col-md-5">'+
                '<input type="text" name="cterms[]" data-role="tagsinput" value="" placeholder="Add term">'+
                '</div>'+
                '<div class="col-md-5">'+
                '<input type="text" name="eterms[]" data-role="tagsinput" value="" placeholder="Add term">'+
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
  .style-add-btn {
      width: 85px;
height: 45px;
line-height: 2.5;
  }
</style>
@endsection
