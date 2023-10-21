<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['productId']) && isset($data['rating'])) {
        $productId = $data['productId'];
        $rating = $data['rating'];

        $sql = "UPDATE cartes SET rate = :rating WHERE id = :productId";
        
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':rating', $rating);
            $stmt->bindParam(':productId', $productId);
            
            $stmt->execute();
            

            if ($stmt->rowCount() > 0) {
                http_response_code(200); // OK
                echo json_encode(['message' => 'Rating updated successfully']);
            } else {
                http_response_code(500); // Internal Server Error
                echo json_encode(['error' => 'Failed to update rating']);
            }
        } catch (PDOException $e) {
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['error' => 'Invalid data received']);
    }
} else {

    exit;
}

?>
