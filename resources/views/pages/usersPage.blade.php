@extends('layouts.main')

@section ('bodyContent')
    <div class = "row no-gutters">

        <div class="d-none d-xl-block col-xl-2 bd-toc">
            <div class="card card-default">
                <div class="card-header">Filters</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="#" class = "nav-link">Time of design</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class = "nav-link">by date</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class = "nav-link">score</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-9 col-xl-10">
            <div class = "album py-1">
                <div class = "container">
                    <div class = "row">

                        <div class = "col-md-4">
                            <div class = "card mb-4 shadow-sm">
                                <div class="card-body text-center">
                                    <div class = "mb-4">
                                        <h5 class = "card-text"> Hamid </h5> <span style = "color: crimson"> offline</span>
                                    </div>
                                    <p class = "card-text"> Score : 100 </p>
                                    <p class = "card-text"> Played : 4 </p>
                                    <a href="#" class="btn btn-primary">add to friends</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
