<template>
    <div class = "row">
        <user 
            v-if="users.length > 0"
            v-for = "(u, index) in users"
            v-bind:user = "u"
            v-bind:key="index"
        >
        </user>
        <p v-if= "users.length === 0">there is no user to show!</p>
    </div>
</template>

<script>
import user from './wrappers/user'

export default {
    components : {
        user
    },
    data() {
        return {
            users : []
        }
    },
    created() {
        //todo 
        this.users = [
            {
                username : 'hamid',
                isOnline : false,
                score : 100,
                played : 2,
            },
            {
                username : 'shams',
                isOnline : true,
                score : 200,
                played : 3,
            },
        ]      
    },
}
</script>