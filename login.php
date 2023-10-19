<?php 
if (isset($_POST['log'])) {
    include 'connection.php';
    session_start();

    function extractStringUpToChar($inputString, $charToFind) {
        $position = strpos($inputString, $charToFind);

        if ($position !== false) {
            return substr($inputString, 0, $position);
        }

        return $inputString; 
    }

    $charToFind = "@";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $imgname = $_POST['chosenAvatar'];

    $name = extractStringUpToChar($email, $charToFind);
    $_SESSION['name'] = $name;
    $_SESSION['chosenAvatar'] = $imgname;

    $sql = "INSERT INTO users (email, password, img, name) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([$email, $password, $imgname, $name])) {
        header("Location: frontpage.php");
        exit;
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>
