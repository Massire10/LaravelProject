<template>
    <div>
        <form class="form-inline mt-5 mb-2 float-right">
            <br>
            <input v-model="form.search" class="form-control mr-sm-2 my-2 my-sm-0" type="search" placeholder="Chercher par titre" aria-label="Search">
            <button @click="search(form.search)" class="form-control btn-dark mr-sm-2 my-2 my-sm-0">Search</button>
            <span v-if="role === 'admin'">
                <router-link to="/ajout" >
                    <button class="form-control btn-dark mr-sm-2 my-2 my-sm-0">Ajouter une recette</button>
                </router-link>
            </span>
        </form>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Ingrédients</th>
                    <th>Composants</th>
                    <th>Auteur</th>
                    <th>Date</th>
                    <th>Comment</th>
                    <th v-if="role === 'admin'">Modifier</th>
                    <th v-if="role === 'admin'">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(recipe, index) in recipes" :key="index">
                    <td>{{recipe.title}}</td>
                    <td>{{recipe.ingredients.substr(0, 60)}}...</td>
                    <td>{{recipe.content.substr(0, 60)}}...</td>
                    <td>{{recipe.author.data.name}}</td>
                    <td>{{ new Date(recipe.date).toLocaleDateString("fr-FR")}}</td>
                    <td>
                        <div v-for="(comment) in recipe.comments.data" :key="comment.id"  class="list-group">
                            <small>le {{ new Date(comment.date).toLocaleDateString("fr-FR")}}</small>
                            <small>{{comment.content}}</small>
                        </div>

                        <div v-if="recipe.comments.data.length === 0">
                            <small>pas de commentaires</small>
                        </div>
                    </td>
                    <td v-if="role === 'admin'">
                        <a @click.prevent="edit(recipe)" class="btn btn-primary bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>

                    </td>
                    <td v-if="role === 'admin'" >
                        <a @click.prevent="remove_recipe(recipe)" class="btn btn-danger bottom">
                            X
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="mt-2 float-right" >

           <nav aria-label="Page navigation example">
               <ul class="pagination justify-content-center">
                   <li class="page-item disabled">
                       <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Page {{pagination.current_page}} sur {{pagination.total_pages}}</a>
                   </li>
                   <li :class="pagination.current_page === index+1 ? 'active' : ''" v-for="(item,index) in pagination.total_pages" :key="index" class="page-item"><a @click="paginate(index+1)" class="page-link" href="#">{{index + 1}}</a></li>
               </ul>
           </nav>
        </div>
    </div>
</template>

<script>
import Swal from 'sweetalert2'
import formg from'../RecipeAddComponent.vue';

    export default {

        components: { formg },
            data(){
            return{
                form: {
                    title: "",
                    tags: "",
                    status: "",
                    url: "",
                    content: "",
                    ingredients: "",
                },
                recipes: [],
                pagination: {},
                role: {}
            }
        },
        methods: {
            search(title){
                this.$axios.get(`${this.api_url}/recipes?include=comments,author&filter[title]=${title}&page[size]=4`).then(res => {
                    this.recipes = res.data.data
                    this.pagination = res.data.meta.pagination
                }).catch(e => {
                    console.log(e);
                })
            },
            refresh(){
                this.$axios.get(`${this.api_url}/recipes?include=comments,author&page[size]=4`).then(res => {
                    this.recipes = res.data.data
                    this.pagination = res.data.meta.pagination
                }).catch(e => {
                    console.log(e);
                })
            },
            paginate(index) {
                this.$axios.get(`${this.api_url}/recipes?include=comments,author&page[size]=4&page[number]=${index}`).then(res => {
                    this.recipes = res.data.data
                    this.pagination = res.data.meta.pagination
                    console.log(this.recipes)
                }).catch(e => {
                    console.log(e);
                })
            },
            async edit(recipe) {

                console.log(recipe)

                const { value: formValues } = await Swal.fire({
                    title: 'Modifier la recette',
                    icon: 'info',
                    html:
                        `<input id="ttl" placeholder="titre" value="${recipe.title}" class="swal2-input">
                        <input id="ingredients" placeholder="ingredients" value="${recipe.ingredients}" class="swal2-textarea">
                        <input id="content" placeholder="composants" value="${recipe.content}" class="swal2-textarea">
                        <input id="date" placeholder="date" value="${recipe.date}" class="swal2-input">`,
                    focusConfirm: false,
                    preConfirm:  () => {
                         let obj =  {
                                title: document.getElementById('ttl').value,
                                ingredients: document.getElementById('ingredients').value,
                                content: document.getElementById('content').value,
                                date: document.getElementById('date').value
                            }

                            return obj
                    }
                })

                if (formValues) {
                    console.log(formValues)
                    this.$axios.put(`${this.api_url}/recipes/${recipe.id}`, formValues).then(res => {
                        Swal.fire({
                            icon: 'success',
                            html: 'Modifié avec succés',
                            focusConfirm: false,
                    })
                    this.refresh()
                }).catch(e => {
                    console.log(e);
                })
                }
            },

            async remove_recipe(recipe) {
                this.$axios.delete(`${this.api_url}/recipes/${recipe.id}`).then(res => {
                    Swal.fire({
                        icon: 'success',
                        html: 'Supprimé avec succés',
                        showCancelButton: true,
                        focusConfirm: false,
                    })
                    this.refresh()
                }).catch(e => {
                    console.log(e);
                })
            }
        },
        mounted() {
            this.role = this.$cookies.get('roles')
            console.log(this.role)
            this.refresh()
        },
    }
</script>

<style lang="scss" scoped>

</style>
