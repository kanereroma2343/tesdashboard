<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="icon" type="image/png" href="icons/nttcmis.png">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #0000FF, #000000, #FFFFFF);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 1.5s ease-in-out;
        }

        .portfolio-container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            max-width: 1000px;
            width: 100%;
            text-align: center;
            color: #fff;
        }

        .ict-unit-header {
            font-family: 'Orbitron', sans-serif;
            font-weight: bold;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
            animation: slideIn 1s ease-in-out;
        }

        .logo-left,
        .logo-right {
            width: 50px;
            height: auto;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .logo-left {
            left: -60px;
        }

        .logo-right {
            right: -60px;
        }

        .header-buttons {
            margin-top: 10px;
            margin-bottom: 20px;
            animation: fadeIn 1.5s ease-in-out;
        }

        .portfolio {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .frame {
            width: calc(33.33% - 20px);
            margin-bottom: 20px;
            display: inline-block;
            vertical-align: top;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeIn 2s ease-in-out;
        }

        .frame:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 15px rgba(0, 0, 255, 0.5);
        }

        .frame .card {
            border: none;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .frame .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .frame .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .frame .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .frame .card-text {
            font-size: 1rem;
            color: #000000;
        }

        .home-button {
            margin-top: 20px;
        }

        /* Modal styles */
        .modal-dialog {
            max-width: 90%;
            margin: 1.75rem auto;
        }

        .modal-content {
            background-color: rgba(0, 0, 0, 0.9);
            padding: 20px;
            border-radius: 10px;
            text-align: left;
            color: #fff;
            animation: fadeIn 0.5s ease-in-out;
        }

        .modal-header {
            border-bottom: none;
            text-align: center;
            padding-bottom: 0;
        }

        .modal-body {
            font-size: 1rem;
            color: #ccc;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .modal-footer {
            border-top: none;
            display: flex;
            justify-content: flex-end;
            padding-top: 0;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .section-title {
            font-weight: bold;
            margin-top: 1rem;
        }
        .btn-primary {
    background-color: #2E86C1; /* Dark blue */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition: background-position 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
    border-radius: 12px;
    background-image: linear-gradient(to right, #000000, #0000FF, #FFFFFF);
    background-size: 200% auto;
}

.btn-primary:hover {
    color: white;
    box-shadow: 0 8px 16px rgba(0,0,0,0.3);
    background-position: right center;
}

    </style>
</head>
<body>
    <div class="portfolio-container">
        <h1 class="ict-unit-header">
            <img src="icons/tlogo.png" alt="Left Logo" class="logo-left">
            ICT UNIT
            <img src="icons/blogo.png" alt="Right Logo" class="logo-right">
        </h1>

        <div class="header-buttons">
            <a href="index.php" class="btn btn-primary">Home</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#infoModal">Info</button>
        </div>
        
        <div class="portfolio">
            <div class="frame">
                <div class="card">
                    <img class="card-img-top" src="icons/gerard.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Gerard Randolf G. Tecson</h5>
                        <p class="card-text">Information Technology Officer I</p>
                        <a href="https://www.facebook.com/teckiii" class="btn btn-primary">Facebook</a>
                    </div>
                </div>
            </div>
            <div class="frame">
                <div class="card">
                    <img class="card-img-top" src="icons/aljohn.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Aljohn Rosales</h5>
                        <p class="card-text">Support Staff, ICT Unit</p>
                        <a href="https://www.facebook.com/AljohnBoy" class="btn btn-primary">Facebook</a>
                    </div>
                </div>
            </div>
            <div class="frame">
                <div class="card">
                    <img class="card-img-top" src="icons/kane.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Jan Kane T. Reroma</h5>
                        <p class="card-text">Support Staff, ICT Unit</p>
                        <a href="https://www.facebook.com/profile.php?id=100089537864490" class="btn btn-primary">Facebook</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">ICT Unit Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <b>Operational Efficiency:</b> The ICT Unit enhances operational efficiency by implementing and maintaining robust information systems that streamline processes, reduce manual workloads, and ensure accurate data management. This allows TESDA to focus more on its core mission of providing technical education and skills development.
                    </p>
                    <p>
                        <b>Data Management and Security:</b> Effective data management and security are vital for TESDA's operations. The ICT Unit ensures that all data related to trainees, trainers, and training programs are securely stored and efficiently retrieved, safeguarding sensitive information against unauthorized access and cyber threats.
                    </p>
                    <p>
                        <b>Support and Maintenance:</b> The ICT Unit provides essential technical support and maintenance for all IT-related infrastructure within the Regional Operations Division. This includes hardware, software, network systems, and databases, ensuring uninterrupted service and minimizing downtime.
                    </p>
                    <p>
                        <b>Innovation and Development:</b> By leveraging cutting-edge technologies, the ICT Unit spearheads innovative projects that enhance TESDA's service delivery. This includes developing web-based applications for monitoring and evaluation, online training modules, and other digital solutions that make TESDA's services more accessible and effective.
                    </p>
                    <p>
                        <b>Training and Capacity Building:</b> The ICT Unit also plays a role in capacity building by training TESDA staff in the use of new technologies and systems. This ensures that all personnel are equipped with the necessary skills to utilize ICT tools effectively, promoting a culture of continuous improvement and technological adeptness
                        <p>
                        <b>Team Members:</b> The ICT Unit is led by <b>Gerard Randolf G. Tecson</b>, who heads the unit with vision and innovation. His leadership ensures that the unit is always at the forefront of technological advancements, driving TESDA's digital transformation initiatives.
                        <br><br>
                        <b>Aljohn T. Rosales</b> and <b>Jan Kane T. Reroma</b>, as support staff, play crucial roles in the day-to-day operations of the ICT Unit. Their technical skills and commitment to excellence ensure that all systems run smoothly and efficiently. Their contributions are invaluable in maintaining the high standards of service that TESDA strives to provide.
                    </p>
                    <p>
                        Together, this team forms the backbone of the ICT Unit, ensuring that TESDA Regional Operations Division remains a leader in technical education and skills development through the effective use of technology.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional if you need JavaScript features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
