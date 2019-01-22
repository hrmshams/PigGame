<template>
    <div class = "row no-gutters">

        <div class="d-none d-xl-block col-xl-2 bd-toc">
            <filters v-bind:items = "filters"></filters>
        </div>

        <div class="col-12 col-md-9 col-xl-10 pl-2">
            <commentReview
                v-for="(c, index) in comments" :key="index"
                v-bind:data="c"
            >
            </commentReview>
        </div>

    </div>

</template>

<script>
import commentReview from '../components/commentReview'
import filters from '../components/filters'
import {getAdminReviews} from '../controller/apiConnector.js'

export default {
    components : {
        commentReview,
        filters
    },
    props : {
        type : String
    },
    data() {
        return {
            types : {
                USER_REVIEW : 'user',
                GAME_REVIEW : 'game'
            },
            comments : [],
            filters : []            
        }
    },
    created() {
        //todo 
        this.comments = [
            // {
            //     sender : 'mohammad',
            //     receiver : 'reza',
            //     comment : 'this is a cool game!',
            //     rate : 4
            // },
        ]      
        this.filters = [
            {title : 'filter1', onclick : ()=>{console.log('1')}},
            {title : 'filter2', onclick : ()=>{console.log('2')}}
        ]

        if (this.type === this.types.USER_REVIEW){
            // console.log('acc1')
            getAdminReviews(false, 
            (res)=>{
                this.comments = res.data
                console.log(res)
            }, (err)=>{
                console.log(err)
            })
        }else{
            // console.log('acc2')
            getAdminReviews(true,
            (res)=>{
                this.comments = res.data
                console.log(res)
            }, (err)=>{
                console.log(err)
            })
        }
    },
}
</script>