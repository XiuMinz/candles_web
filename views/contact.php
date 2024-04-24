<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sahar Store For Unique Candles">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
                <a href="mailto:test@gmail.com">Submit</a>
                <button type="submit" class="btn btn-primary" style="font-family:Papyrus,Fantasy;">Submit</button>
            </form>
        </section>
    </div>
    <?php include_once 'footer.php'; ?>
</body>

</html>