<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Treni</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1>Treni in partenza oggi</h1>
    <table>
        <tr>
            <th>Azienda</th>
            <th>Stazione di Partenza</th>
            <th>Stazione di Arrivo</th>
            <th>Orario di Partenza</th>
            <th>Orario di Arrivo</th>
            <th>Codice Treno</th>
            <th>Numero Carrozze</th>
            <th>In Orario</th>
            <th>Cancellato</th>
        </tr>
        @foreach ($treni as $treno)
        <tr>
            <td>{{ $treno->azienda }}</td>
            <td>{{ $treno->stazione_di_partenza }}</td>
            <td>{{ $treno->stazione_di_arrivo }}</td>
            <td>{{ $treno->orario_di_partenza }}</td>
            <td>{{ $treno->orario_di_arrivo }}</td>
            <td>{{ $treno->codice_treno }}</td>
            <td>{{ $treno->numero_carrozze }}</td>
            <td>{{ $treno->in_orario ? 'Si' : 'No' }}</td>
            <td>{{ $treno->cancellato ? 'Si' : 'No' }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>