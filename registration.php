<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Registration Form</title>
  </head>
  <body>
  <form method="POST" action="registr.php" class="form__registration">
   <h2 class="title">Sign Up</h2>
   <label for="username">Username:</label>
   <input
     class="input"
     type="text"
     name="username"
     id="username"
     placeholder=" "
     required
   /><br /><br />

   <label for="password">Password:</label>
   <input
     type="password"
     name="password"
     id="password"
     class="input"
     placeholder=" "
     required
   /><br /><br />

   <button type="submit" class="registration-btn">TAP</button>
 </form>
  </body>
</html>
