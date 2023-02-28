<template>

<div>
<div class="form-group">
        <label for="question-title">Question Title</label>
        <input type="text" name="title" id="question-title"  class="form-control" :class="{'is-invalid':false}">

 
            <div class="invalid-feedback">
                falha
            </div>
    
    
    </div>

    <div class="form-group">
        <label for="question-body">Explain your Question</label>
        <textarea  name="body" id="question-body" rows="10" class="form-control" :class="{'is-invalid':false}"></textarea>
    

            <div class="invalid-feedback">
                <strong>falha</strong>
            </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-outline-primary btn-lg">{{ this.buttonText }}</button>
    </div>
</div>
</template>

<script>
    export default{
        props:{
            buttonText:''
        },
        setup(){

        }
    }
</script>