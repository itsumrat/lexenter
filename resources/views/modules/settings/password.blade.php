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
                    		<h1>change password</h1>

                    	</div>
                        <div class="row">
                            <div class="col-lg-5">

                                <div class="password-field">
                                {!! Form::open(['url' => '/changePassword/update','action' => 'POST']) !!}
                                  @csrf   
                                  @foreach ($errors->all() as $error)

                                    <p class="text-danger">{{ $error }}</p>

                                    @endforeach 

                                  {{Form::hidden('id',\Auth::user()->id)}}                       
                                  {{Form::password('oldpassword', array('id' => 'oldpassword','placeholder' => 'Old Password'))}}                       
                                  {{Form::password('newpassword', array('id' => 'newpassword','placeholder' => 'New password'))}}                       
                                  <button type="submit">save</button>
                                  {!! Form::close() !!}
                                  <p class="text-center text-success">{{Session::get('message')}}</p>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
@endsection