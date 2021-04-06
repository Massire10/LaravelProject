<template>
    <div class="container pt-5">
        <div class="mt-3">
            <form>
                <div class="row mb-5">
                    <div class="col">
                        <label for="">Titre</label>
                        <input type="text" name="title" v-model="title" class="form-control" placeholder="Titre">
                    </div>
                    <div class="col">
                        <label for="">Tags</label>
                        <input type="text"  name="tags" v-model="tags" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <select class="form-control" v-model="status" placeholder="Statut">
                            <option value="disponible">Disponible</option>
                            <option value="rupture">En rupture de stock</option>
                        </select>
                    </div>
                    <div class="col custom-file border">
                        <input type="file" class="custom-file-input" name="url" id="url" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choisir fichier</label>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <label for="">Composants</label>
                        <textarea v-model="content" class="form-control" placeholder=""></textarea>
                    </div>
                    <div class="col">
                        <label for="">Ingrédients</label>
                        <textarea v-model="ingredients" class="form-control" placeholder=""></textarea>
                    </div>
                </div>
                <button type="submit" @click.prevent="send()" class="btn btn-primary">Valider</button>
            </form>
        </div>
        
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
            'title': "",
            'tags': "",
            'status': "",
            'url': "",
            'content': "",
            'ingredients': ""
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
