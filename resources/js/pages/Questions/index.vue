<template>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a @click.prevent="getQuestions" class="btn btn-outline-secondary">Ask Question</a>
                        </div>
                    </div>
                </div>
                   
                    <div class="card-body">  
                        <excerpt v-for="question in this.questions.data" :key="question.id" :model="question"/> 
                    </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
    import excerpt from './excerpt.vue'
    export default {
        components:{
            excerpt,
        },

        data() {
            return {
                model: true,
                questions:"",
            }
        },

        methods: {
            async getQuestions(){
                let response = await axios.get('/api/questions');
                  this.questions=response.data.dados;
                  console.log(this.questions.data)         
            } 
        },

        mounted() {
            this.getQuestions()
        },
    }
</script>