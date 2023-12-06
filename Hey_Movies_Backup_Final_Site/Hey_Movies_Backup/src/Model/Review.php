<?php 

class Review{

   private ?int $reviewId;
   private ?String $name;
   private ?String $rate;
   private ?String $comments;
   private int $movieId;
   private ?int $customerId;


   public function __construct(?int $reviewId, ?String $name, ?String $rate, ?String $comments, int $movieId, ?int $cutomerId)
   {
      
      $this->reviewId = $reviewId;
      $this->name = $name;
      $this->rate = $rate;
      $this->comments = $comments;
      $this->movieId = $movieId;
      $this->customerId = $cutomerId;
      
   }


   /**
    * Get the value of id
    */ 
   public function getId()
   {
      return $this->reviewId;
   }

   /**
    * Get the value of name
    */ 
   public function getName()
   {
      return $this->name;
   }

   /**
    * Get the value of rate
    */ 
   public function getRate()
   {
      return $this->rate;
   }

   /**
    * Get the value of comments
    */ 
   public function getComments()
   {
      return $this->comments;
   }

   /**
    * Get the value of movieId
    */ 
   public function getMovieId()
   {
      return $this->movieId;
   }

   /**
    * Get the value of customerId
    */ 
   public function getCustomerId()
   {
      return $this->customerId;
   }



   

   /**
    * Set the value of id
    *
    * @return  self
    */ 
   public function setId($reviewId)
   {
      $this->reviewId = $reviewId;

      return $this;
   }

   /**r
    * Set the value of name
    *
    * @return  self
    */ 
   public function setName($name)
   {
      $this->name = $name;

      return $this;
   }

   /**
    * Set the value of rate
    *
    * @return  self
    */ 
   public function setRate($rate)
   {
      $this->rate = $rate;

      return $this;
   }

   /**
    * Set the value of comments
    *
    * @return  self
    */ 
   public function setComments($comments)
   {
      $this->comments = $comments;

      return $this;
   }

   /**
    * Set the value of movieId
    *
    * @return  self
    */ 
   public function setMovieId($movieId)
   {
      $this->movieId = $movieId;

      return $this;
   }

   /**
    * Set the value of customerId
    *
    * @return  self
    */ 
   public function setCustomerId($customerId)
   {
      $this->customerId = $customerId;

      return $this;
   }

}

?>