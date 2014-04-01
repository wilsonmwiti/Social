<?php

namespace DAL;

class DataBase extends \PDO
{		
    public function executeQuery($query, $parameters = array()){
    	try{
            $stmt = $this->prepare($query);

            foreach ($parameters as $name => $value){
                $stmt->bindValue($name, $value);
            }

            $stmt->execute();
        }
        catch(SqlException $e){
            throw new SqlException(500, "Mysql error");
        }
        
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}