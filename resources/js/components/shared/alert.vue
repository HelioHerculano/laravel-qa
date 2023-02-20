<template>
    <div class="alert alert-dismissible fade show" role="alert">
        <strong>Alert</strong> {{ this.message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</template>

<script>
    export default{
        props:[
                'type',
                'message',
              ],

              mounted(){
                console.log(this.type)
              }
    }
</script>