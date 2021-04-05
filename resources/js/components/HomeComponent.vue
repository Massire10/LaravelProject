<template>
    <div class="container pt-5">
        <div class="row">
            <div class="col card mx-2" style="width: 8rem;">
                <img class="card-img-top mt-2" src="https://cuisine-facile.com/images/vignettes_150/697.jpg" alt="Card image cap" width="50px">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title</p>
                    <a href="#" class="btn btn-primary">Voir Détails</a>
                </div>
            </div>
            <div class="col card mx-2" style="width: 12rem;">
                <img class="card-img-top mt-2" src="https://cuisine-facile.com/images/vignettes_150/697.jpg" alt="Card image cap" width="100px">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title</p>
                    <a href="#" class="btn btn-primary">Voir Détails</a>
                </div>
            </div>
            <div class="col card mx-2" style="width: 12rem;">
                <img class="card-img-top mt-2" src="https://cuisine-facile.com/images/vignettes_150/697.jpg" alt="Card image cap" width="100px">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title</p>
                    <a href="#" class="btn btn-primary">Voir Détails</a>
                </div>
            </div>
            <div class="col card mx-2" style="width: 12rem;">
                <img class="card-img-top mt-2" src="https://cuisine-facile.com/images/vignettes_150/697.jpg" alt="Card image cap" width="100px">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title</p>
                    <a href="#" @click.prevent="detail()" class="btn btn-primary">Voir Détails</a>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
import Swal from 'sweetalert2'

// CommonJS
    export default {
        
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
            detail() {
                Swal.fire('Hello world!')
            }
        }
    }
</script>
