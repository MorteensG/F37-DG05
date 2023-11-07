<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<meta charset="UTF-8">
<!-- Meta Tags -->
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title -->
        <title>Lotus Health Centre Online Booking System</title>
		
		<!-- Favicon -->
        <link rel="icon" href="img/favicon.png">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="css/icofont.css">
		
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">
		
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<div class="content">
    		<!-- Header Area -->
		<header class="header" >
			<!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator"> 
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Preloader -->
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<a href="index.html"><img src="img/logo2.png" alt="#"></a>
								</div>
								<!-- End Logo -->
							</div>
							<div class="col-lg-7 col-md-7 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li class="active"><a href="index.html">Home</a>
											</li>
											<li><a href="#">Doctors </a></li>
											<li><a href="#services">Services </a></li>
											
											
											<li><a href="contact.html">Contact Us</a></li>
											<li><a href="login.php">Login/Register</a></li>
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>
							<div class="col-lg-2 col-md-2 col-12">
								<div class="get-quote">
									<a href="appointment.html" class="btn">Book Appointment</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
    
    <main class="main">
    
    <div class="row"> 
        <div class="col-lg-2 col-md-12 col-12"></div>
        <section id="login" class="col-lg-4 col-md-12 col-12">
            <form method="post" action="login.php">
            <br>
                <h2>Login</h2>
                <br>
                <label for="email">Email address</label>
                <input class="input-field" type="email" id="email" name="email" required>
                <br>
                <label for="password">Password</label>
                <input class="input-field" type="password" id="password" name="password" required>
                <br>
                <button type="submit" class="btn secondary" name="login">Login</button>
                <a href="#">Forgot Password?</a>
            </form>
        </section>

        <section id="register" class="col-lg-4 col-md-12 col-12">
            <form method="post" action="register.php">
            <br>
                <h2>Register</h2>
                <br>
                <label for="firstname">First name</label>
                <input class="input-field" type="text" id="firstname" name="firstname" required>
                <br>
                <label for="lastname">Last name</label>
                <input class="input-field" type="text" id="lastname" name="lastname" required>
                <br>
                <label for="email">Email address</label>
                <input class="input-field" type="email" id="register_email" name="email" required>
                <br>
                <label for="password">Password</label>
                <input class="input-field" type="password" id="register_password" name="password" required>
                <br>
                <label for="confirm_password">Confirm Password</label>
                <input class="input-field" type="password" id="confirm_password" name="confirm_password" required>
                <br>
                <button type="submit" class="btn secondary" name="register">Register</button>
            </form>
        </section>
        <div class="col-lg-2 col-md-12 col-12"></div>
    
    </main>

    <!-- Footer Area -->
		<footer id="footer" class="footer ">
			
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="copyright-content">
								<p>© 2023 Lotus Health Clinic. All rights reserved.</p>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
		<!--/ End Footer Area -->
</div>

    <!-- PHP script to handle the registration -->
<?php
if (isset($_POST['register'])) {
    // Assign variables from POST data
    $first_name = $_POST['first_name']; 
    $last_name = $_POST['last_name']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = 'patient'; // Default role for new registrations

    // Basic validation
    if ($password === $confirm_password) {
        // Connect to database (assumes you have a PDO instance $pdo)
        // Replace 'localhost', 'lotushealth', 'root', '' with actual database credentials
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=lotushealth', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Check if email already exists
            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
            $stmt->execute([$email]);
            if ($stmt->rowCount() > 0) {
                echo 'Email already registered!';
            } else {
                // Hash password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert into database
                $stmt = $pdo->prepare('INSERT INTO users (first_name, last_name, email, password, role) VALUES (?, ?, ?, ?, ?)');
                $stmt->execute([$first_name, $last_name, $email, $hashed_password, $role]);
                echo 'Registered successfully!';
            }
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    } else {
        echo 'Passwords do not match.';
    }
}
?>

<!-- PHP script to handle login -->
<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lotushealth', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if user exists in users table
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            echo 'Logged in successfully as ' . $user['role'] . '.';
            // Set session variables and redirect to a different page as needed
        } else {
            echo 'Login failed. Incorrect email or password.';
        }
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    
}
?>
    <!-- jquery Min JS -->
    <script src="js/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="js/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="js/jquery-ui.min.js"></script>
		<!-- Easing JS -->
        <script src="js/easing.js"></script>
		<!-- Color JS -->
		<script src="js/colors.js"></script>
		<!-- Popper JS -->
		<script src="js/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="js/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
        <script src="js/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="js/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
        <script src="js/jquery.scrollUp.min.js"></script>
		<!-- Niceselect JS -->
		<script src="js/niceselect.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="js/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
        <script src="js/owl-carousel.js"></script>
		<!-- counterup JS -->
		<script src="js/jquery.counterup.min.js"></script>
		<!-- Steller JS -->
		<script src="js/steller.js"></script>
		<!-- Wow JS -->
		<script src="js/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="js/main.js"></script>
</body>
</html>
