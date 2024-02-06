<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: #E5E5E5;
            display: flex;
            justify-content: left;
            align-items: left;
            flex-direction: column;
            position: relative;
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

        .admin {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .redirect-button {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .sign {
            position: absolute;
            top: 10px;
            right: 160px;
        }

        .navbar {
    display: flex;
    justify-content: space-between;
    padding: 10px 20px;
    background-color: rgba(243, 244, 246, 0.5);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
}



        .navbar button {
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

        .navbar button:hover {
            color: #f63e4e;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <button onclick="window.location.href = 'register.php';">Sign Up</button>
        </div>
    </div><br><br>

    <div class="form-container sign-up-container">
        <form name="login" method="post" action="userchck.php">
            <img src="unikl logo.png" alt="UniKL logo">
            <h2>Inventory Management System</h2>
            <input placeholder="Email" type="email" name="femail" size="50" required />
            <input type="password" placeholder="Password" name="fpass" size="20" required />
            <button type="submit">Log In</button><br><br>
            
            
            <div class="g-signin2" data-onsuccess="onSignIn"></div>
        </form>
    </div>

    <!-- Include the Google Sign-In script -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <script>
        // Callback function called when Google Sign-In is successful
        function onSignIn(googleUser) {
            // Access user information from the 'googleUser' object
            var profile = googleUser.getBasicProfile();
            var userId = profile.getId();
            var userName = profile.getName();
            var userEmail = profile.getEmail();

            // You can use the obtained information as needed
            console.log("User ID: " + userId);
            console.log("User Name: " + userName);
            console.log("User Email: " + userEmail);
            
            // Here you can add additional code to handle the Google Sign-In data
            // For example, you may want to send this information to your server for registration or authentication
        }
    </script>
</body>
</html>
