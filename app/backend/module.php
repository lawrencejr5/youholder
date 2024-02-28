<?php

include 'conn.php';
class Modules extends Connection
{
    private $sql;
    private $stmt;
    private $msg;
    private $otp;

    // Function to check if user already exists
    private function checkEmailExists($email)
    {
        $this->sql = "SELECT email FROM users WHERE email = :email";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':email', $email);
        $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->stmt->execute();
        return $this->stmt->rowCount();
    }

    // Check if old password is correct
    private function checkPassword($password, $id)
    {
        $this->sql = "SELECT password FROM users WHERE password = :password AND id = :id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':id', $id);
        $this->stmt->bindParam(':password', $password);
        $this->stmt->execute();
        $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->stmt->rowCount();
    }

    public function checkWallet($uid, $wallet_id)
    {
        $this->sql = "SELECT * FROM user_wallets WHERE uid = :uid AND wallet_id = :wallet_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':wallet_id', $wallet_id);
        $this->stmt->bindParam(':uid', $uid);
        $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->stmt->execute();
        return $this->stmt->rowCount();
    }

    // Function to create account
    public function register($fname, $lname, $email, $account_no, $phone, $password, $otp)
    {
        if ($this->checkEmailExists($email) > 0) {
            $this->msg = "exists";
            return $this->msg;
        } else {
            $this->sql = "INSERT INTO users(fname, lname, email, account_no, phone, password, verify_code) VALUES(:fname, :lname, :email, :account_no, :phone, :password, :verify_code)";
            try {
                $this->stmt = $this->conn->prepare($this->sql);
                $this->stmt->bindParam(':fname', $fname);
                $this->stmt->bindParam(':lname', $lname);
                $this->stmt->bindParam(':email', $email);
                $this->stmt->bindParam(':account_no', $account_no);
                $this->stmt->bindParam(':phone', $phone);
                $this->stmt->bindParam(':password', $password);
                $this->stmt->bindParam(':verify_code', $otp);
                $this->stmt->execute();
                $this->msg = 'chuwa';
                return $this->msg;
            } catch (PDOException $e) {
                echo "Failed," . $e->getMessage();
            }
        }
    }

    // Login user if user exists
    public function login($email, $pass)
    {
        try {
            //code...
            $this->sql = "SELECT * FROM users WHERE email = :email AND password = :password";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':email', $email);
            $this->stmt->bindParam(':password', $pass);
            $this->stmt->execute();
            return $this->stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Update user personal details
    public function updateProfile($fname, $lname, $phone, $address1, $address2, $city, $state, $country, $timezone, $id)
    {
        try {
            //code...
            $this->sql = "UPDATE users SET fname = :fname, lname = :lname, phone = :phone, address1 = :address1, address2 = :address2, city = :city, state = :state, country = :country, timezone = :timezone WHERE id = :id";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':fname', $fname);
            $this->stmt->bindParam(':lname', $lname);
            $this->stmt->bindParam(':phone', $phone);
            $this->stmt->bindParam(':address1', $address1);
            $this->stmt->bindParam(':address2', $address2);
            $this->stmt->bindParam(':city', $city);
            $this->stmt->bindParam(':state', $state);
            $this->stmt->bindParam(':timezone', $timezone);
            $this->stmt->bindParam(':country', $country);
            $this->stmt->bindParam(':id', $id);
            if ($this->stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            //throw $e
            echo 'false ' . $e->getMessage();
            return false;
        }
    }

    // Upgrade level
    public function upLevel($id, $level)
    {
        try {
            //code...
            $this->sql = "UPDATE users SET level = :level WHERE id = :id";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':level', $level);
            $this->stmt->bindParam(':id', $id);
            if ($this->stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            //throw $e
            echo 'false ' . $e->getMessage();
            return false;
        }
    }


    // Update password of user
    public function updatePassword($oldPassword, $newPassword, $id)
    {
        try {
            if ($this->checkPassword($oldPassword, $id) == 1) {
                $this->sql = "UPDATE users SET password = :password WHERE id = :id";
                $this->stmt = $this->conn->prepare($this->sql);
                $this->stmt->bindParam(':password', $newPassword);
                $this->stmt->bindParam(':id', $id);
                $this->stmt->execute();
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error' . $e->getMessage();
        }
    }

    // Update profile pic
    public function updateProfilePic($pic, $id)
    {
        try {
            $this->sql = "UPDATE users SET profile_pic = :profile_pic WHERE id = :id";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':profile_pic', $pic);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error' . $e->getMessage();
        }
    }

    // Upload personal verification
    public function uploadPersonalVerification($id, $type, $number, $front, $back)
    {
        try {
            $this->sql = "INSERT INTO personal_documents(uid, identity_type, identity_number, front, back) VALUES(:uid, :identity_type, :identity_number, :front, :back)";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $id);
            $this->stmt->bindParam(':identity_type', $type);
            $this->stmt->bindParam(':identity_number', $number);
            $this->stmt->bindParam(':front', $front);
            $this->stmt->bindParam(':back', $back);
            $this->stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error' . $e->getMessage();
        }
    }

    // Add wallet
    public function addWallet($uid, $wallet_id, $wallet_name)
    {
        if ($this->checkWallet($uid, $wallet_id) > 0) {
            try {
                $this->sql = "DELETE FROM user_wallets WHERE uid = :uid AND wallet_id = :wallet_id";
                $this->stmt = $this->conn->prepare($this->sql);
                $this->stmt->bindParam(':uid', $uid);
                $this->stmt->bindParam(':wallet_id', $wallet_id);
                $this->stmt->execute();
                return false;
            } catch (PDOException $e) {
                echo 'Error' . $e->getMessage();
            }
        } elseif ($this->checkWallet($uid, $wallet_id) == 0) {
            try {
                $this->sql = "INSERT INTO user_wallets(uid, wallet_id, wallet_name) VALUES(:uid, :wallet_id, :wallet_name)";
                $this->stmt = $this->conn->prepare($this->sql);
                $this->stmt->bindParam(':uid', $uid);
                $this->stmt->bindParam(':wallet_id', $wallet_id);
                $this->stmt->bindParam(':wallet_name', $wallet_name);
                $this->stmt->execute();
                $this->msg = "added";
                return true;
            } catch (PDOException $e) {
                echo 'Error' . $e->getMessage();
            }
        }
    }

    public function addDeposit($uid, $wallet_id, $wallet, $curr, $amount, $value)
    {
        try {
            //code...
            $this->sql = "INSERT INTO deposits(uid,wallet_id, wallet, currency, deposit_amt, return_amt) VALUES(:uid, :wallet_id, :wallet, :currency, :deposit_amt, :return_amt)";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_id', $wallet_id);
            $this->stmt->bindParam(':wallet', $wallet);
            $this->stmt->bindParam(':currency', $curr);
            $this->stmt->bindParam(':deposit_amt', $amount);
            $this->stmt->bindParam(':return_amt', $value);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            //throw $th;
            echo "failed" . $th->getMessage();
        }
    }

    public function makeWithdrawal($uid, $wid, $amt, $address, $wallet)
    {
        try {
            //code...
            $this->sql = "INSERT INTO withdrawals(uid, wallet_id, amount, crypto_address, wallet_name) VALUES(:uid, :wallet_id, :amount, :crypto_address, :wallet_name)";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_id', $wid);
            $this->stmt->bindParam(':amount', $amt);
            $this->stmt->bindParam(':crypto_address', $address);
            $this->stmt->bindParam(':wallet_name', $wallet);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            //throw $th;
            echo 'failed' . $th->getMessage();
        }
    }

    public function makeTransferTo($uid, $wid, $curr, $wallet, $amt, $from_to, $note, $approved, $type)
    {
        try {
            $this->sql = "INSERT INTO deposits(uid, wallet_id, currency, wallet, deposit_amt, return_amt, from_to, notes, approved, transaction_type) 
            VALUES(:uid, :wallet_id, :currency, :wallet, :deposit_amt, :return_amt, :from_to, :notes, :approved, :transaction_type)";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_id', $wid);
            $this->stmt->bindParam(':currency', $curr);
            $this->stmt->bindParam(':wallet', $wallet);
            $this->stmt->bindParam(':deposit_amt', $amt);
            $this->stmt->bindParam(':return_amt', $amt);
            $this->stmt->bindParam(':from_to', $from_to);
            $this->stmt->bindParam(':notes', $note);
            $this->stmt->bindParam(':approved', $approved);
            $this->stmt->bindParam(':transaction_type', $type);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            //throw $th;
            echo 'failed' . $th->getMessage();
        }
    }

    public function makeTransferFrom($uid, $wid, $wallet, $amt, $from_to, $note, $approved, $type)
    {
        try {
            $this->sql = "INSERT INTO withdrawals(uid, wallet_id, wallet_name, amount, from_to, notes, verified, transaction_type) 
            VALUES(:uid, :wallet_id, :wallet_name, :amount, :from_to, :notes, :verified, :transaction_type)";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_id', $wid);
            $this->stmt->bindParam(':wallet_name', $wallet);
            $this->stmt->bindParam(':amount', $amt);
            $this->stmt->bindParam(':from_to', $from_to);
            $this->stmt->bindParam(':notes', $note);
            $this->stmt->bindParam(':verified', $approved);
            $this->stmt->bindParam(':transaction_type', $type);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            //throw $th;
            echo 'failed' . $th->getMessage();
        }
    }

    public function exchangeTo($uid, $widt, $wallet_from, $wallet_to, $amount, $converted, $approved, $type)
    {
        try {
            //code...
            $this->sql = "INSERT INTO deposits(uid, wallet_id, currency, wallet, deposit_amt, return_amt, approved, transaction_type) 
            VALUES(:uid, :wallet_id, :currency, :wallet, :deposit_amt, :return_amt, :approved, :transaction_type)";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_id', $widt);
            $this->stmt->bindParam(':currency', $wallet_from);
            $this->stmt->bindParam(':wallet', $wallet_to);
            $this->stmt->bindParam(':deposit_amt', $amount);
            $this->stmt->bindParam(':return_amt', $converted);
            $this->stmt->bindParam(':approved', $approved);
            $this->stmt->bindParam(':transaction_type', $type);
            $this->stmt->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function exchangeFrom($uid, $widf, $wallet_from, $converted, $approved, $type)
    {
        try {
            $this->sql = "INSERT INTO withdrawals(uid, wallet_id, wallet_name, amount, verified, transaction_type) 
            VALUES(:uid, :wallet_id, :wallet_name, :amount, :verified, :transaction_type)";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_id', $widf);
            $this->stmt->bindParam(':wallet_name', $wallet_from);
            $this->stmt->bindParam(':amount', $converted);
            $this->stmt->bindParam(':verified', $approved);
            $this->stmt->bindParam(':transaction_type', $type);
            $this->stmt->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function stake($uid, $plan_id, $wid, $plan_name, $staked, $expected, $earned, $start, $end, $last_updated)
    {
        $this->sql = "INSERT INTO stakes(uid, plan_id, wid, plan_name, staked, daily_earned, earned, expected, start_date, end_date, last_updated) VALUES(:uid, :plan_id, :wid, :plan_name, :staked, :daily_earned, :earned, :expected, :start_date, :end_date, :last_updated)";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':plan_id', $plan_id);
            $this->stmt->bindParam(':wid', $wid);
            $this->stmt->bindParam(':plan_name', $plan_name);
            $this->stmt->bindParam(':staked', $staked);
            $this->stmt->bindParam(':daily_earned', $earned);
            $this->stmt->bindParam(':earned', $earned);
            $this->stmt->bindParam(':expected', $expected);
            $this->stmt->bindParam(':start_date', $start);
            $this->stmt->bindParam(':end_date', $end);
            $this->stmt->bindParam(':last_updated', $last_updated);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function stakeUp($id, $earned, $time)
    {
        $this->sql = "UPDATE stakes SET earned = :earned, last_updated = :last_updated WHERE id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':earned', $earned);
            $this->stmt->bindParam(':last_updated', $time);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function stakeStat($id, $status)
    {
        $this->sql = "UPDATE stakes SET status = :status WHERE id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':status', $status);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function stakeEnd($id, $ended)
    {
        $this->sql = "UPDATE stakes SET ended = :ended WHERE id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':ended', $ended);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function stakeAddDay($id, $num_of_days)
    {
        $this->sql = "UPDATE stakes SET num_of_days = :num_of_days WHERE id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':num_of_days', $num_of_days);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function stakeReduceWithdrawDay($id, $days_until_withdrawal, $last_updated)
    {
        $this->sql = "UPDATE stakes SET days_until_withdrawal = :days_until_withdrawal, last_updated = :last_updated WHERE id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':days_until_withdrawal', $days_until_withdrawal);
            $this->stmt->bindParam(':last_updated', $last_updated);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function stakeAvailableWithdrawal($id, $available_withdrawal)
    {
        $this->sql = "UPDATE stakes SET available_withdrawal = :available_withdrawal WHERE id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':available_withdrawal', $available_withdrawal);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function stakeCapitalReturned($id)
    {
        $this->sql = "UPDATE stakes SET capital_returned = '1' WHERE id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function claimStakeProfit($uid, $wallet_id, $currency, $wallet, $deposit_amt, $return_amt, $transaction_type, $approved)
    {
        $this->sql = "INSERT INTO deposits(uid, wallet_id, currency, wallet, deposit_amt, return_amt, transaction_type, approved) 
        VALUES(:uid, :wallet_id, :currency, :wallet, :deposit_amt, :return_amt, :transaction_type, :approved)";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_id', $wallet_id);
            $this->stmt->bindParam(':currency', $currency);
            $this->stmt->bindParam(':wallet', $wallet);
            $this->stmt->bindParam(':deposit_amt', $deposit_amt);
            $this->stmt->bindParam(':return_amt', $return_amt);
            $this->stmt->bindParam(':transaction_type', $transaction_type);
            $this->stmt->bindParam(':approved', $approved);
            $this->stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false . $e->getMessage();
        }
    }

    public function stakeWithdrawal($uid, $wallet_id, $wallet_name, $amount, $verified, $transaction_type)
    {
        $this->sql = "INSERT INTO withdrawals(uid, wallet_id, wallet_name, amount, verified, transaction_type) VALUES(:uid, :wallet_id, :wallet_name, :amount, :verified, :transaction_type)";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_id', $wallet_id);
            $this->stmt->bindParam(':wallet_name', $wallet_name);
            $this->stmt->bindParam(':amount', $amount);
            $this->stmt->bindParam(':verified', $verified);
            $this->stmt->bindParam(':transaction_type', $transaction_type);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return false . $th->getMessage();
        }
    }

    public function invest($uid, $plan_id, $wid, $plan, $currency, $amount, $usdVal, $to_earn, $expected, $start_date, $end_date, $last_updated)
    {
        $this->sql = "INSERT INTO investments(uid, plan_id, wid, plan, currency, amount, usd_val, to_earn, earned, expected, start_date, end_date, last_updated) 
        VALUES(:uid, :plan_id, :wid, :plan, :currency, :amount, :usd_val, :to_earn, :earned, :expected, :start_date, :end_date, :last_updated)";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':plan_id', $plan_id);
            $this->stmt->bindParam(':wid', $wid);
            $this->stmt->bindParam(':plan', $plan);
            $this->stmt->bindParam(':currency', $currency);
            $this->stmt->bindParam(':amount', $amount);
            $this->stmt->bindParam(':usd_val', $usdVal);
            $this->stmt->bindParam(':to_earn', $to_earn);
            $this->stmt->bindParam(':earned', $to_earn);
            $this->stmt->bindParam(':expected', $expected);
            $this->stmt->bindParam(':start_date', $start_date);
            $this->stmt->bindParam(':end_date', $end_date);
            $this->stmt->bindParam(':last_updated', $last_updated);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function changeInvestStatus($id, $status)
    {
        $this->sql = "UPDATE investments SET status = :status WHERE id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':status', $status);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function changeInvestPhase($id, $phase)
    {
        $this->sql = "UPDATE investments SET phase = :phase WHERE id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':phase', $phase);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function investAvailableWithdraw($id, $available_withdrawal)
    {
        $this->sql = "UPDATE investments SET available_withdrawal = :available_withdrawal WHERE id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':available_withdrawal', $available_withdrawal);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function investIncreaseDay($id, $num_of_days)
    {
        $this->sql = "UPDATE investments SET num_of_days = :num_of_days WHERE id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':num_of_days', $num_of_days);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function investUp($id, $earned, $time)
    {
        $this->sql = "UPDATE investments SET earned = :earned, last_updated = :last_updated WHERE id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':earned', $earned);
            $this->stmt->bindParam(':last_updated', $time);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function investWithdrawal($uid, $wallet_id, $wallet_name, $amount, $verified, $transaction_type)
    {
        $this->sql = "INSERT INTO withdrawals(uid, wallet_id, wallet_name, amount, verified, transaction_type) VALUES(:uid, :wallet_id, :wallet_name, :amount, :verified, :transaction_type)";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_id', $wallet_id);
            $this->stmt->bindParam(':wallet_name', $wallet_name);
            $this->stmt->bindParam(':amount', $amount);
            $this->stmt->bindParam(':verified', $verified);
            $this->stmt->bindParam(':transaction_type', $transaction_type);
            $this->stmt->execute();
            return true;
        } catch (PDOException $th) {
            return false . $th->getMessage();
        }
    }

    public function claimInvestProfit($uid, $wallet_id, $currency, $wallet, $deposit_amt, $return_amt, $transaction_type, $approved)
    {
        $this->sql = "INSERT INTO deposits(uid, wallet_id, currency, wallet, deposit_amt, return_amt, transaction_type, approved) 
        VALUES(:uid, :wallet_id, :currency, :wallet, :deposit_amt, :return_amt, :transaction_type, :approved)";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_id', $wallet_id);
            $this->stmt->bindParam(':currency', $currency);
            $this->stmt->bindParam(':wallet', $wallet);
            $this->stmt->bindParam(':deposit_amt', $deposit_amt);
            $this->stmt->bindParam(':return_amt', $return_amt);
            $this->stmt->bindParam(':transaction_type', $transaction_type);
            $this->stmt->bindParam(':approved', $approved);
            $this->stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false . $e->getMessage();
        }
    }













    // ******FETCH FROM DATABASE********

    # Fetch user data
    public function getUserData($id)
    {
        try {
            $this->sql = 'SELECT * FROM users WHERE id = :id';
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }

    #Fetch all users
    public function getAllUsers()
    {
        try {
            $this->sql = 'SELECT * FROM users';
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }

    #Fetch all users except you
    public function getAllUsersExceptYou($id)
    {
        try {
            $this->sql = 'SELECT * FROM users EXCEPT SELECT * FROM users WHERE id = :id';
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }

    # Fetch all wallets
    public function getAllWallets()
    {
        try {
            $this->sql = "SELECT * FROM wallets";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    # Fetch all user wallets
    public function getAllUserWalletsL($uid)
    {
        try {
            $this->sql = "SELECT w.wallet_name as wallet_name, w.wallet_img as wallet_img, w.wallet_type as wallet_type,
             uw.uid as uid, uw.wallet_id as wallet_id
             FROM user_wallets uw 
             LEFT JOIN wallets w ON uw.wallet_name = w.wallet_name
             WHERE uw.uid = :uid
             LIMIT 4";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function getAllUserWallets($uid)
    {
        try {
            $this->sql = "SELECT w.wallet_name as wallet_name, w.wallet_img as wallet_img, w.wallet_type as wallet_type,
             uw.uid as uid, uw.wallet_id as wallet_id
             FROM user_wallets uw 
             LEFT JOIN wallets w ON uw.wallet_id = w.id
             WHERE uw.uid = :uid";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }


    # Get the total amount of oney a wallet
    public function getTotalDeposits($uid, $w_name)
    {
        try {
            $this->sql = "SELECT SUM(d.return_amt) as amount, w.wallet_name as wallet_name 
            FROM deposits d 
            LEFT JOIN wallets w ON w.wallet_name = d.wallet 
            WHERE d.uid = :uid AND d.wallet = :wallet_name AND approved = '1'";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_name', $w_name);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    # Get the total amount of oney a wallet
    public function getTotalWithdrawals($uid, $w_name)
    {
        try {
            $this->sql = "SELECT SUM(wt.amount) as amount, w.wallet_name as wallet_name 
            FROM withdrawals wt 
            LEFT JOIN wallets w ON w.wallet_name = wt.wallet_name 
            WHERE wt.uid = :uid AND wt.wallet_name = :wallet_name AND verified = '1'";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_name', $w_name);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function allTransactions($uid, $limit)
    {
        try {
            //code...
            $this->sql = "SELECT d.id as id, d.uid as uid, d.return_amt as amount, 
            d.datetime as datetime, d.transaction_type as transaction_type, d.wallet as wallet, d.from_to as from_to, d.approved as verified, w.wallet_img as wallet_img  
            FROM deposits d 
            LEFT JOIN wallets w ON d.wallet = w.wallet_name
            WHERE uid = :uid
            UNION ALL
            SELECT wt.id as id, wt.uid as uid, wt.amount as amount, wt.datetime as datetime, 
            wt.transaction_type as transaction_type, wt.wallet_name as wallet, wt.from_to as from_to, wt.verified as verified, w.wallet_img as wallet_img 
            FROM withdrawals wt 
            LEFT JOIN wallets w ON wt.wallet_name = w.wallet_name
            WHERE uid = :uid
            ORDER BY datetime DESC
            LIMIT $limit
            ";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function getSingleTransaction($id, $transaction_type)
    {
        try {
            //code...
            $this->sql = "SELECT d.id as id, d.uid as uid, d.return_amt as amount, d.crypto_address, d.currency, d.deposit_amt,
            d.datetime as datetime, d.transaction_type as transaction_type, d.wallet as wallet, d.from_to as from_to, d.approved as verified, w.wallet_img as wallet_img, d.notes
            FROM deposits d 
            LEFT JOIN wallets w ON d.wallet = w.wallet_name
            WHERE d.id = :id AND transaction_type = :transaction_type
            UNION ALL
            SELECT wt.id as id, wt.uid as uid, wt.amount as amount, wt.crypto_address, wt.wallet_name, wt.amount, wt.datetime as datetime, 
            wt.transaction_type as transaction_type, wt.wallet_name as wallet, wt.from_to as from_to, wt.verified as verified, w.wallet_img as wallet_img, wt.notes
            FROM withdrawals wt 
            LEFT JOIN wallets w ON wt.wallet_name = w.wallet_name
            WHERE wt.id = :id AND transaction_type = :transaction_type
            ORDER BY datetime DESC
            ";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->bindParam(':transaction_type', $transaction_type);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function getLastTransaction($uid)
    {
        try {
            //code...
            $this->sql = "SELECT d.id as id, d.uid as uid, d.return_amt as amount, 
            d.datetime as datetime, d.transaction_type as transaction_type, d.wallet as wallet, d.from_to as from_to, d.approved as verified, w.wallet_img as wallet_img  
            FROM deposits d 
            LEFT JOIN wallets w ON d.wallet = w.wallet_name
            WHERE uid = :uid
            UNION ALL
            SELECT wt.id as id, wt.uid as uid, wt.amount as amount, wt.datetime as datetime, 
            wt.transaction_type as transaction_type, wt.wallet_name as wallet, wt.from_to as from_to, wt.verified as verified, w.wallet_img as wallet_img 
            FROM withdrawals wt 
            LEFT JOIN wallets w ON wt.wallet_name = w.wallet_name
            WHERE uid = :uid
            ORDER BY datetime DESC
            LIMIT 1
            ";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function getWalletLastAction($uid, $wallet)
    {
        try {
            //code...
            $this->sql = "SELECT d.return_amt as amount, d.datetime as datetime,
            d.transaction_type as transaction_type, d.wallet as wallet
            FROM deposits d 
            LEFT JOIN wallets w ON d.wallet = w.wallet_name
            WHERE uid = :uid AND d.wallet = :wallet
            UNION ALL
            SELECT wt.amount as amount, wt.datetime as datetime,
            wt.transaction_type as transaction_type, wt.wallet_name as wallet
            FROM withdrawals wt 
            LEFT JOIN wallets w ON wt.wallet_name = w.wallet_name
            WHERE uid = :uid AND wt.wallet_name = :wallet
            ORDER BY datetime DESC
            LIMIT 1
            ";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet', $wallet);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }


    public function getUserWalletsLastDeposit($uid, $w_name)
    {
        try {
            $this->sql = "SELECT d.return_amt as amount
             FROM deposits d 
             LEFT JOIN user_wallets uw ON uw.wallet_name = d.wallet
             WHERE uw.uid = :uid AND uw.wallet_name = :wallet_name
             ORDER BY d.id DESC
             LIMIT 1";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_name', $w_name);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    # Fetch all user personal documents
    public function getUserPersonalDocuments($uid)
    {
        try {
            $this->sql = "SELECT * FROM personal_documents WHERE uid = :uid";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    # Fetch all user deposits
    public function getAllUserDeposits($uid)
    {
        try {
            //code...
            $this->sql =
                "SELECT w.wallet_name as wallet_name, w.wallet_type as wallet_type, w.wallet_img as wallet_img, d.return_amt as amount, d.datetime as datetime, d.approved as approved, d.id as id
            FROM deposits d 
            JOIN user_wallets uw ON d.wallet = uw.wallet_name
            JOIN wallets w ON d.wallet_id = w.id 
            WHERE d.uid = :uid ORDER BY datetime DESC";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
            return 'err' . $th->getMessage();
        }
    }

    # Fetch all user deposits
    public function getAllUserWithdrawals($uid)
    {
        try {
            //code...
            $this->sql =
                "SELECT w.wallet_name as wallet_name, w.wallet_type as wallet_type, w.wallet_img as wallet_img, wt.amount as amount, wt.crypto_address as address, wt.datetime as datetime, wt.verified as approved, wt.id as id
            FROM withdrawals wt 
            JOIN user_wallets uw ON wt.wallet_name = uw.wallet_name
            JOIN wallets w ON wt.wallet_id = w.id 
            WHERE wt.uid = :uid ORDER BY datetime DESC";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            //throw $th;
            return 'err' . $th->getMessage();
        }
    }

    public function getStakingPlans()
    {
        $this->sql = "SELECT p.*, w.wallet_img FROM stake_plans p LEFT JOIN wallets w ON w.wallet_name = p.crypto";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function getStakingPlan($id)
    {
        $this->sql = "SELECT p.*, w.wallet_img FROM stake_plans p LEFT JOIN wallets w ON w.wallet_name = p.crypto WHERE p.id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function getStakes($uid)
    {
        $this->sql = "SELECT s.*, p.crypto as crypto FROM stakes s LEFT JOIN stake_plans p ON s.plan_id = p.id WHERE uid = :uid";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function getSingleStake($id)
    {
        $this->sql = "SELECT s.*, p.crypto as crypto FROM stakes s LEFT JOIN stake_plans p ON s.plan_id = p.id WHERE s.id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function getAllStakes()
    {
        $this->sql = "SELECT * FROM stakes";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function getInvestPlans()
    {
        $this->sql = "SELECT * FROM invest_plans";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function getInvestPlan($id)
    {
        $this->sql = "SELECT * FROM invest_plans WHERE id = :id";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function getInvestments($uid)
    {
        $this->sql = "SELECT i.*, p.dura as duration FROM investments i LEFT JOIN invest_plans p ON i.plan_id = p.id WHERE uid = :uid ORDER BY id DESC";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function getAllInvestments()
    {
        $this->sql = "SELECT i.*, p.dura as duration, p.duration as durationInt FROM investments i LEFT JOIN invest_plans p ON i.plan_id = p.id ORDER BY id DESC";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function getSingleInvest($id)
    {
        $this->sql = "SELECT i.*, p.dura as duration, p.duration as durationInt FROM investments i LEFT JOIN invest_plans p ON i.plan_id = p.id WHERE i.id = :id ORDER BY id DESC";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':id', $id);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }










    // ****** DATA ROWCOUNT ********

    public function numOfUserStakes($uid)
    {
        $this->sql = "SELECT * FROM stakes WHERE uid = :uid";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            $this->stmt->fetchAll();
            return $this->stmt->rowCount();
        } catch (PDOException $e) {
            return false . $e->getMessage();
        }
    }

    public function numOfUserInvestments($uid)
    {
        $this->sql = "SELECT * FROM investments WHERE uid = :uid";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            $this->stmt->fetchAll();
            return $this->stmt->rowCount();
        } catch (PDOException $e) {
            return false . $e->getMessage();
        }
    }

    public function numOfUserDeposits($uid)
    {
        $this->sql = "SELECT * FROM deposits WHERE uid = :uid AND transaction_type = 'deposit' AND approved = '1'";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            $this->stmt->fetchAll();
            return $this->stmt->rowCount();
        } catch (PDOException $e) {
            return false . $e->getMessage();
        }
    }

    public function numOfUserTransfers($uid)
    {
        $this->sql = "SELECT * FROM deposits WHERE uid = :uid AND transaction_type = 'transfer to' AND approved = '1'";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            $this->stmt->fetchAll();
            return $this->stmt->rowCount();
        } catch (PDOException $e) {
            return false . $e->getMessage();
        }
    }

    public function numOfUserExchanges($uid)
    {
        $this->sql = "SELECT * FROM deposits WHERE uid = :uid AND transaction_type = 'exchange to' AND approved = '1'";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            $this->stmt->fetchAll();
            return $this->stmt->rowCount();
        } catch (PDOException $e) {
            return false . $e->getMessage();
        }
    }

    public function numOfUserWithdrawals($uid)
    {
        $this->sql = "SELECT * FROM withdrawals WHERE uid = :uid AND transaction_type = 'withdrawal' AND verified = '1'";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            $this->stmt->fetchAll();
            return $this->stmt->rowCount();
        } catch (PDOException $e) {
            return false . $e->getMessage();
        }
    }

    public function numOfUserWallets($uid)
    {
        $this->sql = "SELECT * FROM user_wallets WHERE uid = :uid";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            $this->stmt->fetchAll();
            return $this->stmt->rowCount();
        } catch (PDOException $e) {
            return false . $e->getMessage();
        }
    }

    public function numOfUserTransactions($uid)
    {
        $this->sql = "SELECT id FROM deposits WHERE uid = :uid UNION SELECT id FROM withdrawals WHERE uid = :uid";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':uid', $uid);
        $this->stmt->execute();
        $this->stmt->fetchAll();
        return $this->stmt->rowCount();
        try {
        } catch (PDOException $e) {
        }
    }
}


// Initializing class
$modules = new Modules();
