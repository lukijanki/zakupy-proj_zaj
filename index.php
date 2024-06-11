<?php
include("connect.php");
mysqli_select_db($conn, $db_name);

if (isset($_POST['btn'])) {
    $date = $_POST['idate'];
    $query = "SELECT * FROM grocerytb WHERE Date='$date'";
} else {
    $query = "SELECT * FROM grocerytb";
}
$result = mysqli_query($conn, $query);
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Produkty w magazynie Sklepu X</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h1>Lista produktów</h1>
                <a href="add.php" class="btn btn-primary">Dodaj produkt</a>
            </div>
            <div class="col-md-4">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="idate">Filtruj za pomocą daty:</label>
                        <input type="date" class="form-control" id="idate" name="idate">
                    </div>
                    <button type="submit" class="btn btn-danger" name="btn">Filtruj</button>
                </form>
            </div>
        </div>

        <div class="row mt-4">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['Item_name']; ?></h5>
                        <p class="card-text">Ilość: <?php echo $row['Item_Quantity']; ?></p>
                        <p class="card-text">Status: 
                            <?php
                            switch ($row['Item_status']) {
                                case 0:
                                    echo '<span class="text-info">Oczekuje na dostawęy</span>';
                                    break;
                                case 1:
                                    echo '<span class="text-success">Dostępny</span>';
                                    break;
                                case 2:
                                    echo '<span class="text-danger">Niedostępny</span>';
                                    break;
                            }
                            ?>
                        </p>
                        <p class="card-text">Data: <?php echo $row['Date']; ?></p>
                        <a href="delete.php?id=<?php echo $row['Id']; ?>" class="btn btn-danger btn-sm">Usuń</a>
                        <a href="update.php?id=<?php echo $row['Id']; ?>" class="btn btn-secondary btn-sm">Aktualizuj</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        </div> 
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
</body>
</html>
