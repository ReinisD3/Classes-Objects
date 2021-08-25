<?php

class Video
{
    public string $title;
    public bool $flag;
    public array $allRatings;
    public float $rating;

    function __construct(string $title,bool $flag = true )
    {
        $this->title = $title;
        $this->flag = $flag;
        $this->allRatings = [];
        $this->rating = 0;
    }
    function CheckOut()
    {
        $this->flag = false;
    }
    function vReturn()
    {
        $this->flag = true;
    }
    function giveRating(float $rating):float
    {
        array_push($this->allRatings,$rating);
        $this->rating = number_format(array_sum($this->allRatings)/count($this->allRatings),2);
        return $this->rating;
    }

}

class VideoStore
{
    public array $videoList ;

    function addVideo(Video $video)
    {
        $this->videoList[$video->title] = $video;
    }
    function checkOutVideo(string $title)
    {
        $this->videoList[$title]->Checkout();
    }
    function returnVideo(string $title)
    {
        $this->videoList[$title]->vReturn();
    }
    function rateVideo(float $rating, string $title)
    {
        echo "Average rating for $title is ".$this->videoList[$title]->giveRating($rating).PHP_EOL;
    }
    function videosInventory()
    {
        foreach ($this->videoList as $video)
        {
            $available = $video->flag ? 'is available' : 'is checked out';
            echo 'Video title : '.$video->title.PHP_EOL.' Rating: '.$video->rating." Status: $available ".PHP_EOL;
        }
    }

}
function VideoStoreTest ()
{
    $VideoStore = new VideoStore();
    $VideoStore->addVideo(new Video("The Matrix"));
    $VideoStore->addVideo(new Video("Godfather II"));
    $VideoStore->addVideo(new Video("Star Wars Episode IV: A New Hope"));

    $VideoStore->checkOutVideo("The Matrix");
    $VideoStore->checkOutVideo("Godfather II");
    $VideoStore->checkOutVideo("Star Wars Episode IV: A New Hope");

    $VideoStore->returnVideo("The Matrix");

    $VideoStore->returnVideo("Star Wars Episode IV: A New Hope");


    $VideoStore->rateVideo(8,"The Matrix");
    $VideoStore->rateVideo(4,"The Matrix");
    $VideoStore->rateVideo(9,"The Matrix");

    $VideoStore->rateVideo(9,"Godfather II");
    $VideoStore->rateVideo(10,"Godfather II");
    $VideoStore->rateVideo(7,"Godfather II");

    $VideoStore->rateVideo(6,"Star Wars Episode IV: A New Hope");
    $VideoStore->rateVideo(8,"Star Wars Episode IV: A New Hope");
    $VideoStore->rateVideo(8,"Star Wars Episode IV: A New Hope");

    echo PHP_EOL;
    $VideoStore->videosInventory();

}
VideoStoreTest();