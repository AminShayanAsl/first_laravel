<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script src="/js/app.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('title')
</head>
<body>
    <div class="container">
        @include('partial/flash')

        @yield('content')

        @if(count($errors))
            <ul class="text-bg-danger text-light mt-3">
            @foreach($errors->all() as $error)
                <li class="mt-1">{{ $error }}</li>
            @endforeach
            </ul>
        @endif
    </div>
    <script>
        $('.alert').delay(3000).slideUp(300);
        $('#tags_select').select2({
            placeholder: 'Select tags',
            allowClear: true,
        });
    </script>
</body>
</html>
