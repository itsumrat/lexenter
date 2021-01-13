

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
                        <form action="<?php echo e(route('posteditcontext')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="main-content create-context">
                            <input type="hidden" name="conid" value="<?php echo e($context->id); ?>">
                            <div class="chinese-context">
                                <h5>Chinese</h5>
                                <div class="first-row">
                                    <input type="text" name="csource" value="<?php echo e($context->csource); ?>" required="">
                                </div>
                                <div class="second-row">
                                    <select id='article-title-chi' name="ctitle">
                                        <option></option>
                                       <option selected="" value='<?php echo e($context->paracontext->ctitle); ?>'><?php echo e($context->paracontext->ctitle); ?></option>
                                    </select>
                                </div>
                                 <input type="text" name="cnote" value="<?php echo e($context->paracontext->cnote); ?>" class="note">

                                <textarea name="cpara" id="chi-context-area" value="<?php echo e($context->cparagraph); ?>"><?php echo e($context->cparagraph); ?> 
                                </textarea>
                                
                            </div>
                            <div class="english-context">
                                <h5>English</h5>
                                <div class="first-row">
                                    <input type="text" name="esource" value="<?php echo e($context->esource); ?>" required="">
                                </div>
                                <div class="second-row">
                                    <select id='article-title-eng' name="etitle">
                                        <option></option>
                                       <option selected="" value='<?php echo e($context->paracontext->etitle); ?>'><?php echo e($context->paracontext->etitle); ?></option>
                                    </select>
                                </div>
                                <input type="text" name="enote" value="<?php echo e($context->paracontext->enote); ?>" class="note">

                                <textarea name="epara" id="eng-context-area"value="<?php echo e($context->eparagraph); ?>"><?php echo e($context->eparagraph); ?>  
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

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\others\lexenter\resources\views/modules/context/editcon.blade.php ENDPATH**/ ?>