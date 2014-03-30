<?php

function smarty_modifier_dayFrench(DateTime $dt)
{
    $tJours = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");

    $joursemaine = $tJours[$dt->format("w")];

    $date = ucfirst($joursemaine);

    return $date;
}

?>
