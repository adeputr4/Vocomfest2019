@extends('frontend.layouts.main')

@extends('frontend.menu.page_navigation')

@section('title','Login')

    @section('content')
    <section  id="login-page" class=" ">
        <div class="overlay"></div>
        <div class="container">
            
            <div class="row bottom-animated">
                <div class="col-lg-8 col-xl-8 mx-auto">    
                    
                    <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex animated login-pulse infinite">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body">
                        
                        <form method="POST" action="{{ route('login') }}">
                            <h1 class="sec-title text-center">Login</h1>
                            <hr class="title-line" />

                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" name="leader_email" placeholder="Email address" required>
                                <label for="inputEmail">Email address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                                <label for="inputPassword">Password</label>
                            </div>
                        

                            <button class="btn form-btn btn-lg btn-green btn-block text-uppercase" type="submit">Masuk</button>
                            <a class="d-block text-center mt-2 small" href="{{route('register')}}">Daftar</a>
                            <hr class="my-4">
                            @csrf
                        </form>
                    </div>
                    </div>
                </div>
            </div>
                
        </div>
    </section>

@endsection