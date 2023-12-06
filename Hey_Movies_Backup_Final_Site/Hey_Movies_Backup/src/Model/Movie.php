<?php 

class Movie{

   public int $id;
   public String $movieTitle;
   public String $movieDescription;
   public String $movieReleaseYear;
   public String $movieLanguage;
   private String $movieGenere;
   private String $movieClassification;
   public String $movieMainActors;
   public String $movieDirector;
   private String $movieSourceInformation;
   private String $streamingService;
   private String $imageUrl;
   private String $imageTwoUrl;
   private String $videoYoutube;
   
   public function __construct($id, $movieTitle, $movieDescription, $movieReleaseYear, $movieLanguage, $movieGenere,$movieClassification, $movieMainActors, $movieDirector, $movieSourceInformation, $streamingService, $imageUrl, $imageTwoUrl, $videoYoutube)
   {
      $this->id = $id;
      $this->movieTitle = $movieTitle;
      $this-> movieDescription = $movieDescription;
      $this->movieReleaseYear = $movieReleaseYear;
      $this->movieLanguage = $movieLanguage;
      $this->movieGenere = $movieGenere;
      $this->movieClassification = $movieClassification;
      $this->movieMainActors = $movieMainActors;
      $this->movieDirector = $movieDirector;
      $this->movieSourceInformation = $movieSourceInformation;
      $this->streamingService = $streamingService;
      $this->imageUrl = $imageUrl;
      $this->imageTwoUrl = $imageTwoUrl;
      $this -> videoYoutube = $videoYoutube;

   }

   /**
    * Getters
    */

   public function getId()
   {
      return $this->id;
   }

   public function getMovieTitle()
   {
      return $this->movieTitle;
   }

   public function getMovieDescription()
   {
      return $this->movieDescription;
   }

   public function getMovieReleaseYear()
   {
      return $this->movieReleaseYear;
   }

   public function getMovieLanguage()
   {
      return $this->movieLanguage;
   }
 
   public function getMovieGenere()
   {
      return $this->movieGenere;
   }

   
   public function getMovieClassification()
   {
      return $this->movieClassification;
   }

  
   public function getMovieMainActors()
   {
      return $this->movieMainActors;
   }

   public function getMovieDirector()
   {
      return $this->movieDirector;
   }

   public function getMovieSourceInformation()
   {
      return $this->movieSourceInformation;
   }


   public function getStreamingService()
   {
      return $this->streamingService;
   }

   public function getImageUrl()
   {
      return $this->imageUrl;
   }

   public function getImageTwoUrl()
   {
      return $this->imageTwoUrl;
   }

 
    public function getVideoYoutube()
    {
       return $this->videoYoutube;
    }


   // //Setters----------------------


   public function setId($id)
   {
      $this->id = $id;

      return $this;
   }

   public function setMovieTitle($movieTitle)
   {
      $this->movieTitle = $movieTitle;

      return $this;
   }

   public function setMovieDescription($movieDescription)
   {
      $this->movieDescription = $movieDescription;

      return $this;
   }

 
   public function setMovieReleaseYear($movieReleaseYear)
   {
      $this->movieReleaseYear = $movieReleaseYear;

      return $this;
   }

   public function setMovieLanguage($movieLanguage)
   {
      $this->movieLanguage = $movieLanguage;

      return $this;
   }


   public function setMovieGenere($movieGenere)
   {
      $this->movieGenere = $movieGenere;

      return $this;
   }


   public function setMovieClassification($movieClassification)
   {
      $this->movieClassification = $movieClassification;

      return $this;
   }


   public function setMovieMainActors($movieMainActors)
   {
      $this->movieMainActors = $movieMainActors;

      return $this;
   }


   public function setMovieDirector($movieDirector)
   {
      $this->movieDirector = $movieDirector;

      return $this;
   }

  
   public function setMovieSourceInformation($movieSourceInformation)
   {
      $this->movieSourceInformation = $movieSourceInformation;

      return $this;
   }

 
   public function setStreamingService($streamingService)
   {
      $this->streamingService = $streamingService;

      return $this;
   }

   public function setImageUrl($imageUrl)
   {
      $this->imageUrl = $imageUrl;

      return $this;
   }

   public function setImageTwoUrl($imageTwoUrl)
   {
      $this->imageTwoUrl = $imageTwoUrl;

      return $this;
   }

 
   public function setVideoYoutube($videoYoutube)
   {
      $this->videoYoutube = $videoYoutube;

      return $this;
   }
}
?>