<?php
include("connect.php");
mysqli_select_db($conn, $db_name);

if(isset($_POST['btn'])) {
    $item_name = $_POST['iname'];
    $item_qty = $_POST['iqty'];
    $istatus = $_POST['istatus'];
    $date = $_POST['idate'];
    $id = $_GET['id'];
    $stmt = $conn->prepare("UPDATE grocerytb SET Item_name = ?, Item_Quantity = ?, Item_status = ?, Date = ? WHERE Id = ?");
    $stmt->bind_param("ssisi", $item_name, $item_qty, $istatus, $date, $id);

    if ($stmt->execute()) {
        header('location:index.php');
        exit();
    } else {
        echo "Błąd aktualizacji: " . $stmt->error;
    }

    $stmt->close();
} 

// Wyświetlanie danych do edycji
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM grocerytb WHERE Id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $res = mysqli_fetch_assoc($result); 
    } else {
        echo "Nie znaleziono produktu.";
        exit(); 
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zaktualizuj produkty w magazynie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
   
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h1 class="mb-4 text-center">Aktualizuj produkt</h1>
                    <form method="post" action="?id=<?php echo $res['Id']; ?>">  
                        <div class="form-group">
                            <label for="iname">Nazwa produktu:</label>
                            <input type="text" class="form-control" id="iname" name="iname" value="<?php echo $res['Item_name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="iqty">Ilość:</label>
                            <input type="number" class="form-control" id="iqty" name="iqty" value="<?php echo $res['Item_Quantity']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="istatus">Status:</label>
                            <select class="form-control" id="istatus" name="istatus">
                                <option value="0" <?php if ($res['Item_status'] == 0) echo 'selected'; ?>>Oczekuje na dostawę</option>
                                <option value="1" <?php if ($res['Item_status'] == 1) echo 'selected'; ?>>Dostępny</option>
                                <option value="2" <?php if ($res['Item_status'] == 2) echo 'selected'; ?>>Niedostępny</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idate">Data:</label>
                            <input type="date" class="form-control" id="idate" name="idate" value="<?php echo $res['Date']; ?>" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg" name="btn">Aktualizuj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
