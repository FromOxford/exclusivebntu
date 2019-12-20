import Vue from "vue";
import VueRouter from "vue-router";
import Home from '../views/Home'
import About from '../views/About'
import CarDetail from '../views/CarDetail'
import Contacts from '../views/Contacts'
import Login from '../views/Login'
import Register from '../views/Register'
import CreatePost from '../views/CreatePost'
Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "home",
    meta: { layout: "empty" },
    component: Home
  },
  {
    path: "/about",
    name: "about",
    meta: { layout: "empty" },
    component: About
  },
  {
    path: "/car-detail",
    name: "car-detail",
    meta: { layout: "empty" },
    component: CarDetail
  },
  {
    path: "/contact",
    name: "contact",
    meta: { layout: "empty" },
    component: Contacts
  },
  {
    path: "/login",
    name: "login",
    meta: { layout: "empty" },
    component: Login
  },
  {
    path: "/register",
    name: "register",
    meta: { layout: "empty" },
    component: Register
  },
  {
    path: "/createpost",
    name: "createpost",
    meta: { layout: "empty" },
    component: CreatePost
  },
]

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;
