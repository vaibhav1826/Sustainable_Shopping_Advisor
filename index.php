<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sustainable Shopping Advisor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
        scroll-behavior: smooth;
    }

    body {
        background: linear-gradient(145deg, #f0f4f3, #d9e4dd, #b8cdc4, #8caea3);
        background-size: 400% 400%;
        animation: gradientShift 20s ease infinite;
        color: #2d3e50;
        line-height: 1.6;
        overflow-x: hidden;
        min-height: 100vh;
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
        padding: clamp(1rem, 3vw, 1.5rem) clamp(1.5rem, 5vw, 2.5rem);
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        transition: all 0.4s ease;
    }

    header.scrolled {
        padding: clamp(0.75rem, 2vw, 1rem) clamp(1rem, 4vw, 2rem);
        background: linear-gradient(90deg, #1f5c38, #2a7d4a);
    }

    header h1 {
        font-size: clamp(1.25rem, 4vw, 1.75rem);
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
        padding: clamp(0.75rem, 2vw, 1rem) clamp(1rem, 4vw, 2rem);
        display: flex;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        margin-top: clamp(4rem, 10vw, 6rem);
        /* Increased margin-top to clear header */
        width: 100%;
        position: relative;
        /* Ensure nav stays in flow */
    }

    nav:hover {
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .nav-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.75rem;
        width: 100%;
        max-width: 1200px;
    }

    .nav-links a {
        text-decoration: none;
        color: #2a7d4a;
        font-weight: 600;
        font-size: clamp(0.875rem, 2.5vw, 1rem);
        padding: 0.5rem 1rem;
        position: relative;
        transition: all 0.4s ease;
        display: flex;
        align-items: center;
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
        transform: translateY(-1px);
    }

    .nav-links a:first-child {
        visibility: visible;
        /* Ensure Home is always visible */
    }

    /* Hero Section */
    .hero {
        position: relative;
        text-align: center;
        padding: clamp(3rem, 8vw, 6rem) clamp(1rem, 4vw, 2rem);
        margin: clamp(6rem, 12vw, 8rem) auto clamp(1rem, 3vw, 2rem);
        /* Adjusted top margin */
        max-width: 1200px;
        background: url('https://images.unsplash.com/photo-1448375240586-882707db888b?q=80&w=1470&auto=format&fit=crop') center/cover no-repeat fixed;
        min-height: clamp(400px, 60vh, 600px);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 0;
    }

    .hero-content {
        position: relative;
        z-index: 1;
        color: #fff;
        max-width: 90%;
    }

    .hero h2 {
        font-size: clamp(1.5rem, 5vw, 3.5rem);
        font-weight: 800;
        text-shadow: 0 3px 10px rgba(0, 0, 0, 0.6);
        animation: typewriter 6s steps(40) infinite, blink 0.75s step-end infinite;
        white-space: nowrap;
        overflow: hidden;
        border-right: 3px solid #fff;
        display: inline-block;
    }

    @keyframes typewriter {
        0% {
            width: 0;
        }

        50% {
            width: 100%;
        }

        100% {
            width: 100%;
        }
    }

    @keyframes blink {

        from,
        to {
            border-color: transparent;
        }

        50% {
            border-color: #fff;
        }
    }

    .hero p {
        font-size: clamp(0.875rem, 2.5vw, 1.5rem);
        max-width: 700px;
        margin: 1rem auto;
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
    }

    .explore-btn {
        padding: 12px 25px;
        background: linear-gradient(135deg, #2a7d4a, #1f5c38);
        color: #fff;
        border-radius: 50px;
        font-weight: 700;
        font-size: clamp(0.875rem, 2vw, 1rem);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid #1f5c38;
    }

    .explore-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        background: linear-gradient(135deg, #1f5c38, #2a7d4a);
        border-color: #2a7d4a;
    }

    /* Floating Leaves */
    .leaf-particle {
        position: absolute;
        font-size: 1.5rem;
        color: #2a7d4a;
        animation: float 10s infinite ease-in-out;
        z-index: 0;
    }

    @keyframes float {
        0% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }

        50% {
            opacity: 0.8;
        }

        100% {
            transform: translateY(-100vh) rotate(360deg);
            opacity: 0;
        }
    }

    /* Recommended Products */
    .recommended-products {
        padding: clamp(2rem, 6vw, 5rem) clamp(1rem, 4vw, 2rem);
        background: linear-gradient(180deg, #f9fafb, #ffffff);
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
    }

    .recommended-products h2 {
        font-size: clamp(1.5rem, 4vw, 2.5rem);
        color: #2a7d4a;
        margin-bottom: 2rem;
        font-weight: 700;
        position: relative;
    }

    .recommended-products h2::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, #2a7d4a, #1f5c38);
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 2px;
    }

    .products {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: clamp(1rem, 2vw, 2rem);
        padding: 0 clamp(0.5rem, 2vw, 1rem);
        justify-items: center;
    }

    .product-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        text-align: center;
        transition: all 0.5s ease;
        position: relative;
        overflow: hidden;
        border: 1px solid #e8ecef;
        width: 100%;
        max-width: 300px;
        min-height: 360px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .product-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #2a7d4a, #1f5c38);
        transition: transform 0.4s ease;
        transform: scaleX(0);
        transform-origin: left;
    }

    .product-card:hover::before {
        transform: scaleX(1);
    }

    .product-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 1rem;
        transition: transform 0.4s ease;
    }

    .product-card h3 {
        font-size: clamp(1rem, 2.5vw, 1.25rem);
        color: #2a7d4a;
        margin-bottom: 0.75rem;
        font-weight: 600;
    }

    .product-card p {
        font-size: clamp(0.875rem, 2vw, 1rem);
        color: #4a5e6d;
        margin-bottom: 1rem;
    }

    .product-card .view-product-btn {
        padding: 10px 20px;
        background: linear-gradient(135deg, #2a7d4a, #1f5c38);
        color: #fff;
        border-radius: 25px;
        font-weight: 600;
        font-size: clamp(0.75rem, 2vw, 0.875rem);
        text-decoration: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transition: all 0.4s ease;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }

    .product-card:hover img {
        transform: scale(1.04);
        /* Fixed typo from 1.绿04 */
    }

    .product-card .view-product-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        background: linear-gradient(135deg, #1f5c38, #2a7d4a);
    }

    /* Sustainability Stats */
    .sustainability-stats {
        padding: clamp(2rem, 6vw, 5rem) clamp(1rem, 4vw, 2rem);
        background: linear-gradient(135deg, #ffffff, #f0f6f3);
        max-width: 1200px;
        margin: 0 auto;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .sustainability-stats h2 {
        font-size: clamp(1.5rem, 4vw, 2.5rem);
        color: #2a7d4a;
        text-align: center;
        margin-bottom: 2rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        background: linear-gradient(to right, #2a7d4a, #1f5c38);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: clamp(1rem, 3vw, 2rem);
    }

    .stat-card {
        background: #fff;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        text-align: center;
        transition: all 0.4s ease;
    }

    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .stat-card i {
        font-size: 2rem;
        color: #2a7d4a;
        margin-bottom: 1rem;
        transition: transform 0.4s ease;
    }

    .stat-card:hover i {
        transform: scale(1.1);
    }

    .stat-card h3 {
        font-size: clamp(1rem, 2.5vw, 1.375rem);
        color: #1f5c38;
        margin-bottom: 0.75rem;
        font-weight: 600;
    }

    .stat-card p {
        font-size: clamp(0.875rem, 2vw, 1rem);
        color: #4a5e6d;
    }

    .stat-number {
        font-size: clamp(1.25rem, 3vw, 2rem);
        font-weight: 700;
        color: #2a7d4a;
        margin: 0.5rem 0;
        background: linear-gradient(to right, #2a7d4a, #1f5c38);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.75);
        z-index: 2000;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: #fff;
        padding: clamp(1rem, 4vw, 2rem);
        border-radius: 12px;
        max-width: 90%;
        width: clamp(280px, 80vw, 500px);
        text-align: center;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
        animation: modalFadeIn 0.5s ease;
    }

    @keyframes modalFadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .modal-content img {
        width: 100%;
        max-height: 200px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 1rem;
    }

    .modal-content h3 {
        font-size: clamp(1rem, 2.5vw, 1.375rem);
        color: #2a7d4a;
        margin-bottom: 0.75rem;
        font-weight: 600;
    }

    .modal-content p {
        font-size: clamp(0.875rem, 2vw, 1rem);
        color: #4a5e6d;
    }

    .close-modal {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: clamp(1.25rem, 3vw, 1.5rem);
        color: #4a5e6d;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .close-modal:hover {
        color: #2a7d4a;
        transform: rotate(180deg);
    }

    /* Footer */
    footer {
        background: linear-gradient(90deg, #2a7d4a, #1f5c38);
        color: #fff;
        text-align: center;
        padding: clamp(1.5rem, 4vw, 3rem);
        width: 100%;
    }

    footer p {
        font-size: clamp(0.875rem, 2vw, 1rem);
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    footer::before {
        content: '🌿';
        position: absolute;
        top: 15px;
        left: 20px;
        font-size: clamp(1.25rem, 3vw, 1.5rem);
        opacity: 0.7;
    }

    footer .social-icons {
        margin-top: 1rem;
    }

    footer .social-icons a {
        color: #fff;
        font-size: 1.5rem;
        margin: 0 10px;
        transition: all 0.3s ease;
    }

    footer .social-icons a:hover {
        transform: scale(1.2) translateY(-5px);
        color: #d9e4dd;
    }

    .newsletter {
        margin-top: 1.5rem;
    }

    .newsletter input {
        padding: 10px;
        border: none;
        border-radius: 25px 0 0 25px;
        width: clamp(150px, 50vw, 200px);
    }

    .newsletter button {
        padding: 10px 20px;
        background: #1f5c38;
        color: #fff;
        border: none;
        border-radius: 0 25px 25px 0;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .newsletter button:hover {
        background: #2a7d4a;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .hero {
            padding: 3rem 1.5rem;
            min-height: 350px;
        }

        .products {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .nav-links {
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
            max-height: 50vh;
            overflow-y: auto;
        }

        .nav-links a {
            padding: 0.4rem 0.75rem;
            font-size: 0.875rem;
        }

        .hero {
            padding: 2.5rem 1rem;
            min-height: 300px;
            margin-top: clamp(5rem, 10vw, 7rem);
            /* Adjusted for mobile */
        }

        .recommended-products {
            padding: 2rem 1rem;
        }

        .products {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .product-card {
            max-width: 250px;
            min-height: 340px;
        }

        .stats-container {
            grid-template-columns: 1fr;
        }

        .sustainability-stats {
            padding: 2rem 1rem;
        }
    }

    @media (max-width: 480px) {
        header {
            padding: 0.75rem 1rem;
        }

        nav {
            padding: 0.5rem 1rem;
            margin-top: clamp(3.5rem, 8vw, 5rem);
            /* Ensure nav clears header */
        }

        .nav-links a {
            font-size: 0.75rem;
            padding: 0.3rem 0.5rem;
        }

        .hero {
            padding: 2rem 0.75rem;
            min-height: 250px;
            margin-top: clamp(4.5rem, 9vw, 6rem);
            /* Adjusted for mobile */
        }

        .hero h2 {
            font-size: 1.25rem;
            white-space: normal;
            animation: none;
            border: none;
        }

        .hero p {
            font-size: 0.875rem;
        }

        .recommended-products h2 {
            font-size: 1.25rem;
        }

        .products {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .product-card {
            max-width: 100%;
            padding: 1rem;
            min-height: 320px;
        }

        .product-card img {
            height: 150px;
        }

        .sustainability-stats h2 {
            font-size: 1.25rem;
        }

        .stat-card {
            padding: 1rem;
        }

        .stat-card i {
            font-size: 1.75rem;
        }
    }

    @media (max-width: 360px) {
        header h1 {
            font-size: 1rem;
        }

        nav {
            margin-top: clamp(3rem, 7vw, 4.5rem);
            /* Adjusted for smaller screens */
        }

        .nav-links a {
            font-size: 0.7rem;
            padding: 0.3rem 0.5rem;
        }

        .hero {
            padding: 1.5rem 0.5rem;
            min-height: 200px;
            margin-top: clamp(4rem, 8vw, 5rem);
            /* Adjusted for mobile */
        }

        .hero h2 {
            font-size: 1rem;
        }

        .hero p {
            font-size: 0.75rem;
        }

        .recommended-products h2 {
            font-size: 1rem;
        }

        .product-card {
            padding: 0.75rem;
            min-height: 300px;
        }

        .product-card img {
            height: 130px;
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

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h2>Sustainable Shopping Advisor</h2>
            <p>Discover a premium selection of eco-friendly products crafted to reduce your environmental footprint.</p>
            <a href="products.php" class="explore-btn">Explore Products</a>
        </div>
        <div class="leaf-particle">🍃</div>
        <div class="leaf-particle" style="left: 20%; animation-delay: 2s;">🍃</div>
        <div class="leaf-particle" style="left: 80%; animation-delay: 4s;">🍃</div>
    </section>

    <!-- Recommended Products -->
    <section class="recommended-products" id="products">
        <h2>Featured Eco-Friendly Products</h2>
        <div class="products">
            <div class="product-card" data-name="Bamboo Kitchen Towels" data-price="Rs.670"
                data-img="https://m.media-amazon.com/images/I/614AH2GZ6zL._AC_UF1000,1000_QL80_.jpg">
                <img src="https://m.media-amazon.com/images/I/614AH2GZ6zL._AC_UF1000,1000_QL80_.jpg"
                    alt="Bamboo Kitchen Towels">
                <h3>Bamboo Kitchen Towels</h3>
                <p>Price: Rs.670</p>
                <a href="https://www.google.com/search?tbm=shop&q=Bamboo+Kitchen+Towels" target="_blank"
                    class="view-product-btn">View Product</a>
            </div>
            <div class="product-card" data-name="Eco-Friendly Cleaning Brush" data-price="Rs.55"
                data-img="https://m.media-amazon.com/images/I/913AlyfjIcL._AC_UF894,1000_QL80_.jpg">
                <img src="https://m.media-amazon.com/images/I/913AlyfjIcL._AC_UF894,1000_QL80_.jpg"
                    alt="Eco-Friendly Cleaning Brush">
                <h3>Eco-Friendly Cleaning Brush</h3>
                <p>Price: Rs.55</p>
                <a href="https://www.google.com/search?tbm=shop&q=Eco-Friendly+Cleaning+Brush" target="_blank"
                    class="view-product-btn">View Product</a>
            </div>
            <div class="product-card" data-name="Reusable Dish Cloths" data-price="Rs.89"
                data-img="https://m.media-amazon.com/images/I/81F4HHmEe6L._AC_UF894,1000_QL80_.jpg">
                <img src="https://m.media-amazon.com/images/I/81F4HHmEe6L._AC_UF894,1000_QL80_.jpg"
                    alt="Reusable Dish Cloths">
                <h3>Reusable Dish Cloths</h3>
                <p>Price: Rs.89</p>
                <a href="https://www.google.com/search?tbm=shop&q=Reusable+Dish+Cloths" target="_blank"
                    class="view-product-btn">View Product</a>
            </div>
            <div class="product-card" data-name="Biodegradable Trash Bags" data-price="Rs.1199"
                data-img="https://m.media-amazon.com/images/I/71KEWpeq7iL.jpg">
                <img src="https://m.media-amazon.com/images/I/71KEWpeq7iL.jpg" alt="Biodegradable Trash Bags">
                <h3>Biodegradable Trash Bags</h3>
                <p>Price: Rs.1199</p>
                <a href="https://www.google.com/search?tbm=shop&q=Biodegradable+Trash+Bags" target="_blank"
                    class="view-product-btn">View Product</a>
            </div>
            <div class="product-card" data-name="Recycled Paper Napkins" data-price="Rs.299"
                data-img="https://m.media-amazon.com/images/I/81-u3edrXyL.jpg">
                <img src="https://m.media-amazon.com/images/I/81-u3edrXyL.jpg" alt="Recycled Paper Napkins">
                <h3>Recycled Paper Napkins</h3>
                <p>Price: Rs.299</p>
                <a href="https://www.google.com/search?tbm=shop&q=Recycled+Paper+Napkins" target="_blank"
                    class="view-product-btn">View Product</a>
            </div>
            <div class="product-card" data-name="Natural Air Freshener" data-price="Rs.399"
                data-img="https://m.media-amazon.com/images/I/719V2rcfwxL._AC_UF1000,1000_QL80_.jpg">
                <img src="https://m.media-amazon.com/images/I/719V2rcfwxL._AC_UF1000,1000_QL80_.jpg"
                    alt="Natural Air Freshener">
                <h3>Natural Air Freshener</h3>
                <p>Price: Rs.399</p>
                <a href="https://www.google.com/search?tbm=shop&q=Natural+Air+Freshener" target="_blank"
                    class="view-product-btn">View Product</a>
            </div>
            <div class="product-card" data-name="Eco-Friendly Bath Mat" data-price="Rs.599"
                data-img="https://m.media-amazon.com/images/I/61NIcUG++mL.jpg">
                <img src="https://m.media-amazon.com/images/I/61NIcUG++mL.jpg" alt="Eco-Friendly Bath Mat">
                <h3>Eco-Friendly Bath Mat</h3>
                <p>Price: Rs.599</p>
                <a href="https://www.google.com/search?tbm=shop&q=Eco-Friendly+Bath+Mat" target="_blank"
                    class="view-product-btn">View Product</a>
            </div>
            <div class="product-card" data-name="Recycled Storage Baskets" data-price="Rs.359"
                data-img="https://m.media-amazon.com/images/I/71rZT-RGAjL._AC_UF1000,1000_QL80_.jpg">
                <img src="https://m.media-amazon.com/images/I/71rZT-RGAjL._AC_UF1000,1000_QL80_.jpg"
                    alt="Recycled Storage Baskets">
                <h3>Recycled Storage Baskets</h3>
                <p>Price: Rs.359</p>
                <a href="https://www.google.com/search?tbm=shop&q=Recycled+Storage+Baskets" target="_blank"
                    class="view-product-btn">View Product</a>
            </div>
            <div class="product-card" data-name="Bamboo Hangers" data-price="Rs.329"
                data-img="https://assets.architecturaldigest.in/photos/60082fc0d0435267a8df87ea/16:9/w_2560%2Cc_limit/stupid-hanger-design-1366x768.jpg">
                <img src="https://assets.architecturaldigest.in/photos/60082fc0d0435267a8df87ea/16:9/w_2560%2Cc_limit/stupid-hanger-design-1366x768.jpg"
                    alt="Bamboo Hangers">
                <h3>Bamboo Hangers</h3>
                <p>Price: Rs.329</p>
                <a href="https://www.google.com/search?tbm=shop&q=Bamboo+Hangers" target="_blank"
                    class="view-product-btn">View Product</a>
            </div>
        </div>
    </section>

    <!-- Sustainability Stats -->
    <section class="sustainability-stats">
        <h2>Why Sustainable Development Matters</h2>
        <div class="stats-container">
            <div class="stat-card">
                <i class="fas fa-globe"></i>
                <h3>Carbon Footprint Reduction</h3>
                <span class="stat-number" data-target="30">0%</span>
                <p>Sustainable products can reduce individual carbon emissions by up to 30%, combating climate change
                    effectively.</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-recycle"></i>
                <h3>Waste Reduction</h3>
                <span class="stat-number" data-target="2.5">0B Tons</span>
                <p>Global waste could be reduced by billions of tons annually through sustainable practices and
                    products.</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-tree"></i>
                <h3>Resource Preservation</h3>
                <span class="stat-number" data-target="40">0%</span>
                <p>Eco-friendly materials help preserve up to 40% more natural resources compared to traditional
                    alternatives.</p>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal" id="productModal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">×</span>
            <img id="modalImg" src="" alt="Product Image">
            <h3 id="modalName"></h3>
            <p id="modalPrice"></p>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>Committed to a Sustainable Future</p>
        <p>© 2025 Sustainable Shopping Advisor. All rights reserved.</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="newsletter">
            <input type="email" placeholder="Subscribe to our newsletter">
            <button>Subscribe</button>
        </div>
    </footer>

    <script>
    // Header Scroll Effect
    window.addEventListener("scroll", () => {
        document.querySelector("header").classList.toggle("scrolled", window.scrollY > 50);
    });

    // Modal Functionality
    const modal = document.getElementById("productModal");
    document.querySelectorAll(".product-card").forEach(card => {
        card.addEventListener("click", (e) => {
            if (e.target.classList.contains("view-product-btn")) return;
            document.getElementById("modalImg").src = card.getAttribute("data-img");
            document.getElementById("modalName").textContent = card.getAttribute("data-name");
            document.getElementById("modalPrice").textContent = card.getAttribute("data-price");
            modal.style.display = "flex";
        });
    });

    function closeModal() {
        modal.style.display = "none";
    }

    window.addEventListener("click", (e) => {
        if (e.target === modal) closeModal();
    });

    // Stats Animation
    const animateStats = () => {
        document.querySelectorAll(".stat-number").forEach(stat => {
            const target = parseFloat(stat.getAttribute("data-target"));
            let count = 0;
            const increment = target / 50;
            const updateCount = () => {
                count += increment;
                if (count >= target) {
                    stat.textContent = stat.getAttribute("data-target") + (stat.textContent.includes(
                        "%") ? "%" : "B Tons");
                } else {
                    stat.textContent = count.toFixed(1) + (stat.textContent.includes("%") ? "%" :
                        "B Tons");
                    requestAnimationFrame(updateCount);
                }
            };
            updateCount();
        });
    };

    const statsSection = document.querySelector(".sustainability-stats");
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            animateStats();
            observer.unobserve(statsSection);
        }
    }, {
        threshold: 0.5
    });
    observer.observe(statsSection);
    </script>
</body>

</html>