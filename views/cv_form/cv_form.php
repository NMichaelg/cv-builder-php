<div class="container mt-5  ">
    <h1 class="text-center ">Create Your CV</h1>
    <hr>
    <form action="views/cv_form/cv_submit.php"  method="POST">
        <!-- CV Information Section -->
<div class = "d-flex gap-5 flex-row justify-content-center">
    <div>
        <h3> Personal info </h3>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="reference" class="form-label">Reference</label>
            <textarea class="form-control" id="reference" name="reference" rows="3"></textarea>
        </div>
    </div>
    <div class = "vr"></div>
        <!-- Education Section -->
    <div>
        <h3>Education</h3>
        <div class="mb-3">
            <label for="degree" class="form-label">Degree</label>
            <input type="text" class="form-control" id="degree" name="degree" required>
        </div>
        <div class="mb-3">
            <label for="school" class="form-label">School</label>
            <input type="text" class="form-control" id="school" name="school" required>
        </div>
        <div class="mb-3">
            <label for="year_of_study" class="form-label">Year of Study</label>
            <input type="number" class="form-control" id="year_of_study" name="year_of_study" required>
        </div>
        <div class="mb-3">
            <label for="major" class="form-label">Major</label>
            <input type="text" class="form-control" id="major" name="major" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country" required>
        </div>
    </div>
    <div class = "vr"></div>
        <!-- Professional Experience Section -->
    <div>
        <h3>Professional Experience</h3>
        <div class="mb-3">
            <label for="skill_name" class="form-label">Skill Name</label>
            <input type="text" class="form-control" id="skill_name" name="skill_name" required>
        </div>
        <div class="mb-3">
            <label for="years_of_experience" class="form-label">Years of Experience</label>
            <input type="number" class="form-control" id="years_of_experience" name="years_of_experience" required>
        </div>

        <!-- Work History Section -->
        <h3>Work History</h3>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name" required>
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control" id="position" name="position" required>
        </div>
        <div class="form-check my-4">
            <input class="form-check-input" type="checkbox" id="authorize_viewer" name="authorize_viewer" >
            <label class="form-check-label" for="authorize_viewer">
                Only authorized viewers can access this CV.
            </label>
        </div>
    </div>
</div>
        <!-- Submit Button -->
        <div class="text-center m-5 ">
            <button type="submit" class="btn btn-primary">Submit CV</button>
        </div>
    </form>
</div>
