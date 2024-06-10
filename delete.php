<?php
include("connect.php");

// Walidacja danych wejściowych
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id']; // Przekształcenie id na liczbę całkowitą

    // Zapytanie SQL z prepared statement (ochrona przed SQL injection)
    $stmt = $conn->prepare("DELETE FROM grocerytb WHERE Id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php"); 
        exit(); 
    } else {
        echo "Error deleting item: " . $stmt->error;
    }

    $stmt->close(); 
} else {
    echo "Invalid item ID.";
}

$conn->close(); 
?>
