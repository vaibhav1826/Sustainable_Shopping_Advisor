<?php
// Initialize variables
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = $success = $error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = cleanInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and spaces allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = cleanInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = cleanInput($_POST["message"]);
    }

    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        $success = "Thank you, $name! Your message has been received.";
        $name = $email = $message = "";
    }
}

function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact Sustainable Shopping Advisor for inquiries and feedback.">
    <title>Contact Us - Sustainable Shopping Advisor</title>
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
        transition: all 0.5s ease;
    }

    header.scrolled {
        background: linear-gradient(90deg, #1f5c38, #2a7d4a);
        padding: 15px 40px;
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
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
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        animation: slideIn 1s ease-out;
    }

    header h1 i {
        transition: transform 0.5s ease;
    }

    header:hover h1 i {
        transform: rotate(360deg);
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
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
        transition: all 0.4s ease;
    }

    nav:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .nav-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }

    .nav-links a {
        text-decoration: none;
        color: #2a7d4a;
        font-weight: 600;
        font-size: 16px;
        padding: 8px 20px;
        position: relative;
        transition: all 0.4s ease;
        overflow: hidden;
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

    .nav-links a::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(42, 125, 74, 0.1);
        transition: all 0.5s ease;
    }

    .nav-links a:hover::before {
        width: 100%;
    }

    .nav-links a:hover::after {
        left: 0;
    }

    .nav-links a:hover {
        color: #1f5c38;
        transform: translateY(-3px);
    }

    /* Contact Us Section */
    .contact-us {
        padding: 80px 40px;
        text-align: center;
        background: linear-gradient(180deg, #f9fafb, #ffffff);
        position: relative;
        overflow: hidden;
        animation: fadeInSection 1s ease-out;
    }

    @keyframes fadeInSection {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .contact-us h2 {
        font-size: 42px;
        color: #2a7d4a;
        margin-bottom: 20px;
        font-weight: 700;
        position: relative;
        animation: bounceIn 1.2s ease-out;
    }

    .contact-us h2::after {
        content: '';
        position: absolute;
        width: 0;
        height: 4px;
        background: linear-gradient(90deg, #2a7d4a, #1f5c38);
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 2px;
        animation: underlineExpand 1.5s ease-out forwards;
    }

    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.3);
        }

        50% {
            opacity: 1;
            transform: scale(1.05);
        }

        70% {
            transform: scale(0.95);
        }

        100% {
            transform: scale(1);
        }
    }

    @keyframes underlineExpand {
        from {
            width: 0;
        }

        to {
            width: 120px;
        }
    }

    .contact-us .intro-text {
        font-size: 20px;
        color: #4a5e6d;
        max-width: 800px;
        margin: 0 auto 40px;
        font-style: italic;
        opacity: 0;
        animation: slideUp 1.2s ease-out 0.3s forwards;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .contact-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .contact-info,
    .contact-form {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        padding: 40px;
        width: 100%;
        max-width: 500px;
        position: relative;
        overflow: hidden;
        transition: transform 0.5s ease, box-shadow 0.5s ease;
    }

    .contact-info:hover,
    .contact-form:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
    }

    .contact-info::before,
    .contact-form::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(42, 125, 74, 0.15), transparent);
        transition: all 0.6s ease;
    }

    .contact-info:hover::before,
    .contact-form:hover::before {
        transform: scale(1.2);
    }

    .contact-info h3,
    .contact-form h3 {
        font-size: 26px;
        color: #2a7d4a;
        margin-bottom: 25px;
        font-weight: 600;
        position: relative;
        animation: fadeInUp 1s ease-out;
    }

    .contact-info h3::after,
    .contact-form h3::after {
        content: '';
        position: absolute;
        width: 0;
        height: 3px;
        background: #2a7d4a;
        bottom: -10px;
        left: 0;
        transition: width 0.5s ease;
    }

    .contact-info:hover h3::after,
    .contact-form:hover h3::after {
        width: 100%;
    }

    .contact-info p {
        font-size: 18px;
        color: #4a5e6d;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        opacity: 0;
        animation: slideInLeft 1s ease-out forwards;
        animation-delay: calc(0.2s * var(--i));
        transition: all 0.4s ease;
    }

    .contact-info p:hover {
        color: #2a7d4a;
        transform: translateX(15px);
    }

    .contact-info i {
        margin-right: 15px;
        color: #2a7d4a;
        font-size: 22px;
        transition: transform 0.4s ease;
    }

    .contact-info p:hover i {
        transform: scale(1.2) rotate(10deg);
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Contact Image */
    .contact-image {
        max-width: 100%;
        height: auto;
        border-radius: 15px;
        margin-top: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        transition: all 0.5s ease;
        display: block;
        opacity: 0;
        animation: zoomIn 1s ease-out 0.8s forwards;
    }

    .contact-image:hover {
        transform: scale(1.08) rotate(2deg);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    @keyframes zoomIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Contact Form */
    .contact-form {
        border: 1px solid #e8ecef;
    }

    .contact-form form {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .form-group {
        position: relative;
        margin-bottom: 10px;
        opacity: 0;
        animation: slideInUp 1s ease-out forwards;
        animation-delay: calc(0.2s * var(--i));
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .contact-form label {
        font-size: 14px;
        color: #2d3e50;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        text-align: left;
        transition: color 0.3s ease;
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 12px 15px;
        font-size: 16px;
        border: 2px solid #e0e4e8;
        border-radius: 8px;
        outline: none;
        background: #f9fafb;
        transition: all 0.4s ease;
    }

    .contact-form input:focus,
    .contact-form textarea:focus {
        border-color: #2a7d4a;
        box-shadow: 0 0 12px rgba(42, 125, 74, 0.3);
        background: #fff;
        transform: scale(1.02);
    }

    .contact-form textarea {
        resize: vertical;
        min-height: 120px;
        max-height: 200px;
    }

    .contact-form button {
        padding: 12px 30px;
        background: linear-gradient(135deg, #2a7d4a, #1f5c38);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        align-self: center;
    }

    .contact-form button::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: all 0.6s ease;
    }

    .contact-form button:hover::before {
        width: 300px;
        height: 300px;
    }

    .contact-form button:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
        background: linear-gradient(135deg, #1f5c38, #2a7d4a);
    }

    /* Error and Success Messages */
    .error-text {
        color: #d9534f;
        font-size: 13px;
        margin-top: 5px;
        text-align: left;
        display: block;
        opacity: 0;
        animation: fadeIn 0.5s ease-out forwards;
    }

    .message {
        font-size: 18px;
        margin-bottom: 20px;
        padding: 12px;
        border-radius: 8px;
        width: 100%;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        opacity: 0;
        animation: popIn 0.8s ease-out forwards;
    }

    @keyframes popIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .success {
        color: #2a7d4a;
        background: #e6f3e6;
        border-left: 4px solid #2a7d4a;
    }

    .error {
        color: #d9534f;
        background: #f2dede;
        border-left: 4px solid #d9534f;
    }

    /* Map Section */
    .map-container {
        margin-top: 60px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        transition: all 0.5s ease;
        opacity: 0;
        animation: mapSlideIn 1.2s ease-out 1s forwards;
    }

    .map-container::before {
        content: 'Our Location';
        position: absolute;
        top: -40px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 24px;
        color: #2a7d4a;
        font-weight: 700;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        opacity: 0;
        animation: fadeInDown 1s ease-out 1.2s forwards;
    }

    .map-container:hover {
        transform: scale(1.03);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
    }

    .map-container iframe {
        width: 100%;
        height: 400px;
        border: none;
        border-radius: 20px;
        transition: all 0.5s ease;
        filter: brightness(1);
    }

    .map-container:hover iframe {
        filter: brightness(1.05);
    }

    @keyframes mapSlideIn {
        from {
            opacity: 0;
            transform: translateY(50px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Interactive Background */
    .contact-us::before {
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
        transition: all 0.5s ease;
    }

    footer:hover {
        background: linear-gradient(90deg, #1f5c38, #2a7d4a);
        box-shadow: 0 -10px 20px rgba(0, 0, 0, 0.2);
    }

    footer p {
        font-size: 16px;
        margin-bottom: 8px;
        font-weight: 500;
        opacity: 0;
        animation: fadeIn 1s ease-out forwards;
        animation-delay: calc(0.2s * var(--i));
    }

    footer::before {
        content: '🌿';
        position: absolute;
        top: 15px;
        left: 20px;
        font-size: 24px;
        opacity: 0.7;
        transition: transform 0.6s ease;
    }

    footer:hover::before {
        transform: rotate(360deg) scale(1.2);
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

        .contact-us {
            padding: 40px 20px;
        }

        .contact-us h2 {
            font-size: 34px;
        }

        .intro-text {
            font-size: 18px;
        }

        .contact-info,
        .contact-form {
            padding: 30px;
            max-width: 100%;
        }

        .contact-info h3,
        .contact-form h3 {
            font-size: 22px;
        }

        .contact-info p {
            font-size: 16px;
        }

        .contact-image {
            margin: 20px auto;
            max-width: 90%;
        }

        .map-container {
            margin-top: 40px;
        }

        .map-container iframe {
            height: 300px;
        }

        .map-container::before {
            font-size: 20px;
            top: -30px;
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

        .contact-us {
            padding: 20px 10px;
        }

        .contact-us h2 {
            font-size: 28px;
        }

        .intro-text {
            font-size: 16px;
        }

        .contact-container {
            gap: 20px;
        }

        .contact-info,
        .contact-form {
            padding: 20px;
        }

        .contact-info h3,
        .contact-form h3 {
            font-size: 20px;
        }

        .contact-info p {
            font-size: 14px;
        }

        .contact-image {
            margin: 15px auto;
            max-width: 100%;
        }

        .contact-form input,
        .contact-form textarea {
            font-size: 14px;
        }

        .contact-form button {
            padding: 10px 25px;
            font-size: 14px;
        }

        .map-container {
            margin-top: 30px;
        }

        .map-container iframe {
            height: 250px;
        }

        .map-container::before {
            font-size: 18px;
            top: -25px;
        }

        footer p {
            font-size: 14px;
        }
    }
    </style>
</head>

<body>
    <header>
        <h1><i class="fas fa-leaf" aria-hidden="true"></i> Sustainable Shopping Advisor</h1>
    </header>

    <nav>
        <div class="nav-links">
            <a href="index.php"><i class="fas fa-home" aria-hidden="true"></i> Home</a>
            <a href="about.php">About Us</a>
            <a href="products.php">Products</a>
            <a href="contact.php">Contact</a>
        </div>
    </nav>

    <main>
        <section class="contact-us" id="contact">
            <h2>Let’s Connect</h2>
            <p class="intro-text">Reach out to us for inquiries, feedback, or just to say hello—we’re here to support
                your sustainable journey!</p>
            <?php if (!empty($success)): ?>
            <div class="message success" role="alert"><?php echo $success; ?></div>
            <?php elseif (!empty($error)): ?>
            <div class="message error" role="alert"><?php echo $error; ?></div>
            <?php endif; ?>
            <div class="contact-container">
                <article class="contact-info" style="--i: 1;">
                    <h3>Contact Details</h3>
                    <p style="--i: 1;"><i class="fas fa-phone" aria-hidden="true"></i> +91 9058065003</p>
                    <p style="--i: 2;"><i class="fas fa-envelope" aria-hidden="true"></i> <a
                            href="mailto:vaibhavbhatt145@gmail.com">vaibhavbhatt145@gmail.com</a></p>
                    <p style="--i: 3;"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Phagwara, Punjab, India
                    </p>
                    <img src="image3.jpg" alt="Contact Illustration" class="contact-image">
                </article>

                <article class="contact-form">
                    <h3>Drop Us a Message</h3>
                    <form action="contact.php" method="post" novalidate>
                        <div class="form-group" style="--i: 1;">
                            <label for="name">Your Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter your name"
                                value="<?php echo htmlspecialchars($name); ?>" required aria-describedby="name-error">
                            <?php if (!empty($nameErr)): ?>
                            <span class="error-text" id="name-error"><?php echo $nameErr; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group" style="--i: 2;">
                            <label for="email">Your Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email"
                                value="<?php echo htmlspecialchars($email); ?>" required aria-describedby="email-error">
                            <?php if (!empty($emailErr)): ?>
                            <span class="error-text" id="email-error"><?php echo $emailErr; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group" style="--i: 3;">
                            <label for="message">Your Message</label>
                            <textarea id="message" name="message" placeholder="Write your message here" required
                                aria-describedby="message-error"><?php echo htmlspecialchars($message); ?></textarea>
                            <?php if (!empty($messageErr)): ?>
                            <span class="error-text" id="message-error"><?php echo $messageErr; ?></span>
                            <?php endif; ?>
                        </div>
                        <button type="submit">Send Message</button>
                    </form>
                </article>
            </div>

            <div class="map-container">
                <a href="https://www.google.com/maps/place/Phagwara,+Punjab,+India/@31.2206989,75.7680653,13z"
                    target="_blank" rel="noopener noreferrer" aria-label="View Phagwara, Punjab on Google Maps">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3422.187587024578!2d75.76806531519166!3d31.220698981471367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a5f5e1b7d8b3d%3A0x6f6a35d6e1e6b6b7!2sPhagwara%2C%20Punjab%2C%20India!5e0!3m2!1sen!2sus!4v1698765432100!5m2!1sen!2sus"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </a>
            </div>
        </section>
    </main>

    <footer>
        <p style="--i: 1;">Committed to a Sustainable Future</p>
        <p style="--i: 2;">© 2025 Sustainable Shopping Advisor. All rights reserved.</p>
    </footer>

    <script>
    window.addEventListener("scroll", () => {
        const header = document.querySelector("header");
        header.classList.toggle("scrolled", window.scrollY > 50);
    });
    </script>
</body>

</html>