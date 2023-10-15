<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <div>
        <div class="link-container">
            <ul>
                <li>
                    <a href="/">Register</a>
                </li>
            </ul>
        </div>
        <h1 class="page-title">LOG IN</h1>
        <form action="/api/login" method="post">
            <input type="text" placeholder="Create  Username" required name="username">
            <input type="password" placeholder="Password" required name="password" autocomplete="on">
            <input type="submit" value="Log in"required>
        </form>
    </div>
</body>
</html>