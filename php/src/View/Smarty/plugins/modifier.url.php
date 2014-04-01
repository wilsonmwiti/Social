<?php
/**
 * Smarty plugin
 *
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Smarty URL modifier plugin
 *
 * Type:     modifier<br>
 * Name:     URL<br>
 * Purpose:  URL words in the string
 *
 * {@internal {$string|url:true:true} is the fastest option for MBString enabled systems }}
 *
 * @param string  $string    string to URL format
 * @return string formatted string
 * @author Monte Ohrt <monte at ohrt dot com>
 * @author Rodney Rehm
 */
function smarty_modifier_url($string)
{
    $lien = html_entity_decode($string, ENT_QUOTES);

    $sSearch = array ('/à|á|â|ä|ã|å|À|Á|Â|Ä|Ã|Å/', '/è|é|ê|ë|È|É|Ê|Ë/', '/ì|í|î|ï|Ì|Í|Î|Ï/', '/ò|ó|ô|ö|ø|Ò|Ó|Ô|Ö|Ø/', '/ù|ú|û|ü|Ù|Ú|Û|Ü/', '/ÿ|Ÿ/', '/ñ|Ñ/', '/ç|Ç/', '/[^a-z0-9]/i');
    $sReplace = array ('a', 'e', 'i', 'o', 'u', 'y', 'n', 'c', '-');

    $lien = preg_replace ($sSearch, $sReplace, $lien);

    $lien = str_replace("--","-","$lien");
    $lien = str_replace("--","-","$lien");
    $lien = str_replace("--","-","$lien");
    $lien = str_replace("--","-","$lien");

    return strtolower($lien);
}

?>