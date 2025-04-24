<?php
// Database connection settings

include '../../models/database.php';
$database = new Database();
$db = $database->getConnection();


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST['title'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $reference = $_POST['reference'];
    $degree = $_POST['degree'];
    $school = $_POST['school'];
    $year_of_study = $_POST['year_of_study'];
    $major = $_POST['major'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $skill_name = $_POST['skill_name'];
    $years_of_experience = $_POST['years_of_experience'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $company_name = $_POST['company_name'];
    $position = $_POST['position'];
    $auth_flag = isset($_POST['authorize_viewer']) ? true:false;
    // SQL query to insert data into the database
    $sql = "INSERT INTO cv (
        title, name, gender, phone_number, email, reference,
        degree, school, year_of_study, major, address, city, country,
        skill_name, years_of_experience, start_date, end_date, company_name, position,auth_viewer_only
    ) VALUES (
        :title, :name, :gender, :phone_number, :email, :reference,
        :degree, :school, :year_of_study, :major, :address, :city, :country,
        :skill_name, :years_of_experience, :start_date, :end_date, :company_name, :position ,:auth_viewer_only
    )";

    // Prepare and bind the SQL statement
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':gender', $_POST['gender']);
    $stmt->bindParam(':phone_number', $_POST['phone_number']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':reference', $_POST['reference']);
    $stmt->bindParam(':degree', $_POST['degree']);
    $stmt->bindParam(':school', $_POST['school']);
    $stmt->bindParam(':year_of_study', $_POST['year_of_study'], PDO::PARAM_INT);
    $stmt->bindParam(':major', $_POST['major']);
    $stmt->bindParam(':address', $_POST['address']);
    $stmt->bindParam(':city', $_POST['city']);
    $stmt->bindParam(':country', $_POST['country']);
    $stmt->bindParam(':skill_name', $_POST['skill_name']);
    $stmt->bindParam(':years_of_experience', $_POST['years_of_experience'], PDO::PARAM_INT);
    $stmt->bindParam(':start_date', $_POST['start_date']);
    $stmt->bindParam(':end_date', $_POST['end_date']);
    $stmt->bindParam(':company_name', $_POST['company_name']);
    $stmt->bindParam(':position', $_POST['position']);
    $stmt->bindParam(':auth_viewer_only',$auth_flag);
    // Execute the statement
    if ($stmt->execute()) {
        echo "CV submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $conn = null;
    
}

// Get form data

?>
