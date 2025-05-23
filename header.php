<?php
// includes/header.php
session_start(); // Start the session at the very beginning
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmEasy Clone</title>
    <link rel="stylesheet" href="/your_project_name/assets/css/style.css">
    </head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="search-container">
    <input type="text" placeholder="Search for medicines & healthcare products">
    <button type="submit">Search</button>
</div>
            <div class="logo">
                <a href="/your_project_name/index.php">
                    <img src="/your_project_name/assets/img/logo.png" alt="PharmEasy Logo">
                </a>
            </div>
           <nav class="main-nav">
    <ul>
        <li><a href="/your_project_name/index.php">Home</a></li>
        <li><a href="#">Medicines</a></li>
        <li><a href="#">Healthcare Products</a></li>
        <li><a href="#">Lab Tests</a></li>
        <li><a href="#">Offers</a></li>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <li><a href="/your_project_name/dashboard.php">Dashboard</a></li>
            <li><a href="/your_project_name/logout.php">Logout (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a></li>
        <?php else: ?>
            <li><a href="/your_project_name/login.php">Login</a></li>
            <li><a href="/your_project_name/register.php">Register</a></li>
        <?php endif; ?>
    </ul>
</nav>
        </div>
    </header>
    <main>
        <div class="container">
            ```

**5. `includes/footer.php`:**

```php
<?php
// includes/footer.php
?>
        </div> </main>

    <footer class="main-footer">
        <div class="container">
            <div class="footer-sections">
                <div class="footer-section">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Our Services</h3>
                    <ul>
                        <li><a href="#">Order Medicines</a></li>
                        <li><a href="#">Book Lab Tests</a></li>
                        <li><a href="#">Consult Doctors</a></li>
                        <li><a href="#">Healthcare Products</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
                        <li><a href="#">Refund Policy</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
                <div class="footer-section social-media">
                    <h3>Follow Us</h3>
                    <a href="#"><img src="https://via.placeholder.com/24" alt="Facebook"></a>
                    <a href="#"><img src="https://via.placeholder.com/24" alt="Twitter"></a>
                    <a href="#"><img src="https://via.placeholder.com/24" alt="Instagram"></a>
                    <a href="#"><img src="https://via.placeholder.com/24" alt="LinkedIn"></a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> PharmEasy Clone. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="/your_project_name/assets/js/script.js"></script>
</body>
</html>