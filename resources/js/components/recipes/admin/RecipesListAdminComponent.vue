<template>
    <div>
        <form class="form-inline mt-5 mb-2 float-right">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Ingrédients</th>
                    <th>Composants</th>
                    <th>Auteur</th>
                    <th>Date</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(recipe, index) in recipes" :key="index">
                    <td>{{recipe.title}}</td>
                    <td>{{recipe.ingredients.substr(0, 60)}}...</td>
                    <td>{{recipe.content.substr(0, 60)}}...</td>
                    <td>Author</td>
                    <td>{{recipe.date}}</td>
                    <td>
                        <a @click.prevent="edit(recipe)" class="btn btn-primary bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                        
                    </td>
                    <td>
                        <a @click.prevent="edit(recipe)" class="btn btn-danger bottom">
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
                see: false
            }
        },
        methods: {
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
            async edit(recipe){
                this.see = true;
                const { value: text } = await Swal.fire({
                    
                    title: '<strong>HTML <u>example</u></strong>',
                    icon: 'info',
                    title: 'Submit your Github username',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    html:
                        ''+
                        'You can use <b>bold text</b>, ' +
                        '<a href="//sweetalert2.github.io">links</a> ' +
                        'and other HTML tags',
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText:
                        '<i class="fa fa-thumbs-up"></i> Great!',
                    confirmButtonAriaLabel: 'Thumbs up, great!',
                    cancelButtonText:
                        '<i class="fa fa-thumbs-down"></i>',
                    cancelButtonAriaLabel: 'Thumbs down'

                    // input: 'textarea',
                    // inputLabel: `Commentaire pour : ${recipe.title}`,
                    // inputPlaceholder: 'Ajouter votre commentaire...',
                    // inputAttributes: {
                    //     'aria-label': 'Type your message here'
                    // },
                    // showCancelButton: true,
                    // confirmButtonText: 'Valider',
                    // cancelButtonText: 'Annuler'
                })
            }
        },
        mounted() {
            this.refresh()
        },
    }
</script>

<style lang="scss" scoped>

</style>