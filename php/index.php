<?php
    // charge la bibliothèque Smarty + Autoload
    require_once(__DIR__ .'/src/View/Smarty/Smarty.class.php');
    require __DIR__ . '/autoload.php';

    use Core\Http\Request;
    use DAL\DataBase;
    use Core\Managers\RoutingManager;

    /** Configuration de Smarty **/
    $smarty = new Smarty();
    $smarty->template_dir = 'web/tpl/';
    $smarty->compile_dir = 'web/tpl_c/';
    $smarty->assign('rootPath', Conf::_ROOT_WEB_SITE_.'/');
    
    /** Initi DAL + RougintManager */
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );
    $database = new DataBase(Conf::_DB_DSN_, Conf::_DB_USER_, Conf::_DB_PWD_, $options);
    $rootManager = new RoutingManager($smarty);

    $req = Request::createFromGlobals();
	
	if(stristr($req->getUri(), '/json')){
        include_once('apps/api/app.php');
    }
	else{
		include_once('apps/frontend/app.php');
	}
    