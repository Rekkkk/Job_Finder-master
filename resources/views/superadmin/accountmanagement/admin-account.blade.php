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
        <h1><b>ADMIN ACCOUNTS</b></h1><br>
        <table id="user-list" class="table" style="width:100%" >
            <thead>
                <tr>    
                    <th>Admin ID</th>
                    <th>User Name</th> 
                    <th>Email</th> 
                    <th>Barangay</th> 
                    <th>Barangay ID</th> 
                    <th>Actions</th>    
                    <th>Remarks</th> 
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach($listOfUser as $user)  
                <tr>                            
                    <td >ADM-0{{ $user->user_id }}</td>
                    <td >{{ $user->name }}</td>
                    <td >{{ $user->email }}</td>    
                    <td class="text-uppercase">{{ $user->barangay }}</td>    
                                          <td>
                            <a target="_blank" href="{{ route('show.id', $user) }}" class="btn-admin btn btn-success  ml-1">View</a>
                        </td>      
                    <td class="d-flex">
                        @if($user->userStatus->is_accepted == 1)
                            @if($user->userStatus->is_suspend == 1)
                                <span class="text-danger">Account Temporary Ban</span>
                            @elseif($user->userStatus->is_disable == 0)
                                <a href="{{ route('disable.account', $user) }}" class="btn-admin btn btn-danger">Disable</a>
                                <a  href="{{ route('temp.disable.account', $user) }}" class="btn-admin btn btn-danger  ml-1 ">Suspend</a>
                            @else
                                <a  href="{{ route('disable.account', $user) }}" class=" btn-admin btn btn-success  ml-1">Enable</a>
                            @endif
                        @elseif($user->userStatus->is_accepted == 0)
                            <a href="{{ route('accept.admin', $user) }}" class=" btn-admin btn btn-success mr-1 buttons">Accept</a>
                            <a href="{{ route('decline.admin', $user) }}" class="btn-admin btn btn-danger buttons">Decline</a>
                        @else
                            <span class="text-info">None</span>
                        @endif
                    </td>      
                    <td>
                        @if($user->userStatus->is_accepted == 1)
                            <span class="text-success"><strong>Accepted</strong></span>

                        @elseif($user->userStatus->is_accepted == 0)
                            <span class="text-info"><strong>Pending</strong></span>

                        @else
                            <span class="text-danger"><strong>Declined</strong></span>
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