<?php

require_once '../../vendor/autoload.php';
require_once '../../config/eloquent.php';
require_once '../../config/blade.php';

$tag = \Hillel\Models\Tag::find($_GET['id']);
$tag->delete();

header('Location: /tags');