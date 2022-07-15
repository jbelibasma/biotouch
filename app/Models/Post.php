<?php
namespace App\models;

use DateTime;

class Post extends Model{
    
    protected $table='posts';


    public function getCreatedAt() : string
    {
        return (new DateTime($this->created_at))->format('d/m/y à h:i');
        
    }
    public function getExcerpt(){
        return substr($this->content,0,200) . '...';
    }
    public function getButton():string
    {
        return <<<HTML
            <a href="/test-oop/detail/$this->id">detail</a>

        HTML;
    }
    public function getTages()
    {
        return $this->query("SELECT * FROM posts INNER JOIN categories ON posts.`Id_category`= categories.id WHERE posts.`id`= ?", [$this->id]);
    }
 

}