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

 <head>
   <style>
    table {
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
  </style>
 </head>

 <body>
   <center>
  <h1 style="color: GREEN">
    BASIC PHP PAGE - UPDATED
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
       <table>
         <tr>
           <th>USERID</th>
           <th>NAME</th>
         </tr>
      <?php
     }
      $sql = "SELECT * FROM users";
      $result = $connection->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr> <td>". $row["user_id"] ." </td> <td><b>" . $row["username"] . "</b></td></tr>";
          }
      } else {
          echo "0 results";
      }

     $connection->close();
    ?>
    </table>
  </center>
 </body>
 </html>
