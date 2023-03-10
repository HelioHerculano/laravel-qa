<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <alert class="alert-danger" :message="error" v-show="error"></alert>
            <div class="card">

                
              

                <div class="card-header">Login</div>

                <div class="card-body">
                    <form @submit.prevent="login">
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input v-model="form.email" id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input v-model="form.password" id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>


                                    <a class="btn btn-link">
                                        Forgot Your Password?
                                    </a>
                               
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
import alert from '../../components/shared/alert.vue'
    export default{
        setup() {
            let form = reactive({
                email:'',
                password:'',
            });

            let error = ref('');
            const router = useRouter();
            const store = useStore();

            const login = async() => {
     
            await axios.post('/api/login',form).then(res=>{
                if(res.data.success){
                //store.dispatch('setToken',res.data.data.token);
                store.dispatch('setUserData',res.data.data);
                router.push({name:'Questions'});
                console.log(res.data.data);
                }else{
                    
                error.value = res.data.message;
               // console.log(res.data.data.email);
                }
            })

            //console.log('Welcome');
            } 
            return{
            form,
            login,
            error
            };  
        },

        components:{
            alert,
        }
      
    }
</script>