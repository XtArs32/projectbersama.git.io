<?php
include 'koneksi.php';
session_start();

error_reporting(0);

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background: linear-gradient(to right, #e1ecff 40%, #0059ff41);
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 330px;
            padding: 40px 30px;
            background-color: linear-gradient(to right, #e1ecff 40%, #0059ff41);
            border-radius: 10px;
            box-shadow: -3px -3px 7px #ffffff73, 2px 2px 5px rgba(94, 104, 121, 0.288);
        }

        .content .text {
            font-size: 40px;
            position: relative;
            font-weight: 600;
            margin-bottom: 35px;
            color: #666666;
        }

        .field {
            height: 50px;
            width: 100%;
            display: flex;
            position: relative;
            margin-top: 20px;
        }

        .field .input {
            height: 100%;
            width: 100%;
            padding-left: 45px;
            outline: none;
            border: none;
            font-size: 18px;
            background: #dde1e7;
            color: #595959;
            border-radius: 25px;
            box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #ffffff73;
        }

        .field .input:focus {
            box-shadow: inset 1px 1px 2px #BABECC, inset -1px -1px 2px #ffffff73;
        }

        .field .span {
            position: absolute;
            color: #595959;
            width: 50px;
            line-height: 55px;
        }

        .field .label {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 45px;
            pointer-events: none;
            color: #666666;
        }

        .field .input:valid~.label {
            opacity: 0;
        }

        .button {
            margin: 30px 0;
            width: 100%;
            height: 50px;
            font-size: 18px;
            line-height: 50px;
            font-weight: 600;
            border-radius: 25px;
            border: none;
            outline: none;
            box-sizing: border-box;
        }

        .button[disabled] {
            color: #595959;
            background-color: rgb(65, 65, 65);
            cursor: not-allowed;
            box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #ffffff73;
        }

        .button:not([disabled]):hover {
            background-color: lightblue;
        }

        .button:not([disabled]) {
            background-color: lightgreen;
            cursor: pointer;
            box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #ffffff73;
        }

        .button:focus {
            color: #000000;
            background-color: skyblue;
            transform: scale(0.9);
            box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #ffffff73;
        }

        .forgot-link {
            color: #5959596c;
            text-decoration: none;
            margin: 0px 0;
            width: 100%;
            height: 50px;
            font-size: 18px;
            line-height: 50px;
            font-weight: 600;
            border-radius: 25px;
        }

        .forgot-link:hover {
            color: maroon;
            text-decoration: underline;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="content">
        <?php if ($err){ ?>
            <div class="alert alert-danger">
                <?php echo $err ?>
            </div>
        <?php } ?>
        <div class="text">
            Login
        </div>
        <form id="loginform" action="#" method="POST">
            <div class="field">
            <input required type="text" name="username" class="input" value="<?php echo $username; ?>"> <!-- Menambahkan tanda ';' setelah $username -->
                <span class="span">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="20" width="50">
                        <g>
                            <path fill="#595959"
                                d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z">
                            </path>
                        </g>
                    </svg>
                </span>
                <label class="label">Email</label> <!-- Mengubah label menjadi "Email" -->
            </div>
            <div class="field">
                <input required type="password" name="password" class="input">
                <span class="span">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="20" width="50">
                        <g>
                            <path fill="#595959"
                                d="M336 192h-16v-64C320 57.406 262.594 0 192 0S64 57.406 64 128v64H48c-26.453 0-48 21.523-48 48v224c0 26.477 21.547 48 48 48h288c26.453 0 48-21.523 48-48V240c0-26.477-21.547-48-48-48zm-229.332-64c0-47.063 38.27-85.332 85.332-85.332s85.332 38.27 85.332 85.332v64H106.668zm0 0">
                            </path>
                        </g>
                    </svg>
                </span>
                <label class="label">Password</label>
            </div>
            <button id="submitButton" class="button" name="login">Submit</button>
        </form>
        <div>
        <input id="login-remember" type="checkbox" name="ingatsaya" value="1"<?php if ($ingatsaya == '1') echo "checked"?>>
        <label for="remember_me">Ingat Saya</label>
        </div>
        <div class="form-group">
            <a href="#" class="forgot-link">Forgot Password?</a>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>

