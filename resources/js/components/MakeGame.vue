<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    
                    <div class="card-header">Make Game</div>
                    <div class="container my-3">
                    
                        <form>
                            <label>Maximum Score</label>
                            <input type="text" class="form-control" id="maximumScore" placeholder="0">

                            <div class="mb-4"></div>

                            <label>Zero Maker Dice Numbers</label>
                            <input type="text" class="form-control" id="maximumScore" placeholder="0">
                            <small class="form-text text-muted">enter dice/s number which throwing them makes current point zero.</small>

                            <div class="mb-4"></div>

                            <label>Maximum Dice Throwing Number</label>
                            <input type="text" class="form-control" id="maximumScore" placeholder="0">

                            <div class="mb-4"></div>

                            <label>Number Of Dices</label>
                            <div>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-light active">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked> 1
                                </label>
                                <label class="btn btn-light">
                                    <input type="radio" name="options" id="option2" autocomplete="off"> 2
                                </label>
                                <label class="btn btn-light">
                                    <input type="radio" name="options" id="option3" autocomplete="off"> 4
                                </label>
                                </div>
                            </div>

                            <div class="mb-4"></div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
            }
        },
        methods : {
        }
    }
</script>
