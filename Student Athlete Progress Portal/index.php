<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASIATECH Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Petrona&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <!-- Left Section with Background and Text -->
        <div class="left-section">
            <div class="text-container">
                <h1>ASIATECH</h1>
                <p>Student Athlete Progress Portal</p>
            </div>
            <div class="logo-container">
                <img src="./Upload/ASAPP.png" alt="Logo 1" class="logo">
                <img src="./Upload/RAWR.png" alt="Logo 2" class="logo">
            </div>
        </div>
        <!-- Right Section with Login Form -->
        <div class="right-section">
            <form class="login-form">
                <input type="email" placeholder="Email" required>
                <div class="password-container">
                    <input type="password" id="password" placeholder="Password" required>
                    <label for="show-password">
                        <input type="checkbox" id="show-password"> Show Password
                    </label>
                </div>
                <button type="submit">LOGIN</button>
            </form>
        </div>
    </div>

    <script>
        const showPasswordCheckbox = document.getElementById('show-password');
        const passwordField = document.getElementById('password');

        showPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
</body>
</html>
