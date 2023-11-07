<?php
// Start the session
session_start();

// Redirect user to login page if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Database credentials
define('DB_HOST', 'localhost');
define('DB_NAME', 'lotushealth');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// Establish connection to the database
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database " . DB_NAME . ": " . $e->getMessage());
}

// Fetch user details
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

// Fetch user appointments
$appointments_stmt = $pdo->prepare("SELECT * FROM appointments WHERE user_id = ? ORDER BY appointment_date ASC");
$appointments_stmt->execute([$_SESSION['user_id']]);
$appointments = $appointments_stmt->fetchAll();
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>

<!-- Meta Tags -->
<meta charset="utf-8">
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
		

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Account - Lotus Health Clinic</title>
<style>
    /* Add your CSS styling here */
</style>
</head>
<body>
    <header>
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

    <main>
        <div id="user-account">
            <h1>User Account</h1>
            <p>Manage your account details and appointments</p>

            <div class="tabs">
                <ul>
                    <li><a href="#profile">Profile</a></li>
                    <li><a href="#appointments">Appointments</a></li>
                    <li><a href="#settings">Settings</a></li>
                </ul>
            </div>

            <div id="profile">
                <h2>User Details</h2>
                <form method="post" action="update_profile.php">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>">

                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">

                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">

                    <label for="address">Address</label>
                    <textarea id="address" name="address"><?php echo htmlspecialchars($user['address']); ?></textarea>

                    <button type="submit" name="update_profile">Update Profile</button>
                </form>
            </div>

            <div id="appointments">
                <h2>Upcoming Appointments</h2>
                <?php foreach ($appointments as $appointment) : ?>
                    <div class="appointment">
                        <p><?php echo htmlspecialchars($appointment['doctor_name']); ?> - <?php echo htmlspecialchars($appointment['appointment_date']); ?></p>
                        <a href="reschedule.php?id=<?php echo $appointment['id']; ?>">Reschedule</a>
                        <a href="cancel.php?id=<?php echo $appointment['id']; ?>">Cancel</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div id="settings">
                <!-- Settings content -->
            </div>
        </div>
    </main>

    <footer>
        <p>© <?php echo date("Y"); ?> Lotus Health Clinic. All rights reserved.</p>
    </footer>

    <form action="logout.php" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>

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
