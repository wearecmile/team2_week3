<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>State | Design Pattern</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/custom.css" />
</head>

<body class="bgimg">
    <div class="container mt-3" style="background-color: #dff9fb;">
        <h3></h3>
        <div style="background-color: #c8d6e5; border-radius: 25px;" class="pb-3 pt-3 mb-3">
            <h5 class="form-text text-center" style="color: #4834d4; font-family: 'Oswald', sans-serif;">State Design Pattern</h5>
            <h3 class="form-text text-center" style="color: #2c3e50; font-family: 'Oswald', sans-serif;" id="mood"><b>Mood</b></h3>
        </div>
        <div class="row mood-icon-container">
            <div class="col-md-12 row">
                <div class="col-md-4">
                    <div class="column moodIcon" id="HappyMood">
                        <img src="./assets/image/Happy.png" alt="I am happy" width="100" height="100">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="column moodIcon" id="ShockedMood">
                        <img src="./assets/image/Shocked.png" alt="I am happy" width="100" height="100">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="column moodIcon" id="SadMood">
                        <img src="./assets/image/Sad.png" alt="I am happy" width="100" height="100">
                    </div>
                </div>
            </div>
            <div class="col-md-12 row">
                <div class="col-md-4">
                    <div class="column moodIcon" id="AngryMood">
                        <img src="./assets/image/Angry.png" alt="I am shocked" width="100" height="100">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="column moodIcon" id="CryingMood">
                        <img src="./assets/image/Crying.png" alt="I am shocked" width="100" height="100">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="column moodIcon" id="SleepyMood">
                        <img src="./assets/image/Sleepy.png" alt="I am shocked" width="100" height="100">
                    </div>
                </div>
            </div>
            <div class="col-md-12 row">
                <div class="col-md-4">
                    <div class="column moodIcon" id="HungryMood">
                        <img src="./assets/image/Hungry.png" alt="I am sad" width="100" height="100">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="column moodIcon" id="CoolMood">
                        <img src="./assets/image/Cool.png" alt="I am sad" width="100" height="100">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="column moodIcon" id="SickMood">
                        <img src="./assets/image/Sick.png" alt="I am sad" width="100" height="100">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/jquery.min.js"></script>
    <script>
        $(document).on('click', '.moodIcon', function() {
            var mood = $(this).attr('id');
            var result = '';
            $.ajax({
                method: "POST",
                url: "response.php",
                data: {
                    mood: mood
                },
                success: function(response) {
                    $("#mood").html(response);
                }
            });
            $('.mood-icon-container').find('.active').removeClass('active');
            $(this).find('img').addClass('active');
        });
    </script>
</body>

</html>