<?php 
class WishList{

   private ?int $wishListId;
   private ?int $movieId;
   private ?int $customerId;
   private ?String $userEmail;

   public function __construct(?int $wishListId, ?int $movieId, ?int $customerId, ?String $userEmail)
   {
      $this->wishListId = $wishListId;
      $this->movieId = $movieId;
      $this->customerId = $customerId;
      $this->userEmail = $userEmail;
      
   }
   
   
    public function getWishListId()
    {
       return $this->wishListId;
    }
 
    
    public function setWishListId($wishListId)
    {
       $this->wishListId = $wishListId;
 
       return $this;
    }


   /**
    * Get the value of movieId
    */ 
   public function getMovieId()
   {
      return $this->movieId;
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
    * Get the value of customerId
    */ 
   public function getCustomerId()
   {
      return $this->customerId;
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

   /**
    * Get the value of userEmail
    */ 
   public function getUserEmail()
   {
      return $this->userEmail;
   }

   /**
    * Set the value of userEmail
    *
    * @return  self
    */ 
   public function setUserEmail($userEmail)
   {
      $this->userEmail = $userEmail;

      return $this;
   }
}

?>
