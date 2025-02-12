<?php 

class BankAccount {
    private $accountHolder;
    private $balance;
    private $password;

    // Constructor to initialize an account
    public function __construct($accountHolder, $initialBalance = 0, $password= null){
        $this-> accountHolder = $accountHolder;
        $this-> balance = $initialBalance;
        $this-> password = $password;
    }
    // Get account Holder name
    public function getAccountHolder(){
        return $this-> accountHolder;
    }

    // Deposit fund into the account

    public function deposit($amount){
        if($amount <= 0){
            echo "The Deposit must be greater than zero\n";
            return;
        }
        $this->balance += $amount;
        echo "Deposited: $amount. New Balance: $this->balance .\n";
    }

    // Withdraw funds from an account
    public function withdraw($amount){
        if($amount <= 0){
            echo "The withdraw must be greater than zero\n";
            return;
        }
        if($this->balance >= $amount){
            $this->balance -= $amount;
            echo "You have withdrawn: $amount .Your account Balance: $this->balance";
            return;

        }
        echo "Insufficient balance for withdraw\n";
    }
    // Check the balance for the account
    public function checkBalance(){
        echo "Current Balance: ". $this-> balance ."\n";
    }

    // Basic authentication Check for the passwords
    public function authenticate($password){
        return $this->password === $password;

    }

}

class Bank {
    private $accounts = [];

    public function createAccount($accountHolder,$initialBalance = 0, $password= null){
        $account = new BankAccount($accountHolder,$initialBalance,$password);
        $this-> accounts[$accountHolder] = $account;
        echo "Account for $accountHolder created successfully. \n";

    }
    // Get account by the holder name
    public function getAccount($accountHolder){
        if(isset($this->accounts[$accountHolder])){
            return $this->accounts[$accountHolder];

        }
        echo "Account for $accountHolder not found .\n";
        return null;
    }

    // Display all accounts in your system
    public function listAccounts(){
        foreach($this->accounts as $accountHolder => $account){
            echo "Account Holder: ". $accountHolder ."\n";
        }
    }
}

$bank = new Bank();

// Create Accounts
$bank -> createAccount('Bob',1000,'bob123');
echo "<br>";
$bank -> createAccount('Mary',2000,'mary123');

// List Accounts
echo "<br>";
$bank -> listAccounts();

// Authenticate Bob
$bob = $bank->getAccount('Bob');
if ($bob && $bob->authenticate('bob123')){
    $bob-> deposit(500);
    $bob -> withdraw(300);
    $bob -> checkBalance();
} else {
    echo "Authentication failed for Bob. \n";
}
// Authenticate Mary
$mary = $bank->getAccount('Mary');
if($mary && $mary-> authenticate('mary123')){
    $mary->deposit(700);
    $mary->withdraw(2500);
    $mary->checkBalance();
}else{
    echo "Authentication failed for Mary.\n";
}

