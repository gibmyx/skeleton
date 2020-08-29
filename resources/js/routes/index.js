import VueRouter from "vue-router";
import Vue from 'vue';
import store from "../stores";
Vue.use(VueRouter);



import not404 from "../componentes/NotFound";
import login from  "./../pages/login/router";
import dashboard from  "./../pages/dashboard/router";
import articulos from "./../pages/articulos/router";
// import categorias from "./../pages/categorias/router";
// import proveedores from "./../pages/proveedores/router";

const router = new VueRouter({
    mode: 'history',
    routes: [
        ...login,
        ...dashboard,
        ...articulos,
        // ...categorias,
        // ...proveedores,
        //mensaje 404
        {
            path: '*',
            component: not404
        }
    ],
});


router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!store.getters.loggedIn) {
            next({
                name: 'login',
            })
        }else {
            next()
        }
    } else if (store.getters.loggedIn && ( to.name === 'login' || to.name === 'register' )) {
        next({
            name: 'dashboard',
        })
    }  else {
        next() // make sure to always call next()!
    }
})

export default router;
