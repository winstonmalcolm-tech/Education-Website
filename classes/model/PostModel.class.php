<?php 

class PostModel extends Dbh{

    protected function setPost($userId, $title, $description, $cost, $filePath) {
        $sql = "INSERT INTO posts (lec_ID, title, description, cost, filePath) VALUES (?,?,?,?,?);";
        $stmt = $this->dbconnect()->prepare($sql);
        $stmt->bind_param("issss",$userId, $title, $description, $cost, $filePath);

        if($stmt->execute()) {
              return true;
         } else {
             return false;
         }
    }

    protected function setUpdatedPost($postID, $title, $description, $cost, $filePath) {
        if(empty($filePath)) {
            $sql = "UPDATE posts set title=?, description=?, cost=? where post_id=?;";
            $stmt = $this->dbconnect()->prepare($sql);
            $stmt->bind_param("sssi",$title,$description, $cost, $postID);

            if($stmt->execute()) {
                return true;
            } 
        } else {
            $sql = "UPDATE posts set title=?, description=?, cost=?, filePath=? where post_id=?;";
            $stmt = $this->dbconnect()->prepare($sql);
            $stmt->bind_param("ssssi", $title, $description, $cost, $filePath, $postID);
            if($stmt->execute()) {
                return true;
            }
        }

        return false;    
    }

    protected function deletePost($postID) {
        $sql = "DELETE FROM `posts` WHERE `posts`.`post_id` = ?;";
        $stmt = $this->dbconnect()->prepare($sql);
        $stmt->bind_param("i", $postID);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    protected function getUserPosts($lec_ID) {
        $data = array();

        $sql = "SELECT * FROM posts where lec_ID=?";
        $stmt = $this->dbconnect()->prepare($sql);
        $stmt->bind_param("i", $lec_ID);
        $stmt->execute();

        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
                array_push($data, $row);
        }
        return $data;
    }

    protected function getAllPosts() {
        $data = array();

        $sql = "SELECT * FROM posts;";

        $stmt = $this->dbconnect()->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }

        return $data;
    }

}