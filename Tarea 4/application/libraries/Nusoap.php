<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Nusoap{
function Nusoap(){
require_once(str_replace("\\","/",APPPATH).'libraries/nusoap/nusoap.php'); //If we are executing this script on a Windows server
}
}
?>