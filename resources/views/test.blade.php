<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        :root {
            --width-img: 50%;
            --height-img: 50%;
            --wave-widht: 100%;
            --wave-height: 50%;
        }

        .star {
            width: 50%;
            height: 0;
            padding-bottom: 50%;
            position: relative;
            background-color: #f0f0f0;
        }

        .nilai {
            position: absolute;
            top: 0;
            left: 0;
            width: var(--width-img);
            height: var(--height-img);
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: var(--width-img);
            height: var(--height-img);
            background-color: rgba(0, 0, 0, 0.5);
            /* Searah jarum jam */
            clip-path: polygon(
                49.25% 6%,
                63.9% 34.5%,
                96% 40.2%,
                74% 62%,
                78.3% 94.6%,
                49.9% 80.3%,
                21.2% 94.5%,
                25.8% 63.4%,
                3.6% 40%,
                34.7% 34.7%
            );
        }

        .wave {
            width: 100%;
            position: absolute;
            height: 100px;
            left: 0;
            animation: wave-animation 3s infinite linear;
        }

        @keyframes wave-animation {
            0% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(-20%);
            }
            100% {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
@php
$percentage = 50;
@endphp
<div class="star">
    <img src="{{ asset('mobft24/bintang/problem.png') }}" alt="gk ada" class="nilai">
    <div class="overlay">
        @if($percentage >= 10)
            @for($i = 10; $i <= $percentage; $i += 5)
            <img src="{{ asset('mobft24/wave1.svg') }}" alt="" class="wave" style="bottom: {{ $i - 5 }}%">
            @endfor
        @endif
{{--        <img src="{{ asset('mobft24/wave1.svg') }}" alt="" class="wave">--}}
    </div>
{{--<img src="{{ asset('mobft24/wave1.svg') }}" alt="" class="">--}}
</div>
</body>
</html>
