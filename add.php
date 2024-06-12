<!DOCTYPE html>
<html lang="pl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Dodaj produkt do magazynu</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h1 class="mb-4 text-center">Dodaj produkt do magazynu</h1>
                    <form action="" method="POST"> 
                        <div class="form-group">
                            <label for="iname">Nazwa produktu:</label>
                            <input type="text" class="form-control" id="iname" placeholder="Nazwa produktu" name="iname" required> 
                        </div>
                        <div class="form-group">
                            <label for="iqty">Ilość:</label>
                            <input type="number" class="form-control" id="iqty" placeholder="Ilość" name="iqty" required> 
                        </div>
                        <div class="form-group">
                            <label for="istatus">Status:</label>
                            <select class="form-control" id="istatus" name="istatus">
                                <option value="0">Oczekuje na dostawę</option>
                                <option value="1">Dostępny</option>
                                <option value="2">Niedostępny</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idate">Data:</label>
                            <input type="date" class="form-control" id="idate" name="idate" required> 
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Dodaj" class="btn btn-primary btn-lg" name="btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST["btn"])) {
        include("connect.php"); 

        // Pobranie danych z formularza
        $item_name = $_POST['iname'];
        $item_qty = $_POST['iqty'];
        $item_status = $_POST['istatus'];
        $date = $_POST['idate'];

        $stmt = $conn->prepare("INSERT INTO grocerytb (Item_name, Item_Quantity, Item_status, Date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $item_name, $item_qty, $item_status, $date);
        //Przekierowanie do index.php
        if ($stmt->execute()) {
            echo "<script>window.location.href = 'index.php';</script>";
            exit(); 
        } else {
            echo "Error: " . $stmt->error; 
        }

        $stmt->close();
        $conn->close(); 
    }
    ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
</body>
</html>
