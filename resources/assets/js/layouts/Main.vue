<template>
  <section>
    <Header />
    <router-view />
    <Footer />
  </section>
</template>

<script>
// @ is an alias to /src
import Header from "@/components/Header.vue";
import Footer from "@/components/Footer.vue";

export default {
  name: "main",
  components: {
    Header,
    Footer
  }
};
</script>
