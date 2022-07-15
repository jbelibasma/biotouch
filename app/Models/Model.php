<?php
namespace App\Models;

use PDO;
use Database\DBConnection;

abstract class Model{
    protected $db;
    protected $table;
    // stocker la connection avec la base de donnee
    public function __construct(DBConnection $db)
    {
        $this->db=$db;
    }
    public function all():array
    {
        return $this->query(" SELECT * FROM {$this->table} ORDER BY created_at DESC ");
        // $statm= 
        // $statm->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        // return $statm->fetchAll();
    }
    public function findById(int $id) :Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id= ?", [$id], true);
        // $statm=$this->db->getPDO()->prepare("SELECT * FROM {$this->table} WHERE id= ? "); 
        // $statm->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        // $statm->execute([$id]);
        //  return $statm->fetch();
    }
    public function destroy(int $id) : bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE id= ?", [$id]);
    }
    public function update(int $id, array $data)
    {
        $sqlRequest=" ";
        $i=1;
        foreach($data as $key=>$value){
            $comma = $i === count($data) ? " " :', ' ;
            $sqlRequest .= "{$key}= :{$key}{$comma}";
            $i++;
        }
        
        $data['id']=$id;
        return $this->query("UPDATE {$this->table} SET {$sqlRequest} WHERE id= :id", $data);

        // $sql="UPDATE {$this->table} SET title= :title, content= :content WHERE id= :id";

    }  
    public function query(string $sql, array $param= null, bool $single= null){
        $method= is_null($param) ? 'query' : 'prepare';
        if(strpos($sql, 'DELETE')===0 || strpos($sql, 'UPDATE')===0 || strpos($sql, "CREATE")===0){
            $statm= $this->db->getPDO()->$method($sql);
            $statm->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $statm->execute($param);
        }
        $fetch= is_null($single) ? 'fetchAll' : 'fetch';
        $statm= $this->db->getPDO()->$method($sql);
        $statm->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        if($method ==='query'){
            return $statm->$fetch();
        }
        else{
            $statm->execute($param);
            return $statm->$fetch();
        }
    }
   
}   