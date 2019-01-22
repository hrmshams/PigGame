<template>
    <div class = "col-md-4">
        <div class = "card mb-4 shadow-sm">
            <div class="card-body text-center">
                <div class = "mb-4">
                    <h5 class = "card-text"> {{game.name}} </h5>
                </div>
                <p class = "card-text"> rate : {{game.rate}} </p>
                <p class = "card-text"> Played : {{game.played}} </p>
                <a :href = "'gameScene/' + game.name" class = "btn btn-primary"> play </a>
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
    methods: {
        playGame : function(){

            console.log('acc')
        }
    },    
}
</script>

