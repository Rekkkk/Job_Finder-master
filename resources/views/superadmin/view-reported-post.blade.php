@extends('superadmin.sidebar')

@section('content')
<style>
    .dataTables_filter{
        display: none;
    }
</style>
@include('sweetalert::alert')
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-6">
                <h1> <b>{{$job->job_title}}</b> </h1>
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
                <p class="h4"><b>Company Name : </b>{{" ".$job->company_name}}</p>
            </div>
        </div><br>
        <div class="row">
            <div class="col-12">
                <p class="h4"><b>Company Address : </b>{{" ".$job->company_address}}</p>
            </div>
        </div><br>
        <div class="row">
            <div class="col-12">
                <p class="h6">{{$job->job_description}}</p>
            </div>
        </div><br>

        <table id="report-list" class="table" style="width:100%" >
            <thead>
                <tr>    
                    
                    <th style="font-size: 16px;">Comments</th> 
                    <th style="font-size: 16px;">Date Reported</th>       
                     
                </tr>
            </thead>
            <tbody id="myTable" style="cursor: pointer">
                @foreach($comment as $comments)                  
                <tr>                           
                    <td style="overflow: auto; font-size: 14px;">{{ $comments->comment }}</td>
                    <td style="font-size: 14px;">{{ $comments->created_at }}</td>                  
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            $('#report-list').DataTable();
        });
    </script>

@endsection