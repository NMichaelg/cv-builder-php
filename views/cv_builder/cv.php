<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Resume Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- custom css -->
        <style><?php include "style.css" ?></style>
        </head>
        <body>
        <section id = "about-sc" class = "">
            <div class = "container">
                <div class = "about-cnt">
                    <form action="" class="cv-form" id = "cv-form">
                        <div class = "cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>objectives</h3>
                            </div>
                            <div class = "">
                                <textarea class="objectives-text">

                                </textarea>
                            </div>
                        </div>

                        <div class = "cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>about section</h3>
                            </div>
                            <div class = "cv-form-row cv-form-row-about">
                                <div class = "cols-3">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">First Name</label>
                                        <input name = "fname" type = "text" class = "form-control fname" id = "" onkeyup="handleKeyUp(event)" placeholder="e.g. Anh">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Middle Name <span class = "opt-text">(optional)</span></label>
                                        <input name = "mname" type = "text" class = "form-control mname" id = "" onkeyup="generateCV()" placeholder="e.g. Van">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Last Name</label>
                                        <input name = "lname" type = "text" class = "form-control lname" id = "" onkeyup="generateCV()" placeholder="e.g. Nguyen">
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class="cols-3">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Your Image</label>
                                        <input name = "image" type = "file" class = "form-control image" id = "" accept = "image/*" onchange="previewImage()">
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Email</label>
                                        <input name = "email" type = "text" class = "form-control email" id = "" onkeyup="generateCV()" placeholder="e.g. johndoe@gmail.com">
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div >
                                    <label for = "" class = "form-label" style="display: flex; justify-content: space-between;">Phone No:</label>
                                    <div class = "row-separator repeater">
                                        <div class = "repeater" data-repeater-list = "group-f" style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px;">
                                            <div data-repeater-item>
                                                <div class = "cv-form-row" >
                                                    <div class = "form-elem" data-repeater-item>
                                                
                                                        <input name = "phone" type = "text" class = "form-control phone" id = "" onkeyup="generateCV()" placeholder="e.g. 456-768-798, 567.654.002">
                                                        <span class="form-text"></span>
                                                    </div>
                                                    <button data-repeater-delete type = "button" class = "repeater-remove-btn" group="group-e" style="top:5px; right:5px;">-</button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn" group="group-f">+</button>
                                    </div>
                                    
                                </div>

                                <div >
                                    <label for = "" class = "form-label" style="display: flex; justify-content: space-between;">Address: </label>
                                    <div class = "row-separator repeater">
                                        <div class = "repeater" data-repeater-list = "group-g">
                                            <div data-repeater-item>
                                                <div class = "cv-form-row" >
                                                    <div class="address-container" style="width: 100%;">
                                                        
                                                        <div class = "form-elem cols-3">
                                                            <select name="country" id="country" class="country" onchange="generateCV()">
                                                                <option value="">-- Select Country --</option>
                                                            </select>
                                                            <select name="" id="city" class="city" onchange="generateCV()">
                                                                <option value="">-- Select City (Province) --</option>
                                                            </select>
                                                            <input name="street" type="text" class="form-control street" id="" onkeyup="generateCV()" placeholder="e.g. 268 Ly Thuong Kiet Street"/>
                                                        </div>
                                                    </div>
                                                    <button data-repeater-delete type = "button" class = "repeater-remove-btn" group="group-g" style="top:5px; right:5px;">-</button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn" group="group-g">+</button>
                                    </div>
                                    
                                </div>

                                
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>achievements</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-a">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-achievement">
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Title</label>
                                                    <input name = "achieve_title" type = "text" class = "form-control achieve_title" id = "" onkeyup="generateCV()" placeholder="e.g. Competition, Contest">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "achieve_description" type = "text" class = "form-control achieve_description" id = "" onkeyup="generateCV()" placeholder="e.g. place, year, content">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn" group="group-a">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn" group="group-a">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>experience</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-b">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Title</label>
                                                    <input name = "exp_title" type = "text" class = "form-control exp_title" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Company / Organization</label>
                                                    <input name = "exp_organization" type = "text" class = "form-control exp_organization" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Location</label>
                                                    <input name = "exp_location" type = "text" class = "form-control exp_location" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Start Date</label>
                                                    <input name = "exp_start_date" type = "date" class = "form-control exp_start_date" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">End Date</label>
                                                    <input name = "exp_end_date" type = "date" class = "form-control exp_end_date" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "exp_description" type = "text" class = "form-control exp_description" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn" group="group-b">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn" group="group-b">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>education</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-c">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">School</label>
                                                    <input name = "edu_school" type = "text" class = "form-control edu_school" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Degree</label>
                                                    <input name = "edu_degree" type = "text" class = "form-control edu_degree" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Year</label>
                                                    <input name = "edu_city" type = "text" class = "form-control edu_city" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Specialization</label>
                                                    <input name = "edu_major" type = "text" class = "form-control edu_major" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "edu_description" type = "text" class = "form-control edu_description" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn" group="group-c">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn" group="group-c">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>projects</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-d">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Project Name</label>
                                                    <input name = "proj_title" type = "text" class = "form-control proj_title" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Project link</label>
                                                    <input name = "proj_link" type = "text" class = "form-control proj_link" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "proj_description" type = "text" class = "form-control proj_description" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn" group="group-d">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn" group="group-d">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>skills</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-e">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-skills">
                                            <div class = "form-elem">
                                                <label for = "" class = "form-label">Skill</label>
                                                <input name = "skill" type = "text" class = "form-control skill" id = "" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            <div class = "form-elem">
                                                <label for = "" class = "form-label">Year</label>
                                                <input name = "skill_year" type = "text" class = "form-control skill" id = "" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn" group="group-e">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn" group="group-e">+</button>
                            </div>
                        </div>
                        <div class = "container">
                            <button type = "button" class = "print-btn btn btn-primary" onclick="submit_cv()">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section id = "preview-sc" class = "print_area">
            <div class = "container">
                <div class = "preview-cnt">
                    <div class = "preview-cnt-l bg-green text-white">
                        <div class = "preview-blk">
                            <div class = "preview-image">
                                <img src = "" alt = "" id = "image"> 
                            </div>
                            <div class = "preview-item preview-item-name">
                                <span class = "preview-item-val fw-6" id = "fullname"></span>
                            </div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>about</h3>
                            </div>
                            <div class = "preview-blk-list">
                                <div class = "preview-item">
                                    <p>Phone: </p>
                                    <div class = "preview-item-val" id = "phone"></div>
                                </div>
                                <div class = "preview-item emailShow" >
                                    <span>Email: </span><span class = "preview-item-val" id = "email"></span>
                                </div>
                                <div class = "preview-item">
                                    <div class = "preview-item-val" id = "address"></div>
                                </div>
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "summary"></span>
                                </div>
                            </div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>skills</h3>
                            </div>
                            <div class = "skills-items preview-blk-list" id = "skills">
                                <!-- skills list here -->
                            </div>
                        </div>
                    </div>

                    <div class = "preview-cnt-r bg-white">
                         <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>Objectives</h3>
                            </div>
                            <div class = "achievements-items preview-blk-list" id = "achievements"></div>
                        </div>
                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>Achievements</h3>
                            </div>
                            <div class = "achievements-items preview-blk-list" id = "achievements"></div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>educations</h3>
                            </div>
                            <div class = "educations-items preview-blk-list" id = "educations"></div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>experiences</h3>
                            </div>
                            <div class = "experiences-items preview-blk-list" id = "experiences"></div>
                        </div>
                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>projects</h3>
                            </div>
                            <div class = "projects-items preview-blk-list" id = "projects"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class = "print-btn-sc">
            <div class = "container">
                <button type = "button" class = "print-btn btn btn-primary" onclick="printCV()">Print CV</button>
            </div>
        </section>
    <script><?php include "script.js" ?></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
         const geonamesUsername = "xitrumbumbum"; 
        async function fetchCountries() {
            document.getElementById('country').disabled = false;
            document.getElementById('city').disabled = true;
            const response = await fetch(`http://api.geonames.org/countryInfoJSON?username=${geonamesUsername}`);
            const data = await response.json();
            const countries = data.geonames;

            const countrySelect = document.getElementById("country");
            countries.forEach(country => {
                const option = document.createElement("option");
                option.value = country.countryCode;
                option.textContent = country.countryName;
                countrySelect.appendChild(option);
            });

            countrySelect.addEventListener("change", (e) => fetchStates(e.target.value));
        }
        async function fetchStates(countryCode) {
            document.getElementById('city').disabled = false;
            const citySelect = document.getElementById("city");

            citySelect.innerHTML = "<option value=''>-- Select City --</option>";  

            if (!countryCode) return; 

            const response = await fetch(`http://api.geonames.org/searchJSON?country=${countryCode}&featureClass=A&featureCode=ADM1&username=${geonamesUsername}`);
            const data = await response.json();
            const cities = data.geonames;

            cities.forEach(state => {
                const option = document.createElement("option");
                option.value = state.geonameId;
                option.textContent = state.name;
                citySelect.appendChild(option);
            });
        }
        document.addEventListener('DOMContentLoaded', function () {
            fetchCountries();
            ['group-a','group-b','group-c','group-d','group-e','group-f','group-g'].forEach(group=>{
                initialize_repeater(group)
            })
        })
        function initialize_repeater(group){
            const repeaterContainer = document.querySelector(`[data-repeater-list="${group}"]`);
            const repeaterTemplate = repeaterContainer.querySelector('[data-repeater-item]');
            const addButton = document.querySelector(`[data-repeater-create][group="${group}"]`);
            const isFirstItemUndeletable = true;

            function addRepeaterItem() {
                const newItem = repeaterTemplate.cloneNode(true); 
                const deleteButton = newItem.querySelector('[data-repeater-delete]');

             
                newItem.querySelectorAll('input').forEach(input => input.value = '');

            
                deleteButton.addEventListener('click', function () {
                    removeRepeaterItem(newItem);
                });

           
                repeaterContainer.appendChild(newItem);
                newItem.style.display = 'none'; 
                setTimeout(() => {
                    newItem.style.display = ''; 
                }, 100);
            }

            function removeRepeaterItem(item) {
                if (isFirstItemUndeletable && repeaterContainer.children.length === 1) return;
                item.style.opacity = '0'; 
                setTimeout(() => {
                    item.remove();
                    generateCV();
                }, 500); 
            }

    
            addButton.addEventListener('click', addRepeaterItem);


            const initialDeleteButton = repeaterTemplate.querySelector('[data-repeater-delete]');
            if (initialDeleteButton) {
                initialDeleteButton.addEventListener('click', function () {
                    removeRepeaterItem(repeaterTemplate);
                });
            }
        }
        function handleKeyUp(e) {
    console.log(e.target.value);
    generateCV();
}
    </script>
    
    </body>
</html>