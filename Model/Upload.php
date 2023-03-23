<?php

class Upload{
    public function uploadFile($product_img){
        $target_dir = "../Assets/Image/";
        $target_file = $target_dir . basename($_FILES["product_img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["product_img"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                return 0;
            }
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            return 0;
        }
        
        // Check file size
        if ($_FILES["product_img"]["size"] > 500000) {
            return 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            return 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        return (move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file))?  $target_file : 0;

    }

}
?>