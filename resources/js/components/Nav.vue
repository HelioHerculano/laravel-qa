<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-5">
            <div class="container">
                <router-link class="navbar-brand" :to="{name:'Questions'}">
                    Laravel
                </router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                       
                                <li class="nav-item">
                                    <router-link class="nav-link" to="/login" v-if="$store.getters.getToken == 0">Login</router-link>
                                </li>
                            
                                <li class="nav-item">
                                    <router-link class="nav-link" :to="{name: 'Register'}" v-if="$store.getters.getToken == 0">Register</router-link>
                                </li>
                           
                            <li class="nav-item dropdown" v-if="$store.getters.getUserData != 0">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ this.$store.getters.getUserData }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" @click.prevent="logout">
                                        Logout
                                    </a>
                                </div>
                            </li>
                       
                    </ul>
                </div>
            </div>
        </nav>
</template>

<script>
import { useRouter } from "vue-router";
import { useStore } from "vuex";
    export default{
        
        setup() {

            const route = useRouter();
            const store = useStore();
            
            const logout = () =>{
                
                store.dispatch('removeToken')
                store.dispatch('removeUserData')
                store.dispatch('setUserData',0)
                //route.push({name:'Questions'})
                //alert('active')
            }

            return{
                logout
            }

        }
    }
</script>