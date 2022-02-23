<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    <h2 style="border-bottom: 1px solid">{{ $data['location_name'] }}</h2>
    <p>Tere.</p><br/>
    <p>Olete broneerinud aja teenindusse: {{ $data['location_name'] }}</p><br/>
    <p>Broneerimise aeg: {{ $data['time'] }}</p>
    <p>Valitud teenused: {{ $data['service_name'] }}</p>
    <p>{{ $data['mark'] }} : {{ $data['model'] }}</p>
    <p>
        E-post: {{ $data['e_post'] }}<br/>
        Telefon: {{ $data['telephone'] }}<br/>
        Märkused: {{ $data['summary'] }}<br/><br/>
    </p>
    <p>
        Kui leiate, et Te ei saa broneeritud ajal kohale ilmuda, siis<br/>
        on kõige mugavam broneering tühistada klikkides järgnevat
    </p>
    <p>
        linki:
    </p>
    <a href="{{ env('APP_URL') }}/cancelBooking?id={{ $data['book_id'] }}">{{ env('APP_URL') }}/cancelBooking?id={{ $data['book_id'] }}</a>
    <br/><br/>
    <p>Täname!</p>
</body>
</html>