<template>
    <div class="container pt-5">
        <form>
            <div class="form-group">
                <label for="name">Non complet</label>
                <input type="text" class="form-control" id="name" aria-describedby="name">
                <small id="name" class="form-text text-muted">Nom et Prénom.</small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Entrer votre adresse email">
                <small id="email" class="form-text text-muted">ne jamais partager votre adresse email.</small>
            </div>
            <div class="form-group">
                <label for="subject">Sujet</label>
                <input type="text" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
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
        data: {
            'name': "",
            'email': "",
            'subject': "",
            'message': ""
        },
        methods: {
            send() {
                Swal.fire('Hello world!')
            }
        }
    }
</script>

<style>
</style>
