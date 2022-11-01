<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grizzly Malevich</title>
    @vite([
    'resources/js/app.js',
    'resources/css/app.css',
    ])
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <div class="form-group mt-5">
                    <label for="first">Введите номер телефона</label>
                    <input value="{{old('phone')}}" type="tel" name="phone" class="form-control"
                           placeholder="+375(29)123-45-67">
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{Session::get('success')}}
                    </div>
                @elseif(Session::has('error'))
                    <div class="alert alert-info">
                        {{Session::get('error')}}
                    </div>
                @endif

                @if($errors->has('phone'))
                    @foreach ($errors->all() as $error)
                        <div class="mt-1 text-danger">{{ $error }}</div>
                    @endforeach
                @endif
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="box mt-5">
                <h1>Lorem ipsum dolor sit amet</h1>
                <ul class="mb-4">
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>Lorem ipsum dolor sit amet</li>
                </ul>
                <a href="#">Lorem</a>
            </div>
        </div>
    </div>
</div>

<div id="cookies" class="d-flex justify-content-center mt-5 h-100 cookies__inner">
    <div class="cookies__fixed card p-3 text-center cookies">
        <span class="mt-2">Мы используем cookies</span>
        <button id="cookies__close" class="btn btn-danger mt-3 px-4" type="button">Закрыть</button>
        <button class="btn btn-dark mt-3 px-4" type="submit">Принять</button>
    </div>
</div>

</body>
</html>
