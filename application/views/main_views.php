<!DOCTYPE html>
<html lang="ru">
    <head>
        <title><?=$title?></title>
        <link rel="stylesheet" type="text/css" href="/style.css" />
    </head>
    <body>
        <div id="header">
            <span class="slogan">Просто текст</span>
        </div>
        <div id="content">
            <h1>Добро пожаловать!</h1>
            <?php include $content ?>
        </div>
        <div id="nav">
            <h2>Навигация по сайту</h2>
            <ul>
                <li><a href='/index'>Домой</a></li>
                <li><a href='/about'>О нас</a></li>
                <li><a href='/contact'>Контакты</a></li>
            </ul>
        </div>
    </body>
</html>
