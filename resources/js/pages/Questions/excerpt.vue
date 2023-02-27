<template>
<div class="media post">

<div class="d-flex flex-column counters">
    <div class="vote">
        <strong>{{ this.model.votes_count }}</strong> {{  'votes' }}
    </div>
    <div class="status answered {{ this.model.status }}">
        <strong>{{ this.model.answers_count }}</strong> {{ 'answers' }}
    </div>

    <div class="view">
        {{ this.model.views + " " + "views"}}
    </div>
</div>

<div class="media-body">
    <div class="d-flex align-items-center">
        <h3 class="mt-0"><a href="">{{ this.model.title }}</a></h3>
        <div class="ml-auto">
            <a href="" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-pen-to-square"></i></a>

       
                <form class="form-delete" action="{{route('questions.destroy',$question->id)}}" method="post">
                    
                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are your sure?')"><i class="fa-solid fa-trash"></i></button>
                </form>
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
            }
        }
    } 
</script>

