<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="120">
    <title>Rally MOB FT 2023</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    {{-- <script src="https://kit.fontawesome.com/55a9c97135.js" crossorigin="anonymous"></script> --}}
    {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/progress.css') }}">
</head>


<body>
    <div class="container text-center pb-5 mb-5 pb-md-0 mb-md-0">
        <div class="row my-md-3 justify-content-center">
            <div class="col-md-3 my-3">
                {{-- MAGIC --}}
                <div class="card card-rounded mx-3 mx-md-0">
                    <img class="h-75" src="{{ asset('image/progress/magic' . $img['Problem Solving'] . '.png') }}">
                    <div class="text-center pt-3" style="background-color: darkred">
                        <h4 class="text-mob text-white">Problem Solving</h4>
                        <h4 class="text-mob text-white">{{ $percent['Problem Solving'] }}%</h4>
                    </div>
                </div>

            </div>

            <div class="col-md-3 my-3">
                {{-- AI --}}
                <div class="card card-rounded mx-3 mx-md-0">
                    <img class="h-75" src="{{ asset('image/progress/ai' . $img['Teamwork'] . '.png') }}">
                    <div class="text-center pt-3" style="background-color: rgb(139, 67, 0)">
                        <h4 class="text-mob text-white">Teamwork</h4>
                        <h4 class="text-mob text-white">{{ $percent['Teamwork'] }}%</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 my-3">
                {{-- Real Life --}}
                <div class="card card-rounded mx-3 mx-md-0">
                    <img class="h-75" src="{{ asset('image/progress/rl' . $img['Leadership'] . '.png') }}"
                        alt="">
                    <div class="text-center pt-3" style="background-color: rgb(198, 205, 0)">
                        <h4 class="text-mob text-white">Leadership</h4>
                        <h4 class="text-mob text-white">{{ $percent['Leadership'] }}%</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 my-3">
                {{-- Fairy --}}
                <div class="card card-rounded mx-3 mx-md-0">
                    <img class="h-75" src="{{ asset('image/progress/fairy' . $img['Kreativitas'] . '.png') }}"
                        alt="">
                    <div class="text-center pt-3" style="background-color: rgb(1, 96, 1)">
                        <h4 class="text-mob text-white">Kreativitas</h4>
                        <h4 class="text-mob text-white">{{ $percent['Kreativitas'] }}%</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 my-3">
                {{-- Space --}}
                <div class="card card-rounded mx-3 mx-md-0">
                    <img class="h-75" src="{{ asset('image/progress/space' . $img['Satu'] . '.png') }}"
                        alt="">
                    <div class="text-center pt-3" style="background-color: rgb(25, 45, 112)">
                        <h4 class="text-mob text-white">Satu</h4>
                        <h4 class="text-mob text-white">{{ $percent['Satu'] }}%</h4>
                    </div>
                </div>
            </div>


            <div class="col-md-3 my-3">
                {{-- Sporty --}}
                <div class="card card-rounded mx-3 mx-md-0">
                    <img class="h-75" src="{{ asset('image/progress/sporty' . $img['Sporty'] . '.png') }}"
                        alt="">
                    <div class="text-center pt-3" style="background-color: indigo">
                        <h4 class="text-mob text-white">Sporty</h4>
                        <h4 class="text-mob text-white">{{ $percent['Sporty'] }}%</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 my-3">
                {{-- Friendship --}}
                <div class="card card-rounded mx-3 mx-md-0">
                    <img class="h-75" src="{{ asset('image/progress/bff' . $img['Friendship'] . '.png') }}"
                        alt="">
                    <div class="text-center pt-3" style="background-color: rgb(97, 27, 133)">
                        <h4 class="text-mob text-white">Friendship</h4>
                        <h4 class="text-mob text-white">{{ $percent['Friendship'] }}%</h4>
                    </div>
                </div>
            </div>


            <div class="floating-container">
                <div class="floating-button" data-bs-toggle="modal" data-bs-target="#modalMap">
                    <i class="material-icons">Map
                    </i>
                </div>
            </div>

            <div class="floating-container-alt">
                <a class="floating-button" href="{{ route('status') }}" style="text-decoration: none">
                    <i class="material-icons">Info
                    </i>
                </a>
            </div>


        </div>



        <!-- Modal -->
        <div class="modal fade" id="modalMap" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="fs-5 text-mob">MAP GAMES RALLY</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img class="w-100" src="{{ asset('image/map.png') }}" alt="">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" aria-label="Details"
                                data-bs-toggle="modal" data-bs-target="#modalDetails">TF Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Details -->
        <div class="modal fade" id="modalDetails" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="fs-5 text-mob">TF DETAILS</h1>
                        <button type="button" class="btn-close" data-bs-target="#modalMap" data-bs-toggle="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img class="w-100" src="{{ asset('image/mapdetails.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>

</html>
