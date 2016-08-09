<?php

/**
 * Created by PhpStorm.
 * User: Clarence
 * Date: 8/8/2016
 * Time: 11:46 AM
 */
class TvMaze{
    /*
    private $tvRage; // holds the tvrage id
    private $thetvdb; // holds the thetvdb id
    private $imdb; // holds the imdb ID.
//*/
    public function Search($query) { // does a general search for a TV show
        $url = '/search/shows?q=' . $query;
        $showList = $this->GetShowInfo($url);

        return $showList;
    }
    public function ShowLookupByIMDB_ID($IMDBid){ // does a show look up by its IMDB ID
        $search = '/lookup/shows?imdb='.$id;
        $showinfo = $this->GetShowInfo($search);

        return $showinfo;
    }
    public function ShowLookupByTVRage_ID($tvrageid){ // does a show lookup by its TV Rage ID
        $search = '/lookup/shows?tvrage='.$id;
        $showinfo = $this->GetShowInfo($search);

        return $showinfo;
    }
    public function ShowLookupByTheTVDB_ID($thetvdbid){ // does a show lookup by its The TV DB ID
        $search = '/lookup/shows?thetvdb='.$id;
        $showinfo = $this->GetShowInfo($search);
        
        return $showinfo;
    }

    private function GetShowInfo($search) { // Curl Request for show info.
        $url = 'http://api.tvmaze.com' . $search;
        // Initiate curl
        $ch = curl_init();
        // Sets the url
        curl_setopt($ch, CURLOPT_URL, $url);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //Execute
        $response = curl_exec($ch);
        // closes curl
        curl_close($ch);

        $json = json_decode($response, true);

        return $json;
    }


// END of CLASS TV MAZE
}