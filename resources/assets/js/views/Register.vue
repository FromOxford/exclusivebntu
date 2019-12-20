<template>
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Зарегестрируйтесь</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Создав аккаунт вы сможете арендовать подходящий вам автомобиль</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
            <div class="panel-form">
                <div class="panel-body">
                <form v-on:submit.prevent="onSubmit" class="form-horizontal" method="POST" action="">
                        <div class="alert alert-danger" v-if='errors.length'>
                            <ul>
                                <li v-for="(error, index) in errors" :key="index">
                                    {{error}}
                                </li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Ваше Имя</label>

                            <div class="col-md-6">
                                <input id="name" v-model='name' type="text" class="form-control"  autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Ваш E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" v-model='email' class="form-control" name="email" value="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" v-model='password' type="password" class="form-control" name="password" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Повторите Пароль</label>

                            <div class="col-md-6">
                                <input id="password-confirm" v-model='passwordAgain' type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>

                        <div class="form-group">

                                <div class="button-block">
                                    <button type="submit" class='button-log-register'><i class="fa fa-check-square"></i>Зарегестрироваться</button>
                                </div>

                        </div>
                    </form>
                    <!-- <div class="login-other">
                			<span class="or">or</span>
                			<a href="#" class="login-with-btn facebook"><i class="fa fa-facebook"></i> Signup With Facebook</a>
                			<a href="#" class="login-with-btn google"><i class="fa fa-google"></i> Signup With Google</a>
                	</div> -->

                </div>
                </div>  
            
    </section>
</template>

<script>
export default {
    name: 'register',
    props: ['app'],
    data(){
        return{
           name: '',
           email: '',
           password: '',
           passwordAgain: '',
           errors: []
        }
    },
    methods: {
        onSubmit(){
            this.errors = [];

            if(!this.name){
                this.errors.push('Имя обязательно!')
            }
            if(!this.email){
                this.errors.push('E-mail обязателен!')
            }
            if(!this.password){
                this.errors.push('Пароль обязателен!')
            }
            if(!this.passwordAgain){
                this.errors.push('Повторите пароль!')
            }
            if(this.password != this.passwordAgain){
                this.errors.push('Пароли не совпадают!')
            }
            if(!this.errors.lenght){
                const data = {
                    name: this.name,
                    email: this.email,
                    password: this.password
                }
                console.log(data);
                 this.app.req.post('auth/register', data).then(response =>{
                    this.app.user = response.data;
                    this.$router.push('/');
                }).catch(error =>{
                    this.errors.push(error.response.data.error);
                })
            }
        }
    }
}
</script>