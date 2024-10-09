<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
    <link rel="icon" type="image/png" href="icons/nttcmis.png">
    <style>
       body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #000, #00008b, #ffffff);
    display: flex;
    height: 100vh;
    color: white;
    overflow: hidden;
}

.sidebar {
    width: 250px;
    background: linear-gradient(to bottom, #000000, #0000FF, #FFFFFF);
    color: #FFFFFF;
    position: fixed;
    height: 100%;
    padding: 20px;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.7);
    left: -250px;
    transition: left 0.3s;
    overflow-y: auto;
}

.sidebar:hover {
    left: 0;
}

.sidebar .logo {
    text-align: center;
    margin-bottom: 10px;
}

.sidebar .logo img {
    width: 80%;
    max-width: 180px;
    height: auto;
}

.sidebar h2 {
    text-align: center;
    color: #FFFFFF;
    margin-top: 0;
    font-size: 24px;
    padding-bottom: 20px;
}

.sidebar button {
    width: 100%;
    padding: 12px;
    background: linear-gradient(to right, #0000FF, #00008B);
    border: none;
    color: #FFFFFF;
    font-size: 18px;
    margin-bottom: 12px;
    cursor: pointer;
    border-radius: 8px;
    transition: background 0.3s ease, transform 0.3s ease;
}

.sidebar button:hover {
    background: linear-gradient(to right, #00008B, #0000FF);
    transform: scale(1.05);
}

.container {
    margin-left: 270px; /* Adjusted margin to make room for the sidebar */
    background-color: rgba(0, 0, 0, 0.7);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    max-width: 600px;
    width: calc(100% - 270px); /* Adjusts the width to fit within the remaining space */
    margin-right: auto; /* Center horizontally */
    margin-left: auto; /* Center horizontally */
    opacity: 0;
    transform: translateY(20px);
    animation: fadeIn 1s forwards;
}

@keyframes fadeIn {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.logo-container {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.logo-container img {
    width: 100px;
    height: 100px;
    margin: 0 10px;
}

h1, h2 {
    color: #ffffff;
    text-align: center;
}

p {
    line-height: 1.6;
    text-align: left;
}

    </style>
</head>
<body>
<div class="sidebar">
    <div class="logo">
        <img src="icons/nttcmis.png" alt="Logo" />
    </div>
    <h2>Menu</h2>
    <button onclick="location.href='index.php'">Home</button>
    <button onclick="location.href='statistics.php'">Statistics</button>
    <button onclick="location.href='delete.php'">Delete</button>
    <button onclick="location.href='dfr.php'">Due for Renewal</button>
    <button onclick="location.href='ictunitportfolio.php'">ICT Unit</button>
    <button onclick="location.href='privacy_policy.php'">Privacy Policy</button>
    <button onclick="location.href='terms_of_service.php'">NTTC Guidelines</button>
</div>
    <div class="container">
        <div class="logo-container">
            <img src="icons/tlogo.png" alt="Logo 1">
            <img src="icons/blogo.png" alt="Logo 2">
        </div>
        <h1>Privacy Policy</h1>
        <p>Your privacy is important to us. This privacy policy explains how we collect, use, and protect your NTTC data in accordance with RA 10173.</p>
        <h2>Information We Collect</h2>
        <p>We collect the information you provide to the Provincial Office, which is then endorsed to us for verification. This includes information you submit when you communicate with us regarding NTTC applications and processes.</p>
        <h2>How We Use Information</h2>
        <p>We use the information we collect to process NTTC applications, maintain and improve our services, communicate with you, and ensure the integrity and security of NTTC records.</p>
        <h2>Sharing of Information</h2>
        <p>We do not share your NTTC data with third parties except as required by law or with your explicit consent in accordance with RA 10173.</p>
        <h2>Your Choices</h2>
        <p>You have choices regarding the information we collect and how it's used. You can update your NTTC information or opt-out of certain services by contacting us directly.</p>
        <h2>Contact Us</h2>
        <p>If you have any questions about this privacy policy or how we handle your NTTC data, please contact us at region7@tesda.gov.ph</p>
    </div>
</body>
</html>
