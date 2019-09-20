<template>
    <div id="create-offer">
        <div class='navi'><Navi/></div>
        <div id="top-box">
            <form @submit="formSubmit">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email/Username</label>
                    <input v-model="email" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input v-model="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
            </form>
        </div>
    </div>
</template>

<script>
    import Navi from '@/js/components/Navi.vue';

    export default {
        name: 'create-offer',
        components:{
            Navi,
        }
    }
</script>

<style lang="scss" scoped>
    #top-box{
        box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0.2), 0 3px 5px 0 rgba(0, 0, 0, 0.1);
    }
</style>