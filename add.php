<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Dodaj produkt do magazynu</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Dodaj produkt do magazynu</h1>
        <form action="" method="POST"> 
            <div class="form-group">
                <label>Nazwa produktu:</label>
                <input type="text" class="form-control" placeholder="Item name" name="iname" required> 
            </div>
            <div class="form-group">
                <label>Ilość:</label>
                <input type="number" class="form-control" placeholder="Item quantity" name="iqty" required> 
            </div>
            <div class="form-group">
                <label>Status:</label>
                <select class="form-control" name="istatus">
                    <option value="0">Oczekuje na dostawę</option>
                    <option value="1">Dostępny</option>
                    <option value="2">Niedostępny</option>
                </select>
            </div>
            <div class="form-group">
                <label>Date:</label>
                <input type="date" class="form-control" name="idate" required> 
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-danger" name="btn">
            </div>
        </form>
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
</body>
</html>
