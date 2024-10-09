<!-- footer.php -->
<footer>
    <style>
        /* CSS styles for the footer */
        footer {
            background: linear-gradient(to right, #000000, #0000FF, #FFFFFF);
            color: #fff;
            padding: 20px 0;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-content p {
            margin: 0;
            font-size: 14px;
        }

        .footer-content ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .footer-content ul li {
            display: inline-block;
            margin-right: 10px;
        }

        .footer-content ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .footer-content ul li a:hover {
            color: #ccc;
        }

        /* Style for clickable ICT Unit */
        .footer-content .ict-unit {
            color: white;
            text-decoration: underline;
            cursor: pointer;
        }

        .footer-content .ict-unit:hover {
            color: #ccc; /* Adjust hover color if needed */
        }
    </style>

    <div class="footer-content">
        <p>&copy; 2024 TESDA Regional Operations Division. Developed by the <a href="ictunitportfolio.php" class="ict-unit">ICT Unit</a>. All rights reserved.</p>
        <ul>
            <li><a href="privacy_policy.php">Privacy Policy</a></li>
            <li><a href="terms_of_service.php">NTTC Guidelines</a></li>
        </ul>
    </div>
</footer>
