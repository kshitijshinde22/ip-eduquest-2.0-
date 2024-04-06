<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">
   <style>
      .testimonials {
   text-align: center;
   align-content: center;
   padding-left:20% ;
   }
   .testimonials .item {
   padding: 35px;
   background: hsl(0, 0%, 98%);
   border-radius: 8px;
   margin: 50px;
   width: 500px;
   box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
   position: relative;
   }
   .testimonials img {
   height: 130px;
   width: 130px;
   position: absolute;
   text-align: center;
   top: 0;
   left: 0;
   right: 0;
   margin-left: auto;
   margin-right: auto;
   margin-top:-35px;
   border-radius: 100%;
   }
   .testimonials h1,
   .testimonials h5 {
   font-weight: 700;
   color: hsl(228, 39%, 23%);
   margin: 50px auto;
   }

   .testimonials h1{
      font-size: 60px;
   }
   .testimonials h5 {
   font-size: 1rem;
   color: hsl(228, 39%, 23%);
   margin: 20px 0;
   }
   .testimonials p {
   color: hsl(227, 12%, 61%);
   font-size: 30px;
   }

   .icons a{
   margin-right: 10px;
   }
   .slider{
   cursor: grabbing;
   }

   </style>

</head>

<body>

   <?php include 'components/user_header.php'; ?>

   <section class="about">

      <div class="row">
         
         <div class="testimonials">
            <h1>about us</h1>
            <div class="slider">
               <div class="item">
                  <img src="images\WhatsApp Image 2024-03-24 at 12.57.57 PM.jpeg" alt="" >
                 
                  <p>
                  <br><br>Atharv Gunjal<br> SYITB<br>gatharv22it@student.mes.ac.in</p>
               </div>
               <div class="item">
                  <img src="images\sg.jpeg" alt="">
                  <p><br><br>Sarthak Gupta<br>
                     SYITB<br>gsarthak22it@student.mes.ac.in</p>
               </div>
               <div class="item">
                  <img src="images\ks.jpeg" alt="" >
                 
                  <p>
                  <br><br>Kshitij Shinde<br> SYITB<br>kshinde22it@student.mes.ac.in</p>
               </div>
               <div class="item">
                  <img src="images\hk.jpeg" alt="" >
                 
                  <p>
                  <br><br>Humdan Kabir<br> SYITB<br>khumdan22it@student.mes.ac.in</p>
               </div>
               <div class="item">
                  <img src="images\ac.jpeg" alt="" >
                 
                  <p>
                  <br><br>Aditya Chavan<br> SYITB<br>caditya22it@student.mes.ac.in</p>
               </div>
            </div>
         </div>  
      </div>

         
                   
   </section>

      <?php include 'components/footer.php'; ?>

      <script src="js/script.js"></script>
      <script>
         $('.slider').slick({
   autoplay: true,
   speed: 2000,
   slidesToShow:2,
   slidesToScroll: 1,
   responsive: [{
      breakpoint: 600,
      settings:{
            slidesToShow: 1}
}]
});
</script>

</body>

</html>