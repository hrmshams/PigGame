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
                    <users></users>
                </div>
            </div>
        </div>

    </div>
@endsection
