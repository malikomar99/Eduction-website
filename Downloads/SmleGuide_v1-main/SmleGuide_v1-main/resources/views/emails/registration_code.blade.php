<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Registration Code</title>
</head>
<body>
    <h1>Your Registration Code</h1>

    <p>Hello,</p>

    <p>Here is your registration code. Please enter it in your application to complete registration.</p>

    <h2>{{ $code }}</h2>

    <p>This code is valid for 10 minutes.</p>

    <p>If you did not request this, please ignore this email.</p>

    <br>

    <p>Regards,<br>{{ config('app.name') }}</p>
</body>
</html>
