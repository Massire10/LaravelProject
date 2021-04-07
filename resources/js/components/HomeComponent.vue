<template>
    <div class="container pt-5">
        <div  class="row">
            <div v-for="(recipe, index) in recipes" :key="index" class="col card mx-2" style="width: 8rem;">
                <img class="card-img-top mt-2" :src="recipe.url" :alt="recipe.title" width="50px">
                <div class="card-body">
                    <h5 class="card-title">{{ recipe.title }}</h5>
                    <p class="card-text">{{recipe.content.substr(0, 60)}}...</p>
                    <div class="row">
                        <div class="col">
                            <a @click.prevent="detail(recipe)" class="btn btn-primary bottom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="col">
                            <a @click.prevent="comment(recipe)" class="btn btn-primary bottom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <hr>
                    Les commentaires :

                    <div v-for="(comment) in recipe.comments.data" :key="comment.id"  class="list-group">
                        <a class="list-group-item mt-1 list-group-item-action" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <small>le {{ new Date(comment.date).toLocaleDateString("en-US")}}</small>
                            </div>
                            <small>{{comment.content}}</small>
                        </a>
                    </div>

                    <div v-if="recipe.comments.data.length === 0">
                        <small>pas de commentaires</small>
                    </div>

                </div>
            </div>
        </div>

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

// CommonJS
export default {

    data(){
        return{
            form: {
                name: "",
                email: "",
                subject: "",
                message: ""
            },
            recipes: [],
            pagination: {}
        }
    },
    methods: {
        detail(recipe) {
            Swal.fire({
                title: `${recipe.title}`,
                icon: 'info',
                html:`<strong>Contenu</strong> : ${recipe.content} <br>  <strong>Ingrédients</strong> : ${recipe.ingredients} <br> <strong>Auteur</strong> : ${recipe.author.data.name} `,
                showCloseButton: true,
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

        async comment(recipe) {
            const { value: text } = await Swal.fire({
                input: 'textarea',
                inputLabel: `Commentaire pour : ${recipe.title}`,
                inputPlaceholder: 'Ajouter votre commentaire...',
                inputAttributes: {
                    'aria-label': 'Type your message here'
                },
                showCancelButton: true,
                confirmButtonText: 'Poster',
                cancelButtonText: 'Annuler'
            })

            if (text) {
                let obj = {
                    content: text,
                    recipe_id: recipe.id
                }
                this.$axios.post(`${this.api_url}/comment`, obj).then(res => {
                    Swal.fire('Votre commentaire a été bien ajouté')
                    this.refresh()
                }).catch(e => {
                    console.log(e);
                })
            }
        },

        refresh(){
            this.$axios.get(`${this.api_url}/recipes?include=comments,author&page[size]=4`).then(res => {
                this.recipes = res.data.data
                this.pagination = res.data.meta.pagination
            }).catch(e => {
                console.log(e);
            })
        }

    },
    mounted() {
        this.refresh()
    },
}
</script>
