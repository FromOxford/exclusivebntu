@extends('layouts.app')

@section('content')
<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Авторизируйтесь</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Введите логин и пароль,чтобы войти</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>

            <div class="panel-form">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="button-block">
                                    <button type="submit" class='button-log'><i class="fa fa-sign-in"></i>Войти</button>
                            <div class="col-md-6 col-md-offset-1">    
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Забыли пароль?
                                </a>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="login-other">
                			<span class="or">ИЛИ</span>
                			<a href="#" class="login-with-btn facebook"><i class="fa fa-facebook"></i> Войти через Facebook</a>
                			<a href="#" class="login-with-btn google"><i class="fa fa-google"></i> Войти через Google</a>
                		</div>
                		<div class="create-ac">
                			<p>У вас нет аккаунта? <a href="register.html">Зарегестрироваться</a></p>
                		</div>
                		<div class="login-menu">
                			<a href="about.html">About</a>
                			<span>|</span>
                			<a href="contact.html">Contact</a>
                		</div>
                	</div>
    </div>
    </section>
    
   
@endsection
