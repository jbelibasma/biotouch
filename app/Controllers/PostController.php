<?php
namespace App\Controllers;

use App\models\Post;


class PostController extends Controller {
    protected $getDB;
    public function __construct($db)
    {
        $this->getDB = $db;
    }
    public function welcome(){
        return $this->view('blog.welcome');
    }
    public function index(){
    //   echo 'test';die;
       $post = new Post($this->getDB);
       $articles=$post->all();
        return $this->view('blog.index', compact('articles'));
        //return view index qu est en dossier blog
    }
    public function detail($id){
      
        // $req=$this->db->getPDO()->query('SELECT * From produit');
        // $produits=$req->fetchAll();
        // foreach($produits as $produit){
        //     echo  $produit->nom_produit;
        // } 
        $post = new Post($this->getDB);
        $article=$post->findById($id);
        return $this->view('blog.show', compact('article'));
        //return view show avec id 

    }
}