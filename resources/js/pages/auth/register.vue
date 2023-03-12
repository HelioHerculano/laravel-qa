<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form @submit.prevent="register">

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input v-model="form.name" id="name" type="text" class="form-control" :class="{ 'is-invalid': this.name }" name="name" autocomplete="name" autofocus>
                                <div v-if="this.name" id="validationServer03Feedback" class="invalid-feedback">
                                    {{ this.name }}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input v-model="form.email" id="email" type="text" class="form-control" :class="{ 'is-invalid': this.email }" name="email" autocomplete="email">
                                <div v-if="this.email" id="validationServer03Feedback" class="invalid-feedback">
                                    {{ this.email }}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">      
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input v-model="form.password" id="password" type="password" class="form-control" :class="{'is-invalid' : this.password }" name="password" autocomplete="new-password">
                                <div v-if="this.password" id="validationServer03Feedback" class="invalid-feedback">
                                    {{ this.password }}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                            <div class="col-md-6">
                                <input v-model="form.password_confirmation" id="password-confirm" type="password" class="form-control" :class="{'is-invalid' : this.password_confirmation}" name="password_confirmation" autocomplete="new-password">
                                <div v-if="this.password_confirmation" id="validationServer03Feedback" class="invalid-feedback">
                                    {{ this.password_confirmation }}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button  type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>

import { reactive,ref } from 'vue';
import { useRouter } from 'vue-router';
import { useStore } from 'vuex';

    export default{
        setup() {
            let form = reactive({
                name:'',
                email:'',
                password:'',
                password_confirmation:''
            });

            let error = ref([]);
            const router = useRouter();
            const store = useStore();

            const register = async() => {
     
            await axios.post('/api/register',form).then(res=>{
                if(res.data.success){
                store.dispatch('setToken',res.data.data.token);
                store.dispatch('setUserData',res.data.data.name);
                router.push({name:'Questions'});
                }else{
                    
                error.value = res.data.message;
                console.log(res.data.message);
                }
            })

            //console.log('Welcome');
            } 
            return{
            form,
            register,
            error
            };  
        },

        computed:{
            name(){
                if(this.error.name)
                    return this.error.name[0]
            },

            email(){
                if(this.error.email)
                    return this.error.email[0]
            },
            password(){
                if(this.error.password)
                    return this.error.password[0]
            },
            password_confirmation(){
                if(this.error.password_confirmation)
                    return this.error.password_confirmation[0]
            }
        }
      
    }
</script>