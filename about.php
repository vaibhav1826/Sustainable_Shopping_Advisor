<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Sustainable Shopping Advisor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }

    body {
        background: linear-gradient(145deg, #f0f4f3, #d9e4dd, #b8cdc4, #8caea3);
        background-size: 400% 400%;
        animation: gradientShift 20s ease infinite;
        color: #2d3e50;
        line-height: 1.6;
        overflow-x: hidden;
    }

    @keyframes gradientShift {
        0% {
            background-position: 0% 0%;
        }

        50% {
            background-position: 100% 100%;
        }

        100% {
            background-position: 0% 0%;
        }
    }

    /* Header */
    header {
        background: linear-gradient(90deg, #2a7d4a, #1f5c38);
        padding: 20px 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        position: sticky;
        top: 0;
        z-index: 1000;
        transition: all 0.4s ease;
    }

    header.scrolled {
        background: linear-gradient(90deg, #1f5c38, #2a7d4a);
        padding: 15px 40px;
    }

    header h1 {
        font-size: 28px;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
        text-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
        animation: slideIn 1s ease;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Navigation */
    nav {
        background: #ffffff;
        padding: 15px 40px;
        display: flex;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    nav:hover {
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .nav-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .nav-links a {
        text-decoration: none;
        color: #2a7d4a;
        font-weight: 600;
        font-size: 16px;
        padding: 8px 20px;
        position: relative;
        transition: all 0.4s ease;
    }

    .nav-links a::before {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        background: #2a7d4a;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        transition: width 0.4s ease;
    }

    .nav-links a:hover::before {
        width: 100%;
    }

    .nav-links a:hover {
        color: #1f5c38;
        transform: translateY(-2px);
    }

    /* About Us Section */
    .about-us {
        padding: 80px 40px;
        text-align: center;
        background: linear-gradient(180deg, #f9fafb, #ffffff);
        position: relative;
        overflow: hidden;
    }

    .about-us h2 {
        font-size: 40px;
        color: #2a7d4a;
        margin-bottom: 40px;
        font-weight: 700;
        position: relative;
        animation: fadeInUp 1s ease;
    }

    .about-us h2::after {
        content: '';
        position: absolute;
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, #2a7d4a, #1f5c38);
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 2px;
        animation: underlineExpand 1.5s ease forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes underlineExpand {
        from {
            width: 0;
        }

        to {
            width: 100px;
        }
    }

    .about-content {
        max-width: 1000px;
        margin: 0 auto;
        padding: 40px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        position: relative;
        animation: contentSlideIn 1.2s ease;
    }

    @keyframes contentSlideIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .about-content p {
        font-size: 18px;
        color: #4a5e6d;
        margin-bottom: 25px;
        line-height: 1.8;
        transition: all 0.3s ease;
    }

    .about-content p:hover {
        color: #2a7d4a;
        transform: translateX(5px);
    }

    .about-content .mission {
        font-style: italic;
        font-size: 20px;
        color: #2a7d4a;
        font-weight: 600;
        margin: 40px 0;
        padding: 25px;
        background: rgba(42, 125, 74, 0.1);
        border-radius: 10px;
        position: relative;
        animation: missionPulse 2s infinite;
    }

    @keyframes missionPulse {
        0% {
            box-shadow: 0 0 10px rgba(42, 125, 74, 0.2);
        }

        50% {
            box-shadow: 0 0 20px rgba(42, 125, 74, 0.4);
        }

        100% {
            box-shadow: 0 0 10px rgba(42, 125, 74, 0.2);
        }
    }

    /* Image Styling */
    .about-image {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        margin: 30px auto;
        display: block;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.4s ease;
    }

    .about-image:hover {
        transform: scale(1.05);
    }

    /* Stats Section */
    .stats {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        max-width: 1000px;
        margin: 40px auto 0;
        padding: 20px;
        gap: 20px;
    }

    .stat-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 220px;
        text-align: center;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(42, 125, 74, 0.1), transparent);
        transition: all 0.5s ease;
    }

    .stat-card:hover::before {
        transform: scale(1.1);
    }

    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
    }

    .stat-card i {
        font-size: 36px;
        color: #2a7d4a;
        margin-bottom: 15px;
        animation: iconBounce 2s infinite;
    }

    @keyframes iconBounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    .stat-card h3 {
        font-size: 28px;
        color: #2a7d4a;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .stat-card p {
        font-size: 16px;
        color: #4a5e6d;
    }

    /* Interactive Background Element */
    .about-us::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://www.transparenttextures.com/patterns/leaf.png');
        opacity: 0.05;
        animation: leafDrift 30s linear infinite;
    }

    @keyframes leafDrift {
        0% {
            background-position: 0 0;
        }

        100% {
            background-position: 100% 100%;
        }
    }

    /* Footer */
    footer {
        background: linear-gradient(90deg, #2a7d4a, #1f5c38);
        color: #fff;
        text-align: center;
        padding: 30px;
        margin-top: 60px;
        position: relative;
        transition: all 0.4s ease;
    }

    footer:hover {
        background: linear-gradient(90deg, #1f5c38, #2a7d4a);
    }

    footer p {
        font-size: 16px;
        margin-bottom: 8px;
        font-weight: 500;
    }

    footer::before {
        content: '🌿';
        position: absolute;
        top: 15px;
        left: 20px;
        font-size: 24px;
        opacity: 0.7;
        transition: transform 0.4s ease;
    }

    footer:hover::before {
        transform: rotate(360deg);
    }

    /* Media Queries for Responsiveness */
    @media (max-width: 768px) {
        header {
            padding: 15px 20px;
        }

        header h1 {
            font-size: 24px;
        }

        nav {
            padding: 10px 20px;
        }

        .nav-links a {
            font-size: 14px;
            padding: 8px 15px;
        }

        .about-us {
            padding: 40px 20px;
        }

        .about-us h2 {
            font-size: 32px;
        }

        .about-content {
            padding: 20px;
        }

        .about-content p {
            font-size: 16px;
        }

        .about-content .mission {
            font-size: 18px;
            padding: 20px;
        }

        .stat-card {
            width: 180px;
        }

        .stat-card h3 {
            font-size: 24px;
        }

        .stat-card i {
            font-size: 30px;
        }

        footer {
            padding: 20px;
        }
    }

    @media (max-width: 480px) {
        header {
            padding: 10px 15px;
        }

        header h1 {
            font-size: 20px;
        }

        .nav-links {
            flex-direction: column;
            align-items: center;
        }

        .nav-links a {
            padding: 10px;
            font-size: 14px;
        }

        .about-us {
            padding: 20px 10px;
        }

        .about-us h2 {
            font-size: 28px;
        }

        .about-content {
            padding: 15px;
        }

        .about-content p {
            font-size: 14px;
        }

        .about-content .mission {
            font-size: 16px;
            padding: 15px;
        }

        .stats {
            padding: 10px;
        }

        .stat-card {
            width: 100%;
            max-width: 300px;
            margin: 10px auto;
        }

        footer p {
            font-size: 14px;
        }
    }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <h1><i class="fas fa-leaf"></i> Sustainable Shopping Advisor</h1>
    </header>

    <!-- Navigation -->
    <nav>
        <div class="nav-links">
            <a href="index.php"><i class="fas fa-home"></i> Home</a>
            <a href="about.php">About Us</a>
            <a href="products.php">Products</a>
            <a href="contact.php">Contact</a>
        </div>
    </nav>

    <!-- About Us Section -->
    <section class="about-us" id="about">
        <h2>About Us</h2>
        <div class="about-content">
            <p>Welcome to Sustainable Shopping Advisor, where we’re redefining eco-friendly living. Launched in 2025,
                our platform is dedicated to helping you discover sustainable products that align with your values and
                reduce your environmental footprint.</p>
            <img src="image2.jpg" alt="Sustainable Living" class="about-image">
            <p>We curate a premium selection of responsibly sourced items—from biodegradable essentials to recycled
                innovations—partnering with brands that prioritize the planet. Our advanced tools analyze product
                sustainability, empowering you with informed choices for a greener lifestyle.</p>
            <p class="mission">"Our mission is to make sustainability simple, stylish, and accessible—because every
                choice counts."</p>

            <!-- Stats Section -->
            <div class="stats">
                <div class="stat-card">
                    <i class="fas fa-users"></i>
                    <h3>50,000+</h3>
                    <p>Users Inspired</p>
                </div>
                <div class="stat-card">
                    <i class="fas fa-leaf"></i>
                    <h3>10,000+</h3>
                    <p>Eco Products Curated</p>
                </div>
                <div class="stat-card">
                    <i class="fas fa-tree"></i>
                    <h3>1M+ kg</h3>
                    <p>CO₂ Reduced</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>Committed to a Sustainable Future</p>
        <p>© 2025 Sustainable Shopping Advisor. All rights reserved.</p>
    </footer>

    <script>
    // Header Scroll Effect
    window.addEventListener("scroll", () => {
        const header = document.querySelector("header");
        header.classList.toggle("scrolled", window.scrollY > 50);
    });

    // Animate stats on scroll into view
    const statsSection = document.querySelector('.stats');
    const statCards = document.querySelectorAll('.stat-card h3');
    let hasAnimated = false;

    function animateStats() {
        if (hasAnimated) return;
        statCards.forEach((stat, index) => {
            let count = 0;
            const target = parseInt(stat.textContent.replace(/[^0-9]/g, ''));
            const increment = Math.ceil(target / 50);
            const interval = setInterval(() => {
                count += increment;
                if (count >= target) {
                    count = target;
                    clearInterval(interval);
                }
                stat.textContent = count.toLocaleString() + (stat.textContent.includes('+') ? '+' : stat
                    .textContent.includes('kg') ? ' kg' : '');
            }, 50);
        });
        hasAnimated = true;
    }

    window.addEventListener('scroll', () => {
        const rect = statsSection.getBoundingClientRect();
        if (rect.top <= window.innerHeight * 0.75) {
            animateStats();
        }
    });
    </script>
</body>

</html>