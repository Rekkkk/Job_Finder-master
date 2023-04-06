@extends('authpages.sidebar')

@section('content')
@include('sweetalert::alert')
    <a href="{{url()->previous()}}" class="btn btn-primary" style="width: 150px;">Back</a>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col">
                <h1><b>Applicant Name : </b><span>{{ $applicant->name }}</span></h1>
            </div>
        </div><hr>
        <div class="row">
            <div class="col">
                <h4><b>Resume</b></h4>
                @foreach ($requirements as $requirement)
                    @if($requirement->pdf_description == "Resume")
                        <h6><a href="{{ asset('pdf/'.$requirement->pdf) }}" target="_blank">{{ $requirement->pdf }}</a></h6>
                    @endif
                @endforeach
                <h4><b>Other Requirements</b> </h4>
                @if($requirements->where('pdf_description', 'Other Requirements')->count() != 0)
                    @foreach ($requirements as $requirement)
                        @if($requirement->pdf_description == "Other Requirements")
                            <h6><a href="{{ asset('pdf/'.$requirement->pdf) }}" target="_blank">{{ $requirement->pdf }}</a></h6>
                        @endif
                    @endforeach
                @else
                <h5>No Uploaded Documents.</h5>
                @endif
            </div>
        </div>
    </div>
@endsection