<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Task Manager - Login</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content bg-primary shadow-lg rounded">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form p-5">
                                    <div class="text-center mb-3">
                                        <h1 class="text-white font-weight-bold">Task Manager</h1>
                                    </div>
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                    <form action="index.html">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email"
                                                class="form-control bg-transparent text-white border-white" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password"
                                                class="form-control bg-transparent text-white border-white">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox ml-1 text-white">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="basic_checkbox_1">
                                                    <label class="custom-control-label" for="basic_checkbox_1">Remember
                                                        my preference</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a class="text-white" href="page-forgot-password.html">Forgot
                                                    Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-light text-primary btn-block font-weight-bold">Sign Me
                                                In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3 text-center">
                                        <p class="text-white">Don't have an account? <a
                                                class="text-white font-weight-bold" href="./page-register.html">Sign
                                                up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./vendor/global/global.min.js"></script>
    <script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/deznav-init.js"></script>
</body>

</html>
