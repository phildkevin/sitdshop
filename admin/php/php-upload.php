<?php
    session_start();
    include '../include/include-connection.php';
    $user_id = $_SESSION['user_id'];
    $target_dir = "../../assets/images/profile/";
    $target_file = $target_dir . basename($_FILES["profile-picture"]["name"]);
    $name = rand() . basename($_FILES["profile-picture"]["name"]);

    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["profile-picture"]["tmp_name"]);
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
    if ($_FILES["profile-picture"]["size"] > 5000000) {
    
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
        if (move_uploaded_file($_FILES["profile-picture"]["tmp_name"], $target_dir.$name)) {
            $sql = "SELECT * FROM tbl_personal WHERE user_id = '".$user_id."'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            unlink($row['image']);
            $link = "../../assets/images/profile/".$name;
            $sql = $conn->prepare("UPDATE tbl_personal SET image=? WHERE `user_id`=?");
            $sql->bind_param('ss', $link, $user_id);
            $sql->execute();
            echo "OK";
        } else {
            echo "Sorry, there was an error uploading your file.";

        }
    }
?>