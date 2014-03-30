<?php

function smarty_modifier_datef(DateTime $dt, $maxCar = 3)
{
    $tJours = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
    $tMois = array('01' => "janvier",
        '02' => "février",
        '03' => "mars",
        '04' => "avril",
        '05' => "mai",
        '06' => "juin",
        '07' => "juillet",
        '08' => "août",
        '09' => "septembre",
        '10' => "octobre",
        '11' => "novembre",
        '12' => "décembre");

    $mois = $tMois[$dt->format("m")];
    $joursemaine = $tJours[$dt->format("w")];

    $date = ucfirst(substr($joursemaine, 0, $maxCar)) . " " . $dt->format("d") . " " . ucfirst(substr($mois, 0, 3)) . " à " . $dt->format("H\hi");

    return $date;
}

function smarty_modifier_datefEvent(DateTime $dt)
{
    $tJours = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");

    $joursemaine = $tJours[$dt->format("w")];

    $date = ucfirst($joursemaine);

    return $date;
}

?>