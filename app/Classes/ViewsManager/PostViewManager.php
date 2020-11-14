<?php


namespace App\Classes\ViewsManager;


use App\Models\Post;

class PostViewManager
{

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
