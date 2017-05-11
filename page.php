<?Php
$return = doPageCustom();

if(!empty($return[page]))
{$data[page] = $return[page];}

include "subsystem.".$return[system].".php";

if(empty($return[result]))
{header("Location:".$GLOBALS[404]);}
?>