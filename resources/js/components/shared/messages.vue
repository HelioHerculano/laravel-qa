<template>
    <div class="alert alert-{{ this.type }} alert-dismissible fade show" role="alert">
        <strong>{{ this.message }}</strong> {{ session('success') }}
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
    }
</script>