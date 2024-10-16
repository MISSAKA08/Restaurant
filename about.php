<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About</title>
  <style>
    /* General Section Styles */
.section {
    padding: 60px 20px;
  }
  
  /* Why Us Section */
  .why-us {
    background-color: #f4f4f4;
  }
  .why-us .container {
    text-align: center;
  }
  .why-us .why-box h3 {
    font-size: 28px;
    color: #333;
  }
  .why-us .why-box p {
    font-size: 18px;
    color: #666;
  }
  .why-box {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    align-items: center;
    text-align: left;
  }
  
  #about-img {
    grid-column: 1;
  }
  
  .why-box p {
    grid-column: 2;
  }
  
  /* Media Query for smaller screens */
  @media (max-width: 768px) {
    .why-box {
      grid-template-columns: 1fr;
    }
    #about-img, .why-box p {
      grid-column: auto;
    }
  }
  
  
  .icon-boxes {
    display: flex;
    justify-content: center;
    margin-top: 30px;
  }
  .icon-box {
    flex: 1;
    max-width: 200px;
    padding: 20px;
    text-align: center;
  }
  .icon-box .icon {
    font-size: 40px;
    color: #333;
  }
  .icon-box h4 {
    font-size: 20px;
    margin: 15px 0;
  }
  
  /* Stats Section */
  .stats {
    background-color: #222;
    color: #fff;
    position: relative;
    overflow: hidden;
    text-align: center;
    padding: 60px 20px;
  }
  .stats img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.3;
  }
  .stats .container {
    position: relative;
    z-index: 1;
    display: flex;
    justify-content: center;
  }
  .stats-item {
    flex: 1;
    margin: 0 20px;
  }
  .stats-item span {
    display: block;
    font-size: 48px;
    font-weight: bold;
  }
  
  </style>
</head>
<body>

<?php 

include('header.php'); 

?>

  <!-- Why Us Section -->
  <section id="why-us" class="why-us section light-background">
    <div class="container">
      <div class="why-box">
        <h3>Why Choose Us</h3>
        <div id="about-img">
          <img width="70%"  height="70%"   src="C:\xampp\htdocs\Restaurant\images\" alt="">
          </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

          Ullamco laboris nisi ut aliquip ex ea commodo consequat.
          Duis aute irure dolor in reprehenderit in voluptate velit.
          Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.
          Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
        
      </div>
      <div class="icon-boxes">
        <div class="icon-box">
          <div class="icon">🔍</div>
          <h4>Feature One</h4>
          <p>Short description of feature one.</p>
        </div>
        <div class="icon-box">
          <div class="icon">💎</div>
          <h4>Feature Two</h4>
          <p>Short description of feature two.</p>
        </div>
        <div class="icon-box">
          <div class="icon">📦</div>
          <h4>Feature Three</h4>
          <p>Short description of feature three.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section id="stats" class="stats section dark-background">
    <img src="C:\xampp\htdocs\Restaurant\images\about-2.jpg" alt="Background Image">
    <div class="container">
      <div class="stats-item">
        <span class="counter" data-target="2320">0</span>
        <p>Clients</p>
      </div>
      <div class="stats-item">
        <span class="counter" data-target="3210">0</span>
        <p>orders</p>
      </div>
      <div class="stats-item">
        <span class="counter" data-target="1453">0</span>
        <p>Hours Of Support</p>
      </div>
      <div class="stats-item">
        <span class="counter" data-target="78">0 </span>
        <p>Workers</p>
      </div>
    </div>
  </section>

  <?php
        include 'footer.php';
    ?>

  <script>document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".counter");
    counters.forEach(counter => {
      counter.innerText = '0';
      const updateCounter = () => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const increment = target / 200;
  
        if(count < target) {
          counter.innerText = `${Math.ceil(count + increment)}`;
          setTimeout(updateCounter, 20);
        } else {
          counter.innerText = target;
        }
      };
      updateCounter();
    });
  });
  </script>





</body>
</html>
