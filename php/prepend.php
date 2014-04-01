<?php
    // charge la bibliothèque Smarty + Autoload
    require_once(__DIR__ .'/vendor/smarty3.1.14/Smarty.class.php');
    require __DIR__ . '/autoload.php';

    /** Initialisation de l'application **/
    \Core\Managers\SessionManager::init();
    \Managers\CookieManager::init();
    \Managers\SessionManager::init();

	/** Configuration de Smarty **/
    $smarty = new Smarty();
    $smarty->template_dir = 'tpl/';
    $smarty->compile_dir = 'tpl_c/';
    $smarty->assign('rootPath', Conf::_ROOT_WEB_SITE_.'/');
    $smarty->assign('userConnected', \Managers\SessionManager::$User);
    $smarty->assign('classLinkNavAccueil', '');
    $smarty->assign('classLinkNavForum', '');
    $smarty->assign('classLinkNavNews', '');
    $smarty->assign('classLinkNavEvents', '');
    //$smarty->config_dir = '/configs/';
    //$smarty->cache_dir = '/cache/';
    //$smarty->caching = 2; // lifetime is per cache
    //$smarty->cache_lifetime = 300;
?>
