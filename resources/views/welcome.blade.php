<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <form action="submitform" method='POST'>
        {{-- cross site request forgery --}}
        @csrf

        <div>
            <label for="">Email</label>
            <input type="text" name='email'>
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name='password'>
        </div>
        <input type="submit" value="Sign In">
    </form>
</body>

</html>
