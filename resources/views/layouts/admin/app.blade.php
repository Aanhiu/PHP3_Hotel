<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .app-header {
            background-color: #343a40;
            color: white;
            padding: 1rem;
        }

        .app-header .app-nav__item i {
            font-size: 1.2rem;
        }

        .app-sidebar {
            background-color: #343a40;
            height: 100vh;
            color: white;
            padding: 1rem;
        }

        .app-sidebar__user {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .app-sidebar__user img {
            border-radius: 50%;
            margin-right: 1rem;
        }

        .app-sidebar__user-name {
            margin: 0;
        }

        .app-sidebar__user-designation {
            margin: 0;
            font-size: 0.85rem;
        }

        .app-menu {
            list-style-type: none;
            padding: 0;
        }

        .app-menu__item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .app-menu__item:hover,
        .app-menu__item.active {
            background-color: #495057;
        }

        .app-menu__icon {
            font-size: 1.2rem;
            margin-right: 1rem;
        }

        .app-menu__label {
            margin: 0;
        }

        hr {
            border: 1px solid #495057;
        }

        .app-header {
            background-color: #343a40;
            color: white;
            padding: 1rem;
        }

        .app-nav__item i {
            font-size: 1.2rem;
            color: white;
        }

        .app-sidebar__toggle {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="container-">

        @include('layouts.admin.menu')

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</html>