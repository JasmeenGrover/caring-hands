<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        .header-text {
            font-size: 30px;
            font-family: lovelo;
            color: #fff;
        }

        .header {
            background: linear-gradient(-45deg, #23A6D5, #23D5AB);
        }

    </style>
    <script>
        function showpreview(file) {
            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    $('#slipPic').attr('src', ev.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }

    </script>
</head>

<body>
    <form action="slip-front-process.php" method="post" enctype="multipart/form-data">

        <div class=form-row>
            <div class="col-md-12 header text-center" style="height:70px;">
                <div class="d-inline-block header-text mt-3">Patient's Reports</div>
            </div>
        </div>
        <div class="mt-4" style="width:1500px;margin:auto">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="patUid">Patient UID</label>
                    <input type="text" class="form-control" id="patUid" name="patUid" value='<?php echo $_SESSION["activeuser"];?>' disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="docName">Doctor Name</label>
                    <input type="text" class="form-control" id="docName" name="docName">
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                    <label for="dov">Date of visit</label>
                    <input type="date" class="form-control" id="dov" name="dov">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtCity">City</label>
                    <input type="text" class="form-control" id="txtCity" name="txtCity">
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="form-group col-md-12">
                    <label for="hospName">Hospital or Clinic name</label>
                    <input type="text" class="form-control" id="hospName" name="hospName">
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                    <label for="nextDov">Next visit date</label>
                    <input type="date" class="form-control" id="nextDov" name="nextDov">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtProblem">Problem</label>
                    <input type="text" class="form-control" id="txtProblem" name="txtProblem">
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="form-group col-md-7">
                    <label for="disDoc">Discussion with doctor</label><br>
                    <textarea w-100 class="form-control" name="disDoc" id="<disDoc></disDoc>" cols="155" rows="5"></textarea>
                </div>
                <div class="form-group col-md-4 ml-2">
                    <label for="sPic">Upload report</label><br>
                    <input type="file" w-100 onchange="showpreview(this);" name="sPic" id="sPic">
                    <img class="mt-3" src="pics/patients_reports.png" id="slipPic" width="80" alt="" ?>
                </div>
            </div>
            <div class="form-row d-flex justify-content-center mt-4">
                <div class="form-group col-md-1">
                    <input type="submit" value="Send to server" id="btnSubmit" name="btn" class="btn btn-secondary">
                </div>
            </div>
        </div>
    </form>

</body>

</html>
