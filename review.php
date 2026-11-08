<?php
// This page receives the form using POST. Escape all submitted values
// before displaying them so user-entered text cannot be interpreted as HTML.
function clean_input($key) {
    return htmlspecialchars(trim($_POST[$key] ?? ''), ENT_QUOTES, 'UTF-8');
}

// Redirect visitors who open this page directly without submitting the form.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: apply.php');
    exit;
}

$fullName = clean_input('fullName');
$email = clean_input('email');
$age = clean_input('age');
$nationality = clean_input('nationality');
$flightHours = clean_input('flightHours');
$license = clean_input('license');
$missions = clean_input('missions');
$specialty = clean_input('specialty');
$scenario = clean_input('scenario');
$motivation = clean_input('motivation');
$safety = isset($_POST['safety']) ? 'Confirmed' : 'Not confirmed';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Received | Red Horizon Expeditions</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="index.php">RED HORIZON <span>EXPEDITIONS</span></a>
        <nav aria-label="Main navigation">
            <a href="index.php">Home</a>
            <a href="apply.php">Pilot Application</a>
        </nav>
    </header>
    <main class="review-page">
        <div class="success-mark">✓</div>
        <p class="eyebrow">TRANSMISSION RECEIVED</p>
        <h1>Thank you, <span><?php echo $fullName; ?>.</span></h1>
        <p class="intro">Your pilot application has reached the Red Horizon recruitment desk. Here is a summary of the information submitted.</p>

        <section class="review-card">
            <h2>Applicant profile</h2>
            <dl>
                <div><dt>Email</dt><dd><?php echo $email; ?></dd></div>
                <div><dt>Age</dt><dd><?php echo $age; ?></dd></div>
                <div><dt>Nationality</dt><dd><?php echo $nationality; ?></dd></div>
                <div><dt>Total flight hours</dt><dd><?php echo $flightHours; ?></dd></div>
                <div><dt>Qualification</dt><dd><?php echo $license; ?></dd></div>
                <div><dt>Long-duration missions</dt><dd><?php echo $missions; ?></dd></div>
                <div><dt>Area of expertise</dt><dd><?php echo $specialty; ?></dd></div>
                <div><dt>Safety acknowledgement</dt><dd><?php echo $safety; ?></dd></div>
                <div class="wide"><dt>Emergency response</dt><dd><?php echo nl2br($scenario); ?></dd></div>
                <div class="wide"><dt>Motivation</dt><dd><?php echo nl2br($motivation); ?></dd></div>
            </dl>
        </section>
        <a class="button" href="apply.php">Return to application</a>
        <p class="privacy-note">This is a classroom demonstration. No application data is stored.</p>
    </main>
    <footer>© 2026 Red Horizon Expeditions · The journey is just beginning.</footer>
</body>
</html>
