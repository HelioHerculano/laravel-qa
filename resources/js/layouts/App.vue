<template>
    <div>
        <home/>
        <router-view></router-view>
    </div>
</template>

<script>
    import home from '../pages/Home/index.vue'

export default {
    
    components:{
        home
    }

}
</script>