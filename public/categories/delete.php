<?php

require_once '../../vendor/autoload.php';
require_once '../../config/eloquent.php';
require_once '../../config/blade.php';

$category = \Hillel\Models\Category::find($_GET['id']);
$category->delete();

header('Location: /categories');
