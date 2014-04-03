<?php

namespace Mapper;

use \Model\Message;

class MessageDataMapper implements DataMapperInterface, FinderInterface {
    private $database;

    public function __construct(\DAL\DataBase $database){
        $this->database = $database;
    }
 
	 public function findAll($criterias = null){
        $col = new \SplObjectStorage();
        $query = "SELECT * FROM social_message";
        
        if($criterias !== null){
             if(!empty($criterias['where'])){
                $query .= ' WHERE '.$criterias['where'];
            }
            
            if(!empty($criterias['order'])){
                $query .= ' ORDER BY '.$criterias['order'];
            }
            
            if(!empty($criterias['limit'])){
                $query .= ' LIMIT 0,'.$criterias['limit'];
            }
        }
		
        $results = $this->database->executeQuery($query);
        foreach($results as $message){
            $messageMap = new Message($message->id, $message->author, $message->message);
            $col->attach($messageMap);
        }

        return $col;
    }

    public function findOneById($id){
        $query = "SELECT * FROM social_message WHERE id = :id";

        $result = $this->database->executeQuery($query, array('id' => $id));

        if($result === null){
            return null;
		}
        else{
            $message = $result[0];
		}

        return new Message($message->id, $message->author, $message->message);
    }

    public function remove($message){
        $query = "DELETE FROM social_message WHERE id = :id";

        return $this->database->executeQuery($query, array(
            'id' => $message->getId()));
    }

    public function insert($message){
        $query = "INSERT INTO social_message VALUES(null, :author, :message)";

        $this->database->executeQuery($query, array(
            'author' => $message->getAuthor(),
            'message' => $message->getMessage()));
        
        return $this->database->lastInsertId();
    }

    public function update($message){
        $query = "UPDATE social_message
                  SET
                    author = :author,
                    message = :message
                  WHERE
                    id = :id";

        return $this->database->executeQuery($query, array(
            'id' => $message->getId(),
            'author' => $message->getAuthor(),
            'message' => $message->getMessage()));
    }

    public function persist($message){
        if($message->isNew()){
            return $this->insert($message);
        }

        return $this->update($message);
    }

}