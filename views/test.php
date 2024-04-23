<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id="contact" name="contact" onsubmit="return validateFormOnSubmit(this)" action="" method="post">
    <div>
        <label>First Name</label>
        <input placeholder="First Name" type="text" name="name" id="name" tabindex="1" autofocus />
        <div id="name-error" class="error"></div>
    </div>
    <div>
        <label>Nickname</label>
        <input placeholder="Nickname" type="text" name="nickname" id="nickname" tabindex="2" autofocus />
    </div>
    <div>
        <label>Email</label>
        <input placeholder="Email" type="email" name="email" id="email" tabindex="3" autofocus />
        <div id="email-error" class="error"></div>
    </div>
    <div>
        <label>Phone</label>
        <input placeholder="Phone" type="tel" name="phone" id="phone" tabindex="4" autofocus />
        <div id="phone-error" class="error"></div>
    </div>
    <div>
        <label>I prefer</label>
        <input type="radio" name="pet" id="Dogs" tabindex="5" autofocus />Dogs
        <input type="radio" name="pet" id="Cats" tabindex="6" autofocus />Cats
        <input type="radio" name="pet" id="Neither" tabindex="7" autofocus />Neither
        <div id="pet-error" class="error"></div>
    </div>
    <div>
        <label>My favorite number between 1 and 50</label>
        <input placeholder="Favorite number between 1 and 50" type="text" name="number" id="number" tabindex="8" autofocus />
        <div id="number-error" class="error"></div>
    </div>
    <div>
        <label>Disclaimer</label>
        <input type="checkbox" name="disclaimer" id="disclaimer" tabindex="9" autofocus />I confirm that all the above information is true.
        <div id="disclaimer-error" class="error"></div>
    </div>
    <div>
        <button type="submit" name="submit" id="submit" tabindex="10">Send</button>
    </div>
</form>
<script src="../JS/test.js"></script>
</body>
</html>