<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Dodaj produkt do listy</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Dodaj produkt do listy</h1>
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
                    <option value="0">Oczekiwany</option>
                    <option value="1">Zakupiony</option>
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

        // Zapytanie SQL z prepared statements (ochrona przed SQL injection)
        $stmt = $conn->prepare("INSERT INTO grocerytb (Item_name, Item_Quantity, Item_status, Date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $item_name, $item_qty, $item_status, $date);

        if ($stmt->execute()) {
            echo "<script>window.location.href = 'index.php';</script>";
            exit(); // Ważne, aby zakończyć skrypt po przekierowaniu
        } else {
            echo "Error: " . $stmt->error; // Wyświetl komunikat o błędzie
        }

        $stmt->close();
        $conn->close(); 
    }
    ?>
</body>
</html>
