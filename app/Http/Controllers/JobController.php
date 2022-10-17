<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Job;
use App\Models\Applicant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



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
            return view('/authpages/view-job', compact('job'));
        }

    }

    
    public function viewMyPostJob(Job $job){

        $job = Job::find($job->job_id);

        return view('/authpages/view-my-post-job', compact('job'));

    }

    public function submitResume(Request $request, Job $job){




        // if(Applicant::find(Auth::user()->user_id) )

        $pdf = new Applicant;
        $path = $request->file('pdf_file')->store('/', ['disk' =>   'pdf']);
        $pdf->pdf = $path;
        $pdf->job_id = $job->job_id;
        $pdf->user_id = Auth::user()->user_id;
        $pdf->save();

        Alert::success('Success','You Submit Resume !');

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
