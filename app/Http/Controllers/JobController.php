<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\Requirements;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

use Mail;
use App\Mail\ApplicantNotification;
use App\Mail\OrderShipped;



class JobController extends Controller
{

    public function myPostJob(){

        $myJobs = Job::where('user_id', Auth::user()->user_id)->get();

        return view('/authpages/my-post-job', compact('myJobs'));

    }

    public function viewJob(Job $job){
      
        if($job->user_id === Auth::user()->user_id){
            
            $job = Job::with('user')->where('job_id', $job->job_id)->first();

            return view('/authpages/view-my-post-job', compact('job'));

        }else{
            $job = Job::find($job->job_id);
            $isSummited = false;
            $status;

            foreach($job->user as $applicant){
                if($applicant->user_id == Auth::user()->user_id){
                    $isSummited = true;
                    if($applicant->pivot->is_decline == 1){
                        $status = "Decline";
                    }
                    if($applicant->pivot->is_accepted == 0 && $applicant->pivot->is_decline == 0){
                        $status = "Pending";
                    }
                    if($applicant->pivot->is_accepted == 1){
                        $status = "Accepted";
                    }
                    
                }
            }

            if($isSummited == false){
                $status = "Unsubmit";
            }
            
            return view('/authpages/view-job', compact('job', 'status'));
        }

    }

    public function viewApplicant($user, Job $job){

        $applicant = User::where('user_id', $user)->first();

        $requirements = Requirements::where('job_id', $job->job_id)
                                ->where('user_id', $user)
                                ->get();

        return view('/authpages/requirements-list', compact('applicant', 'requirements'));

    }

    public function acceptApplicant($user, Job $job){

        $applicant = User::where('user_id', $user)->first();
        $job = Job::where('job_id', $job->job_id)->first();

        $mailData = [
            "name" => $applicant->name,
            "job-title" => $job->job_title,
            "job-company" => $job->company_name,
            "job-address" => $job->company_address,
            "status" => "accepted"
        ];

        Mail::to($applicant->email)->send(new ApplicantNotification($mailData));

        $data = DB::table('applicant')
                    ->where('job_id', $job->job_id)
                    ->where('user_id', $user)
                    ->update(['is_accepted' => 1]);

        Alert::success('Success','You Accept Applicant Successfully !');

        return back();

    }

    public function declineApplicant($user, Job $job){

        $applicant = User::where('user_id', $user)->first();
        $job = Job::where('job_id', $job->job_id)->first();

        $mailData = [
            "name" => $applicant->name,
            "job-title" => $job->job_title,
            "job-company" => $job->company_name,
            "job-address" => $job->company_address,
            "status" => "declined"
        ];

        $data = DB::table('applicant')
                    ->where('job_id', $job->job_id)
                    ->where('user_id', $user)
                    ->update(['is_decline' => 1]);

        Alert::success('Success','You Decline Applicant Successfully !');

        Mail::to($applicant->email)->send(new ApplicantNotification($mailData));

        return back();

    }

    public function viewMyPostJob(Job $job){

        $job = Job::find($job->job_id);

        return view('/authpages/view-my-post-job', compact('job'));

    }

    public function submitResume(Request $request, Job $job){

        $applicants = Applicant::where('job_id', $job->job_id)->get();

        foreach($applicants as $applicant){
            if($applicant->user_id == Auth::user()->user_id){
                Alert::html('Error','You Submit Application Already !', 'error');
                return back();
            }
        }

        Applicant::create([
            'user_id' => Auth::user()->user_id,
            'job_id' => $job->job_id
        ]);

        $pdf = new Requirements;
        $path = $request->file('resume')->store('/', ['disk' =>   'pdf']);
        $pdf->pdf = $path;
        $pdf->pdf_description = "Resume";
        $pdf->job_id = $job->job_id;
        $pdf->user_id = Auth::user()->user_id;
        $pdf->save();

        foreach ($request->file('requirements') as $files) {
            $requirements = new Requirements;
            $path = $files->store('/', ['disk' =>   'pdf']);
            $requirements->pdf = $path;
            $requirements->pdf_description = "Other Requirements";
            $requirements->job_id = $job->job_id;
            $requirements->user_id = Auth::user()->user_id;
            $requirements->save();
        }

        Alert::success('Success','You Submit Application Success !');

        return back();

    }
    
    public function postJob(Request $request){

        $request->validate([
            'job_title' => 'required',
            'company_name' => 'required',
            'company_address' => 'required',
            'job_description' => 'required'
        ]);

        Job::create([
            'job_title' => $request->job_title,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'job_description' => $request->job_description,
            'user_id' => Auth::user()->user_id
        ]);

        Alert::success('Success','You Post A Job !');

        return redirect()->route('view.job',  Job::all()->last()->job_id);

    }

    public function deleteJob(Job $job){

        $job = Job::find($job->job_id);

        $job->delete();

        Alert::success('Success','Delete Job Successfully !');

        return redirect()->route('job.posted');


    }

    public function updateJobPage(Job $job){

        $job = Job::find($job->job_id);

        return view('/authpages/update-job', compact('job'));

    }

    public function updateJob(Request $request, Job $job){

        $job = Job::find($job->job_id);

        $request->validate([
            'job_title' => 'required',
            'company_name' => 'required',
            'company_address' => 'required',
            'job_description' => 'required'
        ]);

        $job->job_title = $request->job_title;
        $job->company_name = $request->company_name;
        $job->company_address = $request->company_address;
        $job->job_description = $request->job_description;

        $job->save();

        Alert::success('Success','Update Job Successfully !');

        return redirect()->route('view.job',  $job->job_id);

    }
}
