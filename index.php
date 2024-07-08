<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/creation.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
<?php require_once("./asset/layout/header.php"); ?>
<?php 
    //run once time
    // insertSeason($database, "Singing Star Season 1", "2023-06-24", "2023-11-13");
    // insertSeason($database, "Singing Star Season 2", "2024-06-24", "2024-11-13");

    // //for season 1
    // insertStar($database, "M Zaw Rain", "s1t11s1", 22, "Pyinmana", "s1t11s1.jpg", 1);
    // insertStar($database, "Saw Htet Naing Soe", "s1t11s2", 24, "Taunggyi", "s1t11s2.jpg", 1);
    // insertStar($database, "Nin Zi May", "s1t11s3", 22, "Yangon", "s1t11s3.jpg", 1);
    // insertStar($database, "Wai Lin@Rio", "s1t11s4", 26, "Yangon", "s1t11s4.jpg", 1);
    // insertStar($database, "Aung Pyae Htun", "s1t11s5", 25, "Mandalay", "s1t11s5.jpg", 1);
    // insertStar($database, "Khine Thazin Thin", "s1t11s6", 22, "Yangon", "s1t11s6.jpg", 1);
    // insertStar($database, "Saw Lah Htaw Wah", "s1t11s7", 24, "Yangon", "s1t11s7.jpg", 1);
    // insertStar($database, "Sophia Everest", "s1t11s8", 23, "Yangon", "s1t11s8.jpg", 1);
    // insertStar($database, "Aung Tay Zar Kyaw", "s1t11s9", 23, "Thanbyuzayat", "s1t11s9.jpg", 1);
    // insertStar($database, "May Kyi", "s1t11s10", 23, "Lashio", "s1t11s10.jpg", 1);
    // insertStar($database, "Zaw Min Oo", "s1t11s11", 26, "Mandalay", "s1t11s11.jpg", 1);

    // //for season 2
    // insertStar($database, "Wyne Su", "s1t10s1", 22, "Pyay", "s1t10s1.jpg", 2);
    // insertStar($database, "Min Zarni", "s1t10s2", 24, "Taunggyi", "s1t10s2.jpg", 2);
    // insertStar($database, "Kyaw Paing", "s1t10s3", 22, "Yangon", "s1t10s3.jpg", 2);
    // insertStar($database, "Pansi Young", "s1t10s4", 26, "Magway", "s1t10s4.jpg", 2);
    // insertStar($database, "Aung Nay Min", "s1t10s5", 25, "Mandalay", "s1t10s5.jpg", 2);
    // insertStar($database, "Yadanar Wy", "s1t10s6", 22, "Yangon", "s1t10s6.jpg", 2);
    // insertStar($database, "Paing Oak Soe", "s1t10s7", 24, "Bagan", "s1t10s7.jpg", 2);
    // insertStar($database, "Thanzin May La", "s1t10s8", 23, "Yangon", "s1t10s8.jpg", 2);
    // insertStar($database, "Nora", "s1t10s9", 23, "Thanbula", "s1t10s9.jpg", 2);
    // insertStar($database, "Thin Cherry", "s1t10s10", 23, "Lashio", "s1t10s10.jpg", 2);
?>

<div class="wrapper row1" style="position: sticky; top:40px; z-index: 10;">
  <header id="header" class="hoc clear">

    <div id="logo" class="fl_left">
      <h1><a href="./index.php">Singing Stars</a></h1>
    </div>

    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="./index.php">Home</a></li>
        <li><a class="drop" href="#">Pages</a>
          <ul>
            <li><a href="./asset/admin/index.php">Admin</a></li>
            <li><a href="./login.php">Voter</a></li>
            
          </ul>
        </li>
        <li><a class="drop" href="#">Voter Panel</a>
          <ul>
            <li><a href="./login.php">Login</a></li>
            <li><a href="./register.php">Registration</a></li>
            
          </ul>
        </li>
       
      </ul>
    </nav>

  </header>
</div>

<div class="wrapper bgded overlay">
  <section id="testimonials" class="hoc container clear"> 
    <h5 class="btmspace-80 underlined"> Vote & Support <a href="#" style="color: #ff0;">Your Star</a></h5>

    <ul class="nospace group">
      <li class="one_half">
        <blockquote>"Singing Contest Voting System" <br><br>
        ကိုယ်အကြိုက်ဆုံး ပြိုင်ပွဲ၀င်ကို voting ပေးပြီး တောက်ပခွင့်ပေးလိုက်ပါ <br><br>
        A voter can use his/her voting right online without any difficulty. He/She has to be registered first for him/her to vote. Registration is mainly done by the system administrator for security reasons. The system Adminstrator registers the voters on a special site of the system visited by him only by simply filling a registration form to register voter.<br>
        After registration, the voter is assigned a secret Voter ID with which he/she can use to log into the system and enjoy services provide by the system such as voting. If invalid/wrong details are submitted, then the citizen is not registered to vote.</blockquote>
      
      </li>
    </ul>

  </section>
</div>

<?php require_once("./asset/layout/footer.php"); ?>