<?php

class Login extends Dbh {

    protected function getUser($uid, $pwd) {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM `login` WHERE `users_uid` = ? OR `users_email` = ?;');

        

        if (!$stmt->execute(array($uid, $pwd))) {
            $stmt = null;
            header("location: ../login.php?error=smtfailed");
            exit();
        }

        
        if($stmt->rowCount() == 0) {

            $stmt = null;
            header("location: ../login.php?error=usernotfount");
            exit;
        }

        // $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $hashedPassword = $pwdHashed[0]["users_pwd"];
        // $checkPwd = password_verify((string)$pwd, (string)$hashedPassword); // not working 



        $hashedPassword = $stmt->fetchColumn();
        // Now $hashedPassword contains the hashed password from the database
        // You can use it for further verification, e.g., using password_verify()
        $checkPwd = password_verify($pwd, $hashedPassword);


        // if ($hashedPassword == $pwd) {
        //     $stmt = $this->connect()->prepare('SELECT * FROM `login` WHERE users_uid = ? OR users_email = ? AND users_pwd =?;');

        //     if (!$stmt->execute(array($uid, $uid, $pwd))) {
        //         $stmt = null;
        //         header("location: ../login.php?error=smtfailed");
        //         exit();
        //     }

        //     if($stmt->rowCount() == 0) {
        //         $stmt = null;
        //         header("location: ../login.php?error=usernotfount");
        //         exit;
        //     }

        //     $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //     session_start();
        //     $_SESSION["userid"] = $user[0]["users_id"];
        //     $_SESSION["useruid"] = $user[0]["users_uid"];
        // }else {
        //     $stmt = null;
        //     header("location: ../login.php?error=wrongpassword.$hashedPassword.&.$pwd");
        //     exit();
        // }






        if ($checkPwd == false) {

            $stmt = null;
            header("location: ../login.php?error=wrongpassword.$hashedPassword.&.$pwd");
            exit();

        }elseif ($checkPwd == true) {

            $stmt = $this->connect()->prepare('SELECT * FROM `login` WHERE users_uid = ? OR users_email = ? AND users_pwd =?;');

            if (!$stmt->execute(array($uid, $uid, $pwd))) {
                $stmt = null;
                header("location: ../login.php?error=smtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../login.php?error=usernotfount");
                exit;
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];
        }

        $stmt = null;
    }


}

?>