<?php 

class AuthenticationView extends AuthenticationModel {
    private $searchKey;

    public function setSearchKey($searchKey) {
        $this->searchKey = $searchKey;
    }

    private function isSearchKeyEmpty() {
        if(empty($this->searchKey)) {
            return true;
        }
    
        return false;
    }
//more than zero search results display the result.
    public function isThereSearchResult() {
        $dataList = $this->getSearchResults($this->searchKey);

        if(count($dataList) > 0) {
            return true;
        }

        return false;
    }

    public function displaySearchResults() {
        $dataList = $this->getSearchResults($this->searchKey);

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

    public function getUserData($lec_ID) {

        $data = $this->getSpecificUserDetails($lec_ID);

        return $data;
    }
    
}