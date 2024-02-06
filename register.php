<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
</head>
<style>
    body {
        font-family: 'Montserrat', sans-serif;
        background: #E5E5E5;
        display: flex;
        justify-content: left;
        align-items: left;
        flex-direction: column;
        background-image: url("Unikl.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 100vh;
    }

    img {
        width: 200px;
        height: 200px;
    }

    h1 {
        font-weight: bold;
        margin: 0;
        font-size: 30px;
        text-transform: capitalize;
    }

    a {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
    }

    .privacy {
        color: #737272;
    }

    .form-container form {
        background: #fff;
        display: flex;
        flex-direction: column;
        padding: 20px 50px;
        margin-top: 10px;
        width: 400px;
        height: auto;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .social-container {
        margin: 20px 0;
    }

    .social-container a {
        border: 1px solid #ddd;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 5px;
        height: 40px;
        width: 40px;
    }

    .form-container input {
        background: #eee;
        border: none;
        padding: 12px 15px;
        margin: 8px 0;
        width: 100%;
    }

    .form-container textarea {
        background: #eee;
        border: none;
        padding: 12px 15px;
        margin: 8px 0;
        width: 100%;
    }

    button {
        border-radius: 20px;
        border: 1px solid #101010;
        background: #101010;
        color: #fff;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        outline: none;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }

    button:hover {
        transform: scale(1.1);
    }

    .back {
        position: absolute;
        top: 10px;
        left: 10px;
    }
</style>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<body>
    <div class="back">
        <button onclick="window.location.href = 'user login.php';">Back</button>
    </div><br><br>

    <div class="form-container sign-up-container">
        <form name="userform" method="post" action="adduser.php">
            <img src="unikl logo.png" alt="UniKL logo">

            <input placeholder="Email" type="email" name="femail" size="50" required />
            <input type="password" placeholder="PASSWORD" type="text" name="fpass" size="20" required />
            <button type="submit">Sign Up</button><br>
            
            <!-- Add the Google Sign-In button -->
            <div class="g-signin2" data-onsuccess="onGoogleSignIn"></div>

        </form>
    </div>

    <script>
        // Function called after Google Sign-In succeeds
        function onGoogleSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            // You can access user information from the 'profile' object
            // Example: var userId = profile.getId();
            // Example: var userName = profile.getName();
            // Example: var userEmail = profile.getEmail();

            // Add code to send user information to your server for registration
            // You can use AJAX to send the data to your server
            // Example: $.post("register_with_google.php", { id: userId, name: userName, email: userEmail });
        }
    </script>
</body>
</html>
