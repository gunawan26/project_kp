<template>
    <div id="home"> 
        <div><Navi/></div>
    </div>
</template>

<script>
import Navi from '@/js/components/Navi.vue';

export default {
    name: 'home',

    mounted(){
    },
    
    components:{
        Navi,
    },
    created: function(){
        this.items = JSON.parse(localStorage.getItem('user'))
    }
}
</script>