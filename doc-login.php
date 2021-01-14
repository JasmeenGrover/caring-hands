<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/doc-login.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function showpreview(file) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    $('#profilePic').attr('src', ev.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }

        function showpreviewtwo(file) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    $('#certificatePic').attr('src', ev.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }

        $(document).ready(function() {

            $("#btnFetch").click(function() {

                var uid = $("#txtUid").val();
                var url = "doc-json-fetch.php?uid=" + uid;
                $.getJSON(url, function(jsonArray) {

                    //                   alert(JSON.stringify(jsonArray));
                    $("#txtName").hide().val(jsonArray[0].dname).fadeIn();
                    $("#txtMob").hide().val(jsonArray[0].contact).fadeIn();
                    $("#txtEmail").hide().val(jsonArray[0].email).fadeIn();
                    $("#txtSpecial").hide().val(jsonArray[0].spl).fadeIn();
                    $("#txtQual").hide().val(jsonArray[0].qual).fadeIn();
                    $("#txtStudy").hide().val(jsonArray[0].studied).fadeIn();
                    $("#txtExp").hide().val(jsonArray[0].exp).fadeIn();
                    $("#txtWeb").hide().val(jsonArray[0].website).fadeIn();
                    $("#hospName").hide().val(jsonArray[0].hospital).fadeIn();
                    $("#hospAdd").hide().val(jsonArray[0].address).fadeIn();
                    $("#txtCity").hide().val(jsonArray[0].city).fadeIn();
                    $("#txtState").hide().val(jsonArray[0].state).fadeIn();
                    $("#txtZip").hide().val(jsonArray[0].zip).fadeIn();
                    $("#txtInfo").hide().val(jsonArray[0].info).fadeIn();

                    $("#jasus").val(jsonArray[0].ppic);
                    $("#jasus2").val(jsonArray[0].cpic);

                    $("#profilePic").hide().prop("src", "uploads/" + jsonArray[0].ppic).fadeIn();
                    $("#certificatePic").hide().prop("src", "uploads/" + jsonArray[0].cpic).fadeIn();


                });
            });
        });

    </script>
</head>

<body>

    <form action="doc-login-process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="jasus" id="jasus">
        <input type="hidden" name="jasus2" id="jasus2">

        <div class=form-row>
            <div class="col-md-12 header text-center doctor-title">
                <div class="d-inline-block header-text">Doctor's data</div>
            </div>
        </div>
        <div class="form-background">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="txtUid">UID</label>
                    <input type="text" class="form-control" id="txtUid" name="txtUid" value='<?php echo $_SESSION["activeuser"];?>' disabled>
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
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="txtMob">Contact number</label>
                    <input type="text" class="form-control" id="txtMob" name="txtMob">
                </div>
                <div class="form-group col-md-4">
                    <label for="txtEmail">Email</label>
                    <input type="text" class="form-control" id="txtEmail" name="txtEmail">
                </div>
                <div class="form-group col-md-4">
                    <label for="txtSpecial">Specialization</label>
                    <select class="custom-select custom-select" id="txtSpecial" name="txtSpecial">
                        <option selected disabled>Select</option>
                        <option value="Allergist">Allergist</option>
                        <option value="Dermatologist">Dermatologist</option>
                        <option value="Ophthalmologist">Ophthalmologist</option>
                        <option value="Obstetrician/Gynecologist">Obstetrician/Gynecologist</option>
                        <option value="Cardiologist">Cardiologist</option>
                        <option value="Endocrinologist">Endocrinologist</option>
                        <option value="Gastroenterologist">Gastroenterologist</option>
                        <option value="Nephrologist">Nephrologist</option>
                        <option value="Urologist">Urologist</option>
                        <option value="Otolaryngologist">Otolaryngologist</option>
                        <option value="Neurologist">Neurologist</option>
                        <option value="Psychiatrist">Psychiatrist</option>
                        <option value="Oncologist">Oncologist</option>
                        <option value="Radiologist">Radiologist</option>
                        <option value="Rheumatologist">Rheumatologist</option>
                        <option value="General surgeon">General surgeon</option>
                        <option value="Orthopedic surgeon">Orthopedic surgeon</option>
                        <option value="Cardiac surgeon">Cardiac surgeon</option>
                        <option value="Anesthesiologist">Anesthesiologist</option>
                        <option value="Pediatrician">Pediatrician</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtQual">Qualification</label>
                    <input type="text" class="form-control" id="txtQual" name="txtQual">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtStudy">Studied from</label>
                    <input type="text" class="form-control" id="txtStudy" name="txtStudy">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtExp">Work experience</label>
                    <input type="text" class="form-control" id="txtExp" name="txtExp">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtWeb">Website</label>
                    <input type="text" class="form-control" id="txtWeb" name="txtWeb">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="hospName">Hospital name</label>
                    <input type="text" class="form-control" id="hospName" name="hospName">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="hospAdd">Hospital address</label>
                    <input type="text" class="form-control" id="hospAdd" name="hospAdd">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtCity">City</label>
                    <input type="text" class="form-control" id="txtCity" name="txtCity">
                </div>
                <div class="form-group col-md-4">
                    <label for="txtState">State</label>
                    <input type="text" class="form-control" id="txtState" name="txtState">
                </div>
                <div class="form-group col-md-2">
                    <label for="txtZip">Zip</label>
                    <input type="text" class="form-control" id="txtZip" name="txtZip">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Upload profile picture</label><br>
                    <input type="file" onchange="showpreview(this);" id="ppic" name="ppic">
                    <img src="pics/doctor-search.png" id="profilePic" width="50" height="50" alt="" ?>
                </div>
                <div class="form-group col-md-6">
                    <label>Upload certificate</label><br>
                    <input type="file" onchange="showpreviewtwo(this);" id="cpic" name="cpic">
                    <img src="pics/patients_reports.png" id="certificatePic" width="50" height="50" alt="" ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="txtInfo">Any other information about you:</label><br>
                    <textarea w-100 class="form-control" name="txtInfo" id="txtInfo" cols="155" rows="5"></textarea>
                </div>
            </div>
            <div class="form-row d-flex justify-content-center mt-2">
                <div class="form-group col-md-1 col-sm-6 btn-submit">
                    <input type="submit" value="Submit" id="btnSubmit" name="btn" class="btn btn-dark">
                </div>
                <div class="form-group col-md-1 col-sm-6 btn-update">
                    <input type="submit" id="btnUpdate" name="btn" value="Update" class="btn btn-dark">
                </div>

            </div>
        </div>
    </form>
</body>

</html>
