import { createStore } from "vuex";

const store = createStore({

    state:{
        //define Variables
        token : localStorage.getItem('token') || 0,
        user:localStorage.getItem('name') || 0
    },
    mutations:{
        //update variable values
        UPDATE_TOKEN(state,payload){
            state.token = payload;
        },

        UPDATE_USER_DATA(state,payload){
            state.user = payload;
        }
    },
    actions:{
        //action to be performed
        setToken(context,payload){
            localStorage.setItem('token',payload);
            context.commit('UPDATE_TOKEN',payload);
        },
        setUserData(context,payload){
            localStorage.setItem('name',payload);
            context.commit('UPDATE_USER_DATA',payload);
        },
        removeToken(context){
            localStorage.removeItem('token');
            context.commit('UPDATE_TOKEN',0);
        },
        removeUserData(context){
            localStorage.removeItem('name');
            context.commit('DATE_USER_DATA',0);
        }
    },
    getters:{
         //get state variavel value
         getToken: function(state){
            return state.token;
        },
        getUserData: function(state){
            return state.user;
        }
    }

});

export default store;