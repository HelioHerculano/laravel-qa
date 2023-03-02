<template>

<div>
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
import { reactive } from 'vue';
import { useStore } from 'vuex'

    export default{
        props:{
            buttonText:''
        },
        setup(){

            const store = useStore();

            let form = reactive({
                title:'',
                body:''
            })

           let askQuestion = async () => {
                await axios.post(`/api/askquestion/${store.getters.getUserData[1]}`,form).then(res=>{
                        console.log("Responsta"+res.data);
                    })
            }

            return{
                form,
                askQuestion
            }

        }
    }
</script>