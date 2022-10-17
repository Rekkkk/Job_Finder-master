@extends('superadmin.sidebar')

@section('content')
@include('sweetalert::alert')
    <div class="container-fluid" style="padding: 65px 80px 20px 80px;">
        <div class="row">
            <div class="col-lg-6">
                <h1>{{$job->job_title}}</h1>
            </div>
            <div class="col-lg-6 text-right">
                @if($job->unlisted == 1)
                <h5 class="text-danger">Unlisted Post</h5>
                @else
                <a href="{{ route('unlist', $job ) }}" class="btn btn-danger">Unlist Post</a>

                @endif
            </div>
        </div><br>
        <div class="row">
            <div class="col-12">
                <p class="h4"><b>Company Name :</b>{{" ".$job->company_name}}</p>
            </div>
        </div><br>
        <div class="row">
            <div class="col-12">
                <p class="h4"><b>Company Address :</b>{{" ".$job->company_address}}</p>
            </div>
        </div><br>
        <div class="row">
            <div class="col-12">
                <p>{{$job->job_description}}</p>
            </div>
        </div>

        <table id="report-list" class="table table-hover" style="width:100%" >
            <thead>
                <tr>    
                    
                    <th>Company Address</th> 
                    <th>Date Reported</th>       
                     
                </tr>
            </thead>
            <tbody id="myTable" style="cursor: pointer">
                @foreach($comment as $comments)       
                <tr>              
                <tr>                           
                        <td>{{ $comments->comment }}</td>
                        <td>{{ $comments->created_at }}</td>
                                           
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection