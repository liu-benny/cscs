<?php

class payment_model extends Model{

    public function __construct(){
            parent::__construct();
    }

    public function get_payments(){
        $this->query("SELECT Payment.payment_id, Payment.membership_number, Payment.payment_date, Payment.amount, Payment.payment_method, Payment.payment_year_target, Payment.installment_number, ClubMember.first_name, ClubMember.last_name
                    FROM Payment
                    JOIN ClubMember ON Payment.membership_number = ClubMember.membership_number");
        return $this->getResultSet();
    }

    public function get_payment($payment_id){
        $this->query("SELECT * FROM Payment WHERE payment_id = :payment_id");
        $this->bind(":payment_id",$payment_id);
        return $this->getSingle();
    }

    public function get_installment_number($membership_number, $payment_year_target){
        
        $this->query("SELECT COUNT(*) AS installment_number FROM Payment 
                    WHERE membership_number = :membership_number AND payment_year_target = :payment_year_target");
        $this->bind(":membership_number",$membership_number);
        $this->bind(":payment_year_target",$payment_year_target);
        return $this->getSingle();
    }

    public function make_payment($payment, $membership_number){

        $this->query("INSERT INTO Payment (membership_number, payment_date, amount, payment_method,payment_year_target,installment_number)
                      VALUES (:membership_number, CURDATE(), :amount, :payment_method,:payment_year_target, :installment_number)");

        $this->bind(":membership_number",$membership_number);
        // $this->bind(":payment_date",$payment['payment_date']);
        $this->bind(":amount",$payment['amount']);
        $this->bind(":payment_method",$payment['payment_method']);
        $this->bind(":payment_year_target",$payment['payment_year_target']);
        $this->bind(":installment_number",$payment['installment_number']);

        return $this->execute();
    }
}