<?php $__env->startSection("title", "Lexenter"); ?>

<?php $__env->startSection("content"); ?>

    <?php echo $__env->make("partials.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("partials.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    	<div class="page-title">
                    		<h1>Users</h1>
                    	</div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-6">
                                        <div class="card mb-3">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img src="<?php echo e(asset(Storage::url('app/public/avatars/'.$user->image))); ?>" class="card-img" alt="..." style="padding: 0.8rem">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                    <?php echo Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline', 'class'=>'delete_form']); ?>

                                                    <button class="del-user" type="submit">
                                                    <span class="material-icons">delete_forever</span>
                                                    </button>
                                                    <?php echo Form::close(); ?>

                                                        <h5><?php echo e($user->name); ?></h5>
                                                        <span><?php echo e(isset($user->role_id)?\App\Util::getUserRole($user->role_id):null); ?></span>
                                                        
                                                        <a href="#" id="edit_role" style="color: #333;font-size: 14px; data-toggle="modal" data-id=<?php echo e($user->id); ?> class="material-icons">create</a><br>
                                                        <p><?php echo e($user->email); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- <div class="col-lg-6">
                                        <div class="card mb-3">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img src="img/profile.jpg" class="card-img" alt="..." style="padding: 0.8rem">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5>John Doe</h5>
                                                        <span>Manager</span><a href="#" class="material-icons">create</a><br>
                                                        <p>john.doe@gmail.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="user-create-area">
                                    Create New Team Member
                                       <?php echo Form::open(['route' => 'user.create','action' => 'POST']); ?>

                                            <?php echo Form::text('name',old('name'),['placeholder' =>
                                            'Full Name']);; ?>

                                            <span class="text-danger">
                                                <?php echo e($errors->has('name') ? $errors->first('name') :''); ?>

                                            </span>
                                            <?php echo Form::text('email',old('email'),['placeholder' =>
                                            'Email']);; ?>

                                            <span class="text-danger">
                                                <?php echo e($errors->has('email') ? $errors->first('email') :''); ?>

                                            </span>
                                            <?php echo Form::select('role_id',\App\Util::getUserRole(),
                                            array('id' => 'role_id'),['placeholder'=>'Select One',
                                            ]); ?>

                                            <button type="submit">save</button>
                                        <?php echo Form::close(); ?>

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      <div class="modal" id="rolechange-modal" tabindex="-1" role="dialog" aria-labelledby="rolechange-modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rolechange-modalTitle">Change Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo Form::open(['route' => 'user.update','action' => 'POST','name' => 'editRoleForm']); ?>

                        <?php echo Form::hidden('id',old('id'),['id' => 'id']);; ?>                      
                        <?php echo Form::select('role_id',\App\Util::getUserRole(),
                                            array('id' => 'role_id'),['placeholder'=>'Select One',
                                            ]); ?>

                        <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">save</button>
                    <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
 <script type="text/javascript">
    $(document).ready(function () {

             /* Edit user */
             $('body').on('click', '#edit_role', function () {
            var user_id = $(this).data('id');
            $.get('user/'+user_id+'/edit', function (data) {
                console.log(data);
            $('#editRoleForm').html("Edit Role");
            $('#btn-update').val("Update");
            $('#btn-save').prop('disabled',false);
            $('#rolechange-modal').modal('show');
            $('#id').val(data.id);
            $('#role_id').val(data.role_id);
            

            })
            });


    });
</script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lexenter/resources/views/modules/user/index.blade.php ENDPATH**/ ?>