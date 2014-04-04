<?php

use Core\Tools;
use Core\Managers\RoutingManager;
use Core\Http\Request;
use Core\Http\Response;
use Exception\HttpException;
use DAL\DataBase;
use Mapper\MessageDataMapper;
use Model\Message;

$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);

$database = new DataBase(Conf::_DB_DSN_, Conf::_DB_USER_, Conf::_DB_PWD_, $options);
$rootManager = new RoutingManager($smarty);

try{
	//Routing get messages
	$rootManager->get(Conf::_ROOT_WEB_SITE_.'/json/messages', function (Request $request) use ($rootManager, $database){
		$lastId = $request->getParameter('lastId', null);
		
		$messageDataMapper = new MessageDataMapper($database);
        $messages = $messageDataMapper->findAll(array("where" => "id > '".$lastId."'"));
		
		if($messages->count() > 0){
			$array = array();
			foreach($messages as $message){
				$array[] = array("id" => $message->getId(), "author" => $message->getAuthor(), "message" => $message->getMessage());
			}
			
			return json_encode($array);
		}

		return json_encode(array());
    });
	
    $rootManager->run();
}
catch(\Exception $e){
    throw new HttpException(500, $e->getMessage(), $e);
}