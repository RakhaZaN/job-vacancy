<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <style>
        * {
            padding: 0;
            /* margin: 0; */
            font-family: 'Arimo-Regular';
        }
        table {
            width: 80%;
            border-collapse: collapse;
            padding: 10px 0 10px;
            /* margin: 0px auto */
            margin: 0 auto;
        }
        table tr td,th {
            padding: 5px;
            border: 1px solid black;
            font-size:20px;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
        <img src="{{ asset('assets/img/logo bsg.jpg') }}" alt="logo" style="margin: 10px 0;">
        <h1>Report on {{ $year }} {{ $month }}</h1>
    </center>
    <table>
        <thead>
            <tr>
                <th>Division / Departement</th>
                <th>Applies</th>
                <th>Accepted</th>
                <th>Rejected</th>
                <th>Pending</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            <tr>
                <td>{{ $dt->jobVacancy->title }}</td>
                <td class="text-center">{{ $dt->count_applicants }}</td>
                <td class="text-center">{{ $dt->accepted }}</td>
                <td class="text-center">{{ $dt->rejected }}</td>
                <td class="text-center">{{ $dt->pending }}</td>
                <td>{{ $dt->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
