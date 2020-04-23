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

    <title>Урок 1.1 Технические термины | DistLearn</title>
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
            <h2 id="tekhnicheskie-terminy"><strong>Технические термины</strong></h2>
            <ul>
                <li><strong>API </strong>&mdash; интерфейс прикладного программирования. Простыми словами: соединители на тыльной панели телевизора.</li>
                <li><strong>Access Control List &mdash;</strong> список управления доступом.</li>
                <p>Часть дескриптора защиты, в которой перечисляется, кто имеет доступ к объекту и какой. Владелец объекта может изменять ACL этого объекта, разрешая или запрещая доступ к нему другим пользователям. ACL состоит из заголовка и произвольного числа элементов ACL (АСЕ). ACL без АСЕ называется пустым (null ACL) и указывает, что доступ к объекту не разрешен ни одному пользователю.</p>
                <li><strong>Agile Software Development </strong>&mdash; гибкая разработка программ (ориентированная на простоту внесения изменений) или быстрая разработка программного обеспечения (адаптивная разработка).</li>
                <li><strong>Back End </strong>&mdash; серверное приложение (часть) или программное обеспечение для выполнения конечной стадии процесса.</li>
                <li><strong>Backdoor </strong>&mdash; Инструмент (путь) обхода системы защиты.</li>
                <li><strong>Bandwidth &mdash; </strong>пропускная способность, диапазон частот; полоса пропускания (например, канала связи).</li>
                <li><strong>Big Data </strong>&mdash; большие данные. Серия подходов, инструментов и методов обработки и анализа структурированных, полуструктурированных и неструктурированных данных огромных объёмов и значительного многообразия для получения полезных на практике, человекочитаемых результатов.</li>
                <li><strong>Cookie </strong>&mdash; файл cookie, который используются веб-серверами для различения пользователей и сохранения данных о них.</li>
                <li><strong>Dark Web</strong> &mdash; темный Интернет &mdash; сегмент Всемирной паутины, куда можно попасть лишь с помощью специального ПО, сохраняя там полную анонимность, с целью совершения купли-продажи нелегальных товаров (например, оружия или наркотиков) и услуг, негласного обмена информацией.</li>
                <li><strong>Data Bleed </strong>&mdash; утечка данных. Термин постепенно набирает популярность, но его все еще трудно четко охарактеризовать, поскольку точного определения в Интернете пока нет.</li>
                <li><strong>De-identification </strong>&mdash; деидентификация, удаление персональных данных (идентификационной информации)<strong>. </strong></li>
                <li><strong>Doxing </strong>&mdash; доксинг, сбор и распространение раскрытие, обнародование, публикация чьих-либо личных данных в Интернете без согласия этого лица.</li>
                <li><strong>Encryption </strong>&mdash; шифрование, засекречивание. Традиция носить одежду.</li>
                <li><strong>Front End &mdash; </strong>интерфейсная часть клиент-серверного приложения (клиентский компонент).</li>
                <li><strong>Least Mean Square</strong> (<strong>LMS</strong>) <strong>&mdash;</strong> алгоритм минимальной среднеквадратичной ошибки.</li>
                <li><strong>Spoofing </strong>&mdash; спуфинг-мошенничество (мошенничество, направленное на получение банковских конфиденциальных данных клиентов с целью хищения денег, как правило, с помощью компьютерных технологий, путем имитации реально существующего банковского сайта или его размещения на поддельном сайте. Соответственно, информация от клиента поступает на поддельный сайт.</li>
                <li><strong>WPA (Wi-Fi Protected Access) </strong>&mdash; защищенный доступ по Wi-Fi. Мотоциклетный эскорт президента &mdash; пуленепробиваемый автомобиль в сопровождении мотоциклистов. Доставит под защитой от устройства до подключения к интернету. А вот по прибытии не помешает дополнительная охрана.</li>
                <li><strong>White Hat </strong>&mdash; белый хакер, программист-фанатик или этичный хакер. Положительный персонаж. Это&nbsp;специалист по компьютерной безопасности, который специализируется на тестировании безопасности компьютерных систем.</li>
                <li><strong>Zero-day</strong> &mdash; уязвимость нулевого дня &mdash; вредоносные программы (эксплойты), против которых еще не разработаны защитные механизмы.</li>
            </ul>
            </normal-text>
        </div>
        <a style="text-align: right;" href="less_1_2.php">Следующая страница: Компьютерные термины >>>>>>></a>
    </div>

<?php require "../includes/footer.php" ?>


           