<template>
<div>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">PIG GAME</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto" v-if = "type === consts.GUEST">
            <li class="nav-item">
                <a class="nav-link" :href="homePage">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="lists">Users</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="login">Start Game</a>
            </li>
        </ul>

        <ul class="navbar-nav mr-auto" v-else-if = "type === consts.USER">
            <li class="nav-item">
                <a class="nav-link" :href="homePage">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="lists">Make Game</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="login">Games</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="login">Users</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="login">Start Game</a>
            </li>
        </ul>

        <ul class="navbar-nav mr-auto" v-else-if = "type === consts.ADMIN">
            <li class="nav-item">
                <a class="nav-link" :href="homePage">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="lists">User Review</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="login">Game Review</a>
            </li>
        </ul>

    </div>
</nav>
</div>
</template>

<script>
export default {
    data(){
        return {
            consts : {
                GUEST : 'guest',
                USER : 'user',
                ADMIN : 'admin',
            },
            type : 'guest'
        }
    },
    created() {
        this.homePage = "http://127.0.0.1/myFirstSite/public/"
    },
    methods: {
        
    },
}
</script>