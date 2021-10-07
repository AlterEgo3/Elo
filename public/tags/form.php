<?php

require_once '../../vendor/autoload.php';
require_once '../../config/eloquent.php';
require_once '../../config/blade.php';

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['id'])) {
        \Hillel\Models\Tag::create([
            'title' => $_POST['title'],
            'slug' => $_POST['slug'],
        ]);
    } else {
        $tag = \Hillel\Models\Tag::find($_POST['id']);
        $tag->update([
            'title' => $_POST['title'],
            'slug' => $_POST['slug'],
        ]);
    }

    header('Location: /tags');
}

if (!empty($_GET['id'])) {
    $data['tag'] = \Hillel\Models\Tag::find($_GET['id']);
}

/** @var $blade \Illuminate\View\Factory */
echo $blade->make('tags.form', $data)->render();
