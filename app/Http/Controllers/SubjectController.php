<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Subject;
use App\Student;
use App\Attendance;
use App\Note;
use App\Assignment;
use App\Fcmtoken;
use App\Attendstudent;
use App\Internalmark;
use App\Internalstudentmark;
use Illuminate\Http\Request;
use App\Http\Resources\AssignmentCollection;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function dep(Request $request)
    {
        $res=DB::table('departments')->select('Department_Name','id')->get();
      // return [
      //                   'Login' => [
      //                       'response_message'=>"success",
      //                       'response_code'=>"1",
      //                       // 'Token'=>$token->access_token,
      //                       ],
      //                       'Data'=>$res,
      //                       // 'Subject'=>$subject,
      //               ];
                      return [
                        'status'=>true,
                        'data'=>['details'=>$res],
                        'displayMessage'=>"success",
                    ];
    } 
    public function years(Request $request)
    {
        // return $request->dep_id;
        $res=DB::table('classyears')->where('department_id',$request->dep_id)->pluck('subject_ids');
        $sub=Subject::whereIn('id',explode(',',$res[0]))->select('subject_name','id as subject_code')->get();
      // return [
      //                   'Login' => [
      //                       'response_message'=>"success",
      //                       'response_code'=>"1",
      //                       // 'Token'=>$token->access_token,
      //                       ],
      //                       'Data'=>$res,
      //                       // 'Subject'=>$subject,
      //               ];
                      return [
                        'status'=>true,
                        'data'=>['details'=>$sub],
                        'displayMessage'=>"success",
                    ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attendancestudents(Request $request)
    {
      $u=Attendance::updateorcreate([
        'department_id'=>$request->department_id,
        'subject_id'=>1,
        'hour'=>$request->hour,
        'date'=>$request->date
     ]);
      $s=Student::where('department_id',$request->department_id)->select('id','Student_Name','Admission_No')->get();
         return [
                        'status'=>true,
                        'data'=>['Attendance_id'=>$u->id,'Student_List'=>$s],
                        'displayMessage'=>"success",
                    ];

    }
    public function internalstudents(Request $request)
    {
      $u=Internalmark::updateorcreate([
        'department_id'=>$request->department_id,
        'Internal'=>$request->Internal,
        'subject_id'=>$request->subject_id,
     ]);
      $s=Student::where('department_id',$request->department_id)->select('id','Student_Name','Admission_No')->get();
         return [
                        'status'=>true,
                        'data'=>['Internal_id'=>$u->id,'Student_List'=>$s],
                        'displayMessage'=>"success",
                    ];

    }
    public function attendance(Request $request){
    $a=explode(',',$request->adstudent);
    $b=explode(',',$request->adattendance);
    if(count($a)==count($b))
      foreach ($a as $key => $value) {
       $u=Attendstudent::updateorcreate(           
      [  "attendance_id"=>$request->Attendance_id,  "student_id"=>$value],
    ["Attendance"=>$b[$key]]);
       if($b[$key]==0){
        $request->notify_type=4;
        $request->stud_id=$value;
        $call=Fcmtoken::sendmessage($request);
       }
      }
      return [
                  'status'=>true,
                  'data'=>["details"=>""],                  
                  'displayMessage'=>"success",
              ];

    }
    public function internalmark(Request $request){
    $a=explode(',',$request->instudent);
    $b=explode(',',$request->internalmark);
    if(count($a)==count($b))
      foreach ($a as $key => $value) {
       $u=Internalstudentmark::updateorcreate([
        "internalmark_id"=>$request->Internal_id,
        "student_id"=>$value],[
        "Obtained_Mark"=>$b[$key]]
      );
        $request->notify_type=3;
        $request->stud_id=$value;
        $call=Fcmtoken::sendmessage($request);
      }
      return [
                  'status'=>true,
                  'data'=>["details"=>""],
                  'displayMessage'=>"success",
              ];

    }
    public function viewattendance(Request $request)
    {
      // return $request->date;
      $time = strtotime($request->date);

      $date= date('Y-m-d',$time);

       $department=$request->department_id;       
       $hour=$request->hour;
       $date=$request->date;
       $user_type=$request->user_type;

       $res=Attendance::
       join('attendstudents as at','at.attendance_id','=','attendances.id')
       ->join('students as st','st.id','=','at.student_id')
            ->where('attendances.department_id',$department)
            ->where('attendances.hour',$hour)
            ->where('attendances.date',$date);
            if($user_type=="student" || $user_type=="parent")
            $res->where('student_id',Auth::user()->id);
          $res->select('Attendance','Student_Name','Admission_No');
            $res=$res->get();
  
      return [
                  'status'=>true,
                  'data'=>["details"=>$res],
                  'displayMessage'=>"success",
              ];

    }
    public function viewinternalmark(Request $request)
    {

       $department=$request->department_id;       
       $hour=$request->Internal;
       $date=$request->subject_id;
       $user_type=$request->user_type;

       $res=Internalmark::
       join('internalstudentmarks as at','at.internalmark_id','=','internalmarks.id')
       ->join('students as st','st.id','=','at.student_id')
            ->where('internalmarks.department_id',$department)
            ->where('internalmarks.Internal',$hour)
            ->where('internalmarks.subject_id',$date);
            if($user_type=="student" || $user_type=="parent")
            $res->where('student_id',Auth::user()->id);
          $res->select('Obtained_Mark','Student_Name','Admission_No');
            $res=$res->get();
  
      return [
                  'status'=>true,
                  'data'=>["details"=>$res],
                  'displayMessage'=>"success",
              ];

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $f2="";
      $fpath="";
      $department_id=$request->department_id;
      $ftype=$request->ftype;
      $destinationPath = 'uploads/'.$ftype;
      $file = $request->file('file');
      if(isset($file)){
      $file->getClientOriginalName();
      $file->getClientOriginalExtension();
      $file->getRealPath();
      $file->getSize();
      $file->getMimeType();
      $a= $file->move($destinationPath,$file->getClientOriginalName());
      }
        if($ftype=="assignment")
        {
        $subject_id=$request->subject_id;
        $date=$request->date;  
        $description=$request->description;  
        $fpath2=Assignment::where([
            'department_id'=>$department_id, 
           'subject_id'=>$subject_id, 
           'Date_of_submission'=>$date, 
           'Description'=>$description,           
        ])->get();
        if(isset($fpath2[0]))
          $f2=$fpath2[0]->File_path;
          if(isset($file))
        $fpath='http://www.detailsdashboard.tk/cg/public/uploads/'.$ftype.'/'.$file->getClientOriginalName();
       $a= Assignment::updateorcreate([
           'department_id'=>$department_id, 
           'subject_id'=>$subject_id, 
           'Date_of_submission'=>$date, 
           'File_path'=>$f2.','.$fpath,
           'Description'=>$description,
        ]);
        $request->notify_type=0;
        $request->department_id=$department_id;
        $call=Fcmtoken::sendmessage($request);
       }
       else
       {
        $unit=$request->unit;
        $subject_id=$request->subject_id;
        $fpath='http://www.detailsdashboard.tk/cg/public/uploads/'.$ftype.'/'.$file->getClientOriginalName();
        
        $a= Note::updateorcreate([
          'Unit'=>$unit, 
          'department_id'=>$department_id, 
          'subject_id'=>$subject_id, 
          'Filepath'=>$fpath, 
        ]);
         $request->notify_type=1;
        $request->department_id=$department_id;
        $call=Fcmtoken::sendmessage($request);

       }
    
     return [
                  'status'=>true,
                  'data'=>["details"=>$fpath],
                  'displayMessage'=>"success",
              ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      $department_id=$request->department_id;
      $ftype=$request->ftype;
     
        if($ftype=="assignment")
        {
        $subject_id=$request->subject_id;
        
       $res=new AssignmentCollection(Assignment::join('departments as d','d.id','assignments.department_id')
          ->join('subjects as s','s.id','assignments.subject_id')->where([
           'assignments.department_id'=>$department_id, 
           'assignments.subject_id'=>$subject_id,  
        ])->get());        
       }
       else
       {
        $unit=$request->unit;
        $subject_id=$request->subject_id;
       
        
        $res= Note::join('departments as d','d.id','notes.department_id')
          ->join('subjects as s','s.id','notes.subject_id')->where([
          'notes.Unit'=>$unit, 
          'notes.department_id'=>$department_id, 
          'notes.subject_id'=>$subject_id, 
        ])->distinct('notes.subject_id')->get();


       }
    
     return [
                  'status'=>true,
                  'data'=>["details"=>$res],
                  'displayMessage'=>"success",
              ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function dashboardapi(Request $request)
    {
       $res=Attendance::join('attendstudents as at','attendances.id','=','at.attendance_id')
                        ->where('date','>',$request->date)->where('student_id',Auth::user()->id)
                        ->select(DB::raw('SUM(hour) as total_hour'),DB::raw('(select SUM(hour) as attend_hour from `attendances` inner join `attendstudents` as `at1` on `attendances`.`id` = `at1`.`attendance_id` where `date` > "'.$request->date.'" and `student_id` = "'.Auth::user()->id.'" and Attendance =1 ) as student_hour'))
                        ->get();
      $res2=Internalstudentmark::
      join('internalmarks as i','i.id','=','internalstudentmarks.internalmark_id')
      ->join('departments as d','d.id','=','i.department_id')
      ->join('subjects as s','s.id','=','i.subject_id')
      ->where('student_id',Auth::user()->id)
      ->get();
      // return Auth::id();
      return [
                  'status'=>true,
                  'data'=>["details"=>['attendances'=>$res[0],'internalmarks'=>$res2]],
                  'displayMessage'=>"success",
              ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
     public function sendmessage(Request $request){
        $res=Fcmtoken::sendmessage($request);
        return $res;

    }
    public function notifications(Request $request){
        $res=Fcmtoken::notifications($request);
        return $res;

    }
}
