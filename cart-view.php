<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'config.php';
include 'cart.php';

$cart = new Cart();
$cartItems = $cart->getCartItems();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
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

    <main class="container py-5">
        <h2 class="text-center mb-4">Shopping Cart</h2>
        <div class="cart-list">
            <?php if (!empty($cartItems)): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalPrice = 0;
                        foreach ($cartItems as $productId => $item):
                            $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
                            $stmt->bind_param("i", $productId);
                            $stmt->execute();
                            $product = $stmt->get_result()->fetch_assoc();
                            $stmt->close();
                            $itemTotal = $product['price'] * $item['quantity'];
                            $totalPrice += $itemTotal;
                        ?>
                        <tr>
                            <td><?php echo $product['name']; ?></td>
                            <td><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="100"></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?php echo $itemTotal; ?></td>
                            <td>
                                <a href="remove-from-cart.php?product_id=<?php echo $productId; ?>" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="cart-total text-end">
                    <h5>Total: <?php echo $totalPrice; ?></h5>
                </div>
                <div class="text-center">
                    <a href="checkout.php" class="btn btn-success">Checkout</a>
                </div>
            <?php else: ?>
                <p class="text-center">Your cart is empty.</p>
            <?php endif; ?>
        </div>
    </main>

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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>