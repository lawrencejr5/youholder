<?php
include 'conn.php';
class AdminModule extends Connection
{
    private $stmt;
    private $sql;

    public function fetchAllAdminAccounts($admin)
    {
        $this->sql = 'SELECT * FROM users WHERE admin = :admin';
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':admin', $admin);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function fetchAllUserAccounts()
    {
        $this->sql = 'SELECT * FROM users';
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function fetchAdmin($admin, $uid)
    {
        $this->sql = 'SELECT * FROM users WHERE admin = :admin AND id = :uid';
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':admin', $admin);
            $this->stmt->bindParam(':uid', $uid);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function fetchAllDeposits($type)
    {
        $this->sql = 'SELECT deposits.*, users.fname, users.lname FROM deposits LEFT JOIN users ON deposits.uid = users.id WHERE transaction_type = :transaction_type';
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':transaction_type', $type);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function fetchAllWithdrawals($type)
    {
        $this->sql = 'SELECT withdrawals.*, users.fname, users.lname FROM withdrawals LEFT JOIN users ON withdrawals.uid = users.id WHERE transaction_type = :transaction_type';
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':transaction_type', $type);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function fetchAllWallets()
    {
        $this->sql = 'SELECT * FROM wallets';
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }
    public function fetchAllTransactions()
    {

        try {
            $this->sql =
                "SELECT d.id as id, d.uid as uid, u.fname as fname, u.lname as lname, d.return_amt as amount, 
            d.datetime as datetime, d.transaction_type as transaction_type, d.wallet as wallet, d.from_to as from_to, d.approved as verified, w.wallet_img as wallet_img  
            FROM deposits d 
            LEFT JOIN wallets w ON d.wallet = w.wallet_name
            LEFT JOIN users u ON d.uid = u.id
            UNION ALL
            SELECT wt.id as id, wt.uid as uid, u.fname as fname, u.lname as lname, wt.amount as amount, wt.datetime as datetime, 
            wt.transaction_type as transaction_type, wt.wallet_name as wallet, wt.from_to as from_to, wt.verified as verified, w.wallet_img as wallet_img 
            FROM withdrawals wt 
            LEFT JOIN wallets w ON wt.wallet_name = w.wallet_name
            LEFT JOIN users u ON wt.uid = u.id
            ORDER BY datetime DESC";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function fetchAllTransfers($type)
    {

        try {
            $this->sql =
                "SELECT d.id as id, d.uid as uid, u.fname as fname, u.lname as lname, d.return_amt as amount, 
            d.datetime as datetime, d.transaction_type as transaction_type, d.wallet as wallet, d.from_to as from_to, d.approved as verified, w.wallet_img as wallet_img  
            FROM deposits d 
            LEFT JOIN wallets w ON d.wallet = w.wallet_name
            LEFT JOIN users u ON d.uid = u.id
            WHERE transaction_type = :transaction_type
            UNION ALL
            SELECT wt.id as id, wt.uid as uid, u.fname as fname, u.lname as lname, wt.amount as amount, wt.datetime as datetime, 
            wt.transaction_type as transaction_type, wt.wallet_name as wallet, wt.from_to as from_to, wt.verified as verified, w.wallet_img as wallet_img 
            FROM withdrawals wt 
            LEFT JOIN wallets w ON wt.wallet_name = w.wallet_name
            LEFT JOIN users u ON wt.uid = u.id
            WHERE transaction_type = :transaction_type
            ORDER BY datetime DESC";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':transaction_type', $type);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function fetchAllExchanges($type1, $type2)
    {

        try {
            $this->sql =
                "SELECT d.id as id, d.uid as uid, u.fname as fname, u.lname as lname, d.return_amt as amount, 
            d.datetime as datetime, d.transaction_type as transaction_type, d.wallet as wallet, d.from_to as from_to, d.approved as verified, w.wallet_img as wallet_img  
            FROM deposits d 
            LEFT JOIN wallets w ON d.wallet = w.wallet_name
            LEFT JOIN users u ON d.uid = u.id
            WHERE transaction_type = :transaction_type1 OR transaction_type = :transaction_type2
            UNION ALL
            SELECT wt.id as id, wt.uid as uid, u.fname as fname, u.lname as lname, wt.amount as amount, wt.datetime as datetime, 
            wt.transaction_type as transaction_type, wt.wallet_name as wallet, wt.from_to as from_to, wt.verified as verified, w.wallet_img as wallet_img 
            FROM withdrawals wt 
            LEFT JOIN wallets w ON wt.wallet_name = w.wallet_name
            LEFT JOIN users u ON wt.uid = u.id
            WHERE transaction_type = :transaction_type1 OR transaction_type = :transaction_type2
            ORDER BY datetime DESC";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':transaction_type1', $type1);
            $this->stmt->bindParam(':transaction_type2', $type2);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function fetchAllUserDocuments()
    {
        $this->sql =
            "SELECT u.id as id, u.fname as fname, u.lname as lname, u.email as email, p.identity_type as identity_type, p.identity_number as identity_number, p.front as front_img, 
        p.back as back_img, u.level as level, p.datetime as datetime, p.verified as verified
        FROM personal_documents p
        LEFT JOIN users u ON u.id = p.uid
        ORDER BY p.datetime DESC";
        try {
            //code...
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }
}

$adminModule = new AdminModule;
