<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yesy's Birthday</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
<div id="register-content">
    <div class="form-container">
        <h2>˚ ༘♡ ⋆｡˚ YESI'S Birthday˚ ༘♡ ⋆｡˚</h2>
        <p>So, firstly, thank you so much for helping me fill in these birthday messages. This is for Yesi's
            birthday, and Yesi is my beloved friend. I hope you all have a nice day and have a happily ever after ending with everyone you love!</p>
        <form id="birthdayForm" action='/' method="post" class="form-filling">
            @csrf
            <div class="form">
                <textarea name="messages" placeholder="Birthday Messages" required></textarea>
            </div>
            <button class="button-style" type="submit">Submit</button>
            <div class="notifications" id="notification">
            </div>
        </form>
    </div>

    <script>
        $('#birthdayForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function (response) {
                    showNotification(response.success, response.message);
                },
                error: function () {
                    showNotification(false, 'Something went wrong.');
                }
            });
        });

        function showNotification(success, message) {
            var notificationDiv = $('#notification');
            notificationDiv.html(message);

            if (success) {
                notificationDiv.css('color', 'green');
                notificationDiv.css('font-weight', 'bolder');
                notificationDiv.css('margin-top', '10px');
            } else {
                notificationDiv.css('color', 'red');
                notificationDiv.css('font-weight', 'bolder');
            }

            notificationDiv
        }
    </script>
</div>
</body>

</html>
