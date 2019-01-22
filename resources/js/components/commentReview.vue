<template>
    <div class="card bg-light mb-2">
        <div class="card-header">
        <p>sender : {{data.sender}}</p>
        <p>receiver : {{data.receiver || data.game_name}}</p>
        </div>
        <div class="card-body">
            <p class="card-text">{{data.comment}}</p>
            <button type="button" class="btn btn-success">Accept</button>
            <button type="button" class="btn btn-danger">Decline</button>
        </div>
    </div>
</template>

<script>
export default {
    props :{
        data : Object
    }
}
</script>