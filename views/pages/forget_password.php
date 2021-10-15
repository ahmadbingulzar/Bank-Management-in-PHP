

<!DOCTYPE html>

<html>

<?php
session_start();

include "../layouts/header_form.php";?>


<body class="h-100">

    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-lg-6">
                <div class="bg-white rounded-3 shadow px-4 py-5">

                    <h3 class="text-center text-dark fs-4">Mango bank limited</h3>
                    <h2>Forget Password</h2>

                    <form action=<?php echo getenv('base_url') ."actions/forget_password.php"?> method="POST" class="needs-validation" novalidate>
                        <div class="mb-3 ">
                            <label for="emailvalidation" class="form-label">Email</label>
                            <div class="input-group has-validation">

                                <input class="form-control" type="email" id="emailvalidation"
                                    aria-describedby="emailHelp" required
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email">
                                <div class="invalid-feedback">
                                    Please choose a email.
                                </div>
                            </div>
                            <span class="error">
                                <?php echo $email_userErr; ?>
                            </span>
                            <span class="error">
                                <?php echo $email_userErr2; ?>
                            </span>

                        </div>
                        <div class="d-flex flex-wrap align-items-center">
                            <input class="btn btn-primary px-4" type="submit" name="login" value="Get Password">

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include "../layouts/fotter.php"; ?>

</body>

</html>