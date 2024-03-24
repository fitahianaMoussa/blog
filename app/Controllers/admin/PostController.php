<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller{

    public function index()
    {
        $this->isAdmin();
        $post = new Post($this->getDB());
        $posts = $post->all();
        return $this->view('admin.post.index',compact('posts'));
    }

    public function create()
    {
        $this->isAdmin();
        $tag = new Tag($this->getDB());
        $tags = $tag->all();
        return $this->view('admin.post.create',compact('tags'));
    }

    public function store()
    {
        $this->isAdmin();
        $post = new Post($this->getDB());
        $tags = array_pop($_POST);
        $result = $post->create($_POST,$tags);

        if($result){
            return header('location: /myapp/admin/posts ');
        }
    }


    public function edit(int $id)
    {
        $this->isAdmin();
        $post = new Post($this->getDB());
        $post = $post->findById($id);
        $tag = new Tag($this->getDB());
        $tags = $tag->all();

        return $this->view('admin.post.edit',compact('post','tags'));
    }

    public function update(int $id)
    {
        $this->isAdmin();
        $post = new Post($this->getDB());
        $tags = array_pop($_POST);
        $result = $post->update($id,$_POST,$tags);

        if($result){
            return header('location: /myapp/admin/posts ');
        }
    }

    public function destroy(int $id)
    {
        $this->isAdmin();
        $post = new Post($this->getDB());
        $result = $post->destroy($id);

        if($result){
            return header('location: /myapp/admin/posts ');
        }
    }

}