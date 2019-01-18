<template>
    <div class = "row no-gutters">

        <div class="d-none d-xl-block col-xl-2 bd-toc">
            <filters v-bind:items = "filters"></filters>
        </div>

        <div class="col-12 col-md-9 col-xl-10">
            <div class = "album py-1">
                <div class = "container">

                    <div class = "row">
                        <game
                            v-if="games.length > 0"
                            v-for = "(g, index) in games"
                            v-bind:game = "g"
                            v-bind:key="index"
                        >
                        </game>
                        <p v-if= "games.length === 0">there is no game to show!</p>
                    </div>

                </div>
            </div>
        </div>

    </div>

</template>

<script>
import game from '../components/game'
import filters from '../components/filters'

export default {
    components : {
        game,
        filters
    },
    data() {
        return {
            games : [],
            filters : []
        }
    },
    created() {
        //todo 
        this.games = [
            {
                name : 'hamid',
                score : 100,
                played : 2,
            },
            {
                name : 'shams',
                score : 200,
                played : 3,
            },
        ]
        this.filters = [
            {title : 'filter1', onclick : ()=>{console.log('1')}},
            {title : 'filter2', onclick : ()=>{console.log('2')}}
        ]
    },
}
</script>