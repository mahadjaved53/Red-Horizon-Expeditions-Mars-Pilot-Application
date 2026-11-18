<?php
// Use PHP's configured timezone. Set date.timezone in php.ini if your server
// should use a timezone other than its default.
date_default_timezone_set(date_default_timezone_get());

// Every departure is scheduled for the 1st day of a month at 10:00 AM.
$now = new DateTimeImmutable('now');
$thisMonthDeparture = $now->setDate(
    (int) $now->format('Y'),
    (int) $now->format('n'),
    1
)->setTime(10, 0, 0);

// If this month's departure time has passed, calculate the 1st of next month.
if ($now >= $thisMonthDeparture) {
    $nextDeparture = $thisMonthDeparture->modify('first day of next month');
} else {
    $nextDeparture = $thisMonthDeparture;
}

// Send the departure timestamp to JavaScript in milliseconds.
$departureTimestamp = $nextDeparture->getTimestamp() * 1000;
$departureDateLabel = $nextDeparture->format('l, F j, Y');
$departureTimeLabel = $nextDeparture->format('g:i A');
$timezoneLabel = $now->format('T');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Departures | Red Horizon Expeditions</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="index.php">RED HORIZON <span>EXPEDITIONS</span></a>
        <nav aria-label="Main navigation">
            <a href="index.php">Home</a>
            <a href="apply.php">Pilot Application</a>
            <a class="active" href="departures.php">Departures</a>
        </nav>
    </header>

    <main class="departures-page">
        <section class="departure-heading">
            <p class="eyebrow">MISSION SCHEDULE // MONTHLY LAUNCH WINDOW</p>
            <h1>Your next window to <span>Mars.</span></h1>
            <p class="intro">A new expedition departs on the first day of every month. Prepare your application and get ready for the next journey beyond Earth.</p>
        </section>

        <section class="departure-card" aria-labelledby="countdown-title">
            <p class="eyebrow">NEXT SCHEDULED DEPARTURE</p>
            <h2 id="countdown-title"><?php echo htmlspecialchars($departureDateLabel, ENT_QUOTES, 'UTF-8'); ?></h2>
            <p class="departure-time">
                <?php echo htmlspecialchars($departureTimeLabel, ENT_QUOTES, 'UTF-8'); ?>
                <span>Server timezone: <?php echo htmlspecialchars($timezoneLabel, ENT_QUOTES, 'UTF-8'); ?></span>
            </p>

            <!-- JavaScript fills these values and refreshes them every minute. -->
            <div class="countdown" id="countdown"
                 data-departure="<?php echo (int) $departureTimestamp; ?>"
                 aria-live="polite">
                <div class="countdown-unit"><strong id="days">--</strong><span>Days</span></div>
                <div class="countdown-unit"><strong id="hours">--</strong><span>Hours</span></div>
                <div class="countdown-unit"><strong id="minutes">--</strong><span>Minutes</span></div>
            </div>
            <p class="countdown-message" id="countdownMessage">Calculating time until departure...</p>
        </section>

        <section class="departure-details">
            <article class="info-card">
                <span class="card-number">01 / DEPARTURE FREQUENCY</span>
                <h2>Once every month</h2>
                <p>Our standard schedule is the first day of each calendar month at 10:00 AM.</p>
            </article>
            <article class="info-card">
                <span class="card-number">02 / PREPARE YOUR PROFILE</span>
                <h2>Apply to join the crew</h2>
                <p>Share your aviation experience and qualifications through the pilot application.</p>
                <a class="text-link" href="apply.php">Open pilot application →</a>
            </article>
        </section>

        <div class="departure-actions">
            <a class="button" href="apply.php">Apply to become a Mars pilot <span aria-hidden="true">→</span></a>
            <a class="text-link" href="index.php">Return to home</a>
        </div>
    </main>

    <footer>© 2026 Red Horizon Expeditions · The next horizon awaits.</footer>

    <script>
    // Read the departure timestamp calculated by PHP.
    const countdown = document.getElementById("countdown");
    const departureTime = Number(countdown.dataset.departure);

    // Prevent more than one automatic page refresh when a departure arrives.
    let departureRefreshScheduled = false;

    // Update the displayed countdown using the visitor's current clock.
    function updateCountdown() {
        const remainingMilliseconds = departureTime - Date.now();

        // If the scheduled moment has arrived, show a clear status message.
        // Reload once so PHP can calculate and display the following month's trip.
        if (remainingMilliseconds <= 0) {
            document.getElementById("days").textContent = "0";
            document.getElementById("hours").textContent = "0";
            document.getElementById("minutes").textContent = "0";
            document.getElementById("countdownMessage").textContent =
                "Departure time reached. Preparing the next monthly mission window...";
            if (!departureRefreshScheduled) {
                departureRefreshScheduled = true;
                setTimeout(() => window.location.reload(), 3000);
            }
            return;
        }

        // Convert the remaining time into whole days, hours, and minutes.
        const totalMinutes = Math.floor(remainingMilliseconds / 60000);
        const days = Math.floor(totalMinutes / 1440);
        const hours = Math.floor((totalMinutes % 1440) / 60);
        const minutes = totalMinutes % 60;

        document.getElementById("days").textContent = days;
        document.getElementById("hours").textContent = String(hours).padStart(2, "0");
        document.getElementById("minutes").textContent = String(minutes).padStart(2, "0");

        // Change the message as the departure gets closer.
        const message = document.getElementById("countdownMessage");
        if (totalMinutes <= 60) {
            message.textContent = "Final hour! Your Mars departure window is almost here.";
        } else if (totalMinutes <= 24 * 60) {
            message.textContent = "Less than a day to go. Final mission preparations are underway.";
        } else if (totalMinutes <= 7 * 24 * 60) {
            message.textContent = "Departure is less than a week away. Complete your preparations.";
        } else {
            message.textContent = "Your next monthly Mars departure is approaching. There is still time to prepare.";
        }
    }

    // Show the correct countdown immediately, then refresh it every minute.
    updateCountdown();
    setInterval(updateCountdown, 60000);
    </script>
</body>
</html>
