<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/profile-patient.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("btnSubmit").click(function() {
                window.location.href = "dashboard-patient.php";
            });
            $("#btnFetch").click(function() {
                var uid = $("#txtUid").val();
                var url = "patient-json-fetch.php?uid=" + uid;
                $.getJSON(url, function(jsonArray) {
                    $("#txtName").hide().val(jsonArray[0].name).fadeIn();
                    $("#txtMob").hide().val(jsonArray[0].contact).fadeIn();
                    $("#txtEmail").hide().val(jsonArray[0].email).fadeIn();
                    $("#txtGender").hide().val(jsonArray[0].gender).fadeIn();
                    $("#txtAge").hide().val(jsonArray[0].age).fadeIn();
                    $("#txtCity").hide().val(jsonArray[0].city).fadeIn();
                    $("#txtAdd").hide().val(jsonArray[0].address).fadeIn();
                    $("#txtInfo").hide().val(jsonArray[0].problems).fadeIn();
                });
            });
        });

    </script>
</head>

<body>
    <form action="profile-patient-process.php">
        <div class=form-row>
            <div class="col-md-12 header text-center patient-title">
                <div class="d-inline-block header-text">Patient's profile</div>
            </div>
        </div>
        <div class="form-background">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="txtUid">UID</label>
                    <input type="text" class="form-control" id="txtUid" name="txtUid" value='<?php echo $_SESSION["activeuser"];?>' readonly>
                </div>
                <div class="form-group col-md-2">
                    <label>&nbsp;</label>
                    <input type="button" value="Fetch record" class="btn form-control btn btn-dark btn-fetch" id="btnFetch" name="btnFetch">
                </div>
                <div class="form-group col-md-5">
                    <label for="txtName">Name</label>
                    <input type="text" class="form-control" id="txtName" name="txtName">
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-md-4">
                    <label for="txtMob">Contact number</label>
                    <input type="tel" class="form-control" id="txtMob" name="txtMob">
                </div>
                <div class="form-group col-md-4">
                    <label for="txtEmail">Email</label>
                    <input type="text" class="form-control" id="txtEmail" name="txtEmail">
                </div>
                <div class="form-group col-md-4">
                    <label for="txtGender">Gender</label>
                    <select class="custom-select custom-select" id="txtGender" name="txtGender">
                        <option selected disabled>Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-md-6">
                    <label for="txtAge">Age</label>
                    <input type="number" class="form-control" id="txtAge" name="txtAge">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtCity">City</label>
                    <input type="text" class="form-control" id="txtCity" name="txtCity">
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-md-12">
                    <label for="txtAdd">Address</label>
                    <input type="text" class="form-control" id="txtAdd" name="txtAdd">
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-md-12">
                    <label for="txtInfo">Any other information about you:</label><br>
                    <textarea w-100 class="form-control" name="txtInfo" id="txtInfo" cols="155" rows="5"></textarea>
                </div>
            </div>
            <div class="form-row d-flex justify-content-center mt-3">
                <div class="form-group col-md-1 col-sm-6">
                    <input type="submit" value="Submit" id="btnSubmit" name="btn" class="btn btn-dark btn-submit">
                </div>
                <div class="form-group col-md-1 col-sm-6">
                    <input type="submit" id="btnUpdate" name="btn" value="Update" class="btn btn-dark btn-update">
                </div>
            </div>
        </div>
    </form>

</body>

</html>
