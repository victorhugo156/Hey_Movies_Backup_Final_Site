<?php 

class SearchRepository{

   private PDO $pdo;

   public function __construct(PDO $pdo)
   {
      $this->pdo = $pdo;
   }

   public function search($name = $_POST["name"]): array
   {
      if(isset($__POST[$name])){
         $search_wd = $__POST[$name];

         $sql1 = "SELECT * from movies WHERE Movies_Genre LIKE '%$search_wd%'";
         $statement = $this->pdo->query($sql1);
         $searchKeyWord = $statement->fetchAll(PDO::FETCH_ASSOC);
   
         $searchGenre = array_map(function($movie) {
            return new Search($movie['Movies_Genre']
         );
         }, $searchKeyWord);
      }

      return $searchGenre;
   }


}

?>