<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>products page</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <h1> {{ $name }} </h1>
    <h3>Price {{ $price }} </h3>

    <p>{{ $our_email }}</p>

    @include('components.input', ['name' => 'name', 'id' => 'name'])
    @include('components.input', ['name' => 'email', 'id' => 'email'])
</body>

</html>
