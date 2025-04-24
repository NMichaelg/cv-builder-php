
<div class="container mt-5">
    <div class="bg-white p-5 rounded shadow">
        <h1 class="text-center mb-4">CV of <span id="cv-name"></span></h1>

        <!-- Personal Information Section -->
        <h3>Personal Information</h3>
        <div class="row mb-4">
            <div class="col-md-6">
                <p><strong>Title:</strong> <span id="cv-title"></span></p>
                <p><strong>Name:</strong> <span id="cv-name-display"></span></p>
                <p><strong>Gender:</strong> <span id="cv-gender"></span></p>
                <p><strong>Phone Number:</strong> <span id="cv-phone"></span></p>
            </div>
            <div class="col-md-6">
                <p><strong>Email:</strong> <span id="cv-email"></span></p>
                <p><strong>Reference:</strong> <span id="cv-reference"></span></p>
                <p><strong>Address:</strong> <span id="cv-address"></span>, <span id="cv-city"></span>, <span id="cv-country"></span></p>
            </div>
        </div>

        <!-- Education Section -->
        <h3>Education</h3>
        <div class="row mb-4">
            <div class="col-md-6">
                <p><strong>Degree:</strong> <span id="cv-degree"></span></p>
                <p><strong>School:</strong> <span id="cv-school"></span></p>
            </div>
            <div class="col-md-6">
                <p><strong>Year of Study:</strong> <span id="cv-year"></span></p>
                <p><strong>Major:</strong> <span id="cv-major"></span></p>
            </div>
        </div>

        <!-- Skills Section -->
        <h3>Skills</h3>
        <div class="row mb-4">
            <div class="col-md-6">
                <p><strong>Skill Name:</strong> <span id="cv-skill-name"></span></p>
            </div>
            <div class="col-md-6">
                <p><strong>Years of Experience:</strong> <span id="cv-experience"></span></p>
            </div>
        </div>

        <!-- Work History Section -->
        <h3>Work History</h3>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Company Name:</strong> <span id="cv-company"></span></p>
                <p><strong>Position:</strong> <span id="cv-position"></span></p>
            </div>
            <div class="col-md-6">
                <p><strong>Start Date:</strong> <span id="cv-start-date"></span></p>
                <p><strong>End Date:</strong> <span id="cv-end-date"></span></p>
            </div>
        </div>
    </div>
</div>
<script>
    var cv_id = 5;
    document.addEventListener('DOMContentLoaded', function () {
        // Fetch the CV data from the PHP file
        fetch('models/get_cv_info.php?cv_id='+cv_id)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch CV data');
                }
                return response.json();
            })
            .then(cvData => {
                // Populate the fields dynamically
                document.getElementById("cv-name").textContent = cvData.name;
                document.getElementById("cv-title").textContent = cvData.title;
                document.getElementById("cv-name-display").textContent = cvData.name;
                document.getElementById("cv-gender").textContent = cvData.gender;
                document.getElementById("cv-phone").textContent = cvData.phone_number;
                document.getElementById("cv-email").textContent = cvData.email;
                document.getElementById("cv-reference").textContent = cvData.reference;
                document.getElementById("cv-address").textContent = cvData.address;
                document.getElementById("cv-city").textContent = cvData.city;
                document.getElementById("cv-country").textContent = cvData.country;

                document.getElementById("cv-degree").textContent = cvData.degree;
                document.getElementById("cv-school").textContent = cvData.school;
                document.getElementById("cv-year").textContent = cvData.year_of_study;
                document.getElementById("cv-major").textContent = cvData.major;

                document.getElementById("cv-skill-name").textContent = cvData.skill_name;
                document.getElementById("cv-experience").textContent = cvData.years_of_experience;

                document.getElementById("cv-company").textContent = cvData.company_name;
                document.getElementById("cv-position").textContent = cvData.position;
                document.getElementById("cv-start-date").textContent = cvData.start_date;
                document.getElementById("cv-end-date").textContent = cvData.end_date;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
