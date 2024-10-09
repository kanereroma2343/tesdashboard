<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTTC Guidelines</title>
    <link rel="icon" type="image/png" href="icons/nttcmis.png">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #000, #00008b, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
            overflow: hidden;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            max-width: 1400px; /* Adjusted width */
            width: 90%;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 1s forwards;
            position: relative;
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

        p, ul {
            line-height: 1.6;
            text-align: left;
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .navigation button {
            background-color: #00008b;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .navigation button:hover {
            background-color: #0000ff;
        }

        .page {
            display: none;
        }

        .page.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="icons/tlogo.png" alt="Logo 1">
            <img src="icons/blogo.png" alt="Logo 2">
        </div>

        <div id="page1" class="page active">
            <h1>Guidelines for the Processing and Issuance of National TVET Trainers Certificate (NTTC)</h1>
            <p>In the interest of the service and in line with the continuous improvement in the processing and issuance of the National TVET Trainers Certificate (NTTC), the following guidelines are hereby issued:</p>
            <h2>1. Receipt, Review, and Evaluation of NTTC Application Documents from the Applicant and Endorsement to the Regional Office (within 5 working days)</h2>
            <p>Upon receipt of the NTTC application documents, the PO TDU focal shall:</p>
            <ul>
                <li>Review/evaluate the correctness, completeness, and authenticity of the following requirements:
                    <ul>
                        <li>Completely filled out and signed Trainers Profile form with passport size, colored ID picture. For succeeding applications, a certified true copy of the previous application form is acceptable. However, for applicants with updated information, the original copy must be submitted.</li>
                        <li>Certified true copy by the Records Officer of the following:
                            <ul>
                                <li>National Certificate of the qualification/s being applied for</li>
                                <li>Trainers Methodology Certificate</li>
                                <li>Certificates of trainings and seminars attended as necessary</li>
                                <li>Certificate of Employment duly notarized by Notary Public</li>
                            </ul>
                        </li>
                        <li>For National Certificates (NCs) or Trainers Methodology Certificates (TMCs) issued outside of Region 7, the PO TDU Focal shall verify the validity of the certificate from the issuing Provincial Office and indicate in the applicant's certificate that such was verified and found valid.</li>
                        <li>COCIE as applicable</li>
                    </ul>
                </li>
                <li>Evaluate the authenticity of the submitted documents vis-à-vis the original copy presented by the applicant.</li>
                <li>Evaluate the correctness of the entries of the National Certificate/s and Trainers Methodology Certificates vis-à-vis the Training Regulation.</li>
                <li>For certificate/s with erroneous entries, the PO TDU Focal shall coordinate with the PO CAC Focal for the correction and replacement of the certificate/s prior to endorsement to the Regional Office.</li>
                <li>Ensure correctness and completeness of all requirements prior to endorsement to RO.</li>
                <li>Notify the applicant immediately if there are deficiencies in his/her documents.</li>
                <li>Prepare the Registry of NTTC Holders duly signed by the Provincial Director and submit the printed and soft copy to the Regional Office together with the supporting documents.</li>
                <li>Ensure compliance with related TESDA Circular numbers 20, S. 2014, TESDA Circular nos. 33, 50, and 51 series 2017.</li>
            </ul>
            <div class="navigation">
                <button id="nextBtn">Next</button>
            </div>
        </div>

        <div id="page2" class="page">
            <h2>2. Receipt, Evaluation of NTTC Application at the Regional Office, and Issuance of NTTCs (within 5 working days)</h2>
            <p>Upon receipt of the documents, the RO Focal shall:</p>
            <ul>
                <li>Evaluate the NTTC application documents and Registry of NTTC holders.</li>
                <li>Prepare the Acknowledgement Report of the received applications.</li>
                <li>Prepare the National TVET Trainers' Certificate for the applications with complete and correct requirements, for the Regional Director's approval.</li>
            </ul>
            <p>The Regional Director shall approve the issuance of NTTC.</p>
            <p>The NTTC/s shall be transmitted to the Provincial Office together with the Registry of NTTC Holders, while the applications with deficiencies will be returned.</p>
            <h2>3. Receipt, Evaluation of NTTC Application at the Regional Office, and Issuance of NTTCs (within 5 working days)</h2>               
            <p>The updated list of NTTC holders will be made available to the Provincial Offices not later than the 15th day of the following month.</p>

            <p>This order takes effect as indicated and rescinds any issuances inconsistent hereof.</p>
            <div class="navigation">
                <button id="prevBtn">Previous</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('nextBtn').addEventListener('click', function() {
            document.getElementById('page1').classList.remove('active');
            document.getElementById('page2').classList.add('active');
        });

        document.getElementById('prevBtn').addEventListener('click', function() {
            document.getElementById('page2').classList.remove('active');
            document.getElementById('page1').classList.add('active');
        });
    </script>
</body>
</html>
