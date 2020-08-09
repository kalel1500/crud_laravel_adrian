<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    protected $num_create_users = 5;
    protected $num_create_posts = 5;
    protected $num_create_comments = 5;
    protected $num_create_subComments = 5;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "------- Inicio ----------\n\n";

        $num_users          = $this->num_create_users                   ;
        $num_posts          = $this->num_create_posts       *$num_users ;
        $num_comments       = $this->num_create_comments    *$num_posts ;
        $num_subComments    = $this->num_create_subComments *$num_comments ;

        factory(\App\Models\User::class, $this->num_create_users)->create()->each(function ($user) use ($num_users, $num_posts, $num_comments, $num_subComments) {
            echo $user->id."/".$num_users."--------------------------------------Usuarios\n";

            factory(\App\Models\Post::class, $this->num_create_posts)->create(['user_id' => $user->id])->each(function ($post) use ($num_posts, $num_comments, $num_subComments) {
                echo $post->id."/".$num_posts."-----------------------------Posts\n";

                factory(\App\Models\Comment::class, $this->num_create_comments)->create(['post_id' => $post->id])->each(function ($comment) use ($num_comments, $num_subComments) {
                    echo $comment->id."/".$num_comments."------------------Comments\n";

                    factory(\App\Models\Comment::class, $this->num_create_subComments)->create(['comment_id' => $comment->id])->each(function ($subComment) use ($num_subComments) {
                        echo $subComment->id."/".$num_subComments."-----------SubComments\n";

                    });

                });
            });
        });
    }
}
