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
    <p>Your application for {{ $mailData['job-title'] }} at {{ $mailData['job-company'] }} {{ $mailData['job-address'] }} is {{ $mailData['status'] }}. 
        @if($mailData['status'] != "declined")
            Your Schedule of interview is {{$mailData['interview-schedule']}} please follow your schedule.</p>
        @endif 
    <p>Thank You !</p>
    <p>Job Finder Philippines</p>
    
</body>
</html>