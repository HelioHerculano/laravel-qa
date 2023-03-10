import { createStore } from "vuex";
import { VuexPersistence } from "vuex-persist";

const store = createStore({

    state:{

        user:localStorage.getItem('user') || 0,

    },
    mutations:{
       

        UPDATE_USER_DATA(state,payload){
            state.user = payload;
            //state.user = payload[0];
            //state.email = payload[1];
        }
    },
    actions:{
       
        setUserData(context,payload){
            localStorage.setItem('user',payload);
            //localStorage.setItem('name',payload[0]);
            //localStorage.setItem('email',payload[1]);
            context.commit('UPDATE_USER_DATA',payload);
        },
        
        removeUserData(context){
            localStorage.removeItem('user');
            //localStorage.removeItem('name');
            //localStorage.removeItem('email');
            context.commit('UPDATE_USER_DATA',0);
        }
    },
    getters:{
         //get state variavel value
         getToken: function(state){
            return state.user.token;
        },
        getUserData: function(state){
            return state.user;
        }
    },

    plugins:[
        new VuexPersistence({
            storage: window.localStorage
        }).plugin
    ]

});

export default store;