@extends('.navigation')

@section('content')
    <style>
        p{
            font-size: 15px;
        }
    </style>
    <div class="container py-2 h-100">
        <h1 class="mt-4"><b>About Us</b></h1><br>

        <div class="row">
            <div class="col text-center">
                <h3><b>Website Description</b></h3>
                <p class="w-75 m-auto">Our goal in this website is to give people proper communication between Company and Applicants.
                    And also to less the time consume when you're traveling just to go to the Agency/Company if you're the applicant.</p>
            </div>
        </div><br><br><br>
        <div class="row">
            <div class="col-lg-6 text-center">
                <h3> <b>Mission</b> </h3>
                <p >
                    We are here to help Applicants finding a good job offers that can fit in their knowledge and skills.
We are here to help Company/Agency to find their perspective Applicant that can fit to their qualification.
                </p>

            </div>
            <div class="col-lg-6 text-center">
                <h3><b>Vision</b></h3>
                <p>We are here to help both parties, Companies and Applicants to get their dream job and for the company is to get their qualified applicants in the vacant position.</p>
            </div>
        </div><br><br>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2><b>Developers of Job Finder</b></h2><br>
                <img src="{{ asset('/images/123.png') }}" style="margin: auto;  border-radius: 3%" width="1000px" height="450">
            </div>
        </div>
    </div><br>
      

@endsection