<?php

require_once '../../vendor/autoload.php';
require_once '../../config/eloquent.php';
require_once '../../config/blade.php';

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['id'])) {
        \Hillel\Models\Category::create([
            'title' => $_POST['title'],
            'slug' => $_POST['slug'],
        ]);
    } else {
        $category = \Hillel\Models\Category::find($_POST['id']);
        $category->update([
            'title' => $_POST['title'],
            'slug' => $_POST['slug'],
        ]);
    }

    header('Location: /categories');
}

if (!empty($_GET['id'])) {
    $data['category'] = \Hillel\Models\Category::find($_GET['id']);
}

/** @var $blade \Illuminate\View\Factory */
echo $blade->make('categories.form', $data)->render();
