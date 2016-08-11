<?php
/**
 * Created by PhpStorm.
 * User: Clarence
 * Date: 8/10/2016
 * Time: 8:44 PM
 */

function GetTVShowInfo($tvshow, $search) {
    $request;
    $tvMaze = new TvMaze();
    switch($search) {
        case 'Single Search':
            $request = $tvMaze->SingleSearch($tvshow);
            break;
        case 'IMDB':
            $request = $tvMaze->ShowLookupByIMDB_ID($tvshow);
            break;
        case 'TV Rage':
            $request = $tvMaze->ShowLookupByTVRage_ID($tvshow);
            break;
        case 'The TV DB':
            $request = $tvMaze->ShowLookupByTheTVDB_ID($tvshow);
            break;
        default:
            $request = $tvMaze->Search($tvshow);
    }
    return $request;
}
function GetSearchInstructions(){
    $html = <<< HTML
        <div class="instructions">
            <div class="h3 search-heading">How to Find Your show</div class="h3"> 
            <ul class="search-instructions">
                <li>If you aren't postive as to the name of your show or your show shares a name, use <em>General Search</em> to find it and then use the provided ID's to get more information</li>
                <li>Use can use <em>Single Search </em> if You are sure about the name of your TV Show</li>
                <li>If you already know either of the <em>IMDB </em>, <em>TV Rage </em> or <em>The TV DB</em> ID's you can search by one of those ID's</li>
            </ul>
        </div>
HTML;
    return $html;
}