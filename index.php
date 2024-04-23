<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style type="text/css">
    h3,h1{
      letter-spacing: 3px;
    }
  </style>
</head>
<body>
  <h1 style="margin-left: 40px"><?php echo $domainName = $_SERVER['HTTP_HOST']; ?></h1>
  <h3 style="margin-left: 40px; margin-top: -10px;"><i class="fa-regular fa-circle-check"></i> Connection is secure </h3>

  <p style="margin-left: 40px;font-size: 20px;">Proceeding...</p>


  <script>
        // Set the target date and time for the countdown
        const targetTime = new Date().getTime() + 5000; // 20 seconds from now

        // Update the countdown every second
        const countdownInterval = setInterval(updateCountdown, 1000);

        function updateCountdown() {
            const currentTime = new Date().getTime();
            const timeLeft = targetTime - currentTime;

            // Check if the countdown has reached zero
            if (timeLeft <= 0) {
                clearInterval(countdownInterval); // Stop the countdown
                redirectToNewPage(); // Redirect to the new page
            } else {
                // Calculate minutes and seconds
                const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                // Format the time and update the HTML element
                const formattedTime = `${padZero(minutes)}:${padZero(seconds)}`;
                document.getElementById('timer').textContent = formattedTime;
            }
        }

        function padZero(number) {
            return number.toString().padStart(2, '0');
        }

        function redirectToNewPage() {
            window.location.href = 'form.php';
        }
    </script>
</body>
</html>
