<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet">
    <!-- CSS only -->

</head>
<body class="antialiased">
<div class="container">
    <form>
        @csrf
        <div class="row">
            <div class="col-25">
                <label for="country">Выберите автомобиль</label>
            </div>
            <div class="col-75">
                <label for="car">Автомобиль</label>
                <select id="car">
                    @foreach($cars as $car)
                        <option value="{{ $car->id }}">{{$car->model->brand->brand_name .' '. $car->model->model_name. ' (номер: '.$car->number.')' }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-25">
                <label for="country">Выберите пользователь</label>
            </div>
            <div class="col-75">
                <label for="user">Пользователь</label>
                <select id="user">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <input type="button" value="Арендовать автомобиль">
        </div>
    </form>
</div>
<div id="response"></div>
</body>
</html>
