<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserStatus;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Validator;



class AuthController extends Controller
{

    public function required(){

        return view('/login-page')->withErrors(['msg' => 'You must Login First !']);

    }
    
    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->userStatus->is_disable == 1){
                Auth::logout();
                return back()->withErrors(['msg' => 'Your account has banned']);
            }
            elseif(Auth::user()->userStatus->is_suspend == 1){

                if(Auth::user()->userStatus->suspend_end < Carbon::now()){
                    UserStatus::where('user_id', '=',  Auth::user()->user_id)
                    ->update(['is_suspend' => 0,'suspend_end' => null]);
                     return redirect()->route('job.list');
                }else{
                    return back()->withErrors(['msg' => 'Your account are temporary ban until ' . Carbon::parse(Auth::user()->userStatus->suspend_end)->format('F d, Y')]);
                    Auth::logout();
                }
               
            }else{
                return redirect()->route('job.list');
            }
        }
        else{
            return redirect()->back()->withInput()->withErrors(['msg' => 'Invalid username or password']);
        }
    }

    public function register(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password' 
        ],[
            'password.required' => 'The current password field is required.',
            'password.required' => 'The new password field is required.',
            'confirm_password.required' => 'The confirm password field is required.',
            'confirm_password.same' => 'The new and confirm password not match.'
            
        ]);

        if($request->employer_id == null){
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_role' => 0
            ]);
        }else{ 

            $imageName = time().'.'.$request->employer_id->getClientOriginalExtension();
            $request->employer_id->move(public_path('/id'), $imageName);
            
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_role' => 1,
                'employer_id' => $imageName
            ]);
        }

        
        UserStatus::create([
            'user_id' => User::all()->last()->user_id,
            'is_disable' => 0,
            'is_suspend' => 0,
            'suspend_end' => null
        ]);

        Alert::success('Success','You Register Successfully');

        return redirect()->route('login.page');
    }

    public function jobList(){

        if(Auth::check()){
            if(Auth::user()->user_role == 2){

                return redirect()->route('dashboard');

            }
            elseif(Auth::user()->user_role == 1){
                return redirect()->route('my.job.posted');
            }
            else{
                $allJobs = Job::where('unlisted', 0)->get();
                return view('/authpages/job-list', compact('allJobs'));
            }  
        }
    }

    public function dashboard(){
        $reportedJobs = Job::where('num_reports', '>', 0)->get();
        $listOfUser = User::where('user_role', 0)->get();

        return view('/superadmin/dashboard', compact('reportedJobs', 'listOfUser'));
        
    }

    public function changeAccountDetailsPage(User $user){

        if(Auth::user()->user_role == 2){
            return view('/superadmin/my-account', compact('user'));
        }else{
            return view('/authpages/my-account', compact('user'));
        }
   
    }

    public function changePassword(Request $request){

        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'current_password' => ['required', function ($attr, $password, $validation) use ($user) {
                if (!\Hash::check($password, $user->password)) {
                    return $validation(__('The current password is incorrect.'));
                }
            }],
            'new_password' => 'required_if:current_password,!=,null|min:8',
            'confirm_password' => 'required_if:current_password,!=,null|same:new_password',
        ]);


        if ($validator->fails()) {
            Alert::html('ERROR', 'Change password unsuccessful !', 'error');
            
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if(Hash::check($request->current_password, Auth::user()->password)){
            $userLogin = User::find(Auth::user()->user_id);
            $userLogin->password = Hash::make($request->new_password);
            $userLogin->save();
        }

        Alert::success('', 'Password Change Successfully !');

        return back();


    }

    public function changeName(Request $request){

        $request->validate([
            'name' => 'required',
        ]);

        $userLogin = User::find(Auth::user()->user_id);
        $userLogin->name = $request->name;
        $userLogin->save();

        Alert::success('Success', 'Name Change Successfully !');

        return back();;

    }

    public function logOut(){

        Auth::logout();
        return redirect ('/');

    }
}