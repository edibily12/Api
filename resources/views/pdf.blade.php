<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers QR Codes PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        thead {
            background-color: #007bff;
            color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            width: 100px;
            height: 100px;
        }

        @media (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            th, td {
                padding: 10px;
                text-align: right;
                position: relative;
                border: none;
            }

            th::before, td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                text-align: left;
                font-weight: bold;
            }

            th {
                display: none;
            }
        }
    </style>
</head>
<body>
<h1>Teachers QR Codes PDF</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>QR Code</th>
    </tr>
    </thead>
    <tbody>
    @foreach($teachers as $teacher)
        <tr>
            <td data-label="ID">{{ $teacher['data']->id }}</td>
            <td data-label="Name">{{ $teacher['data']->name }}</td>
            <td data-label="Email">{{ $teacher['data']->email }}</td>
            <td data-label="Phone">{{ $teacher['data']->phone }}</td>
            <td data-label="QR Code">
                <img src="{{ $teacher['qrCode'] }}" alt="QR Code">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
