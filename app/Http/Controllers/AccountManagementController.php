<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserStatus;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;




class AccountManagementController extends Controller
{
    public function accountmanageMentPage(){

        $listOfUser = User::where('user_role', 0)->get();

        return view ('/superadmin/accountmanagement/account-management', compact('listOfUser'));
    }

    public function tempDisable(User $user){

        $suspendDay = Carbon::now()->addDays(7);
  
            UserStatus::where('user_id', $user->user_id)
            ->update(['is_suspend' => 1, 'suspend_end' =>  $suspendDay]);
            Alert::success('Success','Disable Temporary Account Sucessfully');
        
        return back();


    }

    public function disable(User $user){

        if($user->userStatus->is_disable == 0){
            UserStatus::where('user_id', $user->user_id)
            ->update(['is_disable' => 1]);
            Alert::success('Success','Disable Account Sucessfully');
        }else{
            UserStatus::where('user_id', $user->user_id)
            ->update(['is_disable' => 0]);
            Alert::success('Success','Enable Account Sucessfully');

        }

        return back();

    }


}
