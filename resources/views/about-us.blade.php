@extends('.navigation')

@section('content')
    <style>
        h4{
            margin-bottom: 0px;
        }
        p{
            font-size: 16px;
        }
        img{
            text-align: center;
        }
        .devs{
            font-size: 20px;
        }
    </style>
    <div class="container py-2 h-100">
        <h1 class="mt-5"><b>About Us</b></h1><br>

        <div class="row">
            <div class="col text-center">
                <h3><b>Website Description</b></h3>
                <p class="w-75 m-auto">Our goal in this website is to give people proper communication between Company and Applicants.
                    And also to less the time consume when you're traveling just to go to the Agency/Company if you're the applicant.</p>
            </div>
        </div><br><br><br>
        <div class="row">
            <div class="col-lg-6 text-center">
                <h3><b>Mission</b></h3>
                <p >
                    We are here to help Applicants finding a good job offers that can fit in their knowledge and skills.
                    We are here to help Company/Agency to find their perspective Applicant that can fit to their qualification.
                </p>
            </div>
            <div class="col-lg-6 text-center">
                <h3><b>Vision</b></h3>
                <p>We are here to help both parties, Companies and Applicants to get their dream job and for the company is to get their qualified applicants in the vacant position.</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <img src="{{ asset('/images/Kap jervis.png') }}" class="rounded-circle"  width="210" height="200">
                <h4 class="mt-1"><b>Jervis Himpisao</b></h4>
                <h5>Brgy. Chairman</h5>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <img src="{{ asset('/images/Dept-Head.jpg') }}" class="rounded-circle"  width="210" height="200">
                <h4 class="mt-1"><b>Irene S. Galupe</b></h4>
                <h5>Department Head</h5>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-6 text-center">
                <img src="{{ asset('/images/Staff1.jpg') }}" class="rounded-circle"  width="210" height="200">
                <h4 class="mt-1"><b>Rhou Catillo</b></h4>
                <h5>Staff</h5>
            </div>
            <div class="col-sm-6 text-center">
                <img src="{{ asset('/images/Staff2.jpg') }}" class="rounded-circle" width="210" height="200">
                <h4 class="mt-1"><b>Yam Tandado</b></h4>
                <h5>Staff</h5>
            </div>
        </div>
        <h2 class="mt-4 mb-4"><b>Developers of Barangay Employement Service Unit</b></h2>
        <div class="row">
            <div class="col ">
                <div class="text-center">
                    <img src="{{ asset('/images/Daryll.png') }}" class="rounded"     width="210" height="200">
                    <p class="mt-2 devs"><b>Daryll A. Alegado</b><br>
                        Programmer
                    </p>
                </div>  
            </div>
            <div class="col">
                <div class="text-center">
                    <img src="{{ asset('/images/Jan Justine.png') }}" class="rounded" width="210" height="200">
                    <p class="mt-2 devs"> <b>Jan Justine Longasa</b><br>
                        Programmer
                    </p>
                </div>  
            </div>
            <div class="col">
                <div class="text-center">
                    <img src="{{ asset('/images/Jan Rovic.png') }}" class="rounded" width="210" height="200">
                    <p class="mt-2 devs"> <b>Jan Rovie S. Garcia</b><br>
                        Programmer
                    </p>
                </div>  
            </div>
        </div>
    </div><br>
@endsection