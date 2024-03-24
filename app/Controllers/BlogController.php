<?php

namespace App\Controllers;

use App\Models\Post;
use App\Models\Tag;

class BlogController extends Controller{

    public function welcome()
    {
        return $this->view('blog.welcome');
    }

    public function index()
    {   
        $post = new Post($this->db);
        $posts = $post->all();
        return $this->view('blog.index',compact('posts'));
    }

    public function show(int $id)
    {
        $post = new Post($this->db);
        $post = $post->findById($id);
        return $this->view('blog.show', compact('post'));
    }

    public function tags(int $id)
    {
        $tag = new Tag($this->getDB());
        $tag = $tag->findById($id); // Correction ici

        return $this->view('blog.tags',compact('tag'));
    }


}