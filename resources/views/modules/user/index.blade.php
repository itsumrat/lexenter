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
                    		<h1>Users</h1>
                    	</div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                @foreach($users as $user)
                                    <div class="col-lg-6">
                                        <div class="card mb-3">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img src="{{asset(Storage::url('app/public/avatars/'.$user->image))}}" class="card-img" alt="..." style="padding: 0.8rem">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                    {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
                                                    <button class="delete-btn del-user" style="float: right;color: #007bff; border: none;background: none !important;" type="submit">
                                                    <span class="material-icons">delete_forever</span>
                                                    </button>
                                                    {!! Form::close() !!}
                                                        <h5>{{$user->name}}</h5>
                                                        <span>{{ isset($user->role_id)?\App\Util::getUserRole($user->role_id):null }}</span>
                                                        
                                                        <a href="#" id="edit_role" style="color: #333;font-size: 14px; data-toggle="modal" data-id={{$user->id}} class="material-icons">create</a><br>
                                                        <p>{{$user->email}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
                                       {!! Form::open(['route' => 'user.create','action' => 'POST']) !!}
                                            {!! Form::text('name',old('name'),['placeholder' =>
                                            'Full Name']); !!}
                                            <span class="text-danger">
                                                {{$errors->has('name') ? $errors->first('name') :'' }}
                                            </span>
                                            {!! Form::text('email',old('email'),['placeholder' =>
                                            'Email']); !!}
                                            <span class="text-danger">
                                                {{$errors->has('email') ? $errors->first('email') :'' }}
                                            </span>
                                            {!! Form::select('role_id',\App\Util::getUserRole(),
                                            array('id' => 'role_id'),['placeholder'=>'Select One',
                                            ])
                                            !!}
                                            <button type="submit">save</button>
                                        {!! Form::close() !!}
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
            {!! Form::open(['route' => 'user.update','action' => 'POST','name' => 'editRoleForm']) !!}
                        {!! Form::hidden('id',old('id'),['id' => 'id']); !!}                      
                        {!! Form::select('role_id',\App\Util::getUserRole(),
                                            array('id' => 'role_id'),['placeholder'=>'Select One', 'class'=> 'form-control'
                                            ])
                                            !!}
                        <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">save</button>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
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

@endsection