<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet">
    <!-- CSS only -->

</head>
<body class="antialiased">
<div class="container">
    <form>
        @csrf
        <div class="row">
            <div class="col-md-12">

                <div class="col-md-12">
                    <label for="car">Выберите автомобиль</label>
                    <select id="car">
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}">{{$car->model->brand->brand_name .' '. $car->model->model_name. ' (номер: '.$car->number.')' }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12">
                    <label for="user">Выберите пользователя</label>
                    <select id="user">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="col-md-12">
                <div class="alert alert-primary mt-1" role="alert" id="alert-success" style="display: none">
                    <div class="alert-body" id="response"><strong><span id="response"></span></strong></div>
                </div>
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <input type="button" class="btn btn-success" onclick="rentCar()" value="Арендовать автомобиль">
            </div>
        </div>
    </form>
</div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        function rentCar() {
            $.ajax({
                url: "{{ route('rentcar.api') }}",
                method: 'GET',
                data: {
                    car_id: $('#car').val(),
                    user_id: $('#user').val()
                },
                success: function(response) {
                    console.log(response);
                    if(response.status === false){
                        hideAlert();
                        //$("#response").html(response.message);
                        $('#response').text(response.message);
                        $('#alert-success').show();
                    }else{
                        hideAlert();
                       // $("#response").html(response.data.message);
                        $('#response').text(response.data.message);
                        $('#alert-success').show();

                    }

                    //$("#response").html(response.data.message);
                },
                error: function(msg) {
                    $("#response").html('');
                    console.log(msg);
                }
            });
        }

        $("#rentBtn").click(function(e) {
            e.preventDefault();
            rentCar();
        });

    let alert = $('.alert');

    function hideAlert(){
        alert.hide();
    }

</script>
</html>
