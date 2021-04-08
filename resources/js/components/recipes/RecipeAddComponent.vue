<template>
    <div class="container pt-5">
        <div class="mt-3">
            <form>
                <div class="row mb-5">
                    <div class="col">
                        <label for="">Titre</label>
                        <input type="text" name="title" v-model="form.title" class="form-control" placeholder="Titre">
                    </div>
                    <div class="col">
                        <label for="">Tags</label>
                        <input type="text"  name="tags" v-model="form.tags" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <select class="form-control" v-model="form.status" placeholder="Statut">
                            <option value="disponible">Disponible</option>
                            <option value="rupture">En rupture de stock</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Lien de l'image</label>
                        <input type="text" name="title" v-model="form.url" class="form-control" placeholder="https://www.example.com/img.jpeg">
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <label for="">Composants</label>
                        <textarea v-model="form.content" class="form-control" placeholder=""></textarea>
                    </div>
                    <div class="col">
                        <label for="">Ingrédients</label>
                        <textarea v-model="form.ingredients" class="form-control" placeholder=""></textarea>
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
        data() {
            return{
                form: {
                    title: "",
                    tags: "",
                    status: "",
                    url: "",
                    content: "",
                    ingredients: ""
                }
            }
        },
        methods: {
            send() {

                this.$axios.post(`${this.api_url}/recipes`, this.form).then(res => {
                    Swal.fire({
                        icon: 'success',
                        html: 'Votre recette a été bien ajouté'
                    })
                }).catch(e => {
                    console.log(e);
                })
            }
        }
    }
</script>

<style>
</style>
