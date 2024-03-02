<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> EV-Charge Admin</title>

  <!-- Custom fonts for this template-->
  
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="calendar.css">
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css"></link>



<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">


  
  <style>
    *{font-family: "Rubik", sans-serif;}

    .time-input {
      display: inline-block;
      position: relative;
    }

    .time-input input[type="time"] {
      padding-right: 48px; /* Add space for AM/PM indicator */
    }

    .time-input::after {
      content: "AM";
      position: absolute;
      top: 50%;
      right: 12px;
      transform: translateY(-50%);
      font-size: 14px;
      color: #000;
    }

    .btn {
      color:white;
    }


    /* Style for the page loader */
#page-loader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #ffffff;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}.loadingg {
	height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
}
.loaderzz {
	height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
}

	.car__body {
		animation: shake 0.2s ease-in-out infinite alternate;
	}
  
  .car__line{
    transform-origin: center right;
		stroke-dasharray: 22;
		animation: line 0.8s ease-in-out infinite;
		animation-fill-mode: both;
  }
	
	.car__line--top {
		transform-origin: center right;
		stroke-dasharray: 22;
		animation: line 0.8s ease-in-out infinite;
		animation-fill-mode: both;
    animation-delay: 0s;
  }
  .car__line--middle {
		transform-origin: center right;
		stroke-dasharray: 22;
		animation: line 0.8s ease-in-out infinite;
		animation-fill-mode: both;
    animation-delay: 0.2s;
  }
  .car__line--bottom {
		transform-origin: center right;
		stroke-dasharray: 22;
		animation: line 0.8s ease-in-out infinite;
		animation-fill-mode: both;
    animation-delay: 0.4s;
  }

@keyframes shake {
	0% {
		transform: translateY(-1%);
	}
	100% {
		transform: translateY(3%);
	}
}

@keyframes line {
	0% {
		stroke-dashoffset: 22;
	}
	
	25% {
		stroke-dashoffset: 22;
	}
	
	50% {
		stroke-dashoffset: 0;
	}
	
	51% {
		stroke-dashoffset: 0;
	}
	
	80% {
		stroke-dashoffset: -22;
	}
	
	100% {
		stroke-dashoffset: -22;
	}
}

    

</style>
</head>

<body id="page-top">



<div id="page-loader">
<div class="loaderzz" id="loaderzz">
<svg class="car" width="102" height="40" xmlns="http://www.w3.org/2000/svg">
  <g transform="translate(2 1)" stroke="#002742" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
      <path class="car__body" d="M47.293 2.375C52.927.792 54.017.805 54.017.805c2.613-.445 6.838-.337 9.42.237l8.381 1.863c2.59.576 6.164 2.606 7.98 4.531l6.348 6.732 6.245 1.877c3.098.508 5.609 3.431 5.609 6.507v4.206c0 .29-2.536 4.189-5.687 4.189H36.808c-2.655 0-4.34-2.1-3.688-4.67 0 0 3.71-19.944 14.173-23.902zM36.5 15.5h54.01" stroke-width="3"/>
      <ellipse class="car__wheel--left" stroke-width="3.2" fill="#FFF" cx="83.493" cy="30.25" rx="6.922" ry="6.808"/>
      <ellipse class="car__wheel--right" stroke-width="3.2" fill="#FFF" cx="46.511" cy="30.25" rx="6.922" ry="6.808"/>
      <path class="car__line car__line--top" d="M22.5 16.5H2.475" stroke-width="3"/>
      <path class="car__line car__line--middle" d="M20.5 23.5H.4755" stroke-width="3"/>
      <path class="car__line car__line--bottom" d="M25.5 9.5h-19" stroke-width="3"/>
  </g>
</svg>
</div>

</div>



<script>
window.addEventListener('load', function() {
  // Get the loader element
  var loader = document.getElementById('page-loader');

  // Set initial opacity to 1
  loader.style.opacity = '1';

  // Hide the page loader after a delay to allow animation to complete
  setTimeout(function() {
    // Set opacity to 0 over 1 second with ease-out transition
    loader.style.transition = 'opacity 1s ease-out';
    loader.style.opacity = '0';

    // Set visibility to hidden after the transition completes
    setTimeout(function() {
      loader.style.visibility = 'hidden';
    }, 500);
  }, 600);
});
  </script>


  <!-- Page Wrapper -->
  <div id="wrapper">