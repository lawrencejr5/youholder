<?php
session_start();
include '../adminModule.php';

if (isset($_POST['user_id'])) {
    $uid = $_POST['user_id'];
    $wallet_id = $_POST['currency_id']; 
    $amount = $_POST['amount'];
    
    // Mapping for wallet names
    $walletsList = [
        1 => "USD", 2 => "BTC", 3 => "ETH", 4 => "EUR", 5 => "GBP", 6 => "DOGE", 
        7 => "USDC", 8 => "USDT", 9 => "ADA", 10 => "SHIB", 11 => "BNB", 12 => "LTC", 
        13 => "SOL", 14 => "LINK", 15 => "DOT", 16 => "MATIC", 17 => "TRX", 18 => "AVAX", 19 => "XRP"
    ];
    $wallet_name = $walletsList[$wallet_id] ?? 'USD';

    // Defaults for admin deposit
    $transaction_type = 'deposit';
    $approved = '1';

    $result = false;
    if (!empty($uid) && !empty($wallet_id) && !empty($amount)) {
        $result = $adminModule->adminAddDeposit($uid, $wallet_id, $wallet_name, $amount, $transaction_type, $approved);
    }
    
    if ($result) {
        $_SESSION['msg'] = "Deposit successful!";
    } else {
        $_SESSION['msg'] = "Failed to deposit. Check if your fields are correct.";
    }

    header("Location: ../../admin/users/deposit.php?userid=$uid");
    exit;
}
