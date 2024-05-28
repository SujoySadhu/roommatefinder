<!DOCTYPE html>
<html class="no-js" lang="en_AU" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>ERoomie</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/newstyle.css') }}" />
	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#" />
	<style>
		.navbar-custom {
			background: linear-gradient(90deg, rgba(245, 245, 245, 1) 0%, rgba(245, 245, 245, 0.8) 100%);
			color: black;
		}
		.navbar-custom .navbar-brand,
		.navbar-custom .nav-link,
		.navbar-custom .btn {
			color: black;
			font-weight: bold;
		}
		.navbar-custom .nav-link:hover,
		.navbar-custom .btn:hover {
			color: #FFD700;
		}
		.navbar-custom .navbar-toggler {
			border-color: rgba(0, 0, 0, 0.5);
		}
		.navbar-custom .navbar-toggler-icon {
			background-image: url('data:image/svg+xml;charset=utf8,%3Csvg viewBox%3D%220 0 30 30%22 xmlns%3D%22http://www.w3.org/2000/svg%22%3E%3Cpath stroke%3D%22rgba%280, 0, 0, 0.5%29%22 stroke-width%3D%222%22 stroke-linecap%3D%22round%22 stroke-miterlimit%3D%2210%22 d%3D%22M4 7h22M4 15h22M4 23h22%22/%3E%3C/svg%3E');
		}
		.navbar-custom .btn-primary {
			background-color: #FFD700;
			border-color: #FFD700;
			color: #000;
		}
		.navbar-custom .btn-outline-primary {
			border-color: #FFD700;
			color: #FFD700;
		}
		.navbar-custom .btn-outline-primary:hover {
			background-color: #FFD700;
			color: #000;
		}
	</style>
</head>
<body data-instant-intensity="mousedown">
<header>
	<nav class="navbar navbar-expand-lg navbar-custom shadow py-3">
		<div class="container">
			<a class="navbar-brand" href="{{ route('home') }}">ERoomie</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
					</li>	
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('jobs') }}">Search</a>
					</li>										
				</ul>		
				
				@if (Auth::check())
				<a class="btn btn-outline-primary me-2" href="{{ route('account.profile') }}" type="submit">Account</a>
				<a class="btn btn-primary" href="{{ route('account.createJob') }}" type="submit">Post a Job</a>
				@else
				<a class="btn btn-outline-primary me-2" href="{{ route('account.login') }}" type="submit">Login</a>
					
				@endif
				
				
			</div>
		</div>
	</nav>
</header>


@yield('main')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="profilePicForm" name="profilePicForm" action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="image"  name="image">
				<p class="text-danger" id="image-error"></p>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mx-3">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            
        </form>
      </div>
    </div>
  </div>
</div>

<footer class="bg-dark py-3 bg-2">
<div class="container">
    <p class="text-center text-white pt-3 fw-bold fs-6"> NoName company, all right reserved</p>
</div>
</footer> 
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>

<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
	
$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
});

$("#profilePicForm").submit(function(e){
    e.preventDefault();
	var formData=new FormData(this);

    $.ajax({
        url:'{{ route("account.updateProfilePic") }}',
        type:'post',
        datatype:'json',
		contentType:false,
		processData:false,

        data:formData,
        success:function(response){
			if(response.status==false){
                    var errors=response.errors;
                    if(errors.image){
                        $("#image-error")
                        .html(errors.image)
                    }
                    

				}else{
					window.location.href='{{ url()->current() }}';

				}		
              

            }
    });

});
</script>
@yield('customJs')
</body>
</html>
