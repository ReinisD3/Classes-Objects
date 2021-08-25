<?php
//The class Movie is started below. An instance of class Movie represents a film. This class has the following three class variables:
//
//title, which is a string representing the title of the movie
//studio, which is a string representing the studio that made the movie
//rating, which is a string representing the rating of the movie (i.e. PG­13, R, etc)
//Write a constructor for the class Movie, which takes the title of the movie, studio, and rating as its arguments, and sets the respective class variables to these values.
//Write a method GetPG, which takes an array of base type Movie as its argument, and returns a new array of only those movies in the input array with a rating of "PG". You may assume the input array is full of Movie instances. The returned array may be empty.
//Write a piece of code that creates an instance of the class Movie:


class Movie
{
    public string $title ;
    public string $studio;
    public string $rating;

    function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;

    }
    static function GetPG(array $movies):array
    {
        $PGratedMovies = [];
        foreach ($movies as $movie)
        {
            if($movie->rating === 'PG')
            {
                array_push($PGratedMovies,$movie);
            }

        }
        return $PGratedMovies;
    }
}
//with the title “Casino Royale”, the studio “Eon Productions” and the rating “PG­13”;
//with the title “Glass”, the studio “Buena Vista International” and the rating “PG­13”;
//with the title “Spider-Man: Into the Spider-Verse”, the studio “Columbia Pictures” and the rating “PG”.
$casinoRoyale = new Movie('Casino Royale','Eon Productions','PG­13');
$glass = new Movie('Glass','Buena Visat International','PG­13');
$spiderMan = new Movie('Spider-Man: Into the Spider-Verse','Columbia Pictures','PG');

$movies = [$casinoRoyale,$glass,$spiderMan];

var_dump(Movie::GetPG($movies));