<template>
<div class="media post">

<div class="d-flex flex-column counters">
    <div class="vote">
        <strong>{{ this.model.votes_count }}</strong> {{  'votes' }}
    </div>
    <div class="status" :class="questionStatus" >
        <strong>{{ this.model.answers_count }}</strong> {{ 'answers' }}
    </div>

    <div class="view">
        {{ this.model.views + " " + "views"}}
    </div>
</div>

<div class="media-body">
    <div class="d-flex align-items-center">
        <h3 class="mt-0"><a href="">{{ this.model.title }}</a></h3>
        <div v-show="isLogged" class="ml-auto">
            <a href="" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-pen-to-square"></i></a>
            <a href="" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
        </div>
    </div>

        <p class="lead">
                Asked by 
                <a href="">{{ this.model.user.name }}</a>
                <small class="text-muted">{{ this.model.created_date }}</small>
            </p>
            <div class="excerpt">{{ this.body }}</div>
        </div>

</div>
</template>

<script>
    export default{
        props:['model'],
        setup() {
            
        },      
        computed:{
            body(){
                return this.model.body.substr(0,250) + '...';
            },
            isLogged(){
                if(localStorage.getItem('user')){
                    if(this.model.user.email == this.$store.getters.getUserData.email)
                        return true;
                }
                return false;
            },

            questionStatus(){
                if(this.model.answers_count > 0){
                    if(this.model.best_answer_id){
                        return 'answered-accepted';
                    }
                    return 'answered';
                }
                return "unanswered";
            }
        },

        mounted(){
            //console.log(this.model);    
        }

    } 
</script>

