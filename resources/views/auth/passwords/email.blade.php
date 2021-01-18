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
				<p style="text-align: center;">We will send password reset link to your email.</p>

                <form method="POST" action="{{ route('password.email') }}">
                        @csrf                         
                                <input id="email" type="email" placeholder="Type your email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset') }}
                                </button>
                    </form>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                
                
                <!-- <form control="" action="context-list.php">
					<input type="email" placeholder="Type your email">
					<button type="submit">Login</button>
					<a href="index.php">Back</a>
				</form> -->
			</div>
		</div>
	</body>
</html>