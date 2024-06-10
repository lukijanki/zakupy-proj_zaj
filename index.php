

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>View List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-5">
            <!-- top -->
            <div class="row">
                <div class="col-lg-8">
                    <h1>View Grocery List</h1>
                    <a href="add.php">Add Item</a>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Date Filtering-->
                            <form method="post" action="">
                              <input type="date" class="form-control" name="idate">
                        </div>
                          <div class="col-lg-4" method="post">
                            <input type="submit" class="btn btn-danger float-right" name="btn" value="filter">
                        </div>
                            </form>
                    </div>
                </div>
            </div>
           
            <!-- Grocery Cards -->
            <div class="row mt-4">
                

                
            </div>
        </div>
    </body>
</html>
