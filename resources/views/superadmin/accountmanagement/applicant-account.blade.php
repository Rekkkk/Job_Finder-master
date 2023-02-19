@extends('superadmin.sidebar')

@section('content')
<style>
    .buttons{
        width: 100px;
        height: 32px;
        font-size: 13px;
    }
    td{
        font-size: 18px;
    }
</style>
@include('sweetalert::alert')
    <div class="container-fluid p-4">
        <h1><b>APPLICANT ACCOUNTS</b></h1><br>
        <table id="user-list" class="table" style="width:100%" >
            <thead>
                <tr>    
                    <th>User ID</th>
                    <th>User Name</th> 
                    <th>Email</th> 
                    <th>No. of Reports</th>    
                    <th>Actions</th>    
                </tr>
            </thead>
            <tbody id="myTable" style="cursor: pointer">
                @foreach($listOfUser as $user)       
                <tr>                            
                        <td >{{ $user->user_id }}</td>
                        <td >{{ $user->name }}</td>
                        <td >{{ $user->email }}</td>    
                        <td class="h5 text-danger">{{ $user->num_reports }}</td>          
                        <td class="d-flex">
                            @if($user->userStatus->is_suspend == 1)
                            <span class="text-danger">Account Temporary Ban</span>
                            @elseif($user->userStatus->is_disable == 0)
                            <a href="{{ route('disable.account', $user) }}" class="btn btn-danger buttons">Disable</a>
                            <a href="{{ route('temp.disable.account', $user) }}" class="btn btn-danger buttons ml-1 ">Suspend</a>
                            @else
                            <a href="{{ route('disable.account', $user) }}" class="btn btn-success buttons">Enable</a>
                            @endif
                        </td>                                      
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
<script>
$(document).ready(function () {
    $('#user-list').DataTable();



    });


</script>

@endsection