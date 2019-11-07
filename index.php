 <!--
      This is the minimum valid AMP HTML document. Type away
      here and the AMP Validator will re-check your document on the fly.
 -->
 <!doctype html>
 <html ⚡>
 <body>
   <center>
  <h1>
    A basic php page
  </h1>
   <?php
     echo "Hello World.. this is a test php application"
     $dbhost = getenv("MYSQL_SERVICE_HOST");
     $dbport = getenv("MYSQL_SERVICE_PORT");
     $dbuser = getenv("databaseuser");
     $dbpwd = getenv("databasepassword");
     $dbname = getenv("databasename");
     $connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
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
       <p>The app is connected to the database on the container running on <?php echo $dbhost ?>:<?php echo $dbport ?> of the Openshift container</p>
       <p>Database name: <?php echo $dbname ?> </p>
      <?php
     }
     $connection->close();
    ?>
  </center>
 </body>
 </html>
