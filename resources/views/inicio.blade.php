@extends('todos.app')
@section('content')

<body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div >
        <div class="container">
            <h1>Bienvenido!</h1>
            <p>Elija una opcion para comenzar</p>
        </div>
        
    </div>
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-4">
                <h2>Crear Club</h2>
                <p>Crear un club para su iniciacion en el torneo</p>
                <button  type="button" class="btn btn-outline-primary"
                <p>
                    <a class="btn btn-default" href="/club/create" role="button">Club&raquo;</a></p>
                </button>
                </div>
            <div class="col-md-4">
                <h2>Crear Torneo</h2>
                <p>Podras crear torneos para distintos eventos</p>
                <button  type="button" class="btn btn-outline-success"
                <p><a class="btn btn-default" href="/torneo/create" role="button">Torneo &raquo;</a></p>
                </button>
            </div>
            <div class="col-md-4">
                <h2>Opciones de Jugador</h2>
                <p>ABM de Jugadores</p>
                <button  type="button" class="btn btn-outline-danger"
                <p><a class="btn btn-default" href="/jugador/create" role="button">Jugadores &raquo;</a></p></button>
            </div>
        </div>
        <hr>
        <footer>
            <p>&copy; Laravel Torres 2022 </p>
        </footer>
    </div>         

    <!-- /container -->
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
@endsection