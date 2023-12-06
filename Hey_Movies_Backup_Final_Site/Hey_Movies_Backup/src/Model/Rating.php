<?php 

class Rating{
   
   private ?int $reviewId;
   private String $rate;
   private int $moviesssId;

   /**
    * Get the value of moviesssId
    */ 
   public function getMoviesssId()
   {
      return $this->moviesssId;
   }

   /**
    * Set the value of moviesssId
    *
    * @return  self
    */ 
   public function setMoviesssId($moviesssId)
   {
      $this->moviesssId = $moviesssId;

      return $this;
   }

   /**
    * Get the value of rate
    */ 
   public function getRate()
   {
      return $this->rate;
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
    * Get the value of reviewId
    */ 
   public function getReviewId()
   {
      return $this->reviewId;
   }

   /**
    * Set the value of reviewId
    *
    * @return  self
    */ 
   public function setReviewId($reviewId)
   {
      $this->reviewId = $reviewId;

      return $this;
   }
}



?>