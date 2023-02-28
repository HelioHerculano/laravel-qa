import { createStore } from "vuex";

const store = createStore({

    state:{
        //define Variables
        token : localStorage.getItem('token') || 0,
        user:localStorage.getItem('name') || 0,
        email:localStorage.getItem('email') || 0
    },
    mutations:{
        //update variable values
        UPDATE_TOKEN(state,payload){
            state.token = payload;
        },

        UPDATE_USER_DATA(state,payload){
            state.user = payload[0];
            state.email = payload[1];
        }
    },
    actions:{
        //action to be performed
        setToken(context,payload){
            localStorage.setItem('token',payload);
            context.commit('UPDATE_TOKEN',payload);
        },
        setUserData(context,payload){
            localStorage.setItem('name',payload[0]);
            localStorage.setItem('email',payload[1]);
            context.commit('UPDATE_USER_DATA',payload);
        },
        removeToken(context){
            localStorage.removeItem('token');
            context.commit('UPDATE_TOKEN',0);
        },
        removeUserData(context){
            localStorage.removeItem('name');
            localStorage.removeItem('email');
            context.commit('UPDATE_USER_DATA',[0,0]);
        }
    },
    getters:{
         //get state variavel value
         getToken: function(state){
            return state.token;
        },
        getUserData: function(state){
            return [state.user,state.email];
        }
    }

});

export default store;