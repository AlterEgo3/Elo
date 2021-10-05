<?php

require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
require_once '../config/blade.php';

$title = 'Абракадабра';

/** @var $blade \Illuminate\View\Factory */
echo $blade->make('pages.home', ['title' => $title])->render();
