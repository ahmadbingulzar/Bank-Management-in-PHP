<!DOCTYPE html>
<html>
<?php
include "session_token_check.php";
include "../layouts/header_form.php";?>

<body class="h-100">

    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-lg-6">
                <div class="bg-white rounded-3 shadow px-4 py-5">

                    <h3 class="text-center text-dark fs-4">Mango bank limited</h3>
                    <h2>verification</h2>


                    <form action=<?php echo getenv('base_url') ."actions/token_check.php"?> method="POST" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="tokenvalidation" class="form-label">Token</label>
                            <div class="input-group has-validation">

                                <input id="tokenvalidation" class="form-control sr-only" type="number" name="token"
                                    required min="1">
                                <div class="invalid-feedback">
                                    Please enter valid Token.
                                </div>
                            </div>


                            <div class="d-flex flex-wrap align-items-center">
                                <input class="btn btn-primary px-4" type="submit" name="check" value="verify">

                            </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include "../layouts/fotter.php"; ?>

</body>

</html>