<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4c729db828.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="header bg-dark text-white py-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" alt="All To All Mobile Logo" class="img-fluid" style="height: 100px;"></a>                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="feedback.php">Feedback</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="location.php">Our Location</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#products">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart-view.php">Cart</a></li>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    
    <!-- Our Location Section -->
<section class="location-section">
    <div class="container">
        <h2 class="location-heading">Our Location</h2>
        <p class="location-description">Visit us at our store or find us on the map below:</p>
        <div class="map-container">
            <iframe 
                class="location-map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.8516312543214!2d79.9468741153965!3d23.18093961322826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3981ae54afc54d77%3A0x1c8a6eb7c6b8ed5c!2sJayanti%20Complex%2C%20Jabalpur!5e0!3m2!1sen!2sin!4v1694467866453!5m2!1sen!2sin"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
        <div class="location-info">
            <p><i class="fa-solid fa-location-dot"></i> Jayanti Complex, Jabalpur, India</p>
            <p><i class="fa-solid fa-phone"></i> +91 8839895124</p>
            <p><i class="fa-solid fa-envelope"></i> alltoall@gmail.com.com</p>
        </div>
    </div>
</section>
   <!-- Footer Section -->
   <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p class="social-description">Stay connected with us on social media:</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/profile.php?id=100091625616068" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.instagram.com/premguptaa_?utm_source=qr" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <p>&copy; 2025 Shopping Website. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>