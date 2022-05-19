<?php 

class EmailModel extends Dbh{

    protected function saveSubscriber($email) {
        $status = 1;
        $sql = "INSERT INTO subscribers (email, status) VALUES (?,?);";
        $stmt = $this->dbconnect()->prepare($sql);
        $stmt->bind_param("ss", $email, $status);
        
        if($stmt->execute()) {
            $stmt->close();
            $this->dbconnect()->close();
            return true;
        }

        $stmt->close();
        $this->dbconnect()->close();
        return false;
    }

    protected function isEmailSaved($email) {
        $sql = "SELECT * from subscribers where email = ?";
        $stmt = $this->dbconnect()->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows() > 0) {
            $stmt->close();
            $this->dbconnect()->close();
            return true;
        }

        $stmt->close();
        $this->dbconnect()->close();
        return false;
    }
}