<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
    .page-break {
        page-break-after: always;
    }
    </style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" content="text/css" type="text/css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <!-- Styles -->
  {{-- <link href="{{ public_path('css/app.css ') }}" rel="stylesheet" type="text/css"> --}}
  <title>PDF</title>
</head>

<h1>Lista de jugadores </h1>
<div class="page-break"></div>
<h1>Actuales</h1>

<body>
  <h1> Lista de jugadores en la base de datos</h1>

<table class="table table-bordered border-primary ">
    <thead>
        <tr>
            <th>Dni</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Equipo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $jugadores as $jugador )
        <tr>
          {{-- <td >
                <img src="{{asset('storage').'/'.$jugador->Foto}}" width="100" alt="Sin Foto">
            </td> --}}
            <td>{{$jugador->Dni}}</td>
            <td>{{$jugador->Nombre}}</td>
            <td>{{$jugador->Apellido}}</td>
            <td>{{$jugador->club[0]->Nombre}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>

</body>
</html>
