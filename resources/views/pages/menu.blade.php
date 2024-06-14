<!-- Create a layout for a webpage to be downloaded as a pdf -->
<!-- See this file as a standalone file -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .title {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class="title">Menukaart - Gouden Draak</h1>

    <div class="menu">
        @foreach ($dishTypes as $type)
            <h2>{{ $type->name }}</h2>
            <ul>
                @foreach ($dishes as $dish)
                    @if ($dish->dish_type_id == $type->id)
                        <li>{{ $dish->name }} - €{{ $dish->price }}</li>
                    @endif
                @endforeach
            </ul>

        @endforeach
    </div>

</html>