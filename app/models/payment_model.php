<?php

class payment_model extends Model{

    public function __construct(){
            parent::__construct();
    }

    public function get_payments(){
        $this->query("SELECT * FROM Payment");
        return $this->getResultSet();
    }

    public function get_payment($payment_id){
        $this->query("SELECT * FROM Payment WHERE payment_id = :payment_id");
        $this->bind(":payment_id",$payment_id);
        return $this->getSingle();
    }

    public function make_payment($payment, $membership_number){

        $this->query("INSERT INTO Payment (membership_number, payment_date, amount, payment_method,payment_year_target)
                      VALUES (:membership_number, :payment_date, :amount, :payment_method,:payment_year_target)");

        $this->bind(":membership_number",$membership_number);
        $this->bind(":payment_date",$payment['payment_date']);
        $this->bind(":amount",$payment['amount']);
        $this->bind(":payment_method",$payment['payment_method']);
        $this->bind(":payment_year_target",$payment['payment_year_target']);

        return $this->execute();
    }
}