<!DOCTYPE html>
<html lang="en" style="height: 100%">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penpos Rally MOB FT 2023</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        body {
            background-color: #120238;
            height: 100%;
        }

        .card-body {
            background-color: #faf8fa;
        }
    </style>
</head>

<body>

    <div class="alert alert-danger text-center" style="">
        <h1>KAMI DARI DIVISI ITD DENGAN SANGAT MEMOHON JANGAN SAMPE SALAH TEKAN ATAUPUN TIM KOSONGAN</h1>
        <h2>CEK LAGI SEBELUM MENGINPUT</h2>
    </div>
    <div>
        <a class="btn btn-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
            <i class="fa fa-key"></i> Log Out</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <div class="d-flex flex-row justify-content-center align-items-center h-100">
            <div class="card w-100 mx-5">
                <div class="card-header text-center">
                    <h1 class="text-mob" style="font-weight: bolder;">{{ $map->name }} - {{ $user->name }}</h1>
                    <h3 class="text-mob" style="font-weight: bolder;">Status: {{ $user->status }}</h3>
                </div>
                <div class="card-body">
                    <div class="input-section text-center">
                        <form action="{{ route('penpos-status') }}" method="post">
                            @csrf
                            <div class="team-select my-2 ">
                                <label class="text-mob" for="team" style="">Status Pos :</label>
                                <br>
                                <select name="statusPos" id="statusPos" class="form-select" required>
                                    <option value="Kosong">Kosong</option>
                                    <option value="Menunggu">Menunggu</option>
                                    <option value="Penuh">Penuh</option>
                                </select>
                            </div>
                            <div class="col mb-2"><input type="submit" name="submit" value="Change"
                                    style="height: 50px; font-size: 20px"
                                    class="fw-bold btn btn-success w-50 rounded" />
                            </div>
                        </form>
                    </div>
                    <div class="input-section text-center">
                        <form action="{{ route('penpos-submit') }}" method="post">
                            @csrf
                            <div class="team-select my-2 ">
                                <label class="text-mob" for="team" style="">Nomor Tim :</label>
                                <br>
                                <select name="team" id="team" class="form-select" required>
                                    <option value="-" selected disabled>- Pilih Team -</option>
                                    @foreach ($listGroup as $group)
                                        <option value="{{ $group->id }}" id="team{{ $group->id }}">
                                            {{ $group->number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="text-mob" for="result" style="">Hasil :</label> <br>
                            <div class="col mb-2"><input type="submit" name="status" value="Success"
                                    style="height: 50px; font-size: 20px"
                                    class="fw-bold btn btn-success w-50 rounded" />
                            </div>
                            <div class="col mt-2"><input type="submit" name="status" value="Fail"
                                    style="height: 50px; font-size: 20px" class="fw-bold btn btn-danger w-50 rounded" />
                            </div>
                        </form>
                    </div>
                    <div class="card my-5">
                        <div class="card-header">
                            <h3 style="font-weight: bolder;text-align:center!important" class="text-mob">History</h3>
                        </div>
                        <div class="card-body text-center">
                            <div class="row">
                                @foreach ($results as $result)
                                    <p>Tim {{ $result->number }} - {{ $result->result }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
