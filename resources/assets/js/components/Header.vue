<template>
  <header id="header-area" class="fixed-top">
    <!--== Header Bottom Start ==-->
    <div id="header-bottom">
      <div class="container">
        <nav class="navbar-expand-lg navbar-light bg-light">
            <div class="nav-logo">
              <router-link to="/">
              <span class="header-logo navbar-brand">E<span class="yellow-x">X</span>CLUSIVE</span>
            </router-link>

            <button class="navbar-toggler menu-btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            </div>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="collapse-ul">
                  <router-link to="/" tag="li" active-class="active" exact>
                    <a href="#">Главная</a>
                  </router-link>
                  <router-link to="/about" tag="li" active-class="active">
                    <a href="">О нас</a>
                  </router-link>
                  <router-link to="/car-detail" tag="li" active-class="active">
                    <a href="">Места</a>
                  </router-link>
                  <router-link to="/contact" tag="li" active-class="active">
                    <a href="">Контакты</a>
                  </router-link>
                  <router-link v-if="app.user" to="/createpost" tag="li" active-class="active">
                    <a href="">Добавить место</a>
                  </router-link>
                  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ app.user ? app.user.name : 'Авторизируйтесь' }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li v-if="!app.user">
                              <router-link to='/login' class="dropdown-item">Войти</router-link>
                            </li>
                            <li v-if="!app.user">
                              <router-link to='/register' class="dropdown-item">Зарегестрироваться</router-link>
                            </li>
                            <li v-else>
                              <a  @click='logout' href='javascript:;' class="dropdown-item">Выйти</a>
                            </li>
                                  
                        </ul>
                  </li>
                  </ul>
              </div>
            </nav>

      </div>
    </div>
    <div></div>
    <!--== Header Bottom End ==-->
  </header>
  
</template>

<script>
export default {
  name: 'navbar',
  props: ['app'],
  data(){
    return{

    }
  },
  methods: {
    logout()
    {
      this.app.req.post('auth/logout').then(() => {
        this.app.user = null;
        this.$router.push('/');
      });
    }
  }
}
</script>
