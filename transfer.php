<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Basic Banking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href ="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body id="home">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><b>Home</b> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customer.php"><b>Customer Details</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="transfer.php"><b>Transfer Money</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="history.php"><b>History<b></a>
      </li>
    </ul>
  </div>
</nav>
		<h1 class="fw-normal head" style="text-align:center;font: italic small-caps bold 36px/2 cursive;">Transfer Money</h1>
    <?php include("configuration.php");

        $FromName  = mysqli_query($connection, "SELECT name FROM customers");
        $ToName = mysqli_query($connection, "SELECT name FROM customers");
        ?>
        <form action="" method="GET" id="drop">
            <label for="">From:</label>
            <select name="fromuser">
                <option value="">Choose sender</option>
                <?php
                while ($name1 = mysqli_fetch_array($FromName)) {
                    echo "<option value='" . $name1["name"] . "'>" . $name1["name"] . "</option>";
                }
                ?>
            </select>
            <br> <br>
            <label for="">To:</label>
            <select name="touser">
                <option value="">Choose receiver</option>
                <?php
                while ($name1 = mysqli_fetch_array($ToName)) {
                    echo "<option value='" . $name1["name"] . "'>" . $name1["name"] . "</option>";
                }
                ?>
            </select> <br><br><label for="">Enter Amount:</label>
            <input type="number" name="amount" style="background-color: #fff; color:grey; width:500px; height:50px"
                placeholder="Amount"><br><br>
            <input class="view" name="transfer" type="submit" value="Transfer"><br>
        </form>
        <?php
            if (isset($_GET['transfer'])) {

                $cust1 = $_GET["fromuser"];
                $cust2 = $_GET["touser"];
                $amount =$_GET["amount"];

            if ($cust1 != "" && $cust2 != "" && $amount!="")
            {
                $aa="SELECT balance From customers WHERE name='$cust1'";
                $amt=intval($amount);
                if($cust1==$cust2)
                {
                      echo "<script>alert('Error ! Same Name Selected. Please Check Properly!')</script>";
                }
                else if($amt<=0)
                {
                      echo "<script>alert('Error ! Amount you entered is too low !')</script>";
                }
                else if($amt> $aa )
                {
                    echo "<script>alert('Insufficient Balance. Transaction failed !')</script>";
                }
                else if($cust1!=$cust2)
                {
                // update the balance amount
                    $receive = "UPDATE customers SET balance = balance + '$amount' WHERE name= '$cust2' ";
                    $updatedData2 = mysqli_query($connection, $receive);
                    $send = "UPDATE customers SET balance = balance - '$amount' WHERE name= '$cust1' ";
                    $updatedData1 = mysqli_query($connection, $send);

                    if ($updatedData2 && $updatedData1) {
                        echo "<div class='alert alert-success'>
                    <h2 style='text-align:center; color:#000' id='h2'>Payment Successfull.</h2>
                    </div>";
                    }
                    else {
                        echo "<div class='alert alert-warning'>
                    <h2 style='text-align:center; color:#000' id='h2'>Oops! Payment Unsuccessful. Please Try Again.</h2>
                    </div>";
                    }
                    // insert value into transfer
                    $transaction = "INSERT INTO transaction(sender,receiver,balance) VALUES ('$cust1', '$cust2', '$amount')";
                    $done = mysqli_query($connection, $transaction);

                    if($done){
                        $u1 = "SELECT * FROM customers WHERE  name='$cust1' ";
                        $res=mysqli_query($connection,$u1);
                        $row_count=mysqli_num_rows($res);
                    }


                }

            }

            else {
                echo "<script>alert('Please Enter All the required fields.')</script> ";
            }
        }
        ?>

        <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
          © 2021 Copyright
          <a class="text-dark" href="index.php">By Prodeep Kumar Paul</a>
        </div>
        <!-- Copyright -->
        </footer>

 </body>


</html>
