<?php

include '../adminModule.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $type = $_POST['transaction_type'];
   
   switch($type){
       case "deposit":
       case "exchange to":
       case "transfer to":
       case "ref bonus":
       case "Investment return":
       case "Stake return":
           $adminModule -> deleteDeposit($id);
           break;
       case "withdrawal":
       case "exchange from":
       case "transfer from": 
       case "investment": 
       case "staking": 
           $adminModule -> deleteWithdrawal($id);
           break;
   }
   header('location: ../../admin/transactions');
}