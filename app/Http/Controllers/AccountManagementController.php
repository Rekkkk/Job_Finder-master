<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserStatus;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;




class AccountManagementController extends Controller
{

    public function applicantAccount(){

        $listOfUser = User::where('user_role', 0)->get();

        return view ('/superadmin/accountmanagement/applicant-account', compact('listOfUser'));
    }

    public function employerAccount(){

        $listOfUser = User::where('user_role', 1)->get();
        $qwer = $listOfUser->first()->ID->first();

        return view ('/superadmin/accountmanagement/employer-account', compact('listOfUser', 'qwer'));
    }

    public function viewID(User $user){

        $selectedUser = User::where('user_id', $user->user_id)->first();

        return view ('/superadmin/accountmanagement/id', compact('selectedUser'));
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
