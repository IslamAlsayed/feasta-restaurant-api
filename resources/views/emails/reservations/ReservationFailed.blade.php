<!DOCTYPE html>
<html>

<head>
    <title>Reservation Failed</title>
</head>

<body>
    <h1>Reservation Failed</h1>
    <p>Dear {{ $reservation->name ?? 'User' }},</p>
    <p>We regret to inform you that there was an issue with processing your reservation scheduled for {{ $reservation->date }} at {{ $reservation->time }}.</p>
    <p>Unfortunately, we were unable to confirm your reservation at this time. Please try again later or contact support for assistance.</p>
    <p>We apologize for the inconvenience and thank you for your understanding.</p>
</body>

</html>