<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        .container {
            width: 400px;
            height: 300px;
            margin: auto;
            margin-top: 200px;
        }

        h2 {
            color: white;
            background: linear-gradient(-45deg, #23A6D5, #23D5AB);
            height: 60px;
            padding-top: 10px;
        }

        #request {
            background: linear-gradient(-45deg, rgba(35, 213, 171, 1), rgba(35, 166, 213, 1));
            color: white;
            font-weight: 500;
            transition: ease all 0.5s;
        }

        #request:hover {
            color: #fff;
            background: linear-gradient(-45deg, rgba(35, 213, 171, 0.8), rgba(35, 166, 213, 0.8));
        }

    </style>
    <script>
        $(document).ready(function() {
            $("#request").click(function() {
                var uid = $("#uid").val();
                var url = "forgot-password-process.php?uid=" + uid;
                if (uid == "") {
                    $("#err").html("Please fill your UID first");
                    $("#err").css("color", "#e84a5f");
                } else {
                    $.get(url, function(response) {
                        $("#err").html(response);
                        if (response == "This User ID is not registered with us") {
                            $("#err").css("color", "#e84a5f");
                        } else {
                            $("#err").css("color", "#32e0c4");
                        }
                    });

                }
            });
        });

    </script>
</head>

<body>
    <div class="container shadow-lg text-center">
        <div class="row">
            <h2 class="col-md-12">Forgot password</h2>
        </div>
        <div class="row mt-4 pb-2 flex-column align-content-center">
            <label for="">User ID</label>
            <input type="text" id="uid" class="form-control col-md-8">
        </div>
        <div class="row mt-4 flex-column align-items-center">
            <input type="button" class="btn form-control w-25" id="request" value="Request">
            <span id="err" class="mt-2">

            </span>
        </div>
    </div>

</body>

</html>
