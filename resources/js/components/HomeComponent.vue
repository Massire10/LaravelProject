<template>
    <div class="container pt-5">
        <div  class="row">
            <div v-for="(recipe, index) in recipes" :key="index" class="col card mx-2" style="width: 8rem;">
                <img class="card-img-top mt-2" :src="recipe.url" :alt="recipe.title" width="50px">
                <div class="card-body">
                    <h5 class="card-title">{{ recipe.title }}</h5>
                    <p class="card-text">{{recipe.content}}</p>
                    <a @click.prevent="detail(recipe)" class="btn btn-primary bottom">Voir Détails</a>
                    <a @click.prevent="comment(recipe)" class="btn mt-2 btn-primary bottom">Commenter</a>
                </div>
            </div>
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
            recipes: []
        }
    },
    methods: {
        detail(recipe) {
            Swal.fire('Hello world!')
        },
        async comment(recipe) {
            const { value: text } = await Swal.fire({
                input: 'textarea',
                inputLabel: 'Commentaire',
                inputPlaceholder: 'Ajouter votre commentaire...',
                inputAttributes: {
                    'aria-label': 'Type your message here'
                },
                showCancelButton: true
            })

            if (text) {
                let obj = {
                    content: text,
                    recipe_id: recipe.id
                }
                this.$axios.post(`${this.api_url}/comment`, obj).then(res => {
                    Swal.fire('Votre commentaire a été bien ajouté')
                }).catch(e => {
                    console.log(e);
                })
            }
        }

    },
    mounted() {
        axios.defaults.headers.common['Authorization'] = 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYxNzcwOTM2MiwiZXhwIjoxNjE3Nzk1NzYyLCJuYmYiOjE2MTc3MDkzNjIsImp0aSI6IkJqVDdKVkVCSFk2Q2pOdGsiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.y3Jz-IqnefoF7SQ2UBm88HRhzinht6Z17jhER5j6Q7M';

        this.$axios.get(`${this.api_url}/recipes?page[size]=4`).then(res => {
            this.recipes = res.data.recipes.data
        }).catch(e => {
            console.log(e);
        })
    },
}
</script>
