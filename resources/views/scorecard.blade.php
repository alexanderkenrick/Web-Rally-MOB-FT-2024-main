<!DOCTYPE html>
<html lang="en" style="height: 100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="5">
    <title>Scoreboard Rally MOB FT 2024</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.2/dist/bootstrap-table.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/5.0.1/css/fixedColumns.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        body {
            background-color: #390203;
            height: 100%;
        }

        .card-header {
            background-color: #941B0C;
        }

        .card-header > h1 {
            color: #F6F7D7;
        }

        .card-body {
            /*background-color: #faf8fa;*/
            background-color: #EAE2B7;
        }

        th,
        td,
        tr {
            font-size: 18px;
        }

        /* .sticky-col {
            position: -webkit-sticky;
            position: sticky;
            background-color: white;
        } */

        /* .first-col {
            width: 4.5%;
            left: 4%;
        }

        .second-col {
            width: 10%;
            left: 24%;
        } */

        .wrapper {
            position: relative;
            padding: 0;
        }
    </style>
</head>

<body>

    <div class="d-flex flex-row justify-content-center align-items-center">
        <div class="card w-100 mx-1 my-5">
            <div class="card-header text-center">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('progress') }}" class="btn btn-primary">Back</a>
                </div>
                <h1 class="text-mob" style="font-weight: bolder;">Scorecard</h1>
            </div>
            <div class="card-body" style="">
                <div class="row d-flex justify-content-center" style="overflow: auto;">
                    <div class="wrapper">
                        <table class="table align-items-center" data-toggle="table" id="myTable">
                            <thead>
                                <tr>
                                    <th data-fixed-columns="true" scope="col" class="text-center fw-bold sticky-col first-col" width="4.5%" style="background-color: #ffcf1a; font-size: 1rem;">Status</th>
                                    <th data-fixed-columns="true" scope="col" class="text-center sticky-col second-col" style="background-color: #ffcf1a; font-size: 1rem;" width="10%">Games</th>
                                    @foreach($teams as $team)
                                        <th data-fixed-columns="true" scope="col" class="text-center" style="background-color: #ffcf1a; font-size: 0.5rem;">{{  $team->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($results as $game => $result)
                                    <tr>
                                        <td scope="col" width="4.5%" class="sticky-col first-col">{{ $result[0] }}</td>
                                        <td scope="col" width="10%" class="sticky-col second-col">{{ $game }}</td>
                                        @foreach($result as $id => $stat)
                                            @if($id != 0)
                                                {{-- <td score="col" width="4.5%">{{ $stat }}</td> --}}
                                                <td score="col" width="4.5%">
                                                    <div style="display: flex; justify-content: center; align-items: center;">
                                                        <img src="{{ asset('scorecard-star') }}/{{ $stat }}.png" alt="ilang" width="50%" style="">
                                                    </div>
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.2/dist/bootstrap-table.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap5.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/fixedcolumns/5.0.1/js/FixedColumns.js"></script> --}}
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.1/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.1/js/fixedColumns.bootstrap5.min.js"></script>
    <script>
        // $("#myTable").DataTable({
        //     fixedColumns: {
        //         left: 2,
        //     }
        // });
        new DataTable('#myTable', {
            fixedColumns: {
                left: 2
            },
            paging: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 300
        });
    </script>
</body>

</html>
