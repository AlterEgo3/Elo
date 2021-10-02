<?php

require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';

use \Hillel\Models;

$categories = [];

for ($i = 1; $i <= 5; $i++) {
    $categories = [
        'title' => 'Category' . $i,
        'slug' => 'category-' . $i,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
}

Models\Category::insert($categories);

$categories = Models\Category::all();
$category = $categories->random(1)->first();
$category->title = 'Category Updated';
$category->slug = 'Category-updated';
$category->save();

Models\Category::inRandomOrder()->first()->delete();

$categories = Models\Category::all();

$posts = [];
for ($i = 1; $i <= 10; $i++) {
    $posts[] = [
        'title' => 'Post' . $i,
        'slug' => 'post-' . $i,
        'body' => 'Post-body' . $i,
        'category-id' => $categories->random()->id,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
}

Models\Post::insert($posts);

$posts = Models\Post::all();
$post = $posts->random(1)->first;
$post->title = 'Post Updated';
$post->slug = 'Post-updated';
$post->save();

Models\Post::inRandomOrder()->first()->delete();

$tags = [];
for ($i = 1; $i <= 10; $i++) {
    $categories = [
        'title' => 'Tag' . $i,
        'slug' => 'Tag-' . $i,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
}
Models\Tag::insert($tags);

$tags = Models\Tag::all();

$posts = Models\Post::all();
foreach ($posts as $post) {
    $tagsId = $tags->pluck('id')->random(3);

    $post->tags()->sync($tagsId);

}
