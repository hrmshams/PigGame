<template>
<div>
<nav class="navbar navbar-expand-md navbar-dark bg-info">
    <a class="navbar-brand" href="#">PIG GAME</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto" v-if = "type === types.GUEST">
            <li class="nav-item">
                <a class="nav-link" :href="homePage">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="users">Users</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="login">Start Game</a>
            </li>
        </ul>

        <ul class="navbar-nav mr-auto" v-else-if = "type === types.USER">
            <li class="nav-item">
                <a class="nav-link" :href="homePage">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="makeGame">Make Game</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="games">Games</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="users">Users</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="startGame">Start Game</a>
            </li>
        </ul>

        <ul class="navbar-nav mr-auto" v-else-if = "type === types.ADMIN">
            <li class="nav-item">
                <a class="nav-link" :href="homePage">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="userReview">User Review</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="gameReview">Game Review</a>
            </li>
        </ul>

        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex" v-if="type === types.ADMIN || type === types.USER">
            <li class="nav-item">
                <a class="nav-link" href="profile">Profile</a>
            </li>
        </ul>

        <a class="btn btn-warning ml-md-3" href="login" v-if="type === types.GUEST">Log In</a>
        <a class="btn btn-danger ml-md-3" href="logout" v-if="type === types.ADMIN || type === types.USER">Log Out</a>

    </div>
</nav>
</div>
</template>

<script>
export default {
    data(){
        return {
            type : 'admin',
            types : {
                GUEST : 'guest',
                USER : 'user',
                ADMIN : 'admin',
            }
        }
    },
    created() {
        this.homePage = "http://127.0.0.1/myFirstSite/public/"
    },
    methods: {
        
    },
}
</script>