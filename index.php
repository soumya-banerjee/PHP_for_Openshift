<?php
  $dbhost = getenv("MYSQL_SERVICE_HOST");
  $dbport = getenv("MYSQL_SERVICE_PORT");
  $dbuser = getenv("databaseuser");
  $dbpwd = getenv("databasepassword");
  $dbname = getenv("databasename");
  $connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
?>
 <!doctype html>
 <html>
 <body>
   <center>
  <h1>
    A basic php page
  </h1>
    <?php
     if ($connection->connect_errno) {
    ?>
        <p>Could not connect to the database </p>
    <?php
         exit();
     } else {
       ?>
       <br><br>
       <hr/>
       <br>
       <p>The app is connected to the MySql database running on <b><?php echo $dbhost ?>:<?php echo $dbport ?> </b> of the Openshift container</p>
       <p><b>Database name: <?php echo $dbname ?> </b></p>
       <br><br>
       Data from the users table: <br/>
      <?php
     }
      $sql = "SELECT * FROM users";
      $result = $connection->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "id: " . $row["user_id"]. " - Name: " . $row["username"] . "<br>";
          }
      } else {
          echo "0 results";
      }

     $connection->close();
    ?>
  </center>
 </body>
 </html>
