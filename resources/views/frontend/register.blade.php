@extends('frontend.layouts.main')

@extends('frontend.menu.page_navigation')

@section('title','Register Page')

@section('content')
    
    <section  id="register-page">
        <div class="overlay"></div>
		<div class="container">
            
            <div class="row  bottom-animated">
                <div class="col-lg-8 col-xl-8 mx-auto">
                    <div class="card card-signin flex-row my-5">
                    
                        <div class="card-body">
                        <h1 class="sec-title text-center">Register</h1>
                        <hr class="title-line" />
                        @if($setting->is_active == false)
                            <p class="text-center"><strong>mohon maaf, priode registrasi telah di tutup</strong></p>
                        @else
                            <form  id="madc-form" class="form-signin" action="{{ route('register') }}" method="post">
                                <div class="row">
                                    <div class="col-md-5 offset-md-1">

                                        <div class="form-group" style="margin:.5rem 0rem .5rem">
                                            <label for="">Pilih Lomba :</label>
                                        </div>
                                        <div class="form-group">
                                            
                                            <select class="form-control" id="sel1" name="role">
                                                <option value="3">Web Design Competition</option>
                                                <option value="2">Mobile Apps Development Competition</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('team_name') ? ' is-invalid' : '' }}" id="teamName" placeholder="Nama Tim" name="team_name" value="{{ old('team_name') }}" required>
                                            @if ($errors->has('team_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('team_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('leader_name') ? ' is-invalid' : '' }}" id="leaderName"  placeholder="Nama Ketua" name="leader_name" value="{{ old('leader_name') }}" required>
                                            @if ($errors->has('leader_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('leader_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('leader_phone') ? ' is-invalid' : '' }}" id="leaderPhone"  placeholder="No Hp Ketua" name="leader_phone" value="{{ old('leader_phone') }}" required>
                                            @if ($errors->has('leader_phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('leader_phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            <input type="email" class="form-control{{ $errors->has('leader_email') ? ' is-invalid' : '' }}" id="leaderEmail"  placeholder="Email Ketua" name="leader_email" value="{{ old('leader_email') }}" required>
                                            @if ($errors->has('leader_email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('leader_email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Kata Sandi" name="password" required>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password-confirm" placeholder="Ulang Kata Sandi" name="password_confirmation" required>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-5">
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('instance_name') ? ' is-invalid' : '' }}" id="instanceName" placeholder="Nama Instansi" name="instance_name" value="{{ old('instance_name') }}" required>
                                            @if ($errors->has('instance_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('instance_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('instance_address') ? ' is-invalid' : '' }}"  placeholder="Alamat Instansi" name="instance_address" value="{{ old('instance_address') }}" required>
                                            @if ($errors->has('instance_address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('instance_address') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('co_leader_name') ? ' is-invalid' : '' }}" id="member1Name"  placeholder="Nama Anggota #1" name="co_leader_name" value="{{ old('co_leader_name') }}">
                                            @if ($errors->has('co_leader_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('co_leader_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('co_leader_email') ? ' is-invalid' : '' }}" id="member1Email" placeholder="Email Anggota #1" name="co_leader_email" value="{{ old('co_leader_email') }}">
                                            @if ($errors->has('co_leader_email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('co_leader_email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('co_leader_phone') ? ' is-invalid' : '' }}" id="member1Phone" placeholder="Nomor Hp Anggota #1" name="co_leader_phone" value="{{ old('co_leader_phone') }}">
                                            @if ($errors->has('co_leader_phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('co_leader_phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('member_1_name') ? ' is-invalid' : '' }}" id="member2Name" placeholder="Nama Anggota #2" name="member_1_name" value="{{ old('member_1_name') }}">
                                            @if ($errors->has('member_1_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('member_1_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('member_1_email') ? ' is-invalid' : '' }}" id="member2Email" placeholder="Email Anggota #1" name="member_1_email" value="{{ old('member_1_email') }}">
                                            @if ($errors->has('member_1_email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('member_1_email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('member_1_phone') ? ' is-invalid' : '' }}" id="member2Phone"  placeholder="No Hp Anggota #2" name="member_1_phone" value="{{ old('member_1_phone') }}">
                                            @if ($errors->has('member_1_phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('member_1_phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <input type="hidden" name="progress" value="0">
                                    
                                    </div>
                                    <div class="col-md-10 offset-md-1">
                                        <button class="btn btn-lg btn-green btn-block text-uppercase" type="submit">Daftar</button>
                                    <a class="d-block text-center mt-2 small" href="{{route('login')}}">Masuk</a>
                                        <hr class="my-4">
                                    </div>

                                </div>
                                @csrf
                            </form>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
                
		</div>
    </section>
@endsection
