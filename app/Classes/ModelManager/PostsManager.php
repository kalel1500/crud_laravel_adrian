<?php


namespace App\Classes\ModelManager;


use App\Models\Post;
use Carbon\CarbonImmutable;

class PostsManager
{

    public function getPosts(CarbonImmutable $startDate, CarbonImmutable $endDate)
    {
        return Post::query()
            ->where('created_at', '>', $startDate)
            ->where('created_at', '<', $endDate)
            ->get();
    }
}
