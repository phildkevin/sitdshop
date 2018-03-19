<?php
   
    include 'connect.php';

        $pname = $_GET['pname'];
        $target_dir = "../images/products/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $name = rand() . basename($_FILES["fileToUpload"]["name"]);

        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($name)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
        
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$name)) {

                $link = "assets/images/products/".$name;

                $sql = $conn->prepare("UPDATE tbl_product SET image=? WHERE `product name`=?");
                $sql->bind_param('ss', $link, $pname);
                $sql->execute();

              

                echo "OK";

            } else {
                echo "Sorry, there was an error uploading your file.";

            }
        }
         


?>