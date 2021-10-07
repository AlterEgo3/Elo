<?php

require_once '../../vendor/autoload.php';
require_once '../../config/eloquent.php';
require_once '../../config/blade.php';

$tags = \Hillel\Models\Tag::all();

/** @var $blade \Illuminate\View\Factory */
echo $blade->make('tags.index', ['tags' => $tags])->render();
