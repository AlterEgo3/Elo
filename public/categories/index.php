<?php

require_once '../../vendor/autoload.php';
require_once '../../config/eloquent.php';
require_once '../../config/blade.php';

$categories = \Hillel\Models\Category::all();

/** @var $blade \Illuminate\View\Factory */
echo $blade->make('categories.index', ['categories' => $categories])->render();
