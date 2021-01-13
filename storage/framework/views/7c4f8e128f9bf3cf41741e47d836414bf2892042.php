

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
                                                        <h5><?php echo e($user->name); ?></h5>
                                                        <span><?php echo e(isset($user->role_id)?\App\Util::getUserRole($user->role_id):null); ?></span><a href="#" class="material-icons">create</a><br>
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
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\others\lexenter\resources\views/modules/user/index.blade.php ENDPATH**/ ?>