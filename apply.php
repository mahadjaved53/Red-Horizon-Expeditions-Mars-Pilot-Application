<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilot Application | Red Horizon Expeditions</title>
    <link rel="stylesheet" href="styles.css">
    <!-- JavaScript validation is kept in its own linked file as required. -->
    <script src="validation.js" defer></script>
</head>
<body>
    <header class="site-header">
        <a class="brand" href="index.php">RED HORIZON <span>EXPEDITIONS</span></a>
        <nav aria-label="Main navigation">
            <a href="index.php">Home</a>
            <a class="active" href="apply.php">Pilot Application</a>
        </nav>
    </header>

    <main class="form-page">
        <div class="form-heading">
            <p class="eyebrow">FLIGHT CREW RECRUITMENT // 2026</p>
            <h1>Your Mars mission <span>starts here.</span></h1>
            <p>Complete the application below. Fields marked with * are required. This demonstration sends your information to a confirmation page; it does not store it in a database.</p>
        </div>

        <form id="pilotForm" action="review.php" method="POST" novalidate>
            <div class="form-section-title"><span>01</span> Personal details</div>
            <div class="form-grid">
                <div class="field">
                    <label for="fullName">Full name *</label>
                    <input type="text" id="fullName" name="fullName" placeholder="e.g. Alex Morgan" required minlength="2">
                    <small class="error" id="fullNameError"></small>
                </div>
                <div class="field">
                    <label for="email">Email address *</label>
                    <input type="email" id="email" name="email" placeholder="pilot@example.com" required>
                    <small class="error" id="emailError"></small>
                </div>
                <div class="field">
                    <label for="age">Age (years) *</label>
                    <input type="number" id="age" name="age" min="21" max="65" placeholder="e.g. 32" required>
                    <small class="error" id="ageError"></small>
                </div>
                <div class="field">
                    <label for="nationality">Nationality *</label>
                    <input type="text" id="nationality" name="nationality" placeholder="e.g. Canadian" required>
                    <small class="error" id="nationalityError"></small>
                </div>
            </div>

            <div class="form-section-title"><span>02</span> Flight experience</div>
            <div class="form-grid">
                <div class="field">
                    <label for="flightHours">Total flight hours *</label>
                    <input type="number" id="flightHours" name="flightHours" min="0" max="100000" placeholder="e.g. 2500" required>
                    <small class="error" id="flightHoursError"></small>
                </div>
                <div class="field">
                    <label for="license">Pilot license / qualification *</label>
                    <select id="license" name="license" required>
                        <option value="">Select your qualification</option>
                        <option>Private Pilot License (PPL)</option>
                        <option>Commercial Pilot License (CPL)</option>
                        <option>Airline Transport Pilot License (ATPL)</option>
                        <option>Military / Test Pilot Qualification</option>
                        <option>Other aviation qualification</option>
                    </select>
                    <small class="error" id="licenseError"></small>
                </div>
                <div class="field">
                    <label for="missions">Long-duration missions completed</label>
                    <input type="number" id="missions" name="missions" min="0" max="1000" value="0">
                    <small class="hint">Enter 0 if you have not completed any.</small>
                </div>
                <div class="field">
                    <label for="specialty">Area of expertise *</label>
                    <select id="specialty" name="specialty" required>
                        <option value="">Choose an area</option>
                        <option>Commercial aviation</option>
                        <option>Military aviation</option>
                        <option>Test / experimental aircraft</option>
                        <option>Spaceflight / spacecraft operations</option>
                        <option>Flight instruction</option>
                    </select>
                    <small class="error" id="specialtyError"></small>
                </div>
            </div>

            <div class="field full-field">
                <label for="scenario">Emergency scenario: A cabin pressure warning appears during cruise. What are your first priorities? *</label>
                <textarea id="scenario" name="scenario" rows="4" minlength="20" maxlength="700" placeholder="Describe how you would assess the warning, communicate, and follow procedures..." required></textarea>
                <small class="error" id="scenarioError"></small>
            </div>
            <div class="field full-field">
                <label for="motivation">Why do you want to pilot a mission to Mars? *</label>
                <textarea id="motivation" name="motivation" rows="3" minlength="20" maxlength="500" placeholder="Tell us what motivates you..." required></textarea>
                <small class="error" id="motivationError"></small>
            </div>

            <label class="check-row">
                <input type="checkbox" id="safety" name="safety" value="Yes">
                <span>I understand that spaceflight involves significant risks and that safety procedures come first. *</span>
            </label>
            <small class="error" id="safetyError"></small>

            <div class="form-actions">
                <button class="button" type="submit">Submit pilot application <span aria-hidden="true">→</span></button>
                <a class="text-link" href="index.php">Back to home</a>
            </div>
            <p class="privacy-note">Demo only: your answers are sent to the next PHP page using POST and are not saved.</p>
        </form>
    </main>
    <footer>© 2026 Red Horizon Expeditions · One small step for your career.</footer>
</body>
</html>
