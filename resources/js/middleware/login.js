import Vue from 'vue';
import cookies from 'vue-cookies'
Vue.use(cookies)


export default ({next, router}) => {
    if(cookies.get('token')) return router.push({ name: 'home' })
    next()
}
