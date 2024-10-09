<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data from Section 1 to Section 11
    $nmis_code = $_POST['nmis_code'];
    $nmis_date = $_POST['nmis_date'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zip = $_POST['zip'];
    $sex = $_POST['sex'];
    $civil_status = $_POST['civil_status'];
    $contact_number = $_POST['contact_number'];
    $employment_type = $_POST['employment_type'];
    $employment_status = $_POST['employment_status'];
    $birthdate = $_POST['birthdate'];
    $birthplace = $_POST['birthplace'];
    $citizenship = $_POST['citizenship'];
    $religion = $_POST['religion'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $distinguishing_marks = $_POST['distinguishing_marks'];
    $sss_no = $_POST['sss_no'];
    $gsis_no = $_POST['gsis_no'];
    $tin_no = $_POST['tin_no'];

    // Educational Background
    $school = $_POST['school'];
    $level = $_POST['level'];
    $school_year = $_POST['school_year'];
    $degree = $_POST['degree'];
    $honors = $_POST['honors'];

    // Competency Assessment Information
    $comp_sector_component = $_POST['comp_sector_component'];
    $comp_trade_area = $_POST['comp_trade_area'];
    $comp_occupation = $_POST['comp_occupation'];
    $comp_classification = $_POST['comp_classification'];
    $comp_training_program = $_POST['comp_training_program'];
    $comp_program_sector = $_POST['comp_program_sector'];
    $client_type = $_POST['client_type'];

    // Work Experience
    $work_company = $_POST['work_company'];
    $work_position = $_POST['work_position'];
    $work_inclusive_dates = $_POST['work_inclusive_dates'];
    $work_monthly_salary = $_POST['work_monthly_salary'];
    $work_occupation_type = $_POST['work_occupation_type'];
    $work_status_of_appointment = $_POST['work_status_of_appointment'];

    // Training/Seminars Attended
    $training_title = $_POST['training_title'];
    $training_venue = $_POST['training_venue'];
    $training_inclusive_dates = $_POST['training_inclusive_dates'];
    $training_certificate = $_POST['training_certificate'];
    $training_base_category = $_POST['training_base_category'];
    $training_conducted_by = $_POST['training_conducted_by'];

    // Licenses and Exams Passed
    $license_title = $_POST['license_title'];
    $license_year_taken = $_POST['license_year_taken'];
    $license_examination_venue = $_POST['license_examination_venue'];
    $license_rating = $_POST['license_rating'];

    // Competency Assessment Passed
    $assessment_sector = $_POST['assessment_sector'];
    $assessment_trade_area = $_POST['assessment_trade_area'];
    $assessment_occupation = $_POST['assessment_occupation'];
    $assessment_classification = $_POST['assessment_classification'];
    $assessment_level = $_POST['assessment_level'];

    // Family Background
    $spouse_name = $_POST['spouse_name'];
    $spouse_occupation = $_POST['spouse_occupation'];
    $father_name = $_POST['father_name'];
    $father_occupation = $_POST['father_occupation'];
    $mother_name = $_POST['mother_name'];
    $mother_occupation = $_POST['mother_occupation'];

    // Database connection
    $conn = new mysqli('localhost', 'username', 'password', 'database');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the database
    $sql = "INSERT INTO trainers_assessors_profile 
            (nmis_code, nmis_date, last_name, first_name, middle_name, address, city, province, zip, sex, civil_status, contact_number, employment_type, employment_status, birthdate, birthplace, citizenship, religion, height, weight, distinguishing_marks, sss_no, gsis_no, tin_no, school, level, school_year, degree, honors, comp_sector_component, comp_trade_area, comp_occupation, comp_classification, comp_training_program, comp_program_sector, client_type, work_company, work_position, work_inclusive_dates, work_monthly_salary, work_occupation_type, work_status_of_appointment, training_title, training_venue, training_inclusive_dates, training_certificate, training_base_category, training_conducted_by, license_title, license_year_taken, license_examination_venue, license_rating, assessment_sector, assessment_trade_area, assessment_occupation, assessment_classification, assessment_level, spouse_name, spouse_occupation, father_name, father_occupation, mother_name, mother_occupation)
            VALUES ('$nmis_code', '$nmis_date', '$last_name', '$first_name', '$middle_name', '$address', '$city', '$province', '$zip', '$sex', '$civil_status', '$contact_number', '$employment_type', '$employment_status', '$birthdate', '$birthplace', '$citizenship', '$religion', '$height', '$weight', '$distinguishing_marks', '$sss_no', '$gsis_no', '$tin_no', '$school', '$level', '$school_year', '$degree', '$honors', '$comp_sector_component', '$comp_trade_area', '$comp_occupation', '$comp_classification', '$comp_training_program', '$comp_program_sector', '$client_type', '$work_company', '$work_position', '$work_inclusive_dates', '$work_monthly_salary', '$work_occupation_type', '$work_status_of_appointment', '$training_title', '$training_venue', '$training_inclusive_dates', '$training_certificate', '$training_base_category', '$training_conducted_by', '$license_title', '$license_year_taken', '$license_examination_venue', '$license_rating', '$assessment_sector', '$assessment_trade_area', '$assessment_occupation', '$assessment_classification', '$assessment_level', '$spouse_name', '$spouse_occupation', '$father_name', '$father_occupation', '$mother_name', '$mother_occupation')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Form submitted successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainers Assessors Application Form</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h2, h3 {
            text-align: center;
            color: #333;
        }

        .form-section {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

    <script>
        function validateForm() {
            const lastName = document.getElementById('last_name').value;
            const firstName = document.getElementById('first_name').value;
            if (!lastName || !firstName) {
                alert('Please fill in your last and first name.');
                return false;  // Prevent form submission
            }
            return true;  // Allow form submission
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h2>Trainers/Assessors Profile</h2>
        
        <form action="" method="POST" onsubmit="return validateForm();">
            <!-- NMIS Information -->
            <div class="form-section">
                <h3>1. To be accomplished by TESDA</h3>
                <label for="nmis_code">1.1 NMIS Manpower Code:</label>
                <input type="text" id="nmis_code" name="nmis_code">

                <label for="nmis_date">1.2 NMIS Entry Date:</label>
                <input type="date" id="nmis_date" name="nmis_date">
            </div>

            <!-- Manpower Profile -->
            <div class="form-section">
                <h3>2. Manpower Profile</h3>
                <label for="last_name">2.1 Name (Last):</label>
                <input type="text" id="last_name" name="last_name" required>
                
                <label for="first_name">First:</label>
                <input type="text" id="first_name" name="first_name" required>

                <label for="middle_name">Middle:</label>
                <input type="text" id="middle_name" name="middle_name">

                <label for="address">2.2 Mailing Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>

                <label for="province">Province:</label>
                <input type="text" id="province" name="province" required>

                <label for="zip">Zip Code:</label>
                <input type="text" id="zip" name="zip">

                <label for="sex">2.3 Sex:</label>
                <select id="sex" name="sex">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>

                <label for="civil_status">2.4 Civil Status:</label>
                <select id="civil_status" name="civil_status">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="widowed">Widowed</option>
                    <option value="separated">Separated</option>
                </select>

                <label for="contact_number">2.5 Contact Number(s):</label>
                <input type="text" id="contact_number" name="contact_number" required>

                <label for="employment_type">2.6 Employment Type:</label>
                <select id="employment_type" name="employment_type">
                    <option value="employed">Employed</option>
                    <option value="self_employed">Self-employed</option>
                    <option value="unemployed">Unemployed</option>
                </select>

                <label for="employment_status">2.7 Employment Status:</label>
                <select id="employment_status" name="employment_status">
                    <option value="casual">Casual</option>
                    <option value="regular">Regular</option>
                    <option value="contractual">Contractual</option>
                </select>
            </div>

            <!-- Personal Information -->
            <div class="form-section">
                <h3>3. Personal Information</h3>
                <label for="birthdate">3.1 Birthdate:</label>
                <input type="date" id="birthdate" name="birthdate" required>

                <label for="birthplace">3.2 Birth Place:</label>
                <input type="text" id="birthplace" name="birthplace">

                <label for="citizenship">3.3 Citizenship:</label>
                <input type="text" id="citizenship" name="citizenship">

                <label for="religion">3.4 Religion:</label>
                <input type="text" id="religion" name="religion">

                <label for="height">3.5 Height (cm):</label>
                <input type="text" id="height" name="height">

                <label for="weight">3.6 Weight (kg):</label>
                <input type="text" id="weight" name="weight">

                <label for="distinguishing_marks">3.11 Distinguishing Marks:</label>
                <input type="text" id="distinguishing_marks" name="distinguishing_marks">

                <label for="sss_no">3.8 SSS No.:</label>
                <input type="text" id="sss_no" name="sss_no">

                <label for="gsis_no">3.9 GSIS No.:</label>
                <input type="text" id="gsis_no" name="gsis_no">

                <label for="tin_no">3.10 TIN No.:</label>
                <input type="text" id="tin_no" name="tin_no">
            </div>

            <!-- Educational Background -->
            <div class="form-section">
                <h3>4. Educational Background</h3>
                <label for="school">4.1 School:</label>
                <input type="text" id="school" name="school">

                <label for="level">4.2 Educational Level:</label>
                <input type="text" id="level" name="level">

                <label for="school_year">4.3 School Year:</label>
                <input type="text" id="school_year" name="school_year">

                <label for="degree">4.4 Degree:</label>
                <input type="text" id="degree" name="degree">

                <label for="honors">4.5 Honors Received:</label>
                <input type="text" id="honors" name="honors">
            </div>

            <!-- Competency Assessment -->
            <div class="form-section">
                <h3>5. Competency Assessment</h3>
                <label for="comp_sector_component">5.1 Sector Component:</label>
                <input type="text" id="comp_sector_component" name="comp_sector_component">

                <label for="comp_trade_area">5.2 Trade Area:</label>
                <input type="text" id="comp_trade_area" name="comp_trade_area">

                <label for="comp_occupation">5.3 Occupation:</label>
                <input type="text" id="comp_occupation" name="comp_occupation">

                <label for="comp_classification">5.4 Classification:</label>
                <input type="text" id="comp_classification" name="comp_classification">

                <label for="comp_training_program">5.5 Training Program:</label>
                <input type="text" id="comp_training_program" name="comp_training_program">

                <label for="comp_program_sector">5.6 Program Sector:</label>
                <input type="text" id="comp_program_sector" name="comp_program_sector">

                <label for="client_type">5.7 Client Type:</label>
                <input type="text" id="client_type" name="client_type">
            </div>

            <!-- Work Experience -->
            <div class="form-section">
                <h3>6. Work Experience</h3>
                <label for="work_company">6.1 Company Name:</label>
                <input type="text" id="work_company" name="work_company">

                <label for="work_position">6.2 Position:</label>
                <input type="text" id="work_position" name="work_position">

                <label for="work_inclusive_dates">6.3 Inclusive Dates:</label>
                <input type="text" id="work_inclusive_dates" name="work_inclusive_dates">

                <label for="work_monthly_salary">6.4 Monthly Salary:</label>
                <input type="text" id="work_monthly_salary" name="work_monthly_salary">

                <label for="work_occupation_type">6.5 Occupation Type:</label>
                <input type="text" id="work_occupation_type" name="work_occupation_type">

                <label for="work_status_of_appointment">6.6 Status of Appointment:</label>
                <input type="text" id="work_status_of_appointment" name="work_status_of_appointment">
            </div>

            <!-- Training/Seminars Attended -->
            <div class="form-section">
                <h3>7. Training/Seminars Attended</h3>
                <label for="training_title">7.1 Title:</label>
                <input type="text" id="training_title" name="training_title">

                <label for="training_venue">7.2 Venue:</label>
                <input type="text" id="training_venue" name="training_venue">

                <label for="training_inclusive_dates">7.3 Inclusive Dates:</label>
                <input type="text" id="training_inclusive_dates" name="training_inclusive_dates">

                <label for="training_certificate">7.4 Certificate Received:</label>
                <input type="text" id="training_certificate" name="training_certificate">

                <label for="training_base_category">7.5 Training Base Category:</label>
                <input type="text" id="training_base_category" name="training_base_category">

                <label for="training_conducted_by">7.6 Conducted By:</label>
                <input type="text" id="training_conducted_by" name="training_conducted_by">
            </div>

            <!-- Licenses Passed -->
            <div class="form-section">
                <h3>8. Licenses/Examinations Passed</h3>
                <label for="license_title">8.1 Title:</label>
                <input type="text" id="license_title" name="license_title">

                <label for="license_year_taken">8.2 Year Taken:</label>
                <input type="text" id="license_year_taken" name="license_year_taken">

                <label for="license_examination_venue">8.3 Examination Venue:</label>
                <input type="text" id="license_examination_venue" name="license_examination_venue">

                <label for="license_rating">8.4 Rating:</label>
                <input type="text" id="license_rating" name="license_rating">
            </div>

            <!-- Competency Assessment Passed -->
            <div class="form-section">
                <h3>9. Competency Assessment Passed</h3>
                <label for="assessment_sector">9.1 Sector:</label>
                <input type="text" id="assessment_sector" name="assessment_sector">

                <label for="assessment_trade_area">9.2 Trade Area:</label>
                <input type="text" id="assessment_trade_area" name="assessment_trade_area">

                <label for="assessment_occupation">9.3 Occupation:</label>
                <input type="text" id="assessment_occupation" name="assessment_occupation">

                <label for="assessment_classification">9.4 Classification:</label>
                <input type="text" id="assessment_classification" name="assessment_classification">

                <label for="assessment_level">9.5 Level:</label>
                <input type="text" id="assessment_level" name="assessment_level">
            </div>

            <!-- Family Background -->
            <div class="form-section">
                <h3>11. Family Background</h3>
                <label for="spouse_name">11.1 Spouse's Name:</label>
                <input type="text" id="spouse_name" name="spouse_name">

                <label for="spouse_occupation">11.3 Spouse's Occupation:</label>
                <input type="text" id="spouse_occupation" name="spouse_occupation">

                <label for="father_name">11.5 Father's Name:</label>
                <input type="text" id="father_name" name="father_name">

                <label for="father_occupation">11.7 Father's Occupation:</label>
                <input type="text" id="father_occupation" name="father_occupation">

                <label for="mother_name">11.9 Mother's Name:</label>
                <input type="text" id="mother_name" name="mother_name">

                <label for="mother_occupation">11.11 Mother's Occupation:</label>
                <input type="text" id="mother_occupation" name="mother_occupation">
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
