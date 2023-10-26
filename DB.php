<?php
$GLOBALS['link']=0;
function connect()
{
    $servername="localhost";
    $dbname="joysell_ir_link";
    $username="joyse_user";
    $password="2Ehl7v%5";
    $dsn="mysql:host=$servername;dbname=$dbname;charset=utf8";

    $dbo = new PDO($dsn,$username,$password);
    return $dbo;

}

function select($selectsql)
{
    $GLOBALS['link']=connect();
    $GLOBALS['link']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $dbo->exec("INSERT INTO post VALUES (NULL,'title','body')");
    $result = $GLOBALS['link']->query($selectsql);

    return $result;

}
function fetch_result($result)
{
$row=$result->fetchAll(PDO::FETCH_ASSOC);
return $row;
}

function docommand($selectsql)
{   $GLOBALS['link']=connect();
    $result =$GLOBALS['link']->exec($selectsql);
    return $result;
}



function base_url(){

    if (isset($_SERVER['HTTP_HOST']) && preg_match('/^((\[[0-9a-f:]+\])|(\d{1,3}(\.\d{1,3}){3})|[a-z0-9\-\.]+)(:\d+)?$/i', $_SERVER['HTTP_HOST']))
    {
        $base_url = (is_https() ? 'https':'http').'://'.$_SERVER['HTTP_HOST']
            .substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
    }
    else
    {
        $base_url = 'http://localhost/';
    }

    return $base_url;


}

function is_https()
{
    if ( ! empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off')
    {
        return TRUE;
    }
    elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https')
    {
        return TRUE;
    }
    elseif ( ! empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off')
    {
        return TRUE;
    }

    return FALSE;
}


function curPageURL()
{

    $vms = 'http';
   //if ($_SERVER["HTTPS"] == "on") {$vms .= "s";}
   $vms .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $vms .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $vms .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $vms;
}


    function disconnect()
{// mysqli_close($GLOBALS['link']);
}

?>