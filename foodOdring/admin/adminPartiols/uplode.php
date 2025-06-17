<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $targetDirectory = "../img/Hotels"; // Directory where you want to store the uploaded files
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the image file is an actual image or a fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = true;
    } else {
        echo "File is not an image.";
        $uploadOk = false;
    }

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = false;
    }

    // Check file size (you can set your own limit here)
    if ($_FILES["image"]["size"] > 5000000) { // 5MB
        echo "Sorry, your file is too large.";
        $uploadOk = false;
    }

    // Allow only certain file formats (you can modify this list as needed)
    $allowedFormats = ["jpg"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG files are allowed.";
        $uploadOk = false;
    }

    // If $uploadOk is still true, upload the file
    if ($uploadOk) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, your file was not uploaded.";
    }
}
?>
