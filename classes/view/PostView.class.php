<?php 

class PostView extends PostModel {

    public function printSpecificUserData($lec_ID) {
        $dataList = $this->getUserPosts($lec_ID);

        for($i=0; $i<count($dataList); $i++) {
            echo "
                <div class='col-md-4'>
                    <div class='card' style='width: 18rem;'>
                        <img src='".$dataList[$i]['filePath']."' height='200' width='180' class='card-img-top' alt='img'>
                        <div class='card-body'>
                            <h5 class='card-title'>".$dataList[$i]['title']."</h5>
                            <p class='card-text'>".$dataList[$i]['description']."</p>
                            <p class='card-text'>Cost: $".$dataList[$i]['cost']."</p>
                            <form action='../includes/modifyPost.inc.php' method='POST'>
                                <input type='hidden' name='post_id' value='".$dataList[$i]['post_id']."'/>
                                <input type='hidden' name='filePath' value='".$dataList[$i]['filePath']."'/>
                                <input type='hidden' name='title' value='".$dataList[$i]['title']."'/>
                                <input type='hidden' name='description' value='".$dataList[$i]['description']."'/>
                                <input type='hidden' name='cost' value='".$dataList[$i]['cost']."'/>
                                <button type='submit' class='btn btn-warning' name='edit_btn'>Edit</button>
                                <button type='submit' class='btn btn-danger' name='delete_btn'>Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            ";
        }
    }

    public function printAllPosts() {
        $dataList = $this->getAllPosts();
        for($i=0; $i<count($dataList); $i++) {
            echo "
                <div class='col-md-4'>
                    <div class='card' style='width: 18rem;'>
                        <img src='".$dataList[$i]['filePath']."' height='200' width='180' class='card-img-top' alt='img'>
                        <div class='card-body'>
                            <h5 class='card-title'>".$dataList[$i]['title']."</h5>
                            <details>
                                <summary>Read more</summary>
                                <p class='card-text'>".$dataList[$i]['description']."</p>
                                <p class='card-text'>Cost: $".$dataList[$i]['cost']."</p>
                            </details>
                            <a href='../pages/subscription.php' class='btn btn-dark'>Register</a>
                        </div>
                    </div>
                </div>
            ";
        }
    }
    
}