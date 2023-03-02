<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Ask Question</h2>
                        <div class="ml-auto">
                            <router-link class="btn btn-outline-secondary" to="/">Back to all Questions</router-link>
                        </div>
                    </div>
                </div>
                   
                    <div class="card-body">   
                        
                            <formCreateQuestion buttonText="Ask Question"/>
                        
                    </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>

    import formCreateQuestion from '../../components/shared/form.vue'
    export default{
        setup(){

        },

        components:{
            formCreateQuestion
        }
    }
</script>