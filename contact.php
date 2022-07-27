<?php session_start(); ?>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us - GranthaKoshaya</title>
    <link rel="stylesheet" href="style.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />


    <meta charset="utf-8">
    <title>Contact Us</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        transition: all 0.5s;
        color: #555;
    }

    body {
        background: radial-gradient(#fff, #ffd6d6);

    }

    .form {
        width: 30%;
        background: radial-gradient(#fff, #ffd6d6);
        margin: 5% 33%;
        padding: 2%;

        border-radius: 2px;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        display: block;
        margin-top: 2em;
    }

    h1 {
        text-align: center;
        margin-top: 5px;
    }

    p {
        text-align: center;
        margin-bottom: 1em;
    }

    #logo {
        font-size: 50px;
        text-align: center;
        color: #4889f0;
    }


    [type="submit"]:hover {
        border-color: #c6c6c6;
        color: #fff;
        cursor: pointer;
        -o-transition: all 0.2s;
        -moz-transition: all 0.3s;
        -webkit-transition: all 0.2s;
        transition: all 0.2s;
        background-color: #4c8ffc;
        background-image: -webkit-linear-gradient(top, #4c8ffc, #4889f0);
        background-image: -moz-linear-gradient(top, #4c8ffc, #4889f0);
        background-image: -ms-linear-gradient(top, #4c8ffc, #4889f0);
        background-image: -o-linear-gradient(top, #4c8ffc, #4889f0);
        background-image: linear-gradient(top, #4c8ffc, #4889f0);
        -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    }

    footer {
        text-align: center;
        margin-top: -20px;

        p {
            color: #3895dd;
            padding-bottom: -5px;
            font-size: 16px;
        }

        a {
            border-bottom: 1px dashed #363636;
            color: #040404;
            text-decoration: underline;
            margin-left: 5px;
        }

    }

    .checkbox {
        padding: 8px;
        margin-top: 8px;
    }


    .human_veryfication {
        float: left;
        margin-left: -60px;
        margin-top: 5px;
    }

    lable {
        margin-left: -180px;
    }


    @media only screen and (max-width: 800px) {
        form {
            left: 3%;
            margin-right: 3%;
            width: 88%;
            margin-left: 3%;
            padding-left: 3%;
            padding-right: 3%;
        }
    }
    </style>

    <link href="https://fontastic.s3.amazonaws.com/qXDGBpBG6AawYwtmYPpQBb/icons.css" rel="stylesheet">



</head>

<body>
    <div class="header">
        <div class="container">

            <?php include_once("components/header.php");?>

        </div>
    </div>

    <body style="background-image:url(Images/50f1baa7e26e8dba3eeb4d76eb76f9c2.jpg); background-repeat:no-repeat">
        <div>

            <section style="min-height:500px">

                <div style="padding-top:0px">

                    <form class="form" action="mail/mail.php" method="post">

                        <h1>Contact Us!</h1>
                        <p>Say Hello! Or whatever you want!</p>
                        <div id="logo" class="icon-ic-drafts-24px"></div>
                        <input name="name" type="text" placeholder="Name" id="name" required />

                        <input name="email" type="email" placeholder="Email" id="email" required />

                        <div style="padding-top:10px; padding-left:1px">
                            <textarea name="message" type="text" placeholder="Type Your Message" required rows="8"
                                cols="120px" style="width:310px"></textarea>
                        </div>
                        <input type="submit" value="Send" id="button-blue" name="btnSend" />
                    </form>

                    <footer>
                        <?php include_once("components/footer.php");?>
                    </footer>

                </div>

            </section>

    </body>

</html>