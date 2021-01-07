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
                    		<h1>Profile</h1>
                    	</div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="profile-field">
                                {!! Form::open(['url' => '/profile/save','action' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data']) !!}
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                            {!! Form::file('image',['id' => 'imageUpload']); !!}
                                                <!-- <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" /> -->
                                                <label for="imageUpload"></label>
                                            </div>
                                            <div class="avatar-preview">
                                            <!-- {{$url = asset(Storage::url('app/public/avatars/'.$user->image))}} -->
                                                <div id="imagePreview" style="background-image: url('{{asset(Storage::url('app/public/avatars/'.$user->image))}}');">
                                        
                                                </div>
                                            </div>
                                        </div>
                                        {!!  Form::text('name',old('name',isset($user->name)
                                                        ?$user->name:''),['class' => '']); !!}
                                                        <span class="text-danger">
                                                            {{$errors->has('name') ? $errors->first('name') :'' }}
                                                        </span>
                                                        {!! Form::hidden('id',$user->id); !!}
                                        <!-- <input type="text" value="John Doe"> -->
                                        <!-- <input type="email" value="john.doe@gmail.com"> -->
                                        {!! Form::text('email',old('email',isset($user->email)
                                                        ?$user->email:''),['class' => '']); !!}
                                                        <span class="text-danger">
                                                            {{$errors->has('email') ? $errors->first('email') :'' }}
                                                        </span>

                                        @if ($user->role_id==1)
                                            {!! Form::select('role_id',\App\Util::getUserRole(),old('role_id',isset($user->role_id)
                                            ?$user->role_id:''),array('id' => 'role_id'),['placeholder'=>'Select One', 'readonly' => true
                                            ])!!}
                                        @else
                                        {!! Form::text(null,\App\Util::getUserRole($user->role_id),['readonly'=>true]); !!}
                                        @endif
                                            <br>
                                            {!! Form::text('role_id',old('role_id',isset($user->role_id)
                                            ?$user->role_id:''),['class' => '','disabled'=>'disabled']); !!}
                                            <span class="text-danger">
                                                {{$errors->has('role_id') ? $errors->first('role_id') :'' }}
                                            </span> 

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
@endsection