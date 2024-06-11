<?php
include("connect.php");

// Walidacja danych wejściowych
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

   
    $stmt = $conn->prepare("DELETE FROM grocerytb WHERE Id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php"); 
        exit(); 
    } else {
        echo "Błąd usuwania przedmiotu: " . $stmt->error;
    }

    $stmt->close(); 
} else {
    echo "Nieznany numer ID.";
}

$conn->close(); 
?>
