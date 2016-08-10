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
        $search = '/search/shows?q=' . $query;
        $request = $this->GetShowInfo($search);

        if(!empty($request)){
            $results = '';
            $count = count($request);

            for($i = 0; $i < $count; $i++){
                $results .= $this->ParseResults($request[$i]['show']);
            }
            return $results;
        }else{
            return 'Show not found';
        }


    }

    public function SingleSearch($query) { // does a search for a TV show returning one result
        $search = '/singlesearch/shows?q=' . $query;
        $showList = $this->GetShowInfo($search);
        return $showList = $this->ParseResults($showList);
        

    }
    public function ShowLookupByIMDB_ID($IMDBid){ // does a show look up by its IMDB ID
        $search = '/lookup/shows?imdb='.$IMDBid;
        $showinfo = $this->GetShowInfo($search);
        return $showinfo = $this->ParseResults($showinfo);
    }
    public function ShowLookupByTVRage_ID($tvrageid){ // does a show lookup by its TV Rage ID
        $search = '/lookup/shows?tvrage='.$tvrageid;
        $showinfo = $this->GetShowInfo($search);
        return $showinfo = $this->ParseResults($showinfo);
    }
    public function ShowLookupByTheTVDB_ID($thetvdbid){ // does a show lookup by its The TV DB ID
        $search = '/lookup/shows?thetvdb='.$thetvdbid;
        $showinfo = $this->GetShowInfo($search);
        return $showinfo = $this->ParseResults($showinfo);
    }
    
    private function ParseResults($request){
        if(!empty($request)){
            $showgenres = '';
            $shows['name'] = $request['name'];
            $shows['language'] = $request['language'];
            $shows['Showtime']['time'] = date("g:i a", strtotime($request['schedule']['time']));
            $shows['Showtime']['days'] = implode(',',$request['schedule']['days']);
            if(!empty($request['genres'])){
                $shows['genres'] = implode('/',$request['genres']);
                $showgenres = "<span><strong> Genre: </strong> {$shows['genres']} </span> <br/>";
            }
            $shows['timezone'] = $request['network']['country']['timezone'];
            $shows['summary'] = $request['summary'];
            $shows['showpic'] = $request['image']['original'];


            $results = <<< SHOWS
     <blockquote class="col-sm-12">
                    <div class="col-md-2">
                        <img class="showpic" src={$shows['showpic']}>
                    </div>
                    <div class="col-md-8">
                        <span> <strong>Show Name:</strong> {$shows['name']} &nbsp;&nbsp; <strong> Language:</strong> {$shows['language']} </span> <br/>
                        <span><strong> Air Date(s):</strong> {$shows['Showtime']['days']}&nbsp; <strong>Time:</strong> {$shows['Showtime']['time']} &nbsp; <strong> Timezone: </strong> {$shows['timezone']} </span> <br/>
                        $showgenres
                        <span><strong>Summary:</strong><small>{$shows['summary']}</small></span>
                    </div>                
     </blockquote>
SHOWS;
            return $results;
        }else{
            return 'Show not found';
        }
    }
    private function GetShowInfo($search) { // Curl Request for show info.
        $url = 'http://api.tvmaze.com' . $search;
        // Initiate curl
        $ch = curl_init();
        // Sets the url
        curl_setopt($ch, CURLOPT_URL, $url);
        // Follow Redirects if any are present
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
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