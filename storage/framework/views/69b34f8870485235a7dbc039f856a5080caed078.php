

<?php $__env->startSection("title", "Lexenter"); ?>

<?php $__env->startSection("content"); ?>
    <?php echo $__env->make("partials.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("partials.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                        <form action="<?php echo e(route('context.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="main-content create-context">
                            <div class="chinese-context">
                                <h5>Chinese</h5>
                                <div class="first-row">
                                    <input type="text" name="csource" placeholder="Source">
                                </div>
                                <div class="second-row">
                                    <select id='article-title-chi' name="ctitle" required="">
                                        <option></option>
                                       <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value='<?php echo e($article->id); ?>'><?php echo e($article->title_cn); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value='<?php echo e($article->id); ?>'><?php echo e($article->title_en); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
      
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    var msg = '<?php echo e(Session::get('warning')); ?>';
    var exist = '<?php echo e(Session::has('warning')); ?>';
    if(exist){
      $('.modal').modal('show');
    }
    $(document).ready(function() {
       //$("p:empty").remove();
       $('select[name="ctitle"]').on('change', function(event) {
            event.preventDefault();
            var cId = $(this).val();
            if(cId) {
                $.ajax({
                    url: '/getCtitle/'+cId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                      
                        $('select[name="etitle"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="etitle"]').append('<option value="'+ key +'">'+ value.title_en +'</option>').trigger('change');
                        });
                    }
                });
            }else{
                $('select[name="etitle"]').empty();
            }
        });

       // $('select[name="etitle"]').on('change', function(event) {
       //  event.preventDefault();
       //      var eId = $(this).val();
       //      if(eId) {
       //          $.ajax({
       //              url: '/getEtitle/'+eId,
       //              type: "GET",
       //              dataType: "json",
       //              success:function(data) {
                      
       //                  $('select[name="ctitle"]').empty();
       //                  $.each(data, function(key, value) {
       //                      $('select[name="ctitle"]').append('<option value="'+ key +'">'+ value.title_cn +'</option>').trigger('change');
       //                  });
       //              }
       //          });
       //      }else{
       //          $('select[name="ctitle"]').empty();
       //      }
       //  });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\others\lexenter\resources\views/modules/context/create.blade.php ENDPATH**/ ?>