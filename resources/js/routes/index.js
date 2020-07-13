import VueRouter from "vue-router";
import Vue from 'vue';
Vue.use(VueRouter);



import not404 from "../componentes/NotFound";
import login from  "./../pages/login/router";
import dashboard from  "./../pages/dashboard/router";

const router = new VueRouter({
    mode: 'history',
    routes: [
        ...login,
        ...dashboard,
        //mensaje 404
        {
            path: '*',
            component: not404
        }
    ],
});

export default router;
