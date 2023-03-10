<template>

<div>
    <alert class="alert-success" message="Question maked" v-show="success"></alert>
    <form @submit.prevent="askQuestion">
        <div class="form-group">
            <label for="question-title">Question Title</label>
            <input v-model="form.title" type="text" name="title" id="question-title"  class="form-control" :class="{'is-invalid':false}">
                <div class="invalid-feedback">
                    falha
                </div>  
        </div>

        <div class="form-group">
            <label for="question-body">Explain your Question</label>
            <textarea v-model="form.body" name="body" id="question-body" rows="10" class="form-control" :class="{'is-invalid':false}"></textarea>
                <div class="invalid-feedback">
                    <strong>falha</strong>
                </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-lg">{{ this.buttonText }}</button>
        </div>
    </form>
</div>
</template>

<script>
import { reactive,ref } from 'vue';
import { useStore } from 'vuex'
import alert from './alert.vue';

    export default{
        props:{
            buttonText:''
        },
        setup(){

            let error = ref('');
            const store = useStore();
            let success = ref('');
            let user={};

            let form = reactive({
                title:'',
                body:''
            })

           let askQuestion = async () => {
                await axios.post(`/api/askquestion/${store.getters.getUserData.id}`,form).then(res=>{
                        if(res.data.success){
                            success = res.data.success
                            console.log(success)
                        }else{
                            error.value = res.data.success;
                            // console.log(res.data.data.email);
                        }
                    })
            }

            return{
                form,
                askQuestion,
                error,
                success
            }
            
        },
            async mounted() {
                await axios.get('/api/user').then(res=>{
                    console.log(res.data);
                })
            },

            components:{
                alert
            }
    }
</script>