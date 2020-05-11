<?php 
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("Location: login.php");
    } 
    if (isset($_GET["session_clear"])) { 
        session_destroy();
        unset($_GET["session_clear"]);
        header("location: index.php");
        exit();
    }
?>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <!-- Styles -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Урок 1.2 Компьютерные термины | DistLearn</title>
</head>

<body>  
    <!--header-->
    <div class="header tr-background">
        <nav class="link-to-index h5" ><a href = "main.php" style = 'text-decoration: none'> DistLearn</a></nav>
        <nav class="header_cell">
            <text style="header_cell" >Вы зашли под логином
            <?php echo $_SESSION['user_login']?>
        </text>
        </nav>
        <nav class="header_cell">
        <a class="big_btn" href="../themes_list.php">Мои задания</a>
        </nav>
        <nav class="header_cell">
        <a class="big_btn" href="../main.php">Личный кабинет</a>
        </nav>
        <nav class="header_cell">
            <a class="big_btn" href="../login.php" name = "logout_btn">Выйти</a>
        </nav>
    </div> 
    <!--header-->

    <div class="welcome_block">
        <h1>Технические и компьютерные термины</h1>  
    </div>
    <div class = "content-block">
        <div class = "content">
            <normal-text>
            <h2 id="kompyuternye-terminy"><strong>Компьютерные термины</strong></h2>
            <ul>
                <li><strong>AJAX </strong>&mdash; это подход к построению интерактивных веб-страниц, заключающийся в том, что браузер обменивается данными с веб-сервером в фоновом режиме.</li>
                </ul>
                <p>Таким образом, текущая страница не перезагружается полностью, обновляются лишь изменившиеся объекты. В результате достигается большее удобство и скорость работы веб-приложений.</p>
                <ul>
                <li><strong>ADSL</strong> &mdash; асимметричная цифровая абонентская линия &mdash; это новая технология, позволяющая использовать существующие абонентские телефонные линии для высокоскоростной передачи и приема данных между компьютерами абонентов.</li>
                <li><strong>CSS </strong>(Cascading Style Sheets) &mdash; каскадные таблицы стилей, отдельный код, расширяющий возможности оформления и форматирования web-страницы.</li>
                </ul>
                <p>Свойства &laquo;СSS&raquo; являются дополнением к основной HТМL-разметке. Заданное правило может распространяться на отдельные элементы страницы, весь документ и на сайт полностью.</p>
                <ul>
                <li><strong>DNS </strong>(Domain Name System &mdash; система доменных имен) &mdash; это система (база данных), способная по запросу, содержащему доменное имя хоста (компьютера или другого сетевого устройства), сообщить IP адрес.</li>
                <li><strong>DMZ</strong> &mdash; это технология, обеспечивающая безопасность компьютерной сети. Суть её в том, что сервера, работающие с запросами внешней сети, находятся в &laquo;демилитаризованной зоне&raquo; &mdash; &laquo;DMZ&raquo;.</li>
                <li><strong>EDGE </strong>&mdash; это &laquo;продвинутый GPRS&raquo;, протокол передачи данных, использующийся в GSM-сетях сотовых операторов; технология позволяет выходить в Интернет со скоростью до 3-4 раз выше, чем при использовании &laquo;GPRS&raquo;, и передавать данные с мобильного телефона со средней скоростью около 236 кбит/с.</li>
                <li><strong>ERP</strong>-<strong>система </strong>(Enterprise Resource Planning System) &mdash; это информационная система, которая предназначена для автоматизации на предприятии учета и управления.</li>
                <li><strong>FTP </strong>&mdash; это, в переводе с английского протокол передачи файлов. Он является одним из базовых протоколов, предназначенных для обмена информацией.</li>

                <p>Принципиальным отличием FTP протокола от HTTP является то, что FTP предназначен для передачи файлов произвольного размера.</p>
                <p>Пересылка файлов из файловой системы сервера в файловую систему клиента и наоборот, осуществляется посредством специальной программы &mdash; FTP-клиента.</p>

                <li><strong>Firewall</strong> &mdash; это программный комплекс, предназначенный для защиты компьютера от несанкционированного доступа.</li>
                <li><strong>Firewire </strong>&mdash; это последовательная высокоскоростная шина, предусматривающая высокую скорость обмена данными компьютера с различными периферийными устройствами.</li>
                <li><strong>Host </strong>&mdash; это мощный сервер (узел связи) размещения сайтов во всемирной сети Интернет, который используется для передачи каких-либо файлов либо электронных почтовых сообщений.</li>
                <li><strong>HTTP (Hyper Text Transport Protocol) </strong>&mdash; это протокол передачи данных в сети Интернет. Протокол передачи гипертекста.</li>
                <li><strong>HDMI</strong> (High-Definition Multimedia Interface) &mdash; это интерфейс для мультимедиа высокой четкости, создан для передачи сигнала высокого разрешения на видеоприбор, то есть телевизор, монитор, проектор и т.д.</li>
                <li><strong>DPI</strong> &mdash; (Dot Per Inch &mdash; число точек на дюйм). Определяет разрешение изображения количество точек (пикселов). Чем выше цифра точек, тем лучше качество картинки.</li>
            </ul>

            </normal-text>
        </div>
        <a style="text-align: left;" href="less_1_1.php"><<<<<<< Предыдущая страница: Технические термины</a>
        <text>  ||   </text>
        <a style="text-align: right; text-indent: 20px;" href="less_1_test.php">Тест по теме: Технические и компьютерные термины >>>>>>></a>
           
    </div>

<?php require "../includes/footer.php" ?>