<?php
 // Instale o módulo de BD usando 'pear install DB'
 require_once( "db.php" );
 $data = array();
 $db = @mysql_connect('localhost', 'root', '') or die ( mysql_error() );
mysql_select_db('all-backs', $db);
 

 
 
 
 $res = "SELECT * FROM names ORDER BY last";
$result = $conn->query($res);
 
 
 ?>
 <html>
 <body>
 <table>
 <tr>
 <th>ID</th>
 <th>First</th>
 <th>Middle</th>
 <th>Last</th>
 <th>Email</th>
 </tr>
 <?php while( $res->fetchInto( $row,
           DB_FETCHMODE_ASSOC ) ) { ?>
 <tr>
 <td><?php echo( $row['id'] ); ?></td>
 <td><?php echo( $row['first'] ); ?></td>
 <td><?php echo( $row['middle'] ); ?></td>
 <td><?php echo( $row['last'] ); ?></td>
 <td><?php echo( $row['email'] ); ?></td>
 </tr>
 <?php } ?>
 </table>
 Download as an
 <a href="listxl.php">Excel spreadsheet</a>.
</body>
 </html>