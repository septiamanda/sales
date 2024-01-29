<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>



<body>
    <nav class="navbar bg-body-tertiary">
        <a href="/">
            <img src="https://www.kahfeveryday.com/wp-content/uploads/2020/07/logo_kahf.png" width="100">
        </a>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Setting</a>
            </li>
        </ul>
    </nav>

    <nav class="nav flex-column">
        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Data Master
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
        <a class="nav-link" href="#">Data Sales</a>
        <a class="nav-link" href="#">Data RE</a>
        <a class="nav-link" href="#">Data FCC</a>
        <a class="nav-link" href="#">Data PI</a>
        <a class="nav-link" href="#">Data PS</a>

        <a class="nav-link active" aria-current="page" href="#">Growth</a>
        <a class="nav-link disabled" aria-disabled="true">Logout</a>
    </nav>
</body>
</html>