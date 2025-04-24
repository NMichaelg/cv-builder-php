<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login and Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      <?php include "style.css" ?>
    </style>    

  </head>
  <body>
    
    <header class="bg-dark text-white p-3  fixed-top">
      <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <img src="https://static.vecteezy.com/system/resources/previews/000/642/323/non_2x/search-job-icon-vector.jpg" alt="Site Logo" class="me-2 logo">
          <h1 class="h3 mb-0">Job Seeker</h1>
        </div>
        <nav>
          <ul class="nav" id="navBarItem">
            <li class="nav-item"><a href="index.php?page=home" class="nav-link text-white">Home</a></li>
            <li class="nav-item"><a href="index.php?page=views_cv" class="nav-link text-white">View CV</a></li>
            <li class="nav-item"><a href="index.php?page=your_cv" class="nav-link text-white">Make new CV</a></li>
            <li class="nav-item"><a href="index.php?page=contact_us" class="nav-link text-white">Contact Us</a></li>
            <?php
              if(isset($_SESSION['username'])){
                echo "<div class='account-dropdown'>
                        <div class='avatar'>
                          <img src='./assets/ThaiAn.jpg' alt='avatar' class='click'/>
                        </div>
                      <div class='account-content'>
                    <ul>
                      <li>
                        <div class='avatar avatar1'>
                        <img src='./assets/ThaiAn.jpg' alt='avatar'/>
                        <p style='font-weight:700;'>".$_SESSION['username']."</p>
                          </div>
                      </li>
                    <li><i class='fa-solid fa-gears'></i> Setting accounts</li>
                      <li><a href='config/logout.php' style='text-decoration:none;color:black;'><i class='fa-solid fa-arrow-right-from-bracket'></i> Log out</a></li>
                  </ul>
                </div>
              </div>";
              }
            ?>
          </ul>
        </nav>
      </div>
    </header>
    <br></br>
    <br></br>
    <br></br>

    <div id="main-content" class =" container mt-5 bg-white p-5 rounded-5">
      <?php include 'controllers/RouteController.php'; ?>
    </div>
    
    <footer class="bg-dark text-white text-center p-3 mt-5">
      <div class="container">
        <p>&copy; 2024 Group 1. All rights reserved.</p>
        <a href="#" class="text-white">Privacy Policy</a> |
        <a href="#" class="text-white">Terms of Service</a>
      </div>
    </footer>
<script>
  const accounts = document.querySelectorAll(".click") 
const show = document.querySelector(".account-content") 

accounts.forEach((ele) => {
  ele.addEventListener("click", () => {
    console.log("click")
    show.classList.toggle("show")
  })
})



</script>
  </body>
</html>

