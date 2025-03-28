<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sustainable Shopping Advisor</title>
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0iIzJDNjYyZCI+PHBhdGggZD0iTTE3IDE2bC00LTVWOGgtMnY0bDQgNXptLTYgNGMwIDEuMSAxLjM0IDIgMyAyczMtLjkgMy0yaDJjMCAyLjIxLTEuNzkgNC0zIDQtMi4yMSAwLTQtMS43OS00LTR6bS04LTVjMC0zLjMxIDIuNjktNiA2LTZzNiAyLjY5IDYgNnYzaDRjMCAyLjc2LTIuMjQgNS01IDVoLTZjLTIuNzYgMC01LTIuMjQtNS01di0zeiIvPjwvc3ZnPg==">
    <meta name="description" content="Find sustainable and eco-friendly products with our shopping advisor">
    <meta name="keywords" content="sustainable, eco-friendly, shopping, green products">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }

    body {
        background: #f5f7f6;
        color: #2d3e50;
        line-height: 1.6;
        overflow-x: hidden;
    }

    /* Header */
    header {
        background: linear-gradient(135deg, #2a7d4a, #1f5c38);
        padding: clamp(1rem, 2vw, 1.5rem) clamp(1.5rem, 4vw, 2rem);
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        position: sticky;
        top: 0;
        z-index: 1000;
        transition: background 0.3s ease;
    }

    header.scrolled {
        background: linear-gradient(135deg, #1f5c38, #2a7d4a);
    }

    header h1 {
        font-size: clamp(1.5rem, 3vw, 2rem);
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    header h1 i {
        transition: transform 0.4s ease;
    }

    header:hover h1 i {
        transform: rotate(360deg);
    }

    /* Navigation */
    nav {
        background: #fff;
        padding: clamp(0.75rem, 1.5vw, 1rem) clamp(1rem, 3vw, 2rem);
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
    }

    .nav-links {
        display: flex;
        gap: 1.25rem;
        flex-wrap: wrap;
        justify-content: center;
    }

    .nav-links a {
        text-decoration: none;
        color: #2a7d4a;
        font-weight: 600;
        font-size: clamp(0.9rem, 2vw, 1rem);
        padding: 0.5rem 1rem;
        transition: color 0.3s ease;
        position: relative;
    }

    .nav-links a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        background: #2a7d4a;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        transition: width 0.3s ease;
    }

    .nav-links a:hover::after {
        width: 70%;
    }

    .nav-links a:hover {
        color: #1f5c38;
    }

    /* Container */
    .container {
        max-width: 1320px;
        margin: 2rem auto;
        padding: clamp(2rem, 4vw, 3rem);
        background: linear-gradient(145deg, #ffffff, #f0f7f2);
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(42, 125, 74, 0.1),
            0 0 40px rgba(0, 0, 0, 0.05);
        min-height: calc(100vh - 120px);
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .container:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 25px rgba(42, 125, 74, 0.15),
            0 0 50px rgba(0, 0, 0, 0.07);
    }

    .container::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(42, 125, 74, 0.08), transparent);
        opacity: 0.5;
        z-index: -1;
        animation: pulse 15s infinite ease-in-out;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            opacity: 0.5;
        }

        50% {
            transform: scale(1.05);
            opacity: 0.7;
        }

        100% {
            transform: scale(1);
            opacity: 0.5;
        }
    }

    /* Quote Section */
    .quote-container {
        background: linear-gradient(135deg, #e8f5e9, #d4e8d6);
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(42, 125, 74, 0.1);
        text-align: center;
        margin: 2rem 0;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .quote-container:hover {
        transform: scale(1.02);
    }

    .quote-container::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(42, 125, 74, 0.1), transparent);
        opacity: 0.6;
        z-index: -1;
    }

    .quote-text {
        font-size: clamp(1.2rem, 2.5vw, 1.5rem);
        color: #2a7d4a;
        font-weight: 600;
        line-height: 1.5;
        margin-bottom: 1rem;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .quote-author {
        font-size: clamp(0.9rem, 2vw, 1rem);
        color: #4a5e6d;
        font-style: italic;
    }

    /* Search Container */
    .search-container {
        background: url('image4.jpg') no-repeat center center/cover;
        border-radius: 8px;
        padding: clamp(1.5rem, 3vw, 2rem);
        margin: 2rem 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .search-container:hover {
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    .search-container h1 {
        font-size: clamp(1.75rem, 4vw, 2.25rem);
        color: #fff;
        text-align: center;
        margin-bottom: 1.5rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
    }

    .search-form {
        display: flex;
        gap: 1rem;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .search-input {
        flex: 1;
        max-width: 500px;
        padding: 12px 20px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: clamp(0.9rem, 2vw, 1rem);
        background: #fff;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: #2a7d4a;
        box-shadow: 0 0 8px rgba(42, 125, 74, 0.2);
    }

    .search-button {
        padding: 12px 25px;
        background: #2a7d4a;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: clamp(0.9rem, 2vw, 1rem);
        text-transform: uppercase;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .search-button:hover {
        background: #1f5c38;
        transform: translateY(-1px);
    }

    /* Results Grid */
    .results-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        padding: 2rem 0;
    }

    .product-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #e8eceb;
        height: 420px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .product-image {
        width: 100%;
        height: 180px;
        object-fit: contain;
        border-radius: 6px;
        margin-bottom: 1rem;
    }

    .product-info {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        justify-content: space-between;
    }

    .product-title {
        font-size: 1.1rem;
        color: #2a7d4a;
        margin-bottom: 0.75rem;
        font-weight: 600;
        line-height: 1.4;
        height: 3.6rem;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .product-price {
        font-size: 1rem;
        color: #4a5e6d;
        margin-bottom: 0.75rem;
        font-weight: 500;
    }

    .eco-badge {
        background: #e8f5e9;
        color: #2a7d4a;
        padding: 6px 12px;
        border-radius: 16px;
        font-size: 0.85rem;
        font-weight: 500;
        margin-bottom: 1rem;
        display: inline-block;
    }

    .product-link {
        padding: 10px 20px;
        background: #2a7d4a;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: background 0.3s ease, transform 0.2s ease;
        display: inline-block;
        width: 100%;
    }

    .product-link:hover {
        background: #1f5c38;
        transform: translateY(-1px);
    }

    .no-results {
        text-align: center;
        padding: 2rem;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        font-size: 1.1rem;
        color: #4a5e6d;
    }

    /* Loading Overlay */
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 2000;
    }

    .loader {
        width: 40px;
        height: 40px;
        border: 4px solid #2a7d4a;
        border-top: 4px solid transparent;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Eco Impact Pie Chart Container */
    .eco-impact-pie {
        background: linear-gradient(135deg, #e8f5e9, #d4e8d6);
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
        position: relative;
        overflow: hidden;
        max-width: 350px;
        margin: 2rem auto;
        transition: transform 0.3s ease;
    }

    .eco-impact-pie:hover {
        transform: scale(1.05);
    }

    .eco-impact-pie::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(42, 125, 74, 0.15), transparent);
        opacity: 0.6;
        z-index: -1;
    }

    .eco-impact-pie h2 {
        color: #2a7d4a;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .eco-impact-pie p {
        font-size: 0.9rem;
        color: #4a5e6d;
        margin-bottom: 1rem;
        line-height: 1.4;
    }

    #ecoPieChart {
        max-width: 200px;
        margin: 0 auto;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .search-form {
            flex-direction: column;
        }

        .search-input,
        .search-button {
            width: 100%;
            max-width: 100%;
        }

        .results-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }

        .eco-impact-pie {
            max-width: 300px;
        }

        .quote-text {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 480px) {
        header h1 {
            font-size: 1.25rem;
        }

        .nav-links {
            flex-direction: column;
            gap: 0.75rem;
        }

        .search-container h1 {
            font-size: 1.5rem;
        }

        .results-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .product-card {
            height: 400px;
        }

        .eco-impact-pie h2 {
            font-size: 1.2rem;
        }

        .eco-impact-pie p {
            font-size: 0.8rem;
        }

        #ecoPieChart {
            max-width: 180px;
        }

        .quote-text {
            font-size: 1rem;
        }

        .quote-author {
            font-size: 0.8rem;
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

    <!-- Container -->
    <div class="container">
        <div class="search-container" role="search">
            <h1 id="page-title">Search Eco-Friendly Products</h1>
            <form method="GET" class="search-form" id="searchForm" aria-labelledby="page-title">
                <input type="text" name="query" class="search-input" placeholder="Search sustainable products..."
                    required minlength="2" maxlength="100" pattern="^[a-zA-Z0-9\s-]+$"
                    title="Only alphanumeric characters, spaces, and hyphens allowed"
                    aria-label="Search sustainable products">
                <button type="submit" class="search-button" aria-label="Search">Search</button>
            </form>
        </div>

        <div class="loading-overlay" id="loadingOverlay" aria-hidden="true">
            <div class="loader" aria-label="Loading"></div>
        </div>

        <div id="resultsContainer" role="region" aria-live="polite">
            <?php
            ini_set('display_errors', 0);
            ini_set('log_errors', 1);
            error_reporting(E_ALL);

            $serpApiKey = getenv('SERPAPI_KEY') ?: '02237ca01a224414934e97e538402171f05bfe9e30878c7caee7a98d968b7d73';
            define('API_ENDPOINT', 'https://serpapi.com/search');

            // Array of sustainability quotes
            $sustainabilityQuotes = [
                [
                    'text' => "The greatest threat to our planet is the belief that someone else will save it.",
                    'author' => "Robert Swan"
                ],
                [
                    'text' => "Sustainability is no longer about doing less harm. It’s about doing more good.",
                    'author' => "Jochen Zeitz"
                ],
                [
                    'text' => "We do not inherit the Earth from our ancestors; we borrow it from our children.",
                    'author' => "Native American Proverb"
                ],
                [
                    'text' => "Buy less, choose well, make it last.",
                    'author' => "Vivienne Westwood"
                ],
                [
                    'text' => "The future depends on what we do in the present.",
                    'author' => "Mahatma Gandhi"
                ],
                [
                    'text' => "Sustainable living is not a trend, it’s a responsibility.",
                    'author' => "Unknown"
                ],
                [
                    'text' => "Every small change in what you buy can change the world.",
                    'author' => "Unknown"
                ]
            ];

            // Function to get a random quote
            function getRandomQuote($quotes) {
                $randomIndex = array_rand($quotes);
                return $quotes[$randomIndex];
            }

            function isEcoFriendly($title, $description = '') {
                $ecoKeywords = [
                    'eco-friendly', 'sustainable', 'recycled', 'reclaimed', 'upcycled',
                    'organic', 'natural', 'biodegradable', 'compostable', 'zero-waste',
                    'bamboo', 'hemp', 'cotton', 'wool', 'linen', 'cork', 'jute', 'tencel',
                    'fair trade', 'ethically made', 'green certified', 'b corp', 'vegan',
                    'renewable', 'low-impact', 'carbon-neutral', 'plastic-free', 'second-hand',
                    'refillable', 'modular', 'non-gmo', 'plant-based', 'locally sourced',
                    'refurbished', 'reusable'
                ];

                $titleLower = strtolower($title);
                $descLower = strtolower($description);

                foreach ($ecoKeywords as $keyword) {
                    if (stripos($titleLower, $keyword) !== false || ($description && stripos($descLower, $keyword) !== false)) {
                        return true;
                    }
                }
                return false;
            }

            function getProductCategory($title, $description = '') {
                $categories = [
                    'Sustainable Fashion' => [
                        'organic cotton', 'hemp', 'bamboo', 'recycled materials', 'second-hand', 'upcycled fashion',
                        'shoes', 'cork', 'algae foam', 'vegan leather', 'clothing', 'shirt', 'pants', 'dress', 'jacket', 'accessories', 'bag'
                    ],
                    'Eco-Friendly Beauty & Personal Care' => [
                        'cruelty-free', 'vegan', 'organic cosmetics', 'biodegradable toothbrush', 'refillable deodorant', 'shampoo bar',
                        'skincare', 'glass packaging', 'metal packaging', 'compostable materials', 'cosmetic', 'toothbrush', 'soap', 'lotion', 'reusable'
                    ],
                    'Energy-Efficient & Green Electronics' => [
                        'solar-powered charger', 'eco-friendly battery', 'energy-efficient', 'led light', 'smart thermostat',
                        'recycled smartphone', 'modular laptop', 'phone', 'laptop', 'charger', 'headphones', 'speaker', 'refurbished'
                    ],
                    'Sustainable Home & Kitchen Products' => [
                        'reusable water bottle', 'coffee cup', 'food storage', 'bamboo utensil', 'recycled plastic utensil',
                        'biodegradable cleaning', 'compostable sponge', 'container', 'plate', 'cup', 'kitchen', 'home', 'reusable'
                    ],
                    'Ethical & Sustainable Food Products' => [
                        'organic food', 'non-gmo', 'fair-trade', 'food', 'plant-based meat', 'lab-grown meat', 'locally sourced',
                        'plastic-free grocery', 'coffee', 'tea', 'snack', 'beverage', 'food'
                    ],
                    'Eco-Friendly Packaging & Zero-Waste Products' => [
                        'biodegradable packaging', 'compostable packaging', 'reusable packaging', 'beeswax wrap', 'plastic wrap alternative',
                        'refillable household', 'bulk-buy', 'packaging', 'bag', 'wrap', 'box', 'recycled', 'reusable'
                    ],
                    'Sustainable Travel & Transport' => [
                        'e-bike', 'scooter', 'electric vehicle', 'travel kit', 'eco-friendly toiletry', 'carbon offset',
                        'bike', 'bicycle', 'car', 'transport', 'travel', 'reusable'
                    ]
                ];

                $titleLower = strtolower($title);
                $descLower = strtolower($description);

                foreach ($categories as $category => $keywords) {
                    foreach ($keywords as $keyword) {
                        if (stripos($titleLower, $keyword) !== false || ($description && stripos($descLower, $keyword) !== false)) {
                            return $category;
                        }
                    }
                }
                return null;
            }

            function generateEcoTags($title, $description = '') {
                $tags = [];
                $materialTags = [
                    'Recycled' => ['recycled', 'reclaimed', 'upcycled', 'second-hand'],
                    'Refurbished' => ['refurbished', 'renewed'],
                    'Reusable' => ['reusable', 'refillable'],
                    'Natural' => ['organic', 'bamboo', 'hemp', 'cotton', 'wool', 'linen', 'cork', 'jute', 'tencel', 'algae foam'],
                    'Sustainable' => ['biodegradable', 'compostable', 'zero-waste', 'energy-efficient'],
                    'Eco-Materials' => ['vegan leather', 'beeswax', 'glass', 'metal', 'plant-based'],
                    'Ethical' => ['fair trade', 'ethically made', 'cruelty-free', 'locally sourced'],
                    'Certified' => ['b corp', 'green certified', 'non-gmo', 'organic certified']
                ];

                $titleLower = strtolower($title);
                $descLower = strtolower($description);

                foreach ($materialTags as $category => $keywords) {
                    foreach ($keywords as $keyword) {
                        if (stripos($titleLower, $keyword) !== false || ($description && stripos($descLower, $keyword) !== false)) {
                            $tags[] = $category;
                            break;
                        }
                    }
                }
                return empty($tags) ? ['Sustainable'] : array_unique($tags);
            }

            function calculateEcoBenefits($title, $category, $ecoTags) {
                $benefits = [
                    'carbon_saved' => 0, // kg CO2e saved per product
                    'water_saved' => 0,  // liters saved
                    'waste_reduced' => 0 // kg reduced
                ];

                if ($category === 'Sustainable Fashion' || in_array('Recycled', $ecoTags)) {
                    $benefits['carbon_saved'] = 5.0;
                    $benefits['water_saved'] = 20.0;
                    $benefits['waste_reduced'] = 0.5;
                } elseif ($category === 'Eco-Friendly Packaging & Zero-Waste Products') {
                    $benefits['carbon_saved'] = 2.0;
                    $benefits['water_saved'] = 10.0;
                    $benefits['waste_reduced'] = 1.0;
                } else {
                    $benefits['carbon_saved'] = 3.0; // Default values
                    $benefits['water_saved'] = 15.0;
                    $benefits['waste_reduced'] = 0.3;
                }

                return $benefits;
            }

            function getBaselineImpact($category) {
                $baseline = [
                    'carbon_emitted' => 0, // kg CO2e emitted
                    'water_used' => 0,     // liters used
                    'waste_generated' => 0 // kg generated
                ];

                if ($category === 'Sustainable Fashion') {
                    $baseline['carbon_emitted'] = 8.0;
                    $baseline['water_used'] = 30.0;
                    $baseline['waste_generated'] = 0.8;
                } elseif ($category === 'Eco-Friendly Packaging & Zero-Waste Products') {
                    $baseline['carbon_emitted'] = 4.0;
                    $baseline['water_used'] = 15.0;
                    $baseline['waste_generated'] = 1.5;
                } else {
                    $baseline['carbon_emitted'] = 5.0; // Default values
                    $baseline['water_used'] = 20.0;
                    $baseline['waste_generated'] = 0.5;
                }

                return $baseline;
            }

            function searchEcoProducts($query) {
                global $serpApiKey;
                $sanitizedQuery = filter_var($query, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

                if (empty($sanitizedQuery) || strlen($sanitizedQuery) < 2) {
                    echo '<p class="no-results">Please enter a valid search term (minimum 2 characters).</p>';
                    return null;
                }

                $ecoQuery = $sanitizedQuery . ' sustainable eco-friendly';
                $params = [
                    'api_key' => $serpApiKey,
                    'engine' => 'google_shopping',
                    'q' => $ecoQuery,
                    'tbs' => 'mr:1,merchagg:g8299768|g8289138',
                    'num' => 20,
                    'hl' => 'en'
                ];

                $url = API_ENDPOINT . '?' . http_build_query($params);
                $ch = curl_init();
                curl_setopt_array($ch, [
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_HTTPHEADER => ['Accept: application/json', 'User-Agent: SustainableShoppingAdvisor/1.0'],
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_CONNECTTIMEOUT => 10
                ]);

                $response = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                if (curl_errno($ch)) {
                    error_log('Curl error: ' . curl_error($ch));
                    echo '<p class="no-results">Network error. Please check your connection and try again.</p>';
                    curl_close($ch);
                    return null;
                }
                curl_close($ch);

                if ($httpCode !== 200) {
                    error_log("API returned HTTP code: $httpCode");
                    echo '<p class="no-results">Service unavailable (HTTP ' . $httpCode . '). Please try again later.</p>';
                    return null;
                }

                $results = json_decode($response, true);
                if (json_last_error() !== JSON_ERROR_NONE || !$results) {
                    error_log('JSON decode error: ' . json_last_error_msg());
                    echo '<p class="no-results">Error processing results. Please try again.</p>';
                    return null;
                }

                if (isset($results['shopping_results']) && !empty($results['shopping_results'])) {
                    $ecoProducts = array_filter($results['shopping_results'], function ($product) {
                        $title = $product['title'] ?? '';
                        $description = $product['snippet'] ?? '';
                        return isEcoFriendly($title, $description) && getProductCategory($title, $description) !== null;
                    });

                    if (empty($ecoProducts)) {
                        echo '<p class="no-results">No sustainable products found for "' . htmlspecialchars($sanitizedQuery, ENT_QUOTES, 'UTF-8') . '" in specified categories. Try a different search term.</p>';
                        return null;
                    }

                    return ['shopping_results' => array_values($ecoProducts)];
                }
                return $results;
            }

            // Static exchange rate: 1 USD = 83 INR
            $exchangeRate = 83;

            // Display random quote if no search query is present
            if (!isset($_GET['query']) || empty($_GET['query'])) {
                $randomQuote = getRandomQuote($sustainabilityQuotes);
                echo '<div class="quote-container">';
                echo '<p class="quote-text">"' . htmlspecialchars($randomQuote['text'], ENT_QUOTES, 'UTF-8') . '"</p>';
                echo '<p class="quote-author">— ' . htmlspecialchars($randomQuote['author'], ENT_QUOTES, 'UTF-8') . '</p>';
                echo '</div>';
            } else {
                $query = htmlspecialchars($_GET['query'], ENT_QUOTES, 'UTF-8');
                $results = searchEcoProducts($query);

                if ($results === null) {
                    return;
                }

                if (isset($results['shopping_results']) && !empty($results['shopping_results'])) {
                    echo '<div class="results-grid">';
                    $totalBenefits = [
                        'carbon_saved' => 0,
                        'water_saved' => 0,
                        'waste_reduced' => 0
                    ];
                    $totalBaseline = [
                        'carbon_emitted' => 0,
                        'water_used' => 0,
                        'waste_generated' => 0
                    ];
                    $productCount = 0;

                    foreach ($results['shopping_results'] as $index => $product) {
                        $title = isset($product['title']) ?
                            htmlspecialchars(mb_substr($product['title'], 0, 150), ENT_QUOTES, 'UTF-8') :
                            'Product Name Unavailable';
                        
                        $price = isset($product['price']) ? $product['price'] : 'Price Unavailable';
                        if ($price !== 'Price Unavailable') {
                            $priceValue = floatval(preg_replace('/[^0-9.]/', '', $price));
                            $priceInINR = $priceValue * $exchangeRate;
                            $price = '₹' . number_format($priceInINR, 2, '.', ',');
                        } else {
                            $price = 'Price Unavailable';
                        }
                        
                        $image = isset($product['thumbnail']) ?
                            htmlspecialchars($product['thumbnail'], ENT_QUOTES, 'UTF-8') :
                            'https://via.placeholder.com/300?text=No+Image';
                        $link = isset($product['link']) ?
                            htmlspecialchars($product['link'], ENT_QUOTES, 'UTF-8') :
                            "https://www.google.com/search?tbm=shop&q=" . urlencode($title . " sustainable eco-friendly");
                        $description = isset($product['snippet']) ?
                            htmlspecialchars($product['snippet'], ENT_QUOTES, 'UTF-8') : '';

                        $category = getProductCategory($title, $description);
                        $ecoTags = generateEcoTags($title, $description);
                        $tagHTML = implode(', ', array_slice($ecoTags, 0, 3));

                        // Calculate benefits and baseline for this product
                        $benefits = calculateEcoBenefits($title, $category, $ecoTags);
                        $baseline = getBaselineImpact($category);

                        $totalBenefits['carbon_saved'] += $benefits['carbon_saved'];
                        $totalBenefits['water_saved'] += $benefits['water_saved'];
                        $totalBenefits['waste_reduced'] += $benefits['waste_reduced'];

                        $totalBaseline['carbon_emitted'] += $baseline['carbon_emitted'];
                        $totalBaseline['water_used'] += $baseline['water_used'];
                        $totalBaseline['waste_generated'] += $baseline['waste_generated'];

                        $productCount++;

                        echo "
                        <article class='product-card'>
                            <img src='$image' alt='$title' class='product-image' loading='lazy'>
                            <div class='product-info'>
                                <h2 class='product-title'>$title</h2>
                                <p class='product-price'>$price</p>
                                <span class='eco-badge' title='Product Characteristics'>$tagHTML</span>
                                <a href='$link' target='_blank' rel='noopener noreferrer' class='product-link' aria-label='View $title'>
                                    View Product
                                </a>
                            </div>
                        </article>";
                    }
                    echo '</div>';

                    // Eco Impact Pie Chart Section
                    echo '<div class="eco-impact-pie">';
                    echo '<h2>Eco Savings</h2>';
                    echo '<p>Our products save <strong>' . round($totalBenefits['carbon_saved'], 1) . ' kg CO2</strong>, <strong>' . round($totalBenefits['water_saved'], 1) . ' L water</strong>, and <strong>' . round($totalBenefits['waste_reduced'], 1) . ' kg waste</strong> vs. typical alternatives.</p>';
                    echo '<canvas id="ecoPieChart" width="200" height="200"></canvas>';
                    echo '</div>';

                    // JavaScript for Single Pie Chart
                    echo '<script>';
                    echo 'const ecoData = ' . json_encode($totalBenefits) . ';';
                    echo 'const baselineData = ' . json_encode($totalBaseline) . ';';
                    echo 'const ctxPie = document.getElementById("ecoPieChart").getContext("2d");';
                    echo 'new Chart(ctxPie, {';
                    echo '    type: "pie",';
                    echo '    data: {';
                    echo '        labels: [';
                    echo '            "Carbon Saved (kg)", "Carbon Emitted (kg)",';
                    echo '            "Water Saved (L)", "Water Used (L)",';
                    echo '            "Waste Reduced (kg)", "Waste Generated (kg)"';
                    echo '        ],';
                    echo '        datasets: [{';
                    echo '            data: [';
                    echo '                ecoData.carbon_saved, baselineData.carbon_emitted,';
                    echo '                ecoData.water_saved, baselineData.water_used,';
                    echo '                ecoData.waste_reduced, baselineData.waste_generated';
                    echo '            ],';
                    echo '            backgroundColor: [';
                    echo '                "#2a7d4a", "#a3c9a8",'; // Carbon: Saved (dark green), Emitted (light green-gray)
                    echo '                "#1f5c38", "#8fa9a3",'; // Water: Saved (darker green), Used (muted teal)
                    echo '                "#4a8f62", "#b8c7c1"';  // Waste: Reduced (mid green), Generated (pale gray)
                    echo '            ],';
                    echo '            borderColor: "#fff",';
                    echo '            borderWidth: 2';
                    echo '        }]';
                    echo '    },';
                    echo '    options: {';
                    echo '        responsive: true,';
                    echo '        maintainAspectRatio: true,';
                    echo '        plugins: {';
                    echo '            legend: {';
                    echo '                position: "bottom",';
                    echo '                labels: {';
                    echo '                    color: "#2d3e50",';
                    echo '                    font: { size: 10, weight: "bold" },';
                    echo '                    padding: 10';
                    echo '                }';
                    echo '            },';
                    echo '            tooltip: {';
                    echo '                backgroundColor: "rgba(42, 125, 74, 0.9)",';
                    echo '                titleFont: { size: 11, weight: "bold" },';
                    echo '                bodyFont: { size: 10 },';
                    echo '                padding: 8,';
                    echo '                cornerRadius: 4,';
                    echo '                callbacks: {';
                    echo '                    label: function(context) {';
                    echo '                        return `${context.label}: ${context.raw.toFixed(1)}`;';
                    echo '                    }';
                    echo '                }';
                    echo '            }';
                    echo '        },';
                    echo '        animation: {';
                    echo '            duration: 1000,';
                    echo '            easing: "easeInOutQuad"';
                    echo '        }';
                    echo '    }';
                    echo '});';
                    echo '</script>';
                } else {
                    echo '<p class="no-results">No sustainable products found for "' . $query . '" in specified categories. Try a different search term.</p>';
                }
            }
            ?>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        const $searchForm = $('#searchForm');
        const $searchInput = $('.search-input');
        const $loadingOverlay = $('#loadingOverlay');
        const $resultsContainer = $('#resultsContainer');

        window.addEventListener("scroll", () => {
            const header = document.querySelector("header");
            header.classList.toggle("scrolled", window.scrollY > 50);
        });

        $searchForm.on('submit', function(e) {
            e.preventDefault();

            if (!$searchInput[0].checkValidity()) {
                $searchInput[0].reportValidity();
                return;
            }

            $loadingOverlay.fadeIn(200);
            const query = $searchInput.val().trim();
            const url = '?' + $.param({
                query: query
            });

            $.ajax({
                url: url,
                method: 'GET',
                timeout: 10000,
                success: function(response) {
                    const $response = $(response);
                    const results = $response.find('#resultsContainer').html();

                    $resultsContainer.fadeOut(200, function() {
                        $(this).html(results).fadeIn(200);
                        $loadingOverlay.fadeOut(200);
                    });
                },
                error: function(xhr, status, error) {
                    let errorMsg = 'Error loading results. Please try again.';
                    if (status === 'timeout') {
                        errorMsg =
                            'Request timed out. Please check your connection and try again.';
                    } else if (xhr.status) {
                        errorMsg =
                            `Service error (HTTP ${xhr.status}). Please try again later.`;
                    }
                    $resultsContainer.html(`<p class="no-results">${errorMsg}</p>`);
                    $loadingOverlay.fadeOut(200);
                }
            });
        });
    });
    </script>
</body>

</html>