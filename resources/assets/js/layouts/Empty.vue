<template>
  <div>
    <Header/>
      <router-view />
    <Footer />
  </div>

  <!--== Login Page Content End ==-->
</template>

<script>
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
export default {
  // name: "app",
  // data(){
  //     return {
  //       user: null,
  //       loading:false,
  //       initialized:false,
  //       req: axios.create({
  //           baseUrl:BASE_URL
  //       })
  //     }
  // } ,
  // mounted() {
  //   this.init();
  // }, 
  // methods:{
  //     init()
  //     {
  //         this.loading = true;

  //         this.req.get('auth/init').then(response => {
  //             this.user = response.data.user;
  //             this.loading = false;
  //             console.log(response.data.user);
  //             this.initialized = true;
  //         })
  //     }
  // },
  components: {
    Header,
    Footer
  }
};
</script>
