<template>
    <div class = "col-md-4">
        <div class = "card mb-4 shadow-sm">
            <div class="card-body text-center">
                <div class = "mb-4">
                    <h5 class = "card-text"> {{game.name}} </h5>
                </div>
                <p class = "card-text"> Score : {{game.score}} </p>
                <p class = "card-text"> Played : {{game.played}} </p>
                <button v-on:click = "playGame()" class="btn btn-primary"> play </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components :{
    },
    props :{
        game : Object
    },
    data() {
    },
    methods: {
        playGame : function(){
            console.log('acc')
        }
    },    
}
</script>

