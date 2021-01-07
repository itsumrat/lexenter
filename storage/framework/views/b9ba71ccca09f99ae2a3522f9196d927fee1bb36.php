<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<title><?php echo $__env->yieldContent("title"); ?></title>



<!-- Fonts -->
<!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Styles -->
<link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
<link rel='stylesheet' href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/select2.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/tagsinput.css')); ?>">
<link rel="stylesheet" href="https://wfolly.firebaseapp.com/node_modules/sweetalert/dist/sweetalert.css">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">

</head>
<body>

  <div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="material-icons">view_week</i>
    </a>

    <?php echo $__env->yieldContent("content"); ?>
    <!-- page-content" -->
  </div>

<!-- page-wrapper -->
<!-- Scripts -->
<!--<script src="<?php echo e(asset('js/app.js')); ?>" defer></script>-->
<script src="<?php echo e(asset('assets/js/jquery-3.4.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/popper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/tagsinput.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdn.tiny.cloud/1/3i49hpqom10cbuezqaq684zomrslpeggexe815tzkurjiom7/tinymce/5/tinymce.min.js"></script>
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
<?php echo $__env->yieldPushContent('script'); ?>
<?php echo $__env->yieldContent("script"); ?>
<script>
	$('button.delete-btn').on('click', function(e){
   e.preventDefault();
   var self = $(this);
   swal({
       title             : "Are you sure?",
       text              : "You will not be able to recover this!",
       type              : "warning",
       showCancelButton  : true,
       confirmButtonColor: "#DD6B55",
       confirmButtonText : "Yes, Delete it!",
       cancelButtonText  : "No, Cancel delete!",
       closeOnConfirm    : false,
       closeOnCancel     : false
   },
   function(isConfirm){
       if(isConfirm){
           swal("Deleted!","It has been deleted", "success");
           setTimeout(function() {
               self.parents(".delete_form").submit();
           }, 2000); //2 second delay (2000 milliseconds = 2 seconds)
       }
       else{
             swal("Cancelled","It is safe", "error");
       }
   });
});
</script>
</body>
</html>



<?php /**PATH /opt/lampp/htdocs/longi/resources/views/layouts/app.blade.php ENDPATH**/ ?>