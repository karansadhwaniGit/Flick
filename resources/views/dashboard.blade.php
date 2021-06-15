<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('admin-panel/css/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body class="bg-dark">
        <nav class="navbar navbar-expand navbar-light bg-light">
        <!-- Navbar content -->
            <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form action="{{route('logout')}}" class="form-inline my-2 my-lg-0" method="POST">
                    @csrf
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth()->user()->name}}
                        </button>
                        <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
                          <button type="submit" class="dropdown-item bg-dark text-light">Logout</button>
                        </div>
                      </div>
                </form>
            </div>
        </nav>
        <div class="container" style="padding:0!important">
            <div class="row" style="overflow-x:hidden">
                <div class="col-sm-12">

                </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="{{asset('admin-panel/js/bootstrap.min.js')}}"></script>
</body>
</html>
