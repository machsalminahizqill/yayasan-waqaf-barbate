<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/39b7581ae8.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('css')

    <style>
        body {
            font-family: 'Poppins';
        }

        .bar1,
        .bar2,
        .bar3 {
            width: 35px;
            height: 3px;
            background-color: rgb(16 185 129);
            margin: 6px 0;
            transition: 0.4s;
        }

        .change .bar1 {
            -webkit-transform: rotate(-45deg) translate(-9px, 6px);
            transform: rotate(-45deg) translate(-9px, 6px);
        }

        .change .bar2 {
            opacity: 0;
        }

        .change .bar3 {
            -webkit-transform: rotate(45deg) translate(-4.6px, -4.6px);
            transform: rotate(45deg) translate(-4.6px, -4.6px);
        }
    </style>
</head>

<body>

    @include('admin.layout.header')

    @yield('content')

    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js')
    <script>

        addEventListener('scroll', (event) => {
            if (window.pageYOffset > 200) {
                document.getElementById("header").classList.add("shadow-md")
            } else {
                document.getElementById("header").classList.remove("shadow-md")
            }
        });
        let dropdownMenu = false

        let isRotate = false

        function handleIconHamburger() {
            if (!this.dropdownMenu) {
                document.getElementById('iconHamburger').classList.toggle("change")
                document.getElementById('dropdown').classList.remove("h-0")
                document.getElementById('dropdown').classList.add("h-auto")
                this.dropdownMenu = true
            } else {
                document.getElementById('iconHamburger').classList.toggle("change")
                document.getElementById('dropdown').classList.add("h-0")
                document.getElementById('dropdown').classList.remove("h-auto")
                this.dropdownMenu = false
            }
        }

        function toggleDropdown() {
            let subDropdown = document.getElementById('sub-dropdown')
            let spanProfile = document.getElementById('span-profile')
            let iconArrowProfile = document.getElementById('icon-arrow-profile')
            subDropdown.classList.toggle('hidden')
            // spanProfile.classList.toggle('hidden')
            iconArrowProfile.classList.toggle('rotate-180')
        }
    </script>
</body>

</html>
