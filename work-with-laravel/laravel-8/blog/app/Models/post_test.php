<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post
{
    private static $blog_post = [
        [
            "title"=>"judul Post 1",
            "slug"=>"judul-post-1",
            "author"=>'Bunayya Wahyu',
            "body"=> 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam inventore ipsam necessitatibus ab neque, accusamus natus vel, illum pariatur fugiat itaque accusantium iusto! Id earum eos pariatur. Voluptatibus eligendi minus alias fugit! Modi consequatur sapiente laboriosam. Ipsa ducimus maiores accusantium et excepturi provident doloribus mollitia labore, iusto velit necessitatibus quo assumenda. Culpa, dolores inventore? Odit excepturi libero architecto. Similique enim dolorum voluptates sapiente asperiores voluptatem totam corrupti, fugiat quam, quis dicta accusamus minima temporibus labore, itaque nostrum aperiam quidem deserunt ipsam blanditiis debitis consequatur! Placeat excepturi harum asperiores minus. Unde ipsam officia illo quia eaque doloribus corrupti nesciunt, odio iusto!'

        ],
        [
            "title" => "judul Post 2",
            "slug" => "judul-post-2",
            "author" => 'Bunayya Wahyu',
            "body" => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam inventore ipsam necessitatibus ab neque, accusamus natus vel, illum pariatur fugiat itaque accusantium iusto! Id earum eos pariatur. Voluptatibus eligendi minus alias fugit! Modi consequatur sapiente laboriosam. Ipsa ducimus maiores accusantium et excepturi provident doloribus mollitia labore, iusto velit necessitatibus quo assumenda. Culpa, dolores inventore? Odit excepturi libero architecto. Similique enim dolorum voluptates sapiente asperiores voluptatem totam corrupti, fugiat quam, quis dicta accusamus minima temporibus labore, itaque nostrum aperiam quidem deserunt ipsam blanditiis debitis consequatur! Placeat excepturi harum asperiores minus. Unde ipsam officia illo quia eaque doloribus corrupti nesciunt, odio iusto!'
        ],
        [
            "title" => "judul Post 3",
            "slug" => "judul-post-3",
            "author" => 'Bunayya Wahyu',
            "body" => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam inventore ipsam necessitatibus ab neque, accusamus natus vel, illum pariatur fugiat itaque accusantium iusto! Id earum eos pariatur. Voluptatibus eligendi minus alias fugit! Modi consequatur sapiente laboriosam. Ipsa ducimus maiores accusantium et excepturi provident doloribus mollitia labore, iusto velit necessitatibus quo assumenda. Culpa, dolores inventore? Odit excepturi libero architecto. Similique enim dolorum voluptates sapiente asperiores voluptatem totam corrupti, fugiat quam, quis dicta accusamus minima temporibus labore, itaque nostrum aperiam quidem deserunt ipsam blanditiis debitis consequatur! Placeat excepturi harum asperiores minus. Unde ipsam officia illo quia eaque doloribus corrupti nesciunt, odio iusto!'
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_post);
    }
    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug',$slug);
    }
}
