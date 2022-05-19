<?php 

class PostContr extends PostModel{
    private $title;
    private $description;
    private $cost;
    private $file;
    private $filePath;
    private $postId;
    private $userId;

    public function __construct($title, $description, $cost, $file, $userId){
        $this->title = $title;
        $this->description = $description;
        $this->cost = $cost;
        $this->file = $file;
        $this->userId = $userId;
    }

    private function emptyField() {
         if(empty($this->title) || empty($this->description) || empty($this->cost) || empty($this->file['name'])) {
            return true;
         }
         return false;
    }

    //Error handling function to check if file size exceeds a certain size(20MBs)
    private function exceedSize(){
        if($this->file['size'] > 20000000) {
            return true;
        }

        return false;
    }

    //Error handling function to check if there is an error with the file
    private function errorFile() {
        if($this->file['error'] > 0) {
            return true;
        }

        return false;
    }

    //setter to set filepath to image in uploads folder
    public function setFilePath($filePath){
        $this->filePath = $filePath;
    }

    //setter to set postID class property
    public function setPostId($postId) {
        $this->postId = $postId;
    }

    //Error handling function to check if file type is acceptible 
    private function acceptedFileType() {

        $allowedExtensions = array('jpg','jpeg', 'png');
        $fileExt = explode('.',$this->file['name']);
        $fileExtension = strtolower(end($fileExt));

        if(in_array($fileExtension, $allowedExtensions)) {
            return array("isallowed"=>true, "fileExtension"=>$fileExtension);
        }

        return array("isallowed"=>false, "fileExtension"=>null);
    }
    
    //Function to generate a folder to save image to
    private function getFileLocation() {
        //Set the base of the folder path
        $folderPath = "../uploads/";

        //Checking if the file given is correct 
        if(!$this->acceptedFileType()['isallowed']) {
            header("Location: ../pages/myPostPage.php?error=fileTypeError");
            exit();
        }

        //Given the file a new name by naming it by the title given
        $fileNewName = $this->title.".".$this->acceptedFileType()['fileExtension'];

        //completing the folder path to save the file
        $specificFolderPath = $folderPath.$this->userId; //Save to user specific folder

        //Checking if this folder path doesn't exists and if not create it
        if(!file_exists($specificFolderPath)) {
            mkdir($specificFolderPath);
        }

        //save the file destination within this variable
        $fileDestination = $specificFolderPath."/".$fileNewName;

        return $fileDestination;
    }

    public function savePost() {
        if($this->emptyField()) {
            header("Location: ../pages/publishCourse.php?error=emptyfield&title=".$this->title."&description=".$this->description."&cost=".$this->cost);
            exit();
        }

        if($this->exceedSize()) {
            header("Location: ../pages/publishCourse.php?error=fileSizeError&title=".$this->title."&description=".$this->description."&cost=".$this->cost);
            exit();
        }

        if($this->errorFile()) {
            header("Location: ../pages/publishCourse.php?error=fileError&title=".$this->title."&description=".$this->description."&cost=".$this->cost);
            exit();
        }

        $filePath = $this->getFileLocation();
        $isSaved = $this->setPost($this->userId, $this->title, $this->description, $this->cost, $filePath);

        if(!$isSaved || !move_uploaded_file($this->file['tmp_name'],$filePath)) {
            header("Location: ../pages/publishCourse.php?error=sqlerror");
            exit();
        }
        
        header("Location: ../pages/publishCourse.php?error=none");
        exit();
    } 

    public function updatePost() {
        if(empty($this->title) || empty($this->description) || empty($this->cost)) {
            header("Location: ../pages/publishCourse.php?action=edit&editError=emptyfield&title=".$this->title."&description=".$this->description."&cost=".$this->cost."&id=".$this->postId."&filePath=".$this->filePath);
            exit();
        }


        if(empty($this->file['name'])) {
            $isSaved = $this->setUpdatedPost($this->postId, $this->title, $this->description, $this->cost, "");

            if(!$isSaved) {
                header("Location: ../pages/publishCourse.php?action=edit&editError=sqlerror&title=".$this->title."&description=".$this->description."&cost=".$this->cost."&id=".$this->postId."&filePath=".$this->filePath);
                exit();
            }

        } else {
            if($this->exceedSize()) {
                header("Location: ../pages/publishCourse.php?action=edit&editError=fileSizeError&title=".$this->title."&description=".$this->description."&cost=".$this->cost."&id=".$this->postId."&filePath=".$this->filePath);
                exit();
            }

            $currentFilePath = $this->getFileLocation();
            $isUnlinked = unlink($this->filePath);
            $isMoved = move_uploaded_file($this->file['tmp_name'], $currentFilePath);
            $isUpdated = $this->setUpdatedPost($this->postId, $this->title, $this->description, $this->cost, $currentFilePath);

            if(!$isMoved) {
                header("Location: ../pages/publishCourse.php?action=edit&editError=filenotuploaded&title=".$this->title."&description=".$this->description."&cost=".$this->cost."&id=".$this->postId."&filePath=".$this->filePath);
                exit();
            }

            if(!$isUpdated) {
                header("Location: ../pages/publishCourse.php?action=edit&editError=sqlerror&title=".$this->title."&description=".$this->description."&cost=".$this->cost."&id=".$this->postId."&filePath=".$this->filePath);
                exit();
            }  

            if(!$isUnlinked) {
                header("Location: ../pages/publishCourse.php?action=edit&editError=filenotdeleted&title=".$this->title."&description=".$this->description."&cost=".$this->cost."&id=".$this->postId."&filePath=".$this->filePath);
                exit();
            }
        }

        header("Location: ../pages/publishCourse.php?update=updated");
        exit();
        
    }

    public function removePost() {
        $isRemoved = $this->deletePost($this->postId);

        if(!$isRemoved || !unlink($this->filePath)) {
            header("Location: ../pages/publishCourse.php?deleteError=sqlerror");
            exit();
        }

        header("Location: ../pages/publishCourse.php?deleteError=none");
        exit();
    }
}