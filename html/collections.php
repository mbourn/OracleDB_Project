<!DOCTYPE html>
<html>
<head>
<?php require "base.php" ?>
<link rel='icon' href='favicon.png'>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<?php
  if( !empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])){
    render_mmbr_header();
  }
var_dump($_SESSION);
  $sql_c = 'SELECT * FROM collections';
  $sql_u = 'Select id, u_name from users';
  $coll_names = oci_parse($conn, $sql_c);
  $u_names = oci_parse($conn, $sql_u);
  oci_execute($u_names);
  oci_execute($coll_names);
  oci_close($conn);
//  echo $coll_names;

  echo '<table>';
  echo '</table>';

?>
  <div id="main">
    <div id="coll">
      <h3>Your Collections</h3>
      <table>
<?php
  $get_results = oci_fetch_all($u_names, $rows);
//var_dump(  $rows);
  while( $row = oci_fetch_array( $coll_names, OCI_ASSOC+OCI_RETURN_NULLS)){
var_dump($row);
//    foreach( $row as $item ){ 
      echo '<tr><td>'.$row['C_NAME'].'</td><td>'.$row['ID'].'</tr>';
//    }
  }
?>
      
      </tr><tr>
        
        <td><a href="collections.php?action=create">Make a new Collections</a></td>
      </table>
    </div>
  </div>
</body>
</html>
