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
       <p>The app is connected to the MySql database on the container running on <b><?php echo $dbhost ?>:<?php echo $dbport ?> </b> of the Openshift container</p>
       <p><b>Database name: <?php echo $dbname ?> </b></p>
      <?php
     }
     $connection->close();
    ?>
  </center>
 </body>
 </html>
