<!DOCTYPE html>
<html>

<head>
    <title>Confido</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="Emporium registration Form Bootstrap Responsive Templates, Iphone Compatible Templates, Smartphone Compatible Templates, Ipad Compatible Templates, Flat Responsive Templates" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/auth/auth_style.css') }}" rel='stylesheet'>

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!--//webfonts-->

</head>

<body>

    <div class="w3l_frm">
        <div class="container">
            <h2>Confido Registration Form</h2>
            <div class="header-social wthree">
                <div class="line-mid">
                </div>
            </div>
            <div class="header-social wthree">
                <ul>
                    <li>
                        <a href="#popup1" class="m"> <span class="fa fa-envelope-o"
                                aria-hidden="true"></span>Register With Email</a>
                    </li>
                </ul>

                <div id="popup1" class="overlay">
                    <div class="popup">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <input type="text" name="name" placeholder="User Name" required>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" required>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" required>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                    required>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <input type="submit" data-toggle="modal" data-target="#modal-lgharga" value="Register">
                        </form>
                        <a class="close" href="#">&times;</a>

                    </div>
                </div>

            </div>

            <div class="w3_acc">
                <ul>
                    <li>
                        <h4>Already had an Account?</h4>
                    </li>
                    <li>
                        <div class="w3ls_su">
                            <a href="#popup">Sign In</a>
                        </div>
                    </li>
                </ul>
                <div id="popup" class="overlay">
                    <div class="popup">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" required>
                                <x-input-error :messages="$errors->get('email')" />
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" required>
                                <x-input-error :messages="$errors->get('password')" />
                            </div>

                            <input type="submit" value="Log in">
                        </form>
                        <a class="close" href="#">&times;</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
