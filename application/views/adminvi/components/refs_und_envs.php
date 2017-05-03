<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $meta_title; ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="<?php echo site_url('js/bootstrap.min.js');?>"></script>
    <link href="<?php echo site_url('css/bootstrap.min.css');?>" rel="stylesheet">

<!--    <link href="http://localhost/bootstrap337/css/bootstrap.min.css" rel="stylesheet">-->

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


    <!-- Bootstrap -->




</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="#">Page 3</a></li>
        </ul>
    </div>
</nav>



<?php
error_reporting( E_ERROR );

error_reporting( E_NOTICE );

set_error_handler("handleError");
$indicesServer = array('PHP_SELF',
    'argv',
    'argc',
    'GATEWAY_INTERFACE',
    'SERVER_ADDR',
    'SERVER_NAME',
    'SERVER_SOFTWARE',
    'SERVER_PROTOCOL',
    'REQUEST_METHOD',
    'REQUEST_TIME',
    'REQUEST_TIME_FLOAT',
    'QUERY_STRING',
    'DOCUMENT_ROOT',
    'HTTP_ACCEPT',
    'HTTP_ACCEPT_CHARSET',
    'HTTP_ACCEPT_ENCODING',
    'HTTP_ACCEPT_LANGUAGE',
    'HTTP_CONNECTION',
    'HTTP_HOST',
    'HTTP_REFERER',
    'HTTP_USER_AGENT',
    'HTTPS',
    'REMOTE_ADDR',
    'REMOTE_HOST',
    'REMOTE_PORT',
    'REMOTE_USER',
    'REDIRECT_REMOTE_USER',
    'SCRIPT_FILENAME',
    'SERVER_ADMIN',
    'SERVER_PORT',
    'SERVER_SIGNATURE',
    'PATH_TRANSLATED',
    'SCRIPT_NAME',
    'REQUEST_URI',
    'PHP_AUTH_DIGEST',
    'PHP_AUTH_USER',
    'PHP_AUTH_PW',
    'AUTH_TYPE',
    'PATH_INFO',
    'ORIG_PATH_INFO') ;

echo '<table cellpadding="10">' ;
try {
     $i =0;
    foreach ($indicesServer as $arg) {
       ++$i;
        if (isset($_SERVER[$arg])) {
            echo$i;
            echo '<tr><td>' . $arg . '</td><td>' . $_SERVER[$arg] . '</td></tr>';
        } else {
            echo '<tr><td>' . $arg . '</td><td>-</td></tr>';
        }
    }
}catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo '</table>' ;

?>
<?php


function handleError($errno, $errstr,$error_file,$error_line) {
    echo "<b>Error:</b> [$errno] $errstr  .'<br>'. $error_file:$error_line";
    echo "<br />";
   // echo "Terminating PHP Script";

    //die();
}

//set error handler
set_error_handler("handleError");

//trigger error
//myFunction();
?>
</body>
</html>