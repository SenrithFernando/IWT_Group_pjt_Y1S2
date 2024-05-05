<?php

class Signup extends Dbh {

    protected function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO `login`(`users_uid`, `users_pwd`, `users_email`) VALUES (?, ?, ?);');

        $hashesPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $hashesPwd, $email))) {
            $stmt = null;
            header("location: ../index.php?error=smtfailed");
            exit();
        }

        $stmt = null;
    }



    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT `users_id`, `users_uid`, `users_pwd`, `users_email` FROM `login` WHERE `users_id` = ? OR `users_email` = ?;');

        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=smtfailed");
            exit();
        }

        //$resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
}

?>