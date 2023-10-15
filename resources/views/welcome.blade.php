<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BOOKS API</title>
        <link rel="stylesheet" href="css/app.css">
    </head>

    <body class="antialiased">

        <div class="main container">
            <div class="link-container">
                <ul>
                    <li>
                        <a href="/log-in">Log-In</a>
                    </li>
                </ul>
            </div>
            <h1 class="page-title">REGISTER</h1>
            <form action="/api/register" method="post">
                <div class="name container">
                <input type="text" placeholder="First Name" required name="first_name">
                 <input type="text" placeholder="Last Name" required name="last_name">
                </div>
                 <input type="email" name="email" placeholder="Email" required>
                  <input type="text" placeholder="Create  Username" required name="username">
                 <input type="password" placeholder="Password" required name="password" autocomplete="on">
                 <input type="password" placeholder="Confirm Password" required name="password_confirmation"autocomplete="on">

                 <span>Gender</span>
                  <div>
                    <span class="radio-container">
                        <label>Male</label>
                        <input type="radio" value="male" name="gender" class="radio">
                    </span>

                    <span class="radio-container">
                         <label>Female</label>
                        <input type="radio" value="female" name="gender" class="radio">
                    </span>

                    <span class="radio-container">
                        <label>Others</label>
                        <input type="radio" value="others" name="gender" class="radio">
                    </span>

                    <span class="radio-container">
                        <label>Prefer not to say</label>
                        <input type="radio" value="prefer not to say" name="gender" class="radio">
                    </span>
                  </div>

                  <input type="date" name="birthdate" required>
                  <input type="submit" value="Create Account" required>
            </form>
        </div>
    </body>
</html>
