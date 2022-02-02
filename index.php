<?php 
include('header.php');
include('indexContent.php');
?>



    <?php 
    require('config.php');
    require('db.php');
    $con = new Database();
  

    if(isset($_POST['submit'])){
        $fileName = $_POST['fileName'];
        class FILES{
            public  $fileExtention;
            public  $fileName;
            public  $fileSize;
            public  $fileTMP;
            public  $return;
            public  $destination = "uploads/";

            function file($name){
                $this->fileName = $_FILES[$name]['name'];
                $this->fileSize = $_FILES[$name]['size'];
                $this->fileExtention = pathinfo($this->fileName, PATHINFO_EXTENSION);
                $this->fileTMP = $_FILES[$name]['tmp_name'];
                return "Filename = $this->fileName, </br>  FileSize = $this->fileSize bite,</br> fileExtention = $this->fileExtention, </br> fileTMP = $this->fileTMP </br>";
            }
        };
        $file = new FILES();
        $file->file("myfile");
        $fileFullName = $file->fileName;
        $docName = $_POST['fileName'];
        $query3 = "SELECT * from files where  fileKnownAs = '$docName'";
        $result3 = $con->select($query3);
        if($result3){
        $numrows = mysqli_num_rows($result3);
        }
        
        
        if($fileName == ""){
            echo "<div class='error'>The file name feild must not be empty ! <span class='errorCloser'>X</span></div>";
        }
        elseif(($_FILES['myfile']['name'] == "")){
            echo "<div class='error'>Please upload the file ! <span class='errorCloser'>X</span></div>";
        }
        elseif(!in_array($file->fileExtention, ['pdf', 'jpg', 'png'])){
            echo "<div class='error'>File extention must be .pdf, .jpg or .png<span class='errorCloser'>X</span></div>";
        }
       
        elseif(isset($numrows)){    
            if($numrows > 0){
            echo "<div class='error'>This file name already taken!<span class='errorCloser'>X</span></div>";
            }
        }   
        else{
            echo "<div class='success'>File Uploaded Successfully<span class='errorCloser'>X</span></div>";
            $myQuery = "INSERT INTO  files ( name, size, download, fileKnownAs) VALUES ('$fileFullName', $file->fileSize, 0, '$fileName')";
            $result = $con->delete($myQuery);
            move_uploaded_file($file->fileTMP, $file->destination.$fileFullName);
        }
    }

?>

</body>
</html>