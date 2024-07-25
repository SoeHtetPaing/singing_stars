<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/creation.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
<?php require_once("./asset/layout/header.php"); ?>
<?php 
    //run once time

    // insertAdmin($database, "singingstars@gmail.com", "21232f297a57a5a743894a0e4a801fc3");
    // insertAdmin($database, "singingstars.mm@gmail.com", "21232f297a57a5a743894a0e4a801fc3");

    // insertSeason($database, "Season 1", "2023-06-24", "2023-11-13");
    // insertSeason($database, "Season 2", "2024-06-24", "2024-11-13");

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

    // insertLevel($database, "Week 1", "Top 11 - စိတ်ကြိုက်တေး", "1");
    // insertLevel($database, "Week 2", "Top 10 - 1980s", "1");
    // insertLevel($database, "Week 3", "Top 9 - Hit songs", "1");
    // insertLevel($database, "Week 4", "Top 9 - Htoo Eain Thin\'s songs", "1");
    // insertLevel($database, "Week 5", "Top 7 - Rock Music", "1");
    // insertLevel($database, "Week 6", "Top 6 - Summer songs", "1");
    // insertLevel($database, "Week 7", "Top 5 + Wild Card Winner - Burmese Film theme songs", "1");
    // insertLevel($database, "Week 8", "Top 5 - Composer Saung Oo Hlaing\'s songs", "1");
    // insertLevel($database, "Week 9", "Top 3 - Finale", "1");

    // // week 1
    // insertStage($database, 1, 1, "လမ်းခွဲ", 1, 0, 10000, "Highest Votes");
    // insertStage($database, 2, 2, "ပြန်ဆုံမယ့်နေ့", 1, 0, 789, "Safe");
    // insertStage($database, 3, 3, "ဧည့်သည်", 1, 0, 750, "Safe");
    // insertStage($database, 4, 4, "သူငယ်ချင်းအတွက်", 1, 0, 400, "Eliminated");
    // insertStage($database, 5, 5, "ဒဏ်ရာဟောင်းများနဲ့", 1, 0, 680, "Safe");
    // insertStage($database, 6, 6, "အချစ်မီး", 1, 0, 458, "Bottom 3");
    // insertStage($database, 7, 7, "အချစ်ဆိုသည်မှာ", 1, 0, 899, "Safe");
    // insertStage($database, 8, 8, "ဂျပန်ပြည်ကိုရေးတဲ့စာ", 1, 0, 401, "Bottom 3");
    // insertStage($database, 9, 9, "စိတ်ကူးယဥ်အိမ်", 1, 0, 500, "Safe");
    // insertStage($database, 10, 10, "မိန်းကလေးအချစ်", 1, 0, 680, "Safe");
    // insertStage($database, 11, 11, "ခါး", 1, 0, 598, "Safe");

    // // week 2
    // insertStage($database, 1, 6, "အားလုံးအရည်ပျော်သွားပြီ", 2, 0, 402, "Bottom 3");
    // insertStage($database, 2, 10, "မနဲ့မောင်", 2, 0, 789, "Safe");
    // insertStage($database, 3, 7, "မနိုးပါစေနဲ့မိုးရယ်", 2, 0, 10000, "Highest Votes");
    // insertStage($database, 4, 5, "ပျောက်ဆုံးနေသော နိဗ္ဗာန်ဘုံ", 2, 0, 400, "Eliminated");
    // insertStage($database, 5, 11, "အမုန်းမျက်လုံး", 2, 0, 680, "Safe");
    // insertStage($database, 6, 3, "မူယာမာယာမုန်း", 2, 0, 899, "Safe");
    // insertStage($database, 7, 1, "မိုးစက်တင်လေ", 2, 0, 899, "Safe");
    // insertStage($database, 8, 9, "အချစ်ရဲ့အားမာန်", 2, 0, 650, "Safe");
    // insertStage($database, 9, 8, "‌‌ဝေးသက်ကွယ်လွန်‌ဝေး", 2, 0, 500, "Bottom 3");
    // insertStage($database, 10, 2, "စိုးစိတ်တိုးတိတ်လွမ်းချိန်", 2, 0, 680, "Safe");

    // // week 3
    // insertStage($database, 1, 6, "ရွှေရောင်အိပ်မက်များ", 3, 0, 403, "Bottom 3");
    // insertStage($database, 2, 10, "မင်းရှိတဲ့မြို့", 3, 0, 789, "Safe");
    // insertStage($database, 3, 7, "အလွမ်းရဲ့ည", 3, 0, 10000, "Highest Votes");
    // insertStage($database, 4, 11, "ဖြတ်", 3, 0, 680, "Safe");
    // insertStage($database, 5, 3, "တီအားမို", 3, 0, 899, "Safe");
    // insertStage($database, 6, 1, "ပြန်လှည့်မကြည့်ဘူး", 3, 0, 899, "Safe");
    // insertStage($database, 7, 9, "မျှော်လင့်နေမယ်", 3, 0, 500, "Bottom 3");
    // insertStage($database, 8, 8, "‌‌မြစ်နှစ်စင်းရဲ့ပင်လယ်", 3, 0, 400, "Eliminated But Saved By Judges");
    // insertStage($database, 9, 2, "ရင်ခုန်ဘက်သို့တမ်းချင်း", 3, 0, 680, "Safe");

    // // week 4
    // insertStage($database, 1, 6, "နာရီပေါ်မှမျက်ရည်စက်များ", 4, 0, 401, "Eliminated");
    // insertStage($database, 2, 10, "ရက်စက်စွာပြုံးတတ်သော", 4, 0, 789, "Safe");
    // insertStage($database, 3, 7, "ပြန်မလာတော့ဘူး", 4, 0, 968, "Safe");
    // insertStage($database, 4, 9, "ရာဇဝင်များရဲ့ သတို့သမီး", 4, 0, 400, "Eliminated");
    // insertStage($database, 5, 11, "အကြင်နာအိပ်မက်", 4, 0, 899, "Safe");
    // insertStage($database, 6, 3, "စိမ်းရက်လေအား", 4, 0, 500, "Bottom 3");
    // insertStage($database, 7, 1, "ချစ်သူ့လက်ဆောင်", 4, 0, 10000, "Highest Votes");
    // insertStage($database, 8, 8, "‌‌အခါလွန်မိုး", 4, 0, 780, "Safe");
    // insertStage($database, 9, 2, "အလွမ်းရဲ့မီးလျှံများ", 4, 0, 680, "Safe");

    // // week 5
    // insertStage($database, 1, 7, "ကြယ်တွေကြွေသွားသည့်တိုင်", 5, 0, 789, "Safe");
    // insertStage($database, 2, 10, "အတွင်းကြေ", 5, 0, 401, "Eliminated");
    // insertStage($database, 3, 8, "ပထမဆု", 5, 0, 402, "Bottom 3");
    // insertStage($database, 4, 1, "၈၅ မန္တလေးညတမ်းချင်း", 5, 0, 780, "Safe");
    // insertStage($database, 5, 11, "အသုံးမကျတဲ့နှင်းဆီ", 5, 0, 650, "Safe");
    // insertStage($database, 6, 3, "‌‌ချယ်ရီလမ်း", 5, 0, 10000, "Highest Votes");
    // insertStage($database, 7, 2, "ရာဇဝင်", 5, 0, 500, "Bottom 3");

    // // week 6
    // insertStage($database, 1, 7, "နွေဦးကံ့ကော်", 6, 0, 500, "Bottom 3");
    // insertStage($database, 2, 2, "နွေမှတ်တမ်း", 6, 0, 450, "Eliminated");
    // insertStage($database, 3, 8, "တစိမ့်စိမ့်ရင်ထဲ", 6, 0, 455, "Bottom 3");
    // insertStage($database, 4, 1, "ရင်နာတယ်ဧပြီ", 6, 0, 10000, "Highest Votes");
    // insertStage($database, 5, 11, "‌‌အတိတ်ရဲ့‌နွေ", 6, 0, 550, "Safe");
    // insertStage($database, 6, 3, "နွေဦးပုံပြင်", 6, 0, 788, "Safe");

    // // week 7
    // insertStage($database, 1, 7, "ပန်းတွေနဲ့ဝေ", 7, 0, 10000, "Highest Votes");
    // insertStage($database, 2, 11, "နှစ်ယောက်တစ်အိပ်မက်", 7, 0, 450, "Eliminated");
    // insertStage($database, 3, 8, "အချစ်သည်လေပြေ", 7, 0, 455, "Bottom 3");
    // insertStage($database, 4, 1, "မြင်းမိုရ်ထက်မြင့်သော", 7, 0, 996, "Safe");
    // insertStage($database, 5, 10, "‌‌အင်းလေးမှာရွာတဲ့မိုး", 7, 0, 880, "Pantene Wild Card Winner");
    // insertStage($database, 6, 3, "နှလုံးသားမြို့တော်", 7, 0, 500, "Bottom 3");

    // // week 8
    // insertStage($database, 1, 7, "သတိရပေးပါ", 8, 0, 10000, "Highest Votes");
    // insertStage($database, 2, 8, "အချစ်မရှိနေ့ရက်များ", 8, 0, 400, "Eliminated");
    // insertStage($database, 3, 10, "‌‌အမှားများ", 8, 0, 500, "Eliminated");
    // insertStage($database, 4, 1, "လှည့်စားလိုက်", 8, 0, 9960, "Safe");
    // insertStage($database, 5, 3, "တစ်ခါကလက်ဆောင်", 8, 0, 505, "Bottom 3");

    // // week 9
    // insertStage($database, 1, 3, "ဘယ်သူကိုယ့်လောက်ချစ်သလဲ, မင်းသိနိုင်မလား, အချစ်ထက်မက", 9, 0, 7800, "2nd Runner Up");
    // insertStage($database, 2, 1, "အချစ်ဦးဇာတ်လမ်း, မင်းသိနိုင်မလား, နောက်ဆုံးရင်ခွင်", 9, 0, 9960, "1st Runner Up");
    // insertStage($database, 3, 7, "ဒဏ်ရာမဲ့အနာ, မင်းသိနိုင်မလား, ဒုတိယ", 9, 0, 10000, "Winner");


    // //for season 2
    // insertStar($database, "Yaw Kee", "s2t11s1", 22, "Pyay", "s2t11s1.png", 2);
    // insertStar($database, "Benjamin Sum", "s2t11s2", 24, "Taunggyi", "s2t11s2.png", 2);
    // insertStar($database, "Naw Say Say Htoo", "s2t11s3", 22, "Yangon", "s2t11s3.png", 2);
    // insertStar($database, "Tan Khun Kyaw", "s2t11s4", 26, "Magway", "s2t11s4.png", 2);
    // insertStar($database, "Chuu Sitt Han", "s2t11s5", 25, "Mandalay", "s2t11s5.png", 2);
    // insertStar($database, "Htet Inzali", "s2t11s6", 22, "Yangon", "s2t11s6.png", 2);
    // insertStar($database, "Hnin Ei Ei Win", "s2t11s7", 24, "Bagan", "s2t11s7.png", 2);
    // insertStar($database, "Esther", "s2t11s8", 23, "Yangon", "s2t11s8.png", 2);
    // insertStar($database, "Nay Lin Kyaw", "s2t11s9", 23, "Thanbula", "s2t11s9.png", 2);
    // insertStar($database, "Moo Ler", "s2t11s10", 23, "Lashio", "s2t11s10.png", 2);
    // insertStar($database, "Aye Mya Phyu", "s2t11s11", 23, "Bago", "s2t11s11.png", 2);

    // insertLevel($database, "Week 1", "Top 11 - စိတ်ကြိုက်တေး", "2");
    // insertLevel($database, "Week 2", "Top 10 - Rock Music", "2");
    // insertLevel($database, "Week 3", "Top 10 - University songs", "2");

    // // week 1
    // insertStage($database, 1, 12, "တစ်ကိုယ်ရေလွမ်းဆွတ်မှု", 10, 0, 688, "Safe");
    // insertStage($database, 2, 13, "မေမေနေကောင်းလား", 10, 0, 789, "Safe");
    // insertStage($database, 3, 14, "လူညာကြီး", 10, 0, 750, "Safe");
    // insertStage($database, 4, 15, "လမ်းခွဲ", 10, 0, 700, "Safe");
    // insertStage($database, 5, 16, "ချယ်ရီလမ်း", 10, 0, 400, "Eliminated");
    // insertStage($database, 6, 17, "သခင်", 10, 0, 688, "Safe");
    // insertStage($database, 7, 18, "ပထမခြေလမ်း", 10, 0, 405, "Bottom 3");
    // insertStage($database, 8, 19, "ကိုယ့်အတွက်အိပ်မက်မင်းမက်လား", 10, 0, 1000, "Highest Votes");
    // insertStage($database, 9, 20, "အသည်းနှလုံးမရှိတဲ့လူ", 10, 0, 960, "Safe");
    // insertStage($database, 10, 21, "အနိုင်နဲ့ပိုင်း", 10, 0, 450, "Bottom 3");
    // insertStage($database, 11, 22, "လွမ်းခွင့်လေး", 10, 0, 598, "Safe");

    // // week 2
    // insertStage($database, 1, 22, "မြင်သောငိုသောမျက်လုံးများ", 11, 0, 588, "Safe");
    // insertStage($database, 2, 20, "လမ်းဆက်လျှောက်မယ်", 11, 0, 789, "Safe");
    // insertStage($database, 3, 14, "ဆူးလေး", 11, 0, 400, "Eliminated But Saved By Judges");
    // insertStage($database, 4, 12, "ဝမ်းနည်းတတ်တဲ့ချစ်သူ", 11, 0, 408, "Bottom 3");
    // insertStage($database, 5, 15, "ငါ့ကြောင့်", 11, 0, 10000, "Highest Votes");
    // insertStage($database, 6, 18, "ဂန္ဓာရီ", 11, 0, 899, "Safe");
    // insertStage($database, 7, 17, "ရပါတယ်", 11, 0, 410, "Bottom 3");
    // insertStage($database, 8, 19, "ရင်ကိုဖွင့်လိုက်စမ်း", 11, 0, 998, "Safe");
    // insertStage($database, 9, 13, "‌‌သွားမယ်မတားနဲ့", 11, 0, 500, "Safe");
    // insertStage($database, 10, 21, "ဒီလိုသေချာတယ်", 11, 0, 680, "Safe");

    // // week 3
    // insertStage($database, 1, 20, "ကံကော်ဝေဒနာ", 12, 1, 400, "");
    // insertStage($database, 2, 18, "တစ်ချိန်တုန်းကတက္ကသိုလ်", 12, 1, 402, "");
    // insertStage($database, 3, 15, "ကံကော်မြို့တော်", 12, 1, 560, "");
    // insertStage($database, 4, 12, "နွေကျောင်းပိတ်ရက်မလိုချင်", 12, 1, 580, "");
    // insertStage($database, 5, 21, "အဆောင်သရဲ", 12, 1, 550, "");
    // insertStage($database, 6, 14, "တို့သတိရနေမှာပါ", 12, 1, 450, "");
    // insertStage($database, 7, 19, "အချစ်ဖြင့်လွမ်းစေ", 12, 1, 908, "");
    // insertStage($database, 8, 17, "ကျောင်းဖွင့်ချိန်", 12, 1, 698, "");
    // insertStage($database, 9, 13, "‌‌အဓိပတိလမ်းကခြေရာများ", 12, 1, 1111, "");
    // insertStage($database, 10, 22, "တက္ကသိုလ်ကျောင်းကငွေလမင်း", 12, 1, 680, "");

    // //voter
    // insertVoter($database, "Ei Phyo Khine", "eiphyokhine@gmail.com", "09442080100", "202cb962ac59075b964b07152d234b70", "", 10);
    // insertVoter($database, "Lee Ji Eum", "iu@gmail.com", "01078787878", "202cb962ac59075b964b07152d234b70", "1706725352219.jpg", 510);
    // insertVoter($database, "Jisoo", "jisoo@gmail.com", "01088880000", "202cb962ac59075b964b07152d234b70", "1706725352244.jpg", 10);

    // //voter booking

    // insertBooking($database, "66a1de0ad9600", 2, "2024-07-25 11:30:11", 500, 10000, "0100347008059471539", 1);
    // insertBooking($database, "66a1deab9b67c", 1, "2024-07-25 11:39:30", 100, 2000, "0100347008059471540", 0);
    // insertBooking($database, "66a2766c7e201", 2, "2024-07-25 11:42:30", 100, 2000, "0100347008059471539", 2);
    // insertBooking($database, "66a1de0ad967v", 3, "2024-07-25 22:29:40", 250, 5000, "0100347008059471500", 0);




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
    <h5 class="btmspace-80 underlined">Singing Stars <a href="#" style="color: #ff0;">Season 2</a></h5>

    <ul class="nospace group">
      <li class="one_half">
      <blockquote>
        ကိုယ်အကြိုက်ဆုံး ပြိုင်ပွဲ၀င်ကို voting ပေးပြီး တောက်ပခွင့်ပေးလိုက်ပါ <br><br>

        <address>
          Singing Stars Season 2 <br><br>
          Saturday & Sunday <br>
          Live: 8:00 PM, Replay: 8:00 AM <br><br>
          Only in <br>
          <span style="background-color: #F52636; color: #fff; padding: 0px 5px; margin-right: 1px;">m</span><span style="background-color: #F52636; color: #fff; padding: 0px 5px; margin-right: 1px;"">n</span><span style="background-color: #868A8C; color: #fff; padding: 0px 5px; margin-right: 1px;"">tv</span><br>
          <span style="color: #EC1481; font-size: 13px; font-weight: bold;">CHANNEL <span style="font-weight: bolder; font-size: 20px;">9</span></span><br><br>
          Vote for your favourite star!
        </address>

      </blockquote>
      
      </li>
      
      <li style="width: 450px; float: right; position: relative;">
          <?php 
            $stars = selectStarBySeason($database, "2");
            // var_dump($stars);
          ?>
          <div  style="width: 300px; position: absolute; right: 0;">
            <div class="swiffy-slider slider-item-snapstart slider-nav-autoplay slider-nav-autopause">
              <ul class="slider-container">
                  <?php foreach ($stars as $star) {
                    echo '<li style="text-align: end;"><img src="./asset/upload/'.$star["img"].'" style="max-width: 100%;height: auto;">';
                    echo '<div style="position: absolute; bottom: 3rem; right: 2rem; color: #fff; text-shadow: 1px 1px #333;"><span style="font-size: x-large; font-family: \'Dancing Script\';">'.$star["name"].'</span><br>
                    Voting No.&emsp;<span style="color: #ff0; font-size: 20px;">'.$star["vno"].'</span></div>
                    </li>';
                  } ?>
              </ul>

              <button type="button" class="slider-nav"></button>
              <button type="button" class="slider-nav slider-nav-next"></button>

              <div class="slider-indicators" style="position: absolute; bottom: 0;">
                  <?php 
                    for ($i=0; $i < $stars->num_rows; $i++) { 
                      if($i == 0) {
                        echo '<button class="active"></button>';
                      } else {
                        echo  '<button></button>';
                      }
                    }
                  ?>
              </div>
            </div>

            <br><center><span style="font-size: 16px;">Singing Stars Season 2 Top 11 Finalists</span></center>

          </div>

      </li>
      
    </ul>
    <br><br><br>
    <blockquote>
        <span style="font-size: 16px;">"Singing Contest Voting System"</span> <br><br>
        A voter can use his/her voting right online without any difficulty. He/She has to be registered first for him/her to vote. <br>
        After registration, voter gains 10 stars to vote. The stars allow the voters on a special site of the voting panel by one star for one vote. <br>
        Reach 0 star, the voter buy stars to vote which he/she can use to support the favourite star and enjoy services provide by the system such as voting. <br><br>

        <span style="font-size: 20px; color: #ff0;">Let's register to get 10 stars equal 10 votes!</span>
    </blockquote>

  </section>
</div>

<?php require_once("./asset/layout/footer.php"); ?>