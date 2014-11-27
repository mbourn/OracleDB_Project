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
    echo '<table><tr><td><img src="tc_bicep.gif"></td>';
    echo '<td><img src="tc.gif" style="height:165px;width:305px"><br><h1>Member Area</h1></td>';
    echo '<td><img src="tc_bicep_r.gif"></td></tr></table>';
  }


















?>


