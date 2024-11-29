<!DOCTYPE html>
<html>

<head>
    <title>Reservation Reminder</title>
</head>

<body>
    <h1>Reservation Reminder</h1>
    <p>Dear {{ $reservation->name ?? 'User' }},</p>
    <p>This is a reminder for your reservation on {{ $reservation->date }} at {{ $reservation->time }}.</p>
    <p>Thank you for choosing our service!</p>
</body>

</html>