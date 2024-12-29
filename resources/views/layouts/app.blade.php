<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.components.style')
    <title>Beranda</title>
</head>
<body>

    @include('layouts.components.navbar')

    

    <!-- <hr style="border: solid 1px black; margin-left: 4rem; margin-right: 4rem;"> -->

    @yield('content')
    
</body>
</html>