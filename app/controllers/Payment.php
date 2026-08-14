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

    public function index()
    {
        $payments = $this->payment_model->get_payments();
        $data = [
            "payments" => $payments
        ];
        $this->view('Payment/get_payments',$data);
    }

    public function make_payment($membership_number){
        if(!isset($_POST['submit'])){
            

            $clubmember = $this->clubmember_model->get_clubmember($membership_number);

            $data=[
                'clubmember' => $clubmember
            ];

            $this->view("Payment/make_payment",$data);
        }
        else{
            $installment_number = $this->payment_model->get_installment_number($membership_number, $_POST['payment_year_target'])->installment_number;
            if ($installment_number >= 4) {
                echo 'You have already made 4 payments for the year '. $_POST['payment_year_target'] . '. You cannot make any more payments for this year Clubmember ' . $membership_number . '.';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Payment/make_payment/' . $membership_number . '">';
                
            }
            else{
                $data=[
                // 'payment_date' => trim($_POST['payment_date']),
                'amount' => trim($_POST['amount']),
                'payment_method' => trim($_POST['payment_method']),
                'payment_year_target' => trim($_POST['payment_year_target']),
                'installment_number' => $installment_number + 1
                
                ];
        
                if($this->payment_model->make_payment($data,$membership_number)){
                    echo 'Please wait we are processing the payment for you!';
                    
                    echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Payment/make_payment/' . $membership_number . '">';
                }
            }
            
        }
        
    }
}

?>