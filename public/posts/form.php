<?php

require_once '../../vendor/autoload.php';
require_once '../../config/eloquent.php';
require_once '../../config/blade.php';

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['id'])) {
        \Hillel\Models\Post::create([
            'title' => $_POST['title'],
            'slug' => $_POST['slug'],
            'body' => $_POST['body']
        ]);
    } else {
        $post = \Hillel\Models\Post::find($_POST['id']);
        $post->update([
            'title' => $_POST['title'],
            'slug' => $_POST['slug'],
            'body' => $_POST['body'],
            'category_id' => $_POST['category_id']
        ]);
        $post->tags()->sync($_POST['tags_id']);
    }

    header('Location: /posts');
}

if (!empty($_GET['id'])) {
    $data['tags'] = \Hillel\Models\Tag::all();
    $data['categories'] = \Hillel\Models\Category::all();
    $data['post'] = \Hillel\Models\Post::with('tags')->find($_GET['id']);
}

/** @var $blade \Illuminate\View\Factory */
echo $blade->make('posts.form', $data)->render();
