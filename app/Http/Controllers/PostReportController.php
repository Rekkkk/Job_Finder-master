<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobReport;
use App\Models\User;
use App\Models\Applicant;
use RealRashid\SweetAlert\Facades\Alert;
use DB;


use Illuminate\Http\Request;

class PostReportController extends Controller
{

    public function reportPostPage(){

        $reportedJobs = Job::where('num_reports', '>', 0)->get();
 
        return view ('/superadmin/reported-post', compact('reportedJobs'));
    }

    public function viewReportedPost(Job $job){

        $comment = JobReport::where('job_id', $job->job_id)->get();
        
        return view ('/superadmin/view-reported-post', compact('job', 'comment'));

    }

    public function unlistPost(Job $job){

        Job::where('job_id', $job->job_id)
        ->update(['unlisted' => 1]);

        Alert::success('Success','Unlisted post Successfully !');

        return back();

    }

    public function report(Request $request, Job $job){

        JobReport::create([
            'job_id' => $job->job_id,
            'comment' => $request->comment
        ]);

        DB::table('job')->where('job_id', $job->job_id)->increment('num_reports');

        $jobSelected = Job::where('job_id', $job->job_id)->first();

        User::where('user_id', $jobSelected->user_id)
        ->increment('num_reports');

        Alert::success('Success','You submit a report!');

        return back();


    }

    public function reportApplicant($user, Job $job){

        DB::table('applicant')->where('job_id', $job->job_id)
                            ->where('user_id', $user)
                            ->update(['is_reported' => 1]);

        User::where('user_id', $user)->increment('num_reports');
                    

        Alert::success('Success','You report applicant success !');

        return back();

    }

}
