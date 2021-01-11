

<?php $__env->startSection("title", "Lexenter"); ?>

<?php $__env->startSection("content"); ?>

    <?php echo $__env->make("partials.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("partials.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    	<div class="page-title">
                    		<h1>articles</h1>
                    	</div>
                    	<div class="main-content article-list">
                            <a href="<?php echo e(route('article.create')); ?>" class="new-article-btn"><span class="material-icons">post_add</span>Create Article</a>
                            
                            <div class="file-upload">
                                <form action="<?php echo e(route('import')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose File</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div> 
                                        <input type="file" name="file" id="chooseFile">
                                    </div>
                                    <button type="submit" class="btn import-btn"><span class="material-icons">publish</span> Import Article</button>
                                </form>
                            </div>
                            <table id="article-list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Article ID</th>
                                        <th>Title</th>
                                        <th>Source</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><a href="<?php echo e(route('viewArticle', $article->id)); ?>"><?php echo e($article->article_code); ?>

                                        </a>
                                        </td>
                                        <td><?php echo e($article->title_en); ?> <br> <?php echo e($article->title_cn); ?></td>
                                        <td><?php echo e($article->source_cn); ?> <br> <?php echo e($article->source_en); ?></td>
                                        <td>
                                        <?php echo Form::open(['method' => 'DELETE','route' => ['article.destroy', $article->id],'style'=>'display:inline', 'class'=>'delete_form']); ?>

                                        <button class="admin-actionbtn delete-btn" type="submit">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <?php echo Form::close(); ?>

                                        <a class="admin-actionbtn" href="<?php echo e(route('article.edit',$article->id)); ?>">
                                    <span class="material-icons">create</span>
                                        </a> 
                                        <a class="admin-actionbtn favourite <?php echo e($article->isBookmarked($article->id)>0?'booked':''); ?>" data-id="<?php echo e($article->id); ?>" >
                                        <span class="material-icons">star_rate</span>                                       
                                         </a> 
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                    	</div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
 <script type="text/javascript">
    $(document).ready(function () {
            $('.favourite').on('click',function(e){
             $(this).addClass("booked");
            // $(this).hide();
            var article_id = $(this).data("id");

            $.ajax({
                    type: 'POST',
                    url: "<?php echo e(url('bookmark/save')); ?>",
                    data: {
                        "article_id": article_id,
                        "_token": "<?php echo e(csrf_token()); ?>",
                        },
                    success: function (response) {
                        console.log(response);

                    }
                });
        });
        // var table = $('#article-list').DataTable({
/*        $('#article-list').DataTable({
        // processing: true,
        // serverSide: true,
        // responsive: true,
        // ajax: "",     
        // columns: [
        //             {data: 'idtitle', name: 'Article ID & Title'},
        //             {data: 'title_cn', name: 'Chinese'},
        //             {data: 'title_en', name: 'English'},
        //             {data: 'source', name: 'Source'},
        //             {data: 'action', name: 'action', orderable: false, searchable: false}
        //             // {data: 'subdepartment', name: 'subdepartment', orderable: false, searchable: false}
        //         ]
        });*/
    });
</script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\others\lexenter\resources\views/modules/article/index.blade.php ENDPATH**/ ?>