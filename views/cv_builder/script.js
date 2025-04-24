const strRegex = /^[a-zA-Z\s]*$/
const emailRegex =
  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im
const digitRegex = /^\d+$/
const form = document.getElementById("cv-form")

let {
  fname: fnameInput,
  mname: mnameInput,
  lname: lnameInput,
  image: image,
  email: email,
} = form

let nameShow = document.getElementById("fullname"),
  imageShow = document.getElementById("image"),
  phoneShow = document.getElementById("phone"),
  emailShow = document.getElementById("email"),
  addressShow = document.getElementById("address"),
  projectsShow = document.getElementById("projects"),
  achievementsShow = document.getElementById("achievements"),
  skillsShow = document.getElementById("skills"),
  educationsShow = document.getElementById("educations"),
  experiencesShow = document.getElementById("experiences")

// helper functions 

const getInputs = ()=>{
    let achievementsTitle = document.querySelectorAll(".achieve_title"),
      achievementsDescription = document.querySelectorAll(
        ".achieve_description"
      )
    let expTitle = document.querySelectorAll(".exp_title"),
      expOrganization = document.querySelectorAll(".exp_organization"),
      expLocation= document.querySelectorAll(".exp_location"),
      expStartDate = document.querySelectorAll(".exp_start_date"),
      expEndDate = document.querySelectorAll(".exp_end_date"),
      expDescription = document.querySelectorAll(".exp_description")

    let eduSchool = document.querySelectorAll(".edu_school"),
      eduDegree = document.querySelectorAll(".edu_degree"),
      eduCity = document.querySelectorAll(".edu_city"),
      eduStartDate = document.querySelectorAll(".edu_start_date"),
      eduGraduationDate = document.querySelectorAll(".edu_graduation_date"),
      eduDescription = document.querySelectorAll(".edu_description")
    
    let projTitle = document.querySelectorAll(".proj_title"),
        projLink = document.querySelectorAll(".proj_link"),
        projDescription = document.querySelectorAll(".proj_description")

    let skill = document.querySelectorAll(".skill"),
      skillYear = document.querySelectorAll(".skill_year")

    let phone = document.querySelectorAll(".phone")

    let countries = document.querySelectorAll(".country"),
      cities = document.querySelectorAll(".city"),
      streets = document.querySelectorAll(".street")

    fnameInput.addEventListener("keyup", (e) =>
      validInput(e.target, "text", "First Name")
    )
    mnameInput.addEventListener("keyup", (e) =>
      validInput(e.target, "text_emp", "Middle Name")
    )
    lnameInput.addEventListener("keyup", (e) =>
      validInput(e.target, "text", "Last Name")
    )
    email.addEventListener("keyup", (e) =>
      validInput(e.target, "email", "Email")
    )

    achievementsTitle.forEach((item) =>
      item.addEventListener("keyup", (e) =>
        validInput(e.target, "any", "Title")
      )
    )
    achievementsDescription.forEach((item) =>
      item.addEventListener("keyup", (e) =>
        validInput(e.target, "any", "Description")
      )
    )
    expTitle.forEach((item) =>
      item.addEventListener("keyup", (e) =>
        validInput(e.target, "any", "Title")
      )
    )
    expOrganization.forEach((item) =>
      item.addEventListener("keyup", (e) =>
        validInput(e.target, "any", "Organization")
      )
    )
    expLocation.forEach((item) =>
      item.addEventListener("keyup", (e) =>
        validInput(e.target, "any", "Location")
      )
    )
    expStartDate.forEach((item) =>
      item.addEventListener("blur", (e) =>
        validInput(e.target, "any", "End Date")
      )
    )
    expEndDate.forEach((item) =>
      item.addEventListener("keyup", (e) =>
        validInput(e.target, "any", "End Date")
      )
    )
    expDescription.forEach((item) =>
      item.addEventListener("keyup", (e) =>
        validInput(e.target, "any", "Description")
      )
    )
    eduSchool.forEach((item) =>
      item.addEventListener("keyup", (e) =>
        validInput(e.target, "any", "School")
      )
    )
    eduDegree.forEach((item) =>
      item.addEventListener("keyup", (e) =>
        validInput(e.target, "any", "Degree")
      )
    )
    eduCity.forEach((item) =>
      item.addEventListener("keyup", (e) => validInput(e.target, "any", "City"))
    )
    eduStartDate.forEach((item) =>
      item.addEventListener("blur", (e) =>
        validInput(e.target, "any", "Start Date")
      )
    )
    eduGraduationDate.forEach((item) =>
      item.addEventListener("blur", (e) =>
        validInput(e.target, "any", "Graduation Date")
      )
    )
    eduDescription.forEach((item) =>
      item.addEventListener("keyup", (e) =>
        validInput(e.target, "any", "Description")
      )
    )
    projTitle.forEach((item) =>
      item.addEventListener("keyup", (e) =>
        validInput(e.target, "any", "Title")
      )
    )
    projLink.forEach((item) =>
      item.addEventListener("keyup", (e) => validInput(e.target, "any", "Link"))
    )
    projDescription.forEach((item) =>
      item.addEventListener("keyup", (e) =>
        validInput(e.target, "any", "Description")
      )
    )
    skill.forEach((item) =>
      item.addEventListener("keyup", (e) =>
        validInput(e.target, "any", "skill")
      )
    )


    phone.forEach((item) =>
      item.addEventListener("keyup", (e) =>
        validInput(e.target, "phone", "Phone")
      )
    )
    console.log({
      firstname: fnameInput.value,
      middlename: mnameInput.value,
      lastname: lnameInput.value,
      email: email.value,
      phone: fetchValues(["phone"], phone),
      address: fetchValues(
        ["country", "city", "street"],
        countries,
        cities,
        streets
      ),
      achievements: fetchValues(
        ["achieve_title", "achieve_description"],
        achievementsTitle,
        achievementsDescription
      ),
      experiences: fetchValues(
        [
          "exp_title",
          "exp_organization",
          "exp_location",
          "exp_start_date",
          "exp_end_date",
          "exp_description",
        ],
        expTitle,
        expOrganization,
        expLocation,
        expStartDate,
        expEndDate,
        expDescription
      ),
      educations: fetchValues(
        [
          "edu_school",
          "edu_degree",
          "edu_city",
          "edu_start_date",
          "edu_graduation_date",
          "edu_description",
        ],
        eduSchool,
        eduDegree,
        eduCity,
        eduStartDate,
        eduGraduationDate,
        eduDescription
      ),
      projects: fetchValues(
        ["proj_title", "proj_link", "proj_description"],
        projTitle,
        projLink,
        projDescription
      ),
      skills: fetchValues(["skill", "skill_year"], skill, skillYear),
    })
    return {
    firstname: fnameInput.value,
    middlename: mnameInput.value,
    lastname: lnameInput.value,
    email: email.value,
    phone: fetchValues(
        ["phone"],
        phone
    ),
    address: fetchValues(
        ["country","city","street"],
        countries,
        cities,
        streets
    ),
    achievements: fetchValues(
      ["achieve_title", "achieve_description"],
      achievementsTitle,
      achievementsDescription
    ),
    experiences: fetchValues(
      [
        "exp_title",
        "exp_organization",
        "exp_location",
        "exp_start_date",
        "exp_end_date",
        "exp_description",
      ],
      expTitle,
      expOrganization,
      expLocation,
      expStartDate,
      expEndDate,
      expDescription
    ),
    educations: fetchValues(
      [
        "edu_school",
        "edu_degree",
        "edu_city",
        "edu_start_date",
        "edu_graduation_date",
        "edu_description",
      ],
      eduSchool,
      eduDegree,
      eduCity,
      eduStartDate,
      eduGraduationDate,
      eduDescription
    ),
    projects: fetchValues(
      ["proj_title", "proj_link", "proj_description"],
      projTitle,
      projLink,
      projDescription
    ),
    skills: fetchValues(["skill","skill_year"], skill,skillYear),
  }
}


const validInput = (value,type,name) => {
    if (type == "text") {
      if (!strRegex.test(value.value) || value.value.trim().length == 0)
        showErrorMsg(value, name)
      else hideRemoveMsg(value)
    }

    
    if (type == "text_emp") {
      if (!strRegex.test(value.value)) showErrorMsg(value, name)
      else hideRemoveMsg(value)
    }


    if (type == "email") {
      if (!emailRegex.test(value.value) || value.value.trim().length == 0)
        showErrorMsg(value, name)
      else hideRemoveMsg(value)
    }

    if (type == "phone") {
      if (!phoneRegex.test(value.value) || value.value.trim().length == 0)
        showErrorMsg(value, name)
      else hideRemoveMsg(value)
    }

    if (type == "any") {
      if (value.value.trim().length == 0) showErrorMsg(value, name)
      else hideRemoveMsg(value)
    }
}


const  showErrorMsg = (ent, name) => {
    ent.nextElementSibling.innerHTML = `${name} is invalid`
}

const hideRemoveMsg = ent => {
    ent.nextElementSibling.innerHTML = ""
}

const showData = (listData, listContainer) => {
  listContainer.innerHTML = ""
  listData.forEach((listItem) => {
    let itemElem = document.createElement("div")
    itemElem.classList.add("preview-item")

    for (const key in listItem) {
      let subItemElem = document.createElement("span")
      subItemElem.classList.add("preview-item-val")
      subItemElem.innerHTML = `${listItem[key]}`
      itemElem.appendChild(subItemElem)
    }

    listContainer.appendChild(itemElem)
  })
}
const fetchValues = (attrs, ...nodeLists) => {
  let elemsAttrsCount = nodeLists.length
  let elemsDataCount = nodeLists[0]?.length || 0
  let tempDataArr = []

  for (let i = 0; i < elemsDataCount; i++) {
    let dataObj = {}
    for (let j = 0; j < elemsAttrsCount; j++) {
      let currentNode = nodeLists[j][i]
      dataObj[`${attrs[j]}`] = currentNode ? currentNode.value.trim() : "" 
    }
    tempDataArr.push(dataObj)
  }
  console.log('Data: ',tempDataArr)
  return tempDataArr
}
const displayCV = (userData) => {
  nameShow.innerHTML =
    userData.firstname + " " + userData.middlename + " " + userData.lastname
  emailShow.innerHTML = userData.email

  showData(userData.phone, phoneShow)
  showData(
    userData.address.map(
      (addr) => `${addr.street}, ${addr.city}, ${addr.country}`
    ),
    addressShow
  )
  showData(userData.projects, projectsShow)
  showData(userData.achievements, achievementsShow)
  showData(
    userData.skills.map(
      (skill) => `${skill.skill} (${skill.skill_year})`
    ),
    skillsShow
  )
  showData(userData.educations, educationsShow)
  showData(userData.experiences, experiencesShow)
}

const printCV = () => {
  window.print()
}



const generateCV = () => {
  let userData = getInputs()
  console.log(userData)
  displayCV(userData)
  console.log(userData)
}

function previewImage() {
  let oFReader = new FileReader()
  oFReader.readAsDataURL(image.files[0])
  oFReader.onload = function (ofEvent) {
    imageShow.src = ofEvent.target.result
  }
}
function submit_cv(){
  const formData = getInputs(); // Fetch form inputs using your function

  fetch('views/cv_builder/process_form.php', {
  method: 'POST',
  headers: {
      'Content-Type': 'application/json',
  },
  body: JSON.stringify(formData),
  })
  .then((response) => response.json())
  .then((data) => {
      if (data.status === 'success') {
      console.log(data.message);
      alert('Form submitted successfully!');
      } else {
      console.error(data.message);
      alert('An error occurred: ' + data.message);
      }
  })
  .catch((error) => {
      console.error('Error:', error);
      alert(error);
  });
}




