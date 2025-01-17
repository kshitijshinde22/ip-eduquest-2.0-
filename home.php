<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

$select_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ?");
$select_likes->execute([$user_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
$select_comments->execute([$user_id]);
$total_comments = $select_comments->rowCount();

$select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ?");
$select_bookmark->execute([$user_id]);
$total_bookmarked = $select_bookmark->rowCount();

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'components/user_header.php'; ?>

   <section class="quick-select">

      <h1 class="heading">Most Popular Courses</h1>

      <div class="box-container">


         <div class="box">
            <h3 class="title">Topics</h3>
            <div class="flex">
               <a href="#"><i class="fab fa-html5"></i><span>HTML</span></a>
               <a href="#"><i class="fab fa-css3"></i><span>CSS</span></a>
               <a href="#"><i class="fab fa-js"></i><span>JavaScript</span></a>
               <a href="#"><i class="fab fa-react"></i><span>React</span></a>
               <a href="#"><i class="fab fa-php"></i><span>PHP</span></a>
               <a href="#"><i class="fab fa-bootstrap"></i><span>Bootstrap</span></a>
            </div>
         </div>

         <div class="box tutor">
            <h3 class="title">Tutor Login</h3>
            <p>To add and upload videos Tutor(Admin) Login is required.</p>
            <a href="admin/register.php" class="inline-btn">Tutor Login</a>
         </div>

      </div>

   </section>

   <section class="courses">

      <h1 class="heading">latest courses</h1>

      <div class="box-container">

         <?php
         $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE status = ? ORDER BY id DESC LIMIT 6");
         $select_courses->execute(['deactive']);
         if ($select_courses->rowCount() > 0) {
            while ($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)) {
               $course_id = $fetch_course['id'];

               $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
               $select_tutor->execute([$fetch_course['tutor_id']]);
               $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
               ?>
               <div class="box">
                  <div class="tutor">
                     <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
                     <div>
                        <h3>
                           <?= $fetch_tutor['name']; ?>
                        </h3>
                        <span>
                           <?= $fetch_course['date']; ?>
                        </span>
                     </div>
                  </div>
                  <img src="uploaded_files/<?= $fetch_course['thumb']; ?>" class="thumb" alt="">
                  <h3 class="title">
                     <?= $fetch_course['title']; ?>
                  </h3>
                  <a href="playlist.php?get_id=<?= $course_id; ?>" class="inline-btn">view playlist</a>
               </div>
               <?php
            }
         } else {
            echo '<p class="empty">no courses added yet!</p>';
         }
         ?>

      </div>

      <div class="more-btn">
         <a href="courses.php" class="inline-option-btn">view more</a>
      </div>

   </section>


   <?php include 'components/footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>