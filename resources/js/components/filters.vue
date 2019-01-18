<template>
    <div class="card card-default">
        <div class="card-header">Filters</div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" v-for="(item, index) in items" :key="index">
                <button type="button" class="btn btn-link" v-on:click = "item.onclick()">{{item.title}}</button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props : {
        items : Array
    },
    data() {
        return {
                        
        }
    },
    methods: {
        
    },
}
</script>