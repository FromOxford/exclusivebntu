<template>
    <div>
            <navbar :app='this'></navbar>
            <spinner v-if='loading' class="spinner"></spinner>
            <div v-else-if='initialized'><router-view :app='this' /></div>
            <Foot></Foot>
    </div>
</template>

<script>
// import Empty from "./layouts/Empty"
import navbar from "./components/Header"
import Foot from "./components/Footer"
export default {
  name: "app",
  data(){
      return {
        user: null,
        loading:false,
        initialized:false,
        req: axios.create({
            baseUrl: BASE_URL
        })
      }
  },
  mounted() {
    this.init();
  }, 
  methods:{
      init()
      {
          this.loading = true;

          this.req.get('auth/init').then(response => {
              this.user = response.data.user;
              this.loading = false;
              console.log(response);
              this.initialized = true;
          })
      }
  },
  
  computed:{
    // layout(){
    //   return (this.$route.meta.layout || "empty")
    // }
  },
  components:{
    navbar,Foot
  }
};
</script>