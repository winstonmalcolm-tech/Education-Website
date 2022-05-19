<?php 

class AuthenticationModel extends Dbh{

    // adding a user to the database
    protected function addUser($firstName,$lastName, $email, $userName, $prePassword) {
        
        $sql = "INSERT INTO lectures (first_name, last_name, email, username, password) VALUES (?,?,?,?,?);";
        $stmt = $this->dbconnect()->prepare($sql);
        $hashPassword = password_hash($prePassword, PASSWORD_BCRYPT);
        $stmt->bind_param("sssss",$firstName, $lastName, $email, $userName, $hashPassword);

        if($stmt->execute()) {
            // storing the username in a cookie for a month.
            setcookie("username", $userName, time() + (86400 * 30), '/'); 
            return true;
        } else {
            return false;
        }
    }

    //Getting information from lectures table from database.
    protected function loginUser($username, $password) {
        
        $sql = "SELECT * FROM lectures WHERE username=? LIMIT 1";
        $stmt = $this->dbconnect()->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        

        if($result->num_rows !== 0 || !$result)
        {
            $row = $result->fetch_assoc();
            if(count($row) > 0) {
                if ($row['username'] == $username && password_verify($password, $row['password'])) {
                    session_start();
                    $_SESSION['lec_ID'] = $row['lec_ID'];
                    $_SESSION['username'] = $row['username'];
                    $stmt->close();
                    $this->dbconnect()->close();
                    return true;
                }
            }
        }
        
        $stmt->close();
        $this->dbconnect()->close();
        return false; 
    }


    //Deleting information from lectures table from database
    protected function deleteUser($id) {
        $sql = "DELETE FROM lectures WHERE lec_ID=?";

        $stmt = $this->dbconnect()->prepare($sql);
        $stmt->bind_param("i",$id);
        
        if($stmt->execute()) {
            $sql = "DELETE FROM posts WHERE lec_ID=?";
            $stmt = $this->dbconnect()->prepare($sql);
            $stmt->bind_param("i",$id);

            if($stmt->execute()) {
                $stmt->close();
                $this->dbconnect()->close();
                return true;
            }
        }
        
        $stmt->close();
        $this->dbconnect()->close();
        return false;
    }

    // Updating information to lecture table in the database.
    protected function updateUser($lec_ID, $email, $username, $password) {
        $sql = "UPDATE lectures set email = ?, username = ?, password = ? WHERE lec_ID = ?";
        $stmt = $this->dbconnect()->prepare($sql);
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bind_param("sssi", $email, $username, $hashPassword, $lec_ID);
        
        if($stmt->execute()) {
            $stmt->close();
            $this->dbconnect()->close();
            return true;
        }

        $stmt->close();
        $this->dbconnect()->close();
        return false;
    }


    protected function getSpecificUserDetails($lec_ID) {
        $sql = "SELECT username, email FROM lectures WHERE lec_ID = ? LIMIT 1";
        $stmt = $this->dbconnect()->prepare($sql);
        $stmt->bind_param("i", $lec_ID);
        $stmt->execute();
        $result =$stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();
        $this->dbconnect()->close();
        return $row;
    }

    //Performing an advance search from Post table in database.
    protected function getSearchResults($title) {
        $data = array();
        $searchKey = "%".$title."%"; 
        $sql = "SELECT * FROM posts where title LIKE ?";
        $stmt = $this->dbconnect()->prepare($sql);
        $stmt->bind_param("s", $searchKey);

        if($stmt->execute()) {
            $result = $stmt->get_result();

            while($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
            
            $stmt->close();
            $this->dbconnect()->close();
        } else {
            echo $stmt->error;
            exit();
        }
        

        return $data;
    }


    protected function addStudent($email, $cvv, $experationDate, $courseName) {
        
        $sql = "INSERT INTO students (email, cvv, experation_date, course_name) VALUES (?,?,?,?);";
        $stmt = $this->dbconnect()->prepare($sql);
        $stmt->bind_param("siss",$email, $cvv, $experationDate, $courseName);

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}