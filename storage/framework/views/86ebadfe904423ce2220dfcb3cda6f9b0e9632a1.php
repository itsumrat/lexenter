<?php $__env->startSection("title", "Lexenter"); ?>

<?php $__env->startSection("content"); ?>

    <?php echo $__env->make("partials.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("partials.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    	<div class="page-title">
                    		<h1>Profile</h1>
                    	</div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="profile-field">
                                <?php echo Form::open(['url' => '/profile/save','action' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data']); ?>

                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                            <?php echo Form::file('image',['id' => 'imageUpload']);; ?>

                                                <!-- <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" /> -->
                                                <label for="imageUpload"></label>
                                            </div>
                                            <div class="avatar-preview">
                                            <!-- <?php echo e($url = asset(Storage::url('app/public/avatars/'.$user->image))); ?> -->
                                                <div id="imagePreview" style="background-image: url('<?php echo e(asset(Storage::url('app/public/avatars/'.$user->image))); ?>');">
                                        
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo Form::text('name',old('name',isset($user->name)
                                                        ?$user->name:''),['class' => '']);; ?>

                                                        <span class="text-danger">
                                                            <?php echo e($errors->has('name') ? $errors->first('name') :''); ?>

                                                        </span>
                                                        <?php echo Form::hidden('id',$user->id);; ?>

                                        <!-- <input type="text" value="John Doe"> -->
                                        <!-- <input type="email" value="john.doe@gmail.com"> -->
                                        <?php echo Form::text('email',old('email',isset($user->email)
                                                        ?$user->email:''),['class' => '']);; ?>

                                                        <span class="text-danger">
                                                            <?php echo e($errors->has('email') ? $errors->first('email') :''); ?>

                                                        </span>

                                        <?php if($user->role_id==1): ?>
                                            <?php echo Form::select('role_id',\App\Util::getUserRole(),old('role_id',isset($user->role_id)
                                            ?$user->role_id:''),array('id' => 'role_id'),['placeholder'=>'Select One', 'readonly' => true
                                            ]); ?>

                                        <?php else: ?>
                                        <?php echo Form::text(null,\App\Util::getUserRole($user->role_id),['readonly'=>true]);; ?>

                                        <?php endif; ?>
                                            <br>
                                            <?php echo Form::text('role_id',old('role_id',isset($user->role_id)
                                            ?$user->role_id:''),['class' => '','disabled'=>'disabled']);; ?>

                                            <span class="text-danger">
                                                <?php echo e($errors->has('role_id') ? $errors->first('role_id') :''); ?>

                                            </span> 

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
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lexenter/resources/views/modules/profile.blade.php ENDPATH**/ ?>