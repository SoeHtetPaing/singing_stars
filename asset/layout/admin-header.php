<?php 
  $intro = rand(1, 3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=PT+Sans+Narrow:wght@400;700&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Italianno&family=Reenie+Beanie&display=swap" rel="stylesheet">


    <title>Singing Stars</title>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <link rel="stylesheet" href="../css/fontawesome.6.5.2.all.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/fontawesome.min.css" integrity="sha256-E3sc886pqK23iENDqaXd3fQoD1kVP3TceC+3978NBRk=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reset-css@5.0.2/reset.min.css">
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous"> 
    

    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/style.css" />

    <style>
        body {
            font-family: 'Source Serif 4';
        }
        #myVideo {
            width: 100vw;
            height: 86vh;
            object-fit: cover;
            position: fixed;
            left: 0;
            right: 0;
            top: 14vh;
            bottom: 0;
            z-index: -1;
        }

        /* modal custom css */
        dialog {
	        padding: 1rem 3rem;
	        background: white;
	        max-width: 400px;
	        padding-top: 2rem;
	        border-radius: 20px;
	        border: 0;
	        box-shadow: 0 5px 30px 0 rgb(0 0 0 / 10%);
	        animation: fadeIn 1s ease both;
	        &::backdrop {
	        	animation: fadeIn 1s ease both;
	        	background: rgb(255 255 255 / 40%);
	        	z-index: 2;
	        	backdrop-filter: blur(20px);
	        }
	        .x {
	        	filter: grayscale(1);
	        	border: none;
	        	background: none;
	        	position: absolute;
	        	top: 15px;
	        	right: 10px;
	        	transition: ease filter, transform 0.3s;
	        	cursor: pointer;
	        	transform-origin: center;
	        	&:hover {
	        		filter: grayscale(0);
	        		transform: scale(1.1);
	        	}
	        }
	        h2 {
	        	font-weight: 600;
	        	font-size: 2rem;
	        	padding-bottom: 1rem;
	        }
	        p {
	        	font-size: 1rem;
	        	line-height: 1.3rem;
	        	padding: 0.5rem 0;
	        	a {
	        		&:visited {
	        			color: rgb(var(--vs-primary));
	        		}
	        	}
	        }
        }

        @keyframes fadeIn {
        	from {
        		opacity: 0;
        	}
        	to {
        		opacity: 1;
        	}
        }

        ::-webkit-scrollbar {
            width: 5px;
        }
        ::-webkit-scrollbar-thumb {
            box-shadow: inset 0 0 5px #ccc;
        }
        ::-webkit-scrollbar-thumb {
            background: gold;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #ffa508;
        }
    </style>

</head>

<body id="top">

<div class="wrapper row0" style="position: sticky; top:0; z-index: 5;">

  <div id="topbar" class="hoc clear"> 

    <div class="fl_left">
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a></li>
        <li><a class="faicon-instagram" href="https://www.instagram.com/"><i class="fa-brands fa-square-instagram"></i></a></li>
        <li><a class="faicon-pinterest" href="https://uk.pinterest.com/"><i class="fa-brands fa-pinterest"></i></a></li>
        <li><a class="faicon-x-twitter" href="https://twitter.com/"><i class="fa-brands fa-square-x-twitter"></i></a></li>
        <li><a class="faicon-tiktok" href="https://tiktok.com/"><i class="fa-brands fa-tiktok"></i></a></li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace inline pushright">
        <li><i class="fa-solid fa-phone"></i> +95500300100</li>
        <li><i class="fa-solid fa-envelope"></i> singingstars@gmail.com</li>
      </ul>
    </div>

  </div>

</div>