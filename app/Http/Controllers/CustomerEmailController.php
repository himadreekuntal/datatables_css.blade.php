<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerEmailRequest;
use App\Http\Requests\UpdateCustomerEmailRequest;
use App\Models\CustomerEmail;
use App\Models\CustomerEmailDetail;
use App\Models\MailFile;
use App\Models\Product;
use App\Models\User;
use App\Repositories\CustomerEmailRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;

use Response;
use Session;
use Mail;
use File;
use PDF;
class CustomerEmailController extends AppBaseController
{
    /** @var  CustomerEmailRepository */
    private $customerEmailRepository;

    public function __construct(CustomerEmailRepository $customerEmailRepo)
    {
        $this->customerEmailRepository = $customerEmailRepo;
    }

    /**
     * Display a listing of the CustomerEmail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $customerEmails = $this->customerEmailRepository->all();

        return view('customer_emails.index')
            ->with('customerEmails', $customerEmails);
    }

    /**
     * Show the form for creating a new CustomerEmail.
     *
     * @return Response
     */
    public function create()
    {
        return view('customer_emails.create');
    }

    /**
     * Store a newly created CustomerEmail in storage.
     *
     * @param CreateCustomerEmailRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomerEmailRequest $request)
    {
       $customerEmail = New CustomerEmail();
       $customerEmail->category = $request->category;
        foreach ($request->customer_names as $key => $customer_names) {
            $customerEmail->total_industry = count($request->customer_names);
        }
       $customerEmail->save();

        foreach ($request->customer_names as $key => $customer_names) {

            $customerEmailDetails = new CustomerEmailDetail();
            $customerEmailDetails->email_id= $customerEmail->id;
            $customerEmailDetails->customer_name = $request->customer_names[$key];
            $customerEmailDetails->customer_company = $request->customer_companies[$key];
            $customerEmailDetails->customer_email = $request->customer_emails[$key];
            $customerEmailDetails->customer_phone = $request->customer_phones[$key];
            $customerEmailDetails->save();
        }
        Flash::success('Customer Email saved successfully.');

        return redirect(route('customerEmails.index'));
    }

    /**
     * Display the specified CustomerEmail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customerEmail = $this->customerEmailRepository->find($id);
        $customerEmailDetail = CustomerEmailDetail::where('email_id',$id)->get();

        if (empty($customerEmail)) {
            Flash::error('Customer Email not found');

            return redirect(route('customerEmails.index'));
        }

        return view('customer_emails.show',compact('customerEmailDetail'))->with('customerEmail', $customerEmail);
    }

    /**
     * Show the form for editing the specified CustomerEmail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customerEmail = $this->customerEmailRepository->find($id);

        if (empty($customerEmail)) {
            Flash::error('Customer Email not found');

            return redirect(route('customerEmails.index'));
        }

        return view('customer_emails.edit')->with('customerEmail', $customerEmail);
    }

    /**
     * Update the specified CustomerEmail in storage.
     *
     * @param int $id
     * @param UpdateCustomerEmailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomerEmailRequest $request)
    {
        $customerEmail = $this->customerEmailRepository->find($id);

        if (empty($customerEmail)) {
            Flash::error('Customer Email not found');

            return redirect(route('customerEmails.index'));
        }

        $customerEmail = $this->customerEmailRepository->update($request->all(), $id);

        Flash::success('Customer Email updated successfully.');

        return redirect(route('customerEmails.index'));
    }

    /**
     * Remove the specified CustomerEmail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $customerEmail = $this->customerEmailRepository->find($id);

        if (empty($customerEmail)) {
            Flash::error('Customer Email not found');

            return redirect(route('customerEmails.index'));
        }

        $this->customerEmailRepository->delete($id);

        Flash::success('Customer Email deleted successfully.');

        return redirect(route('customerEmails.index'));
    }

    public function email($id)
    {
        $customerEmail = CustomerEmail::findorfail($id);
        return view('customer_emails.email',compact('id','customerEmail'));
    }

    public function sms($id)
    {
        $customerEmail = CustomerEmail::findorfail($id);
        return view('customer_emails.sms',compact('id','customerEmail'));
    }


    public function sendEmail(Request $request)
    {
      //dd($request->all());
        $email = CustomerEmailDetail::where('email_id',$request->id)->get();


        $this->validate($request, [

            'filename' => 'required',
            'filename.*' => 'mimes:doc,pdf,docx,zip'

        ]);

    if($request->hasFile('filename')) {
     //  dd($request->file('filename'));

        foreach($request->file('filename') as $file){
           // dd($file);
//            $name = $file->getClientOriginalName();
//            $file->move(public_path('product_mail'), $name);
//            $data[] = $name;
            $path = public_path('product_mail');
            $name = $file->getClientOriginalName();
            $file->move($path, $name);

            $doc[] = $name;
        }
    }

//        $file= new MailFile();
//        $file->filename=json_encode($data);
//
//        $file->save();



        foreach($email as $email){
            $mail = $email->customer_email;
            $name = $email->customer_name;
            $data["email"]=$mail;
            $data["client_name"]=$name;
            $data["subject"]=$request->mail_subject;
            $data["body"]=$request->mail_body;


           // $pdf = $pdf_name;
            try{
                Mail::send('customer_emails.body', $data, function($message)use($data) {
                    $message->to($data["email"], $data["client_name"])
                        ->subject($data["subject"]);


                });
            }catch(JWTException $exception){
                $this->serverstatuscode = "0";
                $this->serverstatusdes = $exception->getMessage();
            }
        }
        if (Mail::failures()) {
            Session::flash('error','Couldnot sent the Email.');
            return redirect(route('customerEmails.index'));

        }else{

            Session::flash('success','Email has been sent.');
            return redirect(route('customerEmails.index'));
        }

    }

    public function sendSms(Request $request)
    {
        //dd($request->all());
        $email = CustomerEmailDetail::where('email_id',$request->id)->get();
        foreach($email as $email) {

            $number = $email->customer_phone;

            $url = "http://66.45.237.70/maskingapi.php";
            $data= array(
                'username'=>"symbex",
                'password'=>"W6X7NDT3",
                'senderid'=>"SymbexIT",
                'number'=>$number,
                'message'=>nl2br($request->sms_body),
            );

            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);
            $p = explode("|",$smsresult);
            $sendstatus = $p[0];

        }
        Session::flash('success','SMS has been sent.');
        return redirect(route('customerEmails.index'));

    }


    public function testEmail()
    {
        $users = User::where('status', 1)->get();
        $startMonth = Carbon::now();
        $lastMonth =  $startMonth->subMonth()->format('F');
        $fileName = $lastMonth.'.pdf';

        $product = Product::all();
        $amount = Product::select(DB::raw('sum(qty * selling_price) as total'))->first();
        $total = $amount->total;


        $pdf = PDF::loadView('reports.monthlystock',compact('product','total','lastMonth'));


        foreach($users as $users){
            $mail = $users->email;
            $name = $users->name;

            $data["email"]=$mail;
            $data["client_name"]=$name;
            $data["subject"]='New Sales';
            $data["attachment"] = $fileName;

            try{
                Mail::send('reports.body', $data, function($message)use($data,$pdf) {
                    $message->to($data["email"], $data["client_name"])
                        ->subject($data["subject"])
                        ->attachData($pdf->output(),  $data["attachment"]);
                });
            }catch(JWTException $exception){
                $this->serverstatuscode = "0";
                $this->serverstatusdes = $exception->getMessage();
            }
        }

        if (Mail::failures()) {
            Session::flash('error','Couldnot sent the Email.');

        }else {

            Session::flash('success', 'Email has been sent.');
        }

    }

}
