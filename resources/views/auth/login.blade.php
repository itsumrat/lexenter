<!DOCTYPE html>
<html lang="en" >
	<head>
		<!-- Meta setup -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="keywords" content="">
		<meta name="decription" content="">
		<meta name="author" content="Devcorn">
		
		<!-- Title -->
		<title>Lexenter</title>
		
		<!-- Fav Icon -->
		<link rel="icon" href="asset('assets/img/fav.png')">	
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

	</head>
	<body style="background-color: #202329; height: 100vh;">
		<div style="min-height: 100vh;display: flex;align-items: center;justify-content: center;">
			<div class="login">
				<h1 style="text-align: center;">Lexenter</h1>
				<!-- <form control="" action="context-list.php"> -->
                <form method="POST" action="{{ route('login') }}">
                            <span><i class="material-icons md-18">face</i></span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            <span class="lock-icon"><i class="material-icons md-18">lock</i></span>
                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

				</form>
			</div>
		</div>
	</body>
</html>
