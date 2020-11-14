<?php


namespace App\Classes\ViewsManager;


use App\Classes\ModelManager\PostsManager;
use Carbon\CarbonImmutable;
use Illuminate\Support\Carbon;

class DashboardManager
{
    public $year;
    public $month;
    public $carbon_date;
    public $prevYear;
    public $prevMonth;
    public $nextYear;
    public $nextMonth;

    public $posts;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
        $this->carbon_date = CarbonImmutable::create($this->year, $this->month, 1);

        $this->prevYear = $this->carbon_date->subMonth()->year;
        $this->prevMonth = $this->carbon_date->subMonth()->month;

        $this->nextYear = $this->carbon_date->addMonth()->year;
        $this->nextMonth = $this->carbon_date->addMonth()->month;
    }

    public function setPosts()
    {
        $postsManager = new PostsManager();

        $startDate = $this->carbon_date->firstOfMonth();
        $endDate = $this->carbon_date->endOfMonth();

        $this->posts = $postsManager->getPosts($startDate, $endDate);
    }
}
