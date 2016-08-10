<?php
/**
 * Created by PhpStorm.
 * User: Clarence
 * Date: 8/7/2016
 * Time: 11:54 PM
 */
include_once 'includes/includes.inc.php';
$i = 0;
$tvMaze = new TvMaze();

$request = $tvMaze->Search('Dark Matter');

//dump($shows);
//dump($request);

include 'searchresults.inc.php';