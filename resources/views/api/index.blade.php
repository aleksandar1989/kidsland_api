<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Kidsland Api</title>
</head>
<body>
<div class="page_wrapper">
    <img src="{{ asset('/images/logo.png') }}" alt="logo" class="logo"/>

    {!! Form::open(['url' => '/', 'id' => 'api_form']) !!}
    <meta name="_token" content="{{ csrf_token() }}" />
    <div class="form-body">
        <div class="form-control">
            {!! Form::text('sifra', null, ['id' => 'sifra', 'placeholder' => 'Unesite sifru proizvoda...']) !!}
            @if($errors->first('sifra'))
                <p class="help-block">Ovo polje je obavezno!</p>
            @endif
        </div>

        <div class="form-control">
            {!! Form::text('barkod', null, ['id' => 'barkod', 'placeholder' => 'Unesite barkod proizvoda...']) !!}
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn green">Pretraži</button>
    </div>
    {!! Form::close() !!}

    @isset($result)
    @if($result->Result)
        <ul class="list_products">
            @foreach($result->Result as $data)
                <li>
                    <p>Naziv radnje: <span>{{ $data->Name }}</span></p>
                    <p>Kod proizvoda: <span>{{ $data->Code }}</span><p/>
                    <p>Količina proizvoda: <span>{{ $data->Quantity }}</span><p/>
                </li>
            @endforeach
        </ul>
    @else
        <p class="desc">{{ $result->ErrorMessage ? $result->ErrorMessage : 'Nema podataka za trаženi proizvod' }}</p>
    @endif
    @endisset

</div>

<div class="loader">
    <img src="{{ asset('/images/loader.gif') }}"/>
</div>

<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
</body>
</html>