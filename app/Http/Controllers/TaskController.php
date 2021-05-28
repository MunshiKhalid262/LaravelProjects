<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

Use Redirect;
use DB;
use Session;
use App\CareerDetails;
use App\EmployeeDetails;


class TaskController extends Controller
{
    /** @var Request $request */
    protected $request;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request        = $request;
        
    }

    /**
     * index
     *
     * @return view
    */
    
    public function DoSaveCareer(Request $request){
        
        $postData = $this->request->all();
        echo$name=$postData['name'];die;
        $email=$postData['email'];
        $contact=$postData['contact'];
        $skill=$postData['skill'];
        $company=$postData['company'];
        $remarks=$postData['remarks'];
        $exp=$postData['exp'];

        $checkExist=CareerDetails::where('email',$email)->first();

        if(!is_null($checkExist)){
            return redirect()->route('index')->with('error',$msg);
        }
        else{
            $CareerDetails= new CareerDetails([
                'name' => $name,
                'email' => $email,
                'contact' => $address,
                'skill' => $name,
                'company' => $email,
                'remarks' => $address,
                'exp' => $name
            ]);
            if($CareerDetails->save()){
                $career_id=$CareerDetails->id;
                $path = $request->file('file');
                include(app_path().'/smtpmail/smtpmail/PHPMailerAutoload.php');
                $data=$mail_text;
                $mail = new \PHPMailer(true);
                $mail->IsSMTP();
                $mail->Host        = 'smtp.gmail.com';
                $mail->SMTPAuth    =  true;// turn on SMTP authentication
                $mail->Username    = '-----';   
                $mail->Password    = '-----'; 
                $mail->SMTPSecure  = 'tls';
                $mail->Port        = 587;
                $mail->From        = '-----';
                $mail->FromName    = 'Task';
                
                //$mail->SMTPDebug = 1;
                $mail->AddAddress($email);
                $mail->WordWrap    = 50;               // set word wrap
                $mail->Priority    = 1; 
                $mail->IsHTML(true);
                $mail->Subject =  $subject;
                $mail->addAttachment($path,'application/octet-stream');
                $mail->Body =  $data;
                if(!$mail->send()){
                    print_r($mail->ErrorInfo);die;
                }
                else{
                    return redirect()->route('index')->with('message','Career Saved Successfully!');
                }
            }
        }
        
    }
    public function home(){
        
        //echo "<pre>";print_r($EarningsArray);die;
        return view('company');
    }
    public function CareerDetails($id){
        $all_companies=CareerDetails::get();
        $companyNameArray=array();
        $EarningsArray=array();
        $EmpEarnArray=array();
        foreach ($all_companies as $key => $value) {
            $company_id = $value->id;
            array_push($companyNameArray, $value->name);
            $getTotalEarnigs = EmployeeDetails::select(DB::raw('sum(earning_2016 + earning_2017 + earning_2018) as total'))->where('company_id',$value->id)->get();
            $EarnArray=array();
            foreach ($getTotalEarnigs as $key => $value) {
                array_push($EarnArray, $value->total);
            }
            $amount=array_sum($EarnArray);
            array_push($EarningsArray, $amount);


        }
        
        $company_id=base64_decode($id);
        $CareerDetails=CareerDetails::where('id',$company_id)->first();
        $getEarningof_employee=EmployeeDetails::where('company_id',$company_id)->get();
        $Earn_of_2016=array();
        $Earn_of_2017=array();
        $Earn_of_2018=array();
        foreach ($getEarningof_employee as $key => $earn) {
            array_push($Earn_of_2016,$earn->earning_2016);
            array_push($Earn_of_2017,$earn->earning_2017);
            array_push($Earn_of_2018,$earn->earning_2018);
        }
        $total_earn_by_emp_of_2016=array_sum($Earn_of_2016);
        array_push($EmpEarnArray, $total_earn_by_emp_of_2016);
        $total_earn_by_emp_of_2017=array_sum($Earn_of_2017);
        array_push($EmpEarnArray, $total_earn_by_emp_of_2017);
        $total_earn_by_emp_of_2018=array_sum($Earn_of_2018);
        array_push($EmpEarnArray, $total_earn_by_emp_of_2018);
        // echo "<pre>";print_r($EmpEarnArray);die;
        $all_employees=EmployeeDetails::where('company_id',$company_id)->get();
        return view('company-details')->with(compact('all_employees','companyNameArray','EarningsArray','CareerDetails','EmpEarnArray'));
    }
    
}
