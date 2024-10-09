<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer/Assessor's Profile Form</title>
    <link rel="stylesheet" href="tp.css">
</head>
<body>
    <div class="form-container">
        <h2>Technical Education and Skills Development Authority</h2>
        <h3>TRAINOR'S/ASSESSOR'S PROFILE</h3>

        <form action="#" method="post">
            <!-- 1. To be accomplished by TESDA -->
            <fieldset>
                <legend>1. To be accomplished by TESDA</legend>
                <label>NMIS Manpower Code:</label>
                <input type="text" name="nmis_code" maxlength="12">
                <label>NMIS Entry Date:</label>
                <input type="date" name="nmis_entry_date">
            </fieldset>

            <!-- 2. Manpower Profile -->
            <fieldset>
                <legend>2. Manpower Profile</legend>
                <label>Name:</label>
                <input type="text" name="last_name" placeholder="Last">
                <input type="text" name="first_name" placeholder="First">
                <input type="text" name="middle_name" placeholder="Middle">
                
                <label>Mailing Address:</label>
                <input type="text" name="address_number" placeholder="Number">
                <input type="text" name="address_street" placeholder="Street">
                <input type="text" name="address_barangay" placeholder="Barangay">
                <input type="text" name="address_district" placeholder="District">
                <input type="text" name="address_city" placeholder="City">
                <input type="text" name="address_province" placeholder="Province">
                <input type="text" name="address_zip" placeholder="Zip Code">
                
                <label>Sex:</label>
                <input type="radio" name="sex" value="male"> Male
                <input type="radio" name="sex" value="female"> Female
                
                <label>Civil Status:</label>
                <input type="radio" name="civil_status" value="single"> Single
                <input type="radio" name="civil_status" value="married"> Married
                <input type="radio" name="civil_status" value="widowed"> Widowed
                <input type="radio" name="civil_status" value="separated"> Separated

                <label>Contact Numbers:</label>
                <input type="text" name="contact_landline" placeholder="Landline">
                <input type="text" name="contact_mobile" placeholder="Mobile">
                <input type="email" name="contact_email" placeholder="Email">

                <label>Employment Type:</label>
                <input type="checkbox" name="employment_type" value="employed"> Employed
                <input type="checkbox" name="employment_type" value="self_employed"> Self-employed
                <input type="checkbox" name="employment_type" value="unemployed"> Unemployed

                <label>Employment Status:</label>
                <input type="radio" name="employment_status" value="permanent"> Permanent
                <input type="radio" name="employment_status" value="contractual"> Contractual
                <input type="radio" name="employment_status" value="casual"> Casual
            </fieldset>

            <!-- 3. Personal Information -->
            <fieldset>
                <legend>3. Personal Information</legend>
                <label>Birthdate:</label>
                <input type="date" name="birthdate">
                <label>Birthplace:</label>
                <input type="text" name="birthplace">
                <label>Citizenship:</label>
                <input type="text" name="citizenship">
                <label>Religion:</label>
                <input type="text" name="religion">
                <label>Height:</label>
                <input type="text" name="height">
                <label>Weight:</label>
                <input type="text" name="weight">
                <label>Distinguishing Marks:</label>
                <input type="text" name="marks">
                <label>SSS No.:</label>
                <input type="text" name="sss_no">
                <label>TIN No.:</label>
                <input type="text" name="tin_no">
            </fieldset>

            <!-- 4. Educational Background -->
            <fieldset>
                <legend>4. Educational Background</legend>
                <table>
                    <thead>
                        <tr>
                            <th>School</th>
                            <th>Education Level</th>
                            <th>School Year</th>
                            <th>Degree</th>
                            <th>Honors Received</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="school_1"></td>
                            <td><input type="text" name="education_level_1"></td>
                            <td><input type="text" name="school_year_1"></td>
                            <td><input type="text" name="degree_1"></td>
                            <td><input type="text" name="honors_1"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="school_2"></td>
                            <td><input type="text" name="education_level_2"></td>
                            <td><input type="text" name="school_year_2"></td>
                            <td><input type="text" name="degree_2"></td>
                            <td><input type="text" name="honors_2"></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>

            <!-- 5. Course Title (for TPIS, CACs) -->
            <fieldset>
                <legend>5. Course Title (for TPIS, CACs)</legend>
                <input type="text" name="course_title" placeholder="Course Title">
                <label>Schedule/Duration:</label>
                <input type="text" name="schedule_duration">
                <label>Aptitude Exam:</label>
                <input type="text" name="aptitude_exam">
            </fieldset>

            <div class="submit-section">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
