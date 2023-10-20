<?php
if (isset($_POST['upload'])) {


    # Database connection file
    include 'connection.php';

    # Number of images
    $num_of_imgs = count($_FILES['images']['name']);

    for ($i = 0; $i < $num_of_imgs; $i++) {
        $image_name = $_FILES['images']['name'][$i];
        $tmp_name = $_FILES['images']['tmp_name'][$i];
        $error = $_FILES['images']['error'][$i];

        if ($error === 0) {
            $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array('jpg', 'jpeg', 'png');

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid('IMG-', true) . '.' . $img_ex_lc;
                $img_upload_path = 'adsfolder/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                 $sql = "INSERT INTO ads (ad) VALUES (?)";
                 $stmt = $conn->prepare($sql);
                 $stmt->execute([$new_img_name]);
                echo "added sucssecfully";
                
            } else {
                $em = "You can't upload files of this type";
                header("Location: uploadads.php.php?error=$em");
            }
        } else {
            $em = "Unknown Error Occurred while uploading";
            header("Location: uploadnews.php?error=$em");
        }
    }
}
?>
