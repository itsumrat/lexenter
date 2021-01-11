

<?php $__env->startSection("title", "Lexenter"); ?>

<?php $__env->startSection("content"); ?>

    <?php echo $__env->make("partials.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("partials.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    	<div class="page-title">
                    		<h1>Chinese : <?php echo e($post->title_cn); ?></h1>
                            <h1>English : <?php echo e($post->title_en); ?></h1>
                    	</div>
                        
                        <table id="article-list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Chinese</th>
                                        <th>English</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $post->allcontext; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $context): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo $context->cparagraph; ?></td>
                                        <td><?php echo $context->eparagraph; ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\others\lexenter\resources\views/modules/article/single.blade.php ENDPATH**/ ?>