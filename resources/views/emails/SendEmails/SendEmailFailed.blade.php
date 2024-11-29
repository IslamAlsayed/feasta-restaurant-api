<!DOCTYPE html>
<html>

<head>
    <title>Client Message failed</title>
</head>

<body>
    <h1>Client message failed</h1>

    <ul>
        @foreach ($sendMail as $key => $value)
        <li>{{ $key . ' => ' . $value }}</li>
        @endforeach
    </ul>
</body>

</html>