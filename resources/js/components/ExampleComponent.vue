<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component1</div>

                    <div class="card-body" v-for="(d, index) in data" :key="index">
                        dude {{d.name}} has {{d.number}} votes
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary" v-on:click = "addNumber(index)">Vote</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                data: [
                {id : 1, name:'hamid', number:0},
                {id : 2, name:'reza', number:0},
            ]
            }
        },
        methods : {
            addNumber : function (i){
                console.log('access')
                this.data[i].number +=1;
            }
        }
    }
</script>
