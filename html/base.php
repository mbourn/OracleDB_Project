<?php
  session_start();
  error_reporting(E_ALL);
  ini_set('display_errors', 1); 
  $GLOBALS = [ 
    "dbhost"  => "musculardb-570.cg5xxeyaq8mi.us-west-2.rds.amazonaws.com",
    "dbport"  => 1521,
    "dbname"  => "BICEP",
    "dbun"    => "muscles",
    "dbpw"    => "muscleman5000",
    "webhost" => "localhost"
  ];  

  $db=" (DESCRIPTION=
        (ADDRESS=
          (PROTOCOL=TCP)
          (HOST=$GLOBALS[dbhost])
          (PORT=$GLOBALS[dbport]))
        (CONNECT_DATA=
          (SERVICE_NAME=$GLOBALS[dbname]))
  )";

  $conn = oci_connect($GLOBALS['dbun'], $GLOBALS['dbpw'], $db);

  if(!$conn){
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  function render_mmbr_header(){
    echo '<table><tr><td><img src="images/tc_bicep.gif"></td>';
    echo '<td><img src="images/tc.gif" style="height:165px;width:305px"><br><h1>Member Area</h1><br>';
    echo '<a href="logout.php">Log Out</a> | <a href="index.php">Home</a></td>';
    echo '<td><img src="images/tc_bicep_r.gif"></td></tr></table>';
  }

  function strip_sym($array){
    $symbols = array("=","+","$","%","^","&","/","\\",",",".",",","-","\#","_","!","*","(",")","[","]","{","}","|","<",">");
    if( $array){
      foreach( $array as $key => $value){
        $value = str_replace($symbols, "", $value);
        $array[$key] = $value;
      }
    return $array;
    }
  }

  function delete_item($table, $col, $term){
    $sql = "DELETE FROM ".$table." WHERE ".$col." = '".$term."'";
    $stmt = oci_parse($conn, $sql);
    $success = oci_execute($stmt);
    if( !$success){
      echo '<h1>Deletion Failed</h1>';
    }else{
      echo '<h1>Item Deleted</h1>';
    }
  }



/*  $sql_q = oci_parse($conn, "SELECT * FROM users");
    oci_execute($sql_q);
    oci_close($conn);

    echo "<table border='1'>\n";
    while( $row = oci_fetch_array($sql_q, OCI_ASSOC+OCI_RETURN_NULLS)){
      echo "<tr>\n";
      foreach( $row as $item){
        echo "  <td>" . ($item !==null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
      }
      echo "</tr>\n";
    }
    echo "</table>\n";
*/










?>


