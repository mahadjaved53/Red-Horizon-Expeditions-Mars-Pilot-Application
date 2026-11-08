# Red Horizon Expeditions — Mars Pilot Application

A small PHP/HTML/CSS/JavaScript classroom project.

## Files
- `index.php` — static company home page and navigation.
- `apply.php` — pilot application form.
- `review.php` — receives the form with POST and displays a safe, escaped summary.
- `styles.css` — shared responsive styling.
- `validation.js` — JavaScript form validation.

## Run locally
PHP must be installed. Open a terminal in this project folder and run:

```bash
php -S localhost:8000
```

Then visit http://localhost:8000/index.php. Do not open the PHP files by double-clicking them; they need a PHP server.

## Test the validation
1. Open Pilot Application and click Submit without filling anything in. The form should stay on the page and show error messages.
2. Enter an invalid email or an age outside 21–65. Submit and check that the matching error appears.
3. Fill all required fields with valid values, write at least 20 characters in each long-answer field, and check the safety box.
4. Submit. `review.php` should show the submitted answers.

## GitHub submission
Create a new public repository on GitHub, for example `mars-pilot-application`.
Upload all five project files plus this README, then copy the repository URL for your assignment submission.

## Video demonstration
Record a short screen capture showing:
1. The home page and company description.
2. Clicking Pilot Application in the menu.
3. Submitting the empty form to show JavaScript validation.
4. Entering valid sample data and submitting to show the POST confirmation page.

This is a demonstration project only. It does not save applications to a database.
