<style>
.youtube{
  margin-top:-75px;
}

  </style>
<?php
$apiKey     = 'AIzaSyCo3d9QE-My-Npv-4QzPchD58bSUflrKYI';
$channelID  = 'UCQOK-OzmSOZDf7v_7H43jkw';
$maxResults = 1;

$baseUrl = 'https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=';
$completeUrl = $baseUrl.$channelID.'&maxResults='.$maxResults.'&key='.$apiKey;

$videoList = json_decode(file_get_contents($completeUrl));

if(empty($videoList->items)) return;

foreach($videoList->items as $item){
    if(isset($item->id->videoId)){
        echo '<div class="youtube">
                <iframe width="1280" height="650" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
               
            </div>';
    }
}