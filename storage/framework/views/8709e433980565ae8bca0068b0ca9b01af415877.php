

<?php $__env->startSection("title", "Lexenter"); ?>

<?php $__env->startSection("content"); ?>

    <?php echo $__env->make("partials.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("partials.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="page-title">
                            <h1>Term Search List</h1>
                        </div>
                        <div class="main-content article-list">
                            <table id="article-list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Search By</th>
                                        <th>Search Text</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $termSearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $search): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                        <?php echo e($search->userTerm ? $search->userTerm->name : 'No Found'); ?>

                                        </td>
                                        <td>
                                        <?php echo $search->search_end_ter; ?>

                                        </td>
                                        <td>
                                            <?php echo e(date('d-M-Y', strtotime($search->created_at))); ?>

                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="page-title">
                            <h1>Context Search List</h1>
                        </div>
                        <div class="main-content article-list">
                            <table id="search-list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Search By</th>
                                        <th>Search Text</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $contextSearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $search): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                        <?php echo e($search->userContext ? $search->userContext->name : 'No Found'); ?>

                                        </td>
                                        <td>
                                        <?php echo $search->search_end_con; ?>

                                        </td>
                                        <td>
                                            <?php echo e(date('d-M-Y', strtotime($search->created_at))); ?>

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
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\others\lexenter\resources\views/modules/search/searchHistory.blade.php ENDPATH**/ ?>