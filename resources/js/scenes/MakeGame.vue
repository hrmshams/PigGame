<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    
                    <div class="card-header">Make Game</div>
                    <div class="container my-3">
                    
                        <form>
                            <label>Game Name</label>
                            <input type="text" class="form-control" id="maximumScore" placeholder="0" v-model="name">

                            <div class="mb-4"></div>

                            <label>Maximum Score</label>
                            <input type="text" class="form-control" id="maximumScore" placeholder="0" v-model="maximumScore">

                            <div class="mb-4"></div>

                            <label>Zero Maker Dice Numbers</label>
                            <input type="text" class="form-control" id="maximumScore" placeholder="0" v-model="zeroMaker">
                            <small class="form-text text-muted">enter dice/s number which throwing them makes current point zero.</small>

                            <div class="mb-4"></div>

                            <label>Maximum Dice Throwing Number</label>
                            <input type="text" class="form-control" id="maximumScore" placeholder="0" v-model="maximumThrow">

                            <div class="mb-4"></div>

                            <label>aNumbers Of Dices</label>
                            <div>
                                <div class="btn-group btn-group-toggle" >
                                    <input type="radio" id="one" name="num" checked value="1" v-model="dicesNumber">  &nbsp;1 &nbsp;
                                    <input type="radio" id="two" name="num" value="2" v-model="dicesNumber"> &nbsp; 2 &nbsp;
                                    <input type="radio" id="four" name="num" value="4" v-model="dicesNumber"> &nbsp; 4 &nbsp;
                                </div>
                            </div>

                            <div class="mb-4"></div>
                        </form>
                        <button class="btn btn-primary" v-on:click= "addGame">Submit</button>
                    </div>
                        <div class="container mb-3">
                            {{response}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {addGame} from '../controller/apiConnector.js'
    export default {
        data(){
            return {
                name : 'your game',
                maximumScore : '100',
                zeroMaker : '1 6',
                maximumThrow : 10,
                dicesNumber : "1",

                response : ''
            }
        },
        methods : {
            addGame : function(){
                let self = this

                let obj = {
                    name: this.name,
                    maximumScore: this.maximumScore, 
                    zeroMaker: this.zeroMaker, 
                    maximumThrow: this.maximumThrow,
                    dicesNumber: this.dicesNumber
                }
                addGame(obj, (res)=>{
                    console.log(res)
                    self.response = 'MSG : ' + res.data
                }, (err)=> {
                    console.log(JSON.stringify(err))
                    self.response = 'ERROR : ' + err.response.data
                })
            }
        }
    }
</script>
