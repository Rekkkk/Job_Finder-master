<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Finder</title>
</head>
<body>
    <p>Good Day {{ $data['name'] }},</p>
    
    <p>New have new applicant for your posted job entitled  {{ $data['job-title'] }} at {{ $data['job-company'] }} {{ $data['job-address'] }}. 
       
    <p>Thank You !</p>
    <p>Job Finder Philippines</p>
</body>
</html>