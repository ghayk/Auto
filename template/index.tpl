<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AUTO CARDS</title>
    <link rel="stylesheet" href="../web/css/style.css">

</head>

<body>
{include './header/header.tpl'}
<div class="wrapper">
    <main class="main">
        <div class="nav">
            <button class="add-btn add-car">add new car</button>
            <label><input type="text" name="search" class="search-car" placeholder="search"></label>
            <label>
                <select name="db" class="dataType">
                    <option value="mysql">MySql</option>
                    <option value="file">File</option>
                </select>
            </label>
        </div>

        {include './main/addOrEditForm.tpl'}
        {include './main/cards.tpl'}
    </main>
</div>
<script type="module" src="./web/script/script.js"></script>
</body>
</html>

