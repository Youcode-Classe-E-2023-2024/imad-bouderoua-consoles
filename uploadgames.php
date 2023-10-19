<?php
if (isset($_POST['upload'])) {

    $year = $_POST['year'];
    $kind = $_POST['kind'];
    $description = $_POST['description'];
    $platform = $_POST['platform'];
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
                $img_upload_path = 'gamesimages/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                 $sql = "INSERT INTO cartes (gameimg,year,type,description,platform) VALUES (?,?,?,?,?)";
                 $stmt = $conn->prepare($sql);
                 $stmt->execute([$new_img_name ,$year,$kind,$description,$platform]);
                echo "added sucssecfully";
                
            } else {
                $em = "You can't upload files of this type";
                header("Location: uploadgames.php?error=$em");
            }
        } else {
            $em = "Unknown Error Occurred while uploading";
            header("Location: uploadgames.php?error=$em");
        }
    }
}
?>
