<template>
  <div>
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
                          <form v-on:submit.prevent="onSubmit" class="form-horizontal" method="POST" action="">

                              <div class="form-group">
                                  <label for="email"  class="col-md-4 control-label">E-Mail</label>

                                  <div class="col-md-6">
                                      <input id="email" v-model="email" type="email" class="form-control" required autofocus>


                                  </div>
                              </div>

                              <div class="form-group">
                                  <label for="password" class="col-md-4 control-label">Пароль</label>

                                  <div class="col-md-6">
                                      <input id="password" v-model="password" type="password" class="form-control" name="password" required>

                                  </div>
                              </div>
<!-- 
                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      <div class="checkbox">
                                          <label>
                                              <input type="checkbox" name="remember"> Запомнить меня
                                          </label>
                                      </div>
                                  </div>
                              </div> -->

                              <div class="form-group">
                                  <div class="button-block">
                                          <button type="submit" class='button-log'><i class="fa fa-sign-in"></i>Войти</button>
                                  <div class="col-md-6 col-md-offset-1">    
                                      <a class="btn btn-link" href="">
                                          Забыли пароль?
                                      </a>
                                  </div>
                                  </div>
                              </div>
                          </form>
                      </div>
                      <!-- <div class="login-other">
                            <span class="or">ИЛИ</span>
                            <a href="#" class="login-with-btn facebook"><i class="fa fa-facebook"></i> Войти через Facebook</a>
                            <a href="#" class="login-with-btn google"><i class="fa fa-google"></i> Войти через Google</a>
                          </div>
                          <div class="create-ac">
                            <p>У вас нет аккаунта? <a href="register.html">Зарегестрироваться</a></p>
                          </div> -->
              </div>
          </section>
      </div>


</template>
<script>
export default {
    name: 'login',
    props: ['app'],
    data(){
        return{
           email: '',
           password: '',
           errors: []
        }
    },
    methods: {
        onSubmit(){
            this.errors = [];

            if(!this.email){
                this.errors.push('E-mail обязателен!')
            }
            if(!this.password){
                this.errors.push('Пароль обязателен!')
            }
            if(!this.errors.lenght){
                const data = {
                    name: this.name,
                    email: this.email,
                    password: this.password
                }
                this.app.req.post('auth/login',data)
                .then(response =>{
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
