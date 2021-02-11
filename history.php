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
        <a class="nav-link" href="history.php"><b>History</b></a>
      </li>
    </ul>
  </div>
</nav>
		<h1 class="fw-normal head" style="text-align:center;font: italic small-caps bold 36px/2 cursive;">History</h1>


    <table class="table table-striped table-secondary  table-bordered" id ="table">
      <tr>
          <th>From</th>
          <th>To</th>
          <th>Amount</th>
          <th>Time</th>
      </tr>
      <tbody>

    		 <?php

                include 'configuration.php';

                $take ="select * from transaction";

                $qry =mysqli_query($connection, $take);

                while($rw = mysqli_fetch_assoc($qry))
                {
            ?>
                <tr>
    				<td><?php echo $rw['sender']; ?></td>
    				<td><?php echo $rw['receiver']; ?></td>
    				<td><?php echo $rw['balance']; ?> </td>
    				<td><?php echo $rw['datetime']; ?> </td>
                </tr>

    		<?php
                }

            ?>
                </tbody>


 </body>
 <!-- <footer class="bg-light text-center text-lg-start">
 <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
   © 2021 Copyright
   <a class="text-dark" href="index.php">By Prodeep Kumar Paul</a>
 </div>

 </footer> -->


</html>
