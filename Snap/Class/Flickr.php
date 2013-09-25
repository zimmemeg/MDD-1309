<?php

class Flickr{
    private $apiKey = '4c71e38a3fed02c63199bf5445563931';
    
    public function __construct(){
        
    }
    
    public function search($query = null){
        $search = 'http://flickr.com/services/rest/?method=flickr.photos.search&api_key=' . $this->apiKey . '&text=' . urlencode($query) . '&per_page=100&format=php_serial';
        $result = file_get_contents($search);
        $result = unserialize($result);
        return $result;
    }
}

if (!empty($_GET['search'])){
    $Flickr = new Flickr;
    $data = $Flickr->search(stripcslashes($_GET['search']));
    $html = '';
    if(!empty($data['photos']['total'])){
        $html = '<p>Total '.$data['photos']['total'].' photo(s) for this keyword.</p>';
        foreach($data['photos']['photo'] as $photo){
            $html .= '<img src"' . 'http://farm' . $photo["farm"] . 'static.flickr.com/' . $photo["server"] . '/' .$photo["id"] . '_' . $photo["secret"] . '_s.jpg" alt="" />';
        }
    } else {
        $html = '<p>There are no photos for this keyword.</p>';
    }
    echo $html;
}

?>