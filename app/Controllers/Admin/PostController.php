<?php
namespace App\Controllers\Admin;

use App\models\Post;
use App\Controllers\Controller;

class PostController extends Controller{
    protected $getDB;
    public function __construct($db)
    {
        $this->getDB = $db;
    }
    public function index(){
           $posts = (new Post($this->getDB))->all(); 
            return $this->view('admin.post.index', compact('posts'));
           
    }
    public function edit(int $id){
        $post = (new Post($this->getDB))->findById($id); 
            return $this->view('admin.post.edit', compact('post'));
    }
    public function update(int $id){
        $post = (new Post($this->getDB));
        $result=$post->update($id, $_POST);
        if($result){
            return header('Location:/test-oop/admin/posts');
        }
    }
    public function destroy(int $id){
        $posts = new Post($this->getDB);
        $result =$posts->destroy($id);
        if($result){
            return header('Location:/test-oop/admin/posts');
        }
    }
}