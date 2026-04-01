<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Task Manager - Login</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="./css/style.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <style>
        /* Small CSS fix to ensure the icon area matches your transparent input style */
        .input-group-text {
            background-color: transparent !important;
            border-color: white !important;
            color: white !important;
            cursor: pointer;
        }
    </style>
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

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email"
                                                class="form-control bg-transparent text-white border-white"
                                                name="email" autofocus>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <div class="input-group">
                                                <input type="password" id="password"
                                                    class="form-control bg-transparent text-white border-white"
                                                    name="password">
                                                <div class="input-group-append" onclick="seePassword()">
                                                    <span class="input-group-text">
                                                        <i id="toggleIcon" class="fas fa-eye"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox text-white">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="basic_checkbox_1">
                                                    <label class="custom-control-label" for="basic_checkbox_1">Remember
                                                        my preference</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="submit"
                                                class="btn btn-light text-primary btn-block font-weight-bold">Sign Me
                                                In</button>
                                        </div>
                                    </form>
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

    <script>
        const seePassword = () => {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                // Change icon to eye-slash
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                // Change icon back to eye
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>
