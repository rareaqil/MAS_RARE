<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USER TABLE </title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <table id="example2" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>NAMA</th>
                <th>UMUR</th>
                <th>KOTA</th>
                <th>TIMES</th>
                <th>TIME</th>

            </tr>
        </thead>
        @foreach($user as $data)
        <tr>
            <td>{{ $loop -> iteration }}</td>
            <td>{{ $data -> id }}</td>
            <td>{{ $data -> nama }}</td>
            <td>{{ $data -> umur }}</td>
            <td>{{ $data -> kota }}</td>
            <td>{{ $data -> created_at }}</td>
            <td>{{ $data -> update_at }}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>