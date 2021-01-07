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
                                                        <h5>{{$user->name}}</h5>
                                                        <span>{{ isset($user->role_id)?\App\Util::getUserRole($user->role_id):null }}</span><a href="#" class="material-icons">create</a><br>
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
      
@endsection