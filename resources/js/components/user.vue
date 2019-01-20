<template>
    <div class = "col-md-4">
        <div class = "card mb-4 shadow-sm">
            <div class="card-body text-center">
                <div class = "mb-4">
                    <h5 class = "card-text"> {{user.name}} </h5> <span>{{user.isOnline ? "online" : "offline"}}</span>
                </div>
                <p class = "card-text"> rate : {{user.rate}} </p>
                <p class = "card-text"> Played : {{user.played}} </p>
                <button v-on:click = "addToFriends()" class="btn btn-primary"> add to friends </button>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    components :{
    },
    props :{
        user : Object
    },
    methods: {
        addToFriends : function(){
            console.log('acc')
        },
        getColor : function(){
            return user.isOnline ? 'green' : 'crimson'            
        }
    },    
}
</script>

