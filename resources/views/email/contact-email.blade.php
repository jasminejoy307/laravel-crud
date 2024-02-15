<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>
    <table>
        <tr>
            <th>Name</th>
            <td>{{ $mailData['name'] }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $mailData['email'] }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $mailData['phone'] }}</td>
        </tr>
    </table>
</body>
</html>