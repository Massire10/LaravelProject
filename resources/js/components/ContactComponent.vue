<template>
    <div class="container pt-5">
        <form>
            <div class="form-group">
                <label for="name">Non complet</label>
                <input v-model="form.name" type="text" class="form-control" aria-describedby="name">
                <small id="name" class="form-text text-muted">Nom et Prénom.</small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input v-model="form.email" type="text" class="form-control" aria-describedby="email" placeholder="Entrer votre adresse email">
            </div>
            <div class="form-group">
                <label for="subject">Sujet</label>
                <input type="text" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea v-model="form.message" class="form-control" id="message" rows="3"></textarea>
            </div>
            <button type="submit" @click.prevent="send()" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</template>

<script>
import Swal from 'sweetalert2'
    export default {
        name: 'ContactComponent',
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                form:{
                    name: "",
                    email: "",
                    message: ""
                }
            }
        },
        methods: {
            send() {
                this.$axios.post(`${this.api_url}/contact`, this.form).then(res => {
                    Swal.fire({title : 'message envoyé', icon: 'success'})
                    this.form.name = "";
                    this.form.email = "";
                    this.form.message = "";
                }).catch(e => {
                    console.log(e);
                })
            }
        }
    }
</script>

<style>
</style>
