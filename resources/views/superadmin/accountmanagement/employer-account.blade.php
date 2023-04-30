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
        <h1><b>EMPLOYER ACCOUNTS</b></h1><br>
        <table id="user-list" class="table" style="width:100%" >
            <thead>
                <tr>    
                    <th>User ID</th>
                    <th>User Name</th> 
                    <th>Email</th> 
                    <th>No. of Reports</th>  
                    <th>Company ID</th> 
                    <th>Actions</th>    
                </tr>
            </thead>
            <tbody id="myTable" style="cursor: pointer">
                @foreach($listOfUser as $user)       
                <tr>                            
                        <td >EPLR-{{ $user->user_id }}</td>
                        <td >{{ $user->name }}</td>
                        <td >{{ $user->email }}</td>  
                        <td class="h5 text-danger">{{ $user->num_reports }}</td>    
                        <td>
                            <a target="_blank" href="{{ route('show.id', $user) }}" class="btn-admin btn btn-success  ml-1">View</a>
                        </td>      
                        <td class="d-flex">
                            @if($user->userStatus->is_suspend == 1)
                                <span class="text-danger">Account Temporary Ban</span>
                            @elseif($user->userStatus->is_disable == 0)
                                <a href="{{ route('disable.account', $user) }}" class="btn-admin btn btn-danger  ml-1">Disable</a>
                                <a href="{{ route('temp.disable.account', $user) }}" class="btn-admin btn btn-danger  ml-1 ">Suspend</a>
                            @else
                                <a href="{{ route('disable.account', $user) }}" class="btn-admin btn btn-success  ml-1">Enable</a>
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