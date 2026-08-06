<?php

class Payment extends Controller
{
    protected $payment_model;
    protected $clubmember_model;

    public function __construct()
    {
        $this->payment_model = $this->model('payment_model');
        $this->clubmember_model = $this->model('clubmember_model');
    }

    // public function index()
    // {
    //     $payments = $this->payment_model->get_payments();
    //     $data = [
    //         "payments" => $payments
    //     ];
    //     $this->view('Payment/get_payments',$data);
    // }

    public function make_payment($membership_number){
        if(!isset($_POST['submit'])){
            

            $clubmember = $this->clubmember_model->get_clubmember($membership_number);

            $data=[
                'membership_number' => $membership_number,
                'clubmember' => $clubmember
            ];

            $this->view("Payment/make_payment",$data);
        }
        else{
            $data=[
                'payment_date' => trim($_POST['payment_date']),
                'amount' => trim($_POST['amount']),
                'payment_method' => trim($_POST['payment_method']),
                'payment_year_target' => trim($_POST['payment_year_target'])
                
            ];
    
            if($this->payment_model->make_payment($data,$membership_number)){
                echo 'Please wait we are processing the payment for you!';
                
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Payment/index">';
            }
        }
        
    }
}

?>