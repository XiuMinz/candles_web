<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sahar Store For Unique Candles">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <style>
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
<?php include_once 'navbar.php'; ?>

    <!--content-->
    <div class="container">
        <section>
            <h1 style="font-family:Papyrus,Fantasy;">Contact Us</h1>
            <form class="mb-3" id="submit_form">
                <div class="alert alert-success  mb-3 " style="display: none;" role="alert" id="success_message">
                    Contact message was successfully sent!
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="phone" name="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" name="message" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="font-family:Papyrus,Fantasy;">Submit</button>
            </form>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script>
        $('#submit_form').submit(function(e) {
            e.preventDefault();
            if (!$('input[name=name]').val()) {
                alert('Name field is required.');
                return;
            }
            if (!$('input[name=email]').val()) {
                alert('Email field is required.');
                return;
            }
            if (!$('input[name=phone]').val()) {
                alert('Phone field is required.');
                return;
            }
            if (!$('textarea[name=message]').val()) {
                alert('Message field is required.');
                return;
            }
            $('#success_message').show();
        });
    </script>
    <?php include_once 'footer.php'; ?>
</body>

</html>