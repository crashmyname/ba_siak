
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - BA SIAK FUJI</title>
    <link rel="stylesheet" href="{{asset('voler/dist/assets/css/bootstrap.css')}}">
    
    <link rel="shortcut icon" href="{{asset('img/ise.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('voler/dist/assets/css/app.css')}}">
    <link href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <div id="auth">
        
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="{{asset('image/fuji.jpg')}}" height="120" class='mb-4'>
                        <h3>Sign In BA_SIAK</h3>
                        <p>Please sign in to continue Apps.</p>
                    </div>
                    @if(session('alert'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function(){
                            Swal.fire({
                                title: '{{session('alert.title')}}',
                                text: '{{session('alert.text')}}',
                                icon: '{{session('alert.icon')}}',
                                confirmButtonText: 'OK',
                            });
                        })
                    </script>
                    @endif
                    <form action="{{route('onlogin')}}" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left">
                            <label for="username">Username</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" id="username" name="username">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Password</label>
                                {{-- <a href="auth-forgot-password.html" class='float-end'>
                                    <small>Forgot password?</small>
                                </a> --}}
                            </div>
                            <div class="position-relative">
                                <input type="password" class="form-control" id="password" name="password">
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <button type="submit" class="btn btn-primary float-end"><i class="bi bi-box-arrow-in-right"></i> Login</button>
                        </div>
                    </form>
                    <div class="divider">
                        <div class="divider-text">SIAK - APPS</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="{{asset('voler/dist/assets/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('voler/dist/assets/js/app.js')}}"></script>
    
    <script src="{{asset('voler/dist/assets/js/main.js')}}"></script>
</body>

</html>
