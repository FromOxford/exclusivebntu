@extends('layouts.app')

@section('content')
не та регистрация
<!-- <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Зарегестрируйтесь</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Создав аккаунт вы сможете арендовать подходящий вам автомобиль</p>
                    </div>
                </div>
             
            </div>
        </div>
            <div class="panel-form">
                <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">

                                <div class="button-block">
                                    <button type="submit" class='button-log-register'><i class="fa fa-check-square"></i>Зарегестрироваться</button>
                                </div>

                        </div>
                    </form>
                  

                </div>
                </div>  
            </div>
    </section> -->

@endsection
