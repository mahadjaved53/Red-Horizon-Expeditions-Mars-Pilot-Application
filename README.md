# Red Horizon Expeditions — Mars Pilot Application

A small PHP/HTML/CSS/JavaScript classroom project.

## Files
- `index.php` — company home page and main navigation.
- `apply.php` — pilot application form.
- `review.php` — receives the form with POST and displays a safe, escaped summary.
- `departures.php` — calculates the next monthly departure and displays the live countdown.
- `styles.css` — shared responsive styling for all pages.
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
Upload all project files, including `departures.php`, plus this README, then copy the repository URL for your assignment submission.

## Video demonstration
Record a short screen capture showing:
1. The home page and company description.
2. Clicking Pilot Application in the menu.
3. Submitting the empty form to show JavaScript validation.
4. Entering valid sample data and submitting to show the POST confirmation page.

This is a demonstration project only. It does not save applications to a database.


## Assignment 2.1 – Monthly Mars departures

The `departures.php` page calculates the next departure as the 1st day of
the current or next month at 10:00 AM, using the PHP server's configured
timezone. A JavaScript countdown displays days, hours, and minutes and
refreshes every 60 seconds. Its message changes as the departure approaches.

### Run locally with XAMPP

1. Copy the complete `red_horizon_mars_pilot_project` folder into XAMPP's `htdocs` directory.
2. Start Apache from the XAMPP Control Panel.
3. Open `http://localhost/red_horizon_mars_pilot_project/` in your browser.
4. Use the Departures link in the navigation to view the countdown.

PHP pages cannot execute directly on GitHub Pages because GitHub Pages does
not run PHP. Use XAMPP or another PHP-enabled web server to test this project.

### Change the departure time

In `departures.php`, find `setTime(10, 0, 0)`. Change the `10` to the
desired hour in 24-hour format and the `0` values for minutes and seconds.
For example, 14:30 is `setTime(14, 30, 0)`.


### Assignment 2.1 requirement checklist
- Uses PHP to calculate the next first-of-month departure at 10:00 AM.
- Uses PHP conditional logic to choose this month's departure or next month's departure.
- Uses JavaScript to update the days, hours, and minutes countdown every 60 seconds.
- Changes the departure message based on the time remaining.
- Uses HTML5, shared CSS, and a professional navigation menu linking Home, Pilot Application, and Departures.
- Includes explanatory comments in the PHP and JavaScript countdown logic.
- Does not write application or departure data to a file or database.
