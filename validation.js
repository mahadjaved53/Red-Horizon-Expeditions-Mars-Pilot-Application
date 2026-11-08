// Client-side validation for the Mars pilot application.
// The browser runs this file when the application page loads.
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("pilotForm");

    // Display an error beside a field and visually mark that field invalid.
    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const error = document.getElementById(fieldId + "Error");
        if (error) error.textContent = message;
        if (field) field.classList.toggle("invalid", message !== "");
    }

    // Clear all previous messages before checking the current form values.
    function clearErrors() {
        ["fullName", "email", "age", "nationality", "flightHours",
         "license", "specialty", "scenario", "motivation"].forEach(id => showError(id, ""));
        document.getElementById("safetyError").textContent = "";
    }

    form.addEventListener("submit", (event) => {
        clearErrors();
        let isValid = true;

        const fullName = document.getElementById("fullName").value.trim();
        const email = document.getElementById("email").value.trim();
        const age = Number(document.getElementById("age").value);
        const nationality = document.getElementById("nationality").value.trim();
        const flightHours = Number(document.getElementById("flightHours").value);
        const license = document.getElementById("license").value;
        const specialty = document.getElementById("specialty").value;
        const scenario = document.getElementById("scenario").value.trim();
        const motivation = document.getElementById("motivation").value.trim();

        // Text fields must contain meaningful answers, not just spaces.
        if (fullName.length < 2) { showError("fullName", "Please enter your full name."); isValid = false; }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { showError("email", "Enter a valid email address."); isValid = false; }
        if (!Number.isInteger(age) || age < 21 || age > 65) { showError("age", "Age must be a whole number from 21 to 65."); isValid = false; }
        if (nationality.length < 2) { showError("nationality", "Please enter your nationality."); isValid = false; }
        if (!Number.isFinite(flightHours) || flightHours < 0 || flightHours > 100000) { showError("flightHours", "Enter flight hours between 0 and 100,000."); isValid = false; }
        if (!license) { showError("license", "Please select your pilot qualification."); isValid = false; }
        if (!specialty) { showError("specialty", "Please select an area of expertise."); isValid = false; }
        if (scenario.length < 20) { showError("scenario", "Please provide at least 20 characters about your emergency response."); isValid = false; }
        if (motivation.length < 20) { showError("motivation", "Please provide at least 20 characters about your motivation."); isValid = false; }

        // A safety acknowledgement is mandatory before the application can be sent.
        if (!document.getElementById("safety").checked) {
            document.getElementById("safetyError").textContent = "Please confirm the safety acknowledgement.";
            isValid = false;
        }

        // Stop the POST request if any validation rule fails.
        if (!isValid) {
            event.preventDefault();
            const firstInvalid = form.querySelector(".invalid");
            if (firstInvalid) firstInvalid.focus();
        }
        // If valid, the browser submits the form to review.php using POST.
    });
});
