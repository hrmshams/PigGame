<template>
    <div class = "row no-gutters">
        <div class="d-none d-xl-block col-xl-2 bd-toc">
            <filters v-bind:items = "filters"></filters>
        </div>

        <div class="col-12 col-md-9 col-xl-10">
            <div class = "album py-1">
                <div class = "container">

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

                </div>
            </div>
        </div>

    </div>

</template>

<script>
import user from '../components/user'
import filters from '../components/filters'
import {getUsers} from '../controller/apiConnector.js'

export default {
    components : {
        user,
        filters
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
                name : 'hamid',
                isOnline : false,
                score : 100,
                played : 2,
            },
        ]      
        this.filters = [
            {title : 'filter1', onclick : ()=>{console.log('1')}},
            {title : 'filter2', onclick : ()=>{console.log('2')}}
        ]

        this.getUsers()
    },
    methods: {
        getUsers : function(){
            var self = this
            getUsers((res)=>{
                self.users = res
                console.log(res[0].name)
            }, (err)=>{
            })
        }
    },
}
</script>