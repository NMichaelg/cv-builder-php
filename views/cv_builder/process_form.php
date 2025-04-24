<?php
// Enable error reporting for debugging (optional)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
include '../../config/database.php';
$database = new Database();
$db = $database->getConnection();

try {
    // Read the raw POST data from the Ajax request
    $data = json_decode(file_get_contents("php://input"), true);
    
    if ($data) {
        // Extract the data
        $user_id = $_SESSION['user_id'] ;
        if isset($_SESSION['user_id'])!{
            throw new Exception("Invalid user_id");
        }
        $firstname = $data['firstname'];
        $middlename = $data['middlename'];
        $lastname = $data['lastname'];
        $email = $data['email'];
        $phone = $data['phone']; // Array of phones
        $address = $data['address']; // Array of addresses
        $achievements = $data['achievements']; // Array of achievements
        $experiences = $data['experiences']; // Array of experiences
        $educations = $data['educations']; // Array of educations
        $projects = $data['projects']; // Array of projects
        $skills = $data['skills']; // Array of skills

        // Start a transaction to handle multiple inserts
        $db->beginTransaction();

        // Insert into user_cv (assuming 'id' of 1 for simplicity, adjust according to your application)
        $stmt = $db->prepare("INSERT INTO user_cv (id, fname, mname, lname, email) VALUES (:id, :fname, :mname, :lname, :email)");
        $stmt->execute([
            ':id' => $user_id, // Replace with the actual user id or fetch dynamically
            ':fname' => $firstname,
            ':mname' => $middlename,
            ':lname' => $lastname,
            ':email' => $email
        ]);

        // Insert into user_address
        foreach ($address as $addr) {
            $stmt = $db->prepare("INSERT INTO user_address (id, country, city, street) VALUES (:id, :country, :city, :street)");
            $stmt->execute([
                ':id' => $user_id, // Replace with actual user id
                ':country' => $addr['country'],
                ':city' => $addr['city'],
                ':street' => $addr['street']
            ]);
        }

        // Insert into user_phone
        foreach ($phone as $ph) {
            $stmt = $db->prepare("INSERT INTO user_phone (id, phone) VALUES (:id, :phone)");
            $stmt->execute([
                ':id' => $user_id, // Replace with actual user id
                ':phone' => $ph['phone']
            ]);
        }

        // Insert into user_achievement
        foreach ($achievements as $ach) {
            $stmt = $db->prepare("INSERT INTO user_achievement (id, title, description) VALUES (:id, :title, :description)");
            $stmt->execute([
                ':id' => $user_id, // Replace with actual user id
                ':title' => $ach['achieve_title'],
                ':description' => $ach['achieve_description']
            ]);
        }

        // Insert into user_experience
        foreach ($experiences as $exp) {
            $stmt = $db->prepare("INSERT INTO user_experience (id, title, company, location, start_date, end_date, description) VALUES (:id, :title, :company, :location, :start_date, :end_date, :description)");
            $stmt->execute([
                ':id' => $user_id, // Replace with actual user id
                ':title' => $exp['exp_title'],
                ':company' => $exp['exp_organization'],
                ':location' => $exp['exp_location'],
                ':start_date' => $exp['exp_start_date'],
                ':end_date' => $exp['exp_end_date'],
                ':description' => $exp['exp_description']
            ]);
        }

        // Insert into user_education
        foreach ($educations as $edu) {
            $stmt = $db->prepare("INSERT INTO user_education (id, school, degree, year, specialization, description) VALUES (:id, :school, :degree, :year, :specialization, :description)");
            $stmt->execute([
                ':id' => $user_id, // Replace with actual user id
                ':school' => $edu['edu_school'],
                ':degree' => $edu['edu_degree'],
                ':year' => $edu['edu_start_date'], // Assuming the start date as the year
                ':specialization' => $edu['edu_city'], // Assuming city as specialization, adjust if needed
                ':description' => $edu['edu_description']
            ]);
        }

        // Insert into user_project
        foreach ($projects as $proj) {
            $stmt = $db->prepare("INSERT INTO user_project (id, pname, plink, description) VALUES (:id, :pname, :plink, :description)");
            $stmt->execute([
                ':id' => $user_id, // Replace with actual user id
                ':pname' => $proj['proj_title'],
                ':plink' => $proj['proj_link'],
                ':description' => $proj['proj_description']
            ]);
        }

        // Insert into user_skill
        foreach ($skills as $skill) {
            $stmt = $db->prepare("INSERT INTO user_skill (id, skill, year) VALUES (:id, :skill, :year)");
            $stmt->execute([
                ':id' => $user_id, // Replace with actual user id
                ':skill' => $skill['skill'],
                ':year' => $skill['skill_year']
            ]);
        }

        // Commit the transaction
        $db->commit();

        // Respond with a success message
        echo json_encode([
            'status' => 'success',
            'message' => 'Form data saved successfully.',
        ]);
    } else {
        // Handle errors (e.g., invalid JSON or missing data)
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid data received.',
        ]);
    }
} catch (PDOException $e) {
    // Handle database connection or query errors
    $db->rollBack();
    echo json_encode([
        'status' => 'error',
        'message' => 'Database error: ' . $e->getMessage(),
    ]);
}
?>
