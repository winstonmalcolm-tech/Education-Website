<?php 
session_start();
include "../classes/model/Dbh.class.php";
include "../classes/model/PostModel.class.php";
include "../classes/controller/PostContr.class.php";

if (isset($_POST['postBtn'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];
    $file = $_FILES['image'];
    $userId = (isset($_SESSION['lec_ID']) ? $_SESSION['lec_ID'] : ""); //Get from session

    $postObj = new PostContr($title, $description, $cost, $file, $userId);

    $postObj->savePost();

} elseif (isset($_POST['editBtn'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];
    $id = $_POST['post_id'];
    $filePath = $_POST['filePath'];
    $file = $_FILES['image'];
    $userId = (isset($_SESSION['lec_ID']) ? $_SESSION['lec_ID'] : "");

    $postObj = new PostContr($title, $description, $cost, $file, $userId);
    $postObj->setPostId($id);
    $postObj->setFilePath($filePath);
    $postObj->updatePost();

} elseif (isset($_POST['cancelBtn'])) {
    header("Location: ../pages/publishCourse.php");
}