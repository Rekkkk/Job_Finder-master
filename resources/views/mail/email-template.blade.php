<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Finder</title>
</head>
<body>
    <p>Good Day {{ $mailData['name'] }},</p>
    <p>Your application for {{ $mailData['job-title'] }} at {{ $mailData['job-company'] }} {{ $mailData['job-address'] }} is {{ $mailData['status'] }}</p>
    <p>Thank You !</p>
</body>
</html>