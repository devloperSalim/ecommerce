<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>name</th>
            <th>desc</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td><p4>{{ $product->name }}</p4></td>
                <td> <p>{{ $product->description }}</p></td>
            </tr>

        @endforeach
        </tbody>
  </table>

</body>
</html>
