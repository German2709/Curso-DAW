<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro de cuenta</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

    body {
        background: linear-gradient(90deg, #FC466B 0%, #3F5EFB 100%);

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;

        margin-top: 20vh;
        width: 400px;
        border: none;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;

        background: linear-gradient(180deg, #3F5EFB 0%, #182848 150%);
        height: 550px;
    }

    h1 {
        font-family: 'Roboto', sans-serif;
        text-transform: uppercase;
        color: #2c409f;

        margin-top: 80px;
        text-align: center;
        width: 50%;
    }

    input[type=text],
    [type=email],
    [type=password] {
        margin: 5px 0px;
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
        color: black;

        width: 220px;
        padding: 10px 7px;
    }

    .button-49,
    .button-49:after {
        margin-top: 15px;
        width: 88px;
        height: 36px;
        line-height: 38px;
        font-size: 20px;
        font-family: 'Bebas Neue', sans-serif;
        background: linear-gradient(45deg, transparent 5%, #FF013C 5%);
        border: 0;
        color: #fff;
        letter-spacing: 3px;
        box-shadow: 6px 0px 0px #00E6F6;
        outline: transparent;
        position: relative;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-49:after {
        --slice-0: inset(50% 50% 50% 50%);
        --slice-1: inset(80% -6px 0 0);
        --slice-2: inset(50% -6px 30% 0);
        --slice-3: inset(10% -6px 85% 0);
        --slice-4: inset(40% -6px 43% 0);
        --slice-5: inset(80% -6px 5% 0);

        content: 'ALTERNATE TEXT';
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 3%, #00E6F6 3%, #00E6F6 5%, #FF013C 5%);
        text-shadow: -3px -3px 0px #F8F005, 3px 3px 0px #00E6F6;
        clip-path: var(--slice-0);
    }

    .button-49:hover:after {
        animation: 1s glitch;
        animation-timing-function: steps(2, end);
    }

    @keyframes glitch {
        0% {
            clip-path: var(--slice-1);
            transform: translate(-20px, -10px);
        }

        10% {
            clip-path: var(--slice-3);
            transform: translate(10px, 10px);
        }

        20% {
            clip-path: var(--slice-1);
            transform: translate(-10px, 10px);
        }

        30% {
            clip-path: var(--slice-3);
            transform: translate(0px, 5px);
        }

        40% {
            clip-path: var(--slice-2);
            transform: translate(-5px, 0px);
        }

        50% {
            clip-path: var(--slice-3);
            transform: translate(5px, 0px);
        }

        60% {
            clip-path: var(--slice-4);
            transform: translate(5px, 10px);
        }

        70% {
            clip-path: var(--slice-2);
            transform: translate(-10px, 10px);
        }

        80% {
            clip-path: var(--slice-5);
            transform: translate(20px, -10px);
        }

        90% {
            clip-path: var(--slice-1);
            transform: translate(-10px, 0px);
        }

        100% {
            clip-path: var(--slice-1);
            transform: translate(0);
        }
    }
    a{
        color: wheat;
    }
</style>

<div class="container">
<?php include "registro-simple.php" ?><br>
<a href="logeo.php">Iniciar Sesión</a>
</div>
</html>