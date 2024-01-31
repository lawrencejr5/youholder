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
    public function register($fname, $lname, $email, $phone, $password, $otp)
    {
        if ($this->checkEmailExists($email) > 0) {
            $this->msg = "exists";
            return $this->msg;
        } else {
            $this->sql = "INSERT INTO users(fname, lname, email, phone, password, verify_code) VALUES(:fname, :lname, :email, :phone, :password, :verify_code)";
            try {
                $this->stmt = $this->conn->prepare($this->sql);
                $this->stmt->bindParam(':fname', $fname);
                $this->stmt->bindParam(':lname', $lname);
                $this->stmt->bindParam(':email', $email);
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
    public function addWallet($uid, $wallet_id)
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
                $this->sql = "INSERT INTO user_wallets(uid, wallet_id) VALUES(:uid, :wallet_id)";
                $this->stmt = $this->conn->prepare($this->sql);
                $this->stmt->bindParam(':uid', $uid);
                $this->stmt->bindParam(':wallet_id', $wallet_id);
                $this->stmt->execute();
                $this->msg = "added";
                return true;
            } catch (PDOException $e) {
                echo 'Error' . $e->getMessage();
            }
        }
    }

    public function addDeposit($uid, $wallet_id, $user_wallet_id, $wallet, $curr, $amount, $value)
    {
        try {
            //code...
            $this->sql = "INSERT INTO deposits(uid, user_wallet_id, wallet_id, wallet, currency, deposit_amt, return_amt) VALUES(:uid, :user_wallet_id, :wallet_id, :wallet, :currency, :deposit_amt, :return_amt)";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_id', $wallet_id);
            $this->stmt->bindParam(':user_wallet_id', $user_wallet_id);
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

    public function makeWithdrawal($uid, $uwid, $wid, $amt, $address, $wallet)
    {
        try {
            //code...
            $this->sql = "INSERT INTO withdrawals(uid, wallet_id, user_wallet_id, amount, crypto_address, wallet_name) VALUES(:uid, :wallet_id, :user_wallet_id, :amount, :crypto_address, :wallet_name)";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':user_wallet_id', $uwid);
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
             uw.uid as uid, uw.wallet_id as wallet_id, uw.id as id
             FROM user_wallets uw 
             LEFT JOIN wallets w ON uw.wallet_id = w.id
             WHERE uw.uid = :uid
             LIMIT 3";
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
             uw.uid as uid, uw.wallet_id as wallet_id, uw.id as id
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
    public function getTotalDeposits($uid, $wid)
    {
        try {
            $this->sql = "SELECT w.wallet_name as wallet_name, uw.id as id, SUM(d.return_amt) as amount
             FROM user_wallets uw 
             LEFT JOIN wallets w ON uw.wallet_id = w.id
             LEFT JOIN deposits d ON uw.id = d.user_wallet_id
             WHERE uw.uid = :uid AND uw.wallet_id = :wallet_id";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_id', $wid);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    # Get the total amount of oney a wallet
    public function getTotalWithdrawals($uid, $wid)
    {
        try {
            $this->sql = "SELECT w.wallet_name as wallet_name, uw.id as id, SUM(wt.amount) as amount
             FROM user_wallets uw 
             LEFT JOIN wallets w ON uw.wallet_id = w.id
             LEFT JOIN withdrawals wt ON uw.id = wt.user_wallet_id
             WHERE uw.uid = :uid AND uw.wallet_id = :wallet_id";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_id', $wid);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function allTransactions($uid)
    {
        try {
            //code...
            $this->sql = "SELECT d.id as id, d.uid as uid, d.user_wallet_id as user_wallet_id, d.return_amt as amount, 
            d.datetime as datetime, d.transaction_type as transaction_type, d.wallet as wallet, d.approved as verified, w.wallet_img as wallet_img  
            FROM deposits d 
            LEFT JOIN wallets w ON d.wallet = w.wallet_name
            UNION ALL
            SELECT wt.id as id, wt.uid as uid, wt.user_wallet_id as user_wallet_id, wt.amount as amount, wt.datetime as datetime, 
            wt.transaction_type as transaction_type, wt.wallet_name as wallet, wt.verified as verified, w.wallet_img as wallet_img 
            FROM withdrawals wt 
            LEFT JOIN wallets w ON wt.wallet_name = w.wallet_name
            WHERE uid = :uid
            ORDER BY datetime DESC
            ";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }


    public function getUserWalletsLastDeposit($uid, $wid)
    {
        try {
            $this->sql = "SELECT d.return_amt as amount
             FROM deposits d 
             LEFT JOIN user_wallets uw ON uw.id = d.user_wallet_id
             WHERE uw.uid = :uid AND uw.wallet_id = :wallet_id
             ORDER BY d.id DESC
             LIMIT 1";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->bindParam(':wallet_id', $wid);
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
            JOIN user_wallets uw ON d.user_wallet_id = uw.id 
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
            JOIN user_wallets uw ON wt.user_wallet_id = uw.id 
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




    // public function total($uid, $wid)
    // {
    //     try {
    //         $this->sql = "SELECT w.wallet_name as wallet_name, uw.id as id, SUM(d.return_amt) - SUM(wt.amount) as amount
    //          FROM user_wallets uw 
    //          left JOIN wallets w ON uw.wallet_id = w.id
    //          left JOIN deposits d ON uw.id = d.user_wallet_id
    //          left JOIN withdrawals wt ON uw.id = wt.user_wallet_id
    //          WHERE uw.uid = :uid AND uw.wallet_id = :wallet_id";
    //         $this->stmt = $this->conn->prepare($this->sql);
    //         $this->stmt->bindParam(':uid', $uid);
    //         $this->stmt->bindParam(':wallet_id', $wid);
    //         $this->stmt->execute();
    //         return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $th) {
    //         echo $th->getMessage();
    //     }
    // }
}


// Initializing class
$modules = new Modules();
