<template>
    <div class="card bg-light mb-2">
        <div class="card-header">{{data.sender}}</div>
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