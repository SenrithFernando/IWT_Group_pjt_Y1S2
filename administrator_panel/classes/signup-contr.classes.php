<?php

class SignupContr extends signup {

    private $uid; 
    private $pwd; 
    private $pwdrepeat;
    private $email;

    public function __construct($uid, $pwd, $pwdrepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
    }

    public function signupUser() {
        if ($this->emptyInput() == false) {
            // echo "empty input!";
            header("location: ../register.php?error=emptyinput");
            exit();
        }

        if ($this->invalidUid() == false) {
            // echo "invalid username!";
            header("location: ../register.php?error=username");
            exit();
        }

        if ($this->invalidEmail() == false) {
            // echo "invalid email!";
            header("location: ../register.php?error=email");
            exit();
        }

        if ($this->pwdMatch() == false) {
            // echo "password don't match!";
            header("location: ../register.php?error=passwordmatch");
            exit();
        }

        if ($this->uidTakenCheck() == false) {
            // echo "usrname or email taken!";
            header("location: ../register.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput() {
        //$result;
        if (empty( $this->uid) || empty( $this->pwd) || empty( $this->pwdrepeat) || empty($this->email)) {
            $result = false;
        }else {
            $result = true;
        }

        return $result;
    }

    private function invalidUid() {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
        }else {
            $result = true;
        }

        return $result;
    }

    private function invalidEmail() {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }else {
            $result = true;
        }

        return $result;
    }

    private function pwdMatch() {
        if ($this->pwd !== $this->pwdrepeat) {
            $result = false;
        }else {
            $result = true;
        }

        return $result;
    }

    private function uidTakenCheck() {
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        }else {
            $result = true;
        }

        return $result;
    }
}

?>