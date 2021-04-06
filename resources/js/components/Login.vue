<template>

    <form>
        <h3 class="mt-3">Se connecter</h3>
        <div class="mb-3 mt-5">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input v-model="form.email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input v-model="form.password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input v-model="form.remember_me" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
        </div>
        <button @click="login" class="btn btn-dark">Sign in</button>
    </form>
</template>

<script>

// CommonJS
export default {

    data(){
        return{
            form: {
                email: "",
                password: "",
                remember_me: true,
            },
        }
    },
    methods: {
        login() {
            this.$axios.post(`${this.api_url}/auth/login`, this.form).then(res => {
                console.log('res', res)
                axios.defaults.headers.common['Authorization'] = 'bearer' + res.data.token;
                this.$cookies.set('token', res.data.token,res.data.token_validity);
                this.$router.push({name: 'home'})
            }).catch(e => {
                console.log(e);
            })
        },

    },
}
</script>
