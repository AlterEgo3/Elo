<?php

require_once '../../vendor/autoload.php';
require_once '../../config/eloquent.php';
require_once '../../config/blade.php';

$posts = \Hillel\Models\Post::all();

/** @var $blade \Illuminate\View\Factory */
echo $blade->make('posts.index', ['posts' => $posts])->render();
