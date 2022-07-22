<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GPS</title>

    <!-- Bootstrap -->
	<link rel="stylesheet" href="style.css">
	<link href="{{ asset('public/login/style.css') }}" rel="stylesheet">

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	  <style>
    .img {
     
      box-shadow: 10px 10px 5px #ccc;
      -moz-box-shadow: 10px 10px 5px #ccc;
      -webkit-box-shadow: 10px 10px 5px #ccc;
      -khtml-box-shadow: 10px 10px 5px #ccc;
    }
  </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
           <form method="POST" action="{{ route('login') }}">
            @csrf
			
			
			<div class="content">
				<div><img   class="img" src="{{ asset('public/logo.jpg') }}" alt="Avatar" style="width:100px; border-radius: 50%;"> <br /> <p>GMA Present System</p><br></div>
					<div class="field">
						<span class="fas fa-user"></span>
						 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="field">
						<span class="fas fa-lock"></span>
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"placeholder="Password"  required autocomplete="current-password" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror	
					<input type="checkbox" class="form-checkbox"> Show password
					</div>
					<div class="forgot-pass"><a href="#">Forgot Password?</a></div>
					<button   type="submit" >sign in</button>
					<div class="signup">Not a member?
						<a href="#">signup now</a>
					</div>
			</div>
		
		
            
            
             
              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

               
              </div>
            </form>
          </section>
        </div>
    </div>
    </div>
  </body>
</html>
