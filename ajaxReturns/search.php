<?php 
include('../config.php');
include('../db.php');
$db = new Database();


$searchKey = $_POST['search'];
$query3 = "SELECT * from files where  fileKnownAs like '%$searchKey%'";
$result3 = $db->select($query3);

if($result3){
        while($data = mysqli_fetch_assoc($result3)){  
        $fileKnownAs = $data['fileKnownAs'];
        $linkName = $data['name'];
        echo "<div id='searchResult'>
              <span id='filename'>".$fileKnownAs."</span>
              <span id='download'><a class='btn' target='_blank' href='download.php?filename=$linkName'>Download</a></span>
              </div>
              ";
    }
}else{
    echo "
            <div id='noData' >No Data Found !</div>
        ";
}


?>