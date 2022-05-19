<?php 

include "../classes/model/Dbh.class.php";
include "../classes/model/PostModel.class.php";
include "../classes/controller/PostContr.class.php";

if(isset($_POST['delete_btn'])) {
    $id = $_POST['post_id'];
    $filePath = $_POST['filePath'];

    $postObj = new PostContr(null,null,null,null,null);
    $postObj->setPostId($id);
    $postObj->setFilePath($filePath);
    $postObj->removePost();
    
} elseif (isset($_POST['edit_btn'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];
    $id = $_POST['post_id'];
    $filePath = $_POST['filePath'];
    header("Location: ../pages/publishCourse.php?action=edit&title=".$title."&description=".$description."&cost=".$cost."&id=".$id."&filePath=".$filePath);
}