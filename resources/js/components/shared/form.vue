<template>

<div>
    <form @submit.prevent="askQuestion">
        <div class="form-group">
            <label for="question-title">Question Title</label>
            <input v-model="form.title" type="text" name="title" id="question-title"  class="form-control" :class="{'is-invalid':this.title}">
                <div class="invalid-feedback">
                    {{this.title}}
                </div>  
        </div>

        <div class="form-group">
            <label for="question-body">Explain your Question</label>
            <textarea v-model="form.body" name="body" id="question-body" rows="10" class="form-control" :class="{'is-invalid':this.body}"></textarea>
                <div class="invalid-feedback">
                    <strong>{{ this.body }}</strong>
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
import { useStore } from 'vuex';
import alert from './alert.vue';

    export default{
        props:{
            buttonText:''
        },

        data() {
                return {
                    success:'',
                    errors:ref({}),
                    store:useStore(),
                    user:{},
                    form:reactive({
                            title:'',
                            body:''
                        }),
                }
            },

            methods: {
              
                async askQuestion() {
                await axios.post(`/api/askquestion/${this.store.getters.getUserData.id}`,this.form).then(res=>{
                    console.log(res.data.success);    
                    if(res.data.success){
                            this.resetField();
                            this.toast();
                            this.errors=ref({});
                        }else{
                            this.errors.value = res.data.message;
                            //console.log(this.errors.value.title[0])
                            //this.errors=ref({});
                        }
                    }).catch(function(error){
                        console.log(error);   
                    })
                },

                resetField () {
                    this.form.title = "";
                    this.form.body = "";
                },

                toast(){
                    
                        toastr.info("Asked Question", "Notificação", {
                            positionClass: "toast-top-right",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        })
                
                }

            },

            /*async mounted() {
                await axios.get('/api/user').then(res=>{
                    console.log(res.data);
                })
            },*/

            computed: {
                title(){
                    if(this.errors.value){
                        if(this.errors.value.title)
                            return this.errors.value.title[0];
                    }
                },
                body(){
                    if(this.errors.value){
                        if(this.errors.value.body)
                            return this.errors.value.body[0];
                    }
                }
            },

            components:{
                alert
            },   
    }
</script>