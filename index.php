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
  <h1 style="color: PURPLE">
    BASIC PHP PAGE WITH OPENSHIFT CONTAINER
  </h1>
    <?php
     if ($connection->connect_errno) {
    ?>
        <p>Could not connect to the database </p>
    <?php
         exit();
     } else {
       ?>
       <br>
       <hr/>
       <br>
       <p>The app is connected to the MySQL database running on <b><?php echo $dbhost ?>:<?php echo $dbport ?> </b> of the Openshift container</p>
       <p><b>Database name: <?php echo $dbname ?> </b></p>
       <br><br>
       Data fetched from the users table: <br/>
      <?php
     }
      $sql = "SELECT * FROM users";
      $result = $connection->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "Name: <b>" . $row["username"] . "</b><br>";
          }
      } else {
          echo "0 results";
      }

     $connection->close();
    ?>
  </center>
 </body>
 </html>
