<!DOCTYPE html>

<html>
<?php
session_start();
include "edit_data.php";
include "session_only_admin.php";
include "../layouts/dashboard_admin.php";
include "../layouts/header_form.php";
?>


<body class="h-100">
    <script>
        function myFunction() {
            alert("Edit your form")
            document.getElementById("myAnchor").removeAttribute("disabled");
        }
    </script>



    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-lg-6">
                <div class="bg-white rounded-3 shadow px-4 py-5">

                    <h3 class="text-center text-dark fs-4">Mango bank limited</h3>
                    <h2>Update Details</h2>

                    <fieldset disabled id="myAnchor">
                        <form action=<?php echo getenv('base_url')."actions/edit.php"?> method="POST" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="firstnamevalidation" class="form-label">First Name</label>
                                <div class="input-group has-validation">
                                    <input id="firstnamevalidation" class="form-control" value="<?php echo $row['first_name'] ?>" type="text" name="first_name" autocomplete="off" required>
                                    <div class="invalid-feedback">
                                        Please enter valid name.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="lastnamevalidation" class="form-label">Last Name</label>
                                <div class="input-group has-validation">

                                    <input id="lastnamevalidation" class="form-control" value="<?php echo $row['last_name'] ?>" type="text" name="last_name" autocomplete="off" required>
                                    <div class="invalid-feedback">
                                        Please enter valid name.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="emailvalidation" class="form-label">Email</label>
                                <div class="input-group has-validation">

                                    <input disabled id="emailvalidation" class="form-control" value="<?php echo $row['email'] ?>" type="email" name="email" autocomplete="off" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">

                                    <div class="invalid-feedback">
                                        Please enter valid email.
                                    </div>
                                    <span class="error">
                                        <?php echo $email_userErr2; ?>
                                    </span>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="phonevalidation" class="form-label">Phone</label>
                                <div class="input-group has-validation">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <input id="phonevalidation" class="form-control" value="<?php echo $row['phone'] ?> " type="number" name="phone" autocomplete="off" required min="11">
                                    <div class="invalid-feedback">
                                        Please enter valid number.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">

                                <div class="d-flex flex-wrap align-items-center">
                                    <input class="btn btn-primary px-4" type="submit" name="submit" value="UPDATE">
                                </div>
                    </fieldset>
                    </form>
                    <div>
                        <button class="btn btn-primary px-4" onclick="myFunction()">EDIT</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../layouts/fotter.php"; ?>
</body>

</html>