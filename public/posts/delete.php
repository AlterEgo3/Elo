<?php

require_once '../../vendor/autoload.php';
require_once '../../config/eloquent.php';
require_once '../../config/blade.php';

$post = \Hillel\Models\Post::find($_GET['id']);
$post->delete();

header('Location: /posts');
