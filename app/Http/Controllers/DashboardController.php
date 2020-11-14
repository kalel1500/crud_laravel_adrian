<?php

namespace App\Http\Controllers;


use App\Classes\ViewsManager\DashboardManager;
use App\Classes\ViewsManager\PostViewManager;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index($year, $month)
    {

        $dashboardManager = new DashboardManager($year, $month);
        $dashboardManager->setPosts();

        $data['dashboardManager'] = $dashboardManager;
        return view('pages/dashboard', $data);
    }

    public function post(Post $post)
    {
        $postViewManager = new PostViewManager($post);

        $data['postViewManager'] = $postViewManager;
        return view('pages/post', $data);
    }
}
