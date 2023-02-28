<template>

<div class="container">
    <div class="row justify-content-center">
        <div v-if="this.questions==''" class="spinner-grow" style="width: 10rem; height: 10rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="col-md-12">
            <div class="card" v-if="this.questions!=''">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <router-link class="btn btn-outline-secondary" to="/question/create">Ask Question</router-link>
                        </div>
                    </div>
                </div>
                   
                    <div class="card-body">  
                        <excerpt v-for="question in this.questions.data" :key="question.id" :model="question"/> 
                    </div>
            </div>
        </div>

        <Bootstrap4Pagination
        :data="this.questions"
        @pagination-change-page="getQuestions"
        class="mt-3"
    />

    </div>
</div>

</template>

<script>
    import excerpt from './excerpt.vue';
    import { Bootstrap4Pagination } from 'laravel-vue-pagination';
    export default {

        components:{
            excerpt,
            Bootstrap4Pagination
        },

        data() {
            return {
                model: true,
                questions:"",
            }
        },

        methods: {
            async getQuestions(page = 1){
                let response = await axios.get(`/api/questions?page=${page}`);
                  this.questions= await response.data.dados;
                  console.log(this.questions)         
            } 
        },

        mounted() {
            this.getQuestions()
        },
    }
</script>