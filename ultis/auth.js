// Function to toggle between Login and Register forms
function toggleForm(formType) {
  const loginForm = document.getElementById("login-form")
  const registerForm = document.getElementById("register-form")

  if (formType === "login") {
    loginForm.style.display = "block"
    registerForm.style.display = "none"
  } else {
    loginForm.style.display = "none"
    registerForm.style.display = "block"
  }
}

// Validate login form data
document
  .getElementById("submit-login")
  .addEventListener("submit", function (event) {
    event.preventDefault()

    const email = document.getElementById("email").value
    const pwd = document.getElementById("password").value

    let formData = new FormData()
    formData.append("email", email)
    formData.append("pwd", pwd)

    var xhr = new XMLHttpRequest()
    xhr.open("POST", "config/login/login_processing.php", true)

    xhr.onload = function () {
      if (xhr.status === 200) {
        console.log(xhr.responseText)
        const res = JSON.parse(xhr.responseText)
        if (res.status === "success") {
          window.location.href = "index.php"
        } else {
          // Error handling for login failure
          let errorMessages = res.errors.join("<br>")
          document.getElementById(
            "login-errors"
          ).innerHTML = `<p style='color:red;'>Login failed: ${errorMessages}</p>`
        }
      } else {
        document.getElementById("errors").innerHTML =
          "<p style='color:red;'>There was an error with the request.</p>"
      }
    }

    xhr.send(formData)
  })

// Validate register form data
document
  .getElementById("submit-register")
  .addEventListener("submit", function (event) {
    event.preventDefault()

    const email = document.getElementById("new-email").value
    const username = document.getElementById("new-username").value
    const pwd = document.getElementById("new-password").value

    let formData = new FormData()
    formData.append("email", email)
    formData.append("username", username)
    formData.append("pwd", pwd)

    var xhr = new XMLHttpRequest()
    xhr.open("POST", "config/signup/signup_processing.php", true)
    xhr.onload = function () {
      if (xhr.status === 200) {
        console.log(xhr.responseText)
        const res = JSON.parse(xhr.responseText)
        if (res.status === "success") {
          window.location.href = "index.php"
        } else {
          // Error handling for registration failure
          let errorMessages = res.errors.join("<br>")
          document.getElementById(
            "register-errors"
          ).innerHTML = `<p style='color:red;'>Register failed: ${errorMessages}</p>`
        }
      } else {
        document.getElementById("errors").innerHTML =
          "<p style='color:red;'>There was an error with the request.</p>"
      }
    }

    xhr.send(formData)
  })

// Initialize with login form visible
toggleForm("login")
