<?php 
   require 'config/func.php';

   if (isset($_GET['bin'])) {
      if(bin($_GET['bin']) > 0){
         echo "<script>
               alert('Data moved to trash');
               document.location.href = 'home.php';
            </script>";
      }elseif(bin($_GET['bin']) <= 0){
         echo "<script>
               alert('Action has failed!');
               document.location.href = 'home.php';
            </script>";	
      }
   }
   if (isset($_GET['restore'])) {
      if(restore($_GET['restore']) > 0){
         echo "<script>
               alert('Data Restored');
               document.location.href = 'home.php';
            </script>";
      }elseif(restore($_GET['restore']) <= 0){
         echo "<script>
               alert('Action has failed!');
               document.location.href = 'home.php';
            </script>";	
      }
   }
   if (isset($_GET['delete'])) {
      if(delete($_GET['delete']) > 0){
         echo "<script>
               alert('Data deleted');
               document.location.href = 'home.php';
            </script>";
      }elseif(delete($_GET['delete']) <= 0){
         echo "<script>
               alert('Action has failed!');
               document.location.href = 'home.php';
            </script>";	
      }
   }
   if (isset($_GET['logout'])) {
      session_start();
      unset($_SESSION);
      session_destroy();
      header("Location: index.php");
   }

?>