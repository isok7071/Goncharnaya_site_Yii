<?php

/** @var yii\web\View $this */
/*Мастер классы*/
/* @var $searchModel app\models\Master_classSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* Творческие меропрития*/
/* @var $eventsSearchModel app\models\EventsSearch */
/* @var $eventsDataProvider yii\data\ActiveDataProvider */

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'Гончарная мастерская';
?>

<body>
<?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->admin=='1'){
        NavBar::begin([
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-main-page navbar-expand-md navbar-light bg-light opacity-75 fixed-bottom',
            ],
        ]);
        $items = [];
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->admin == 1) {
            $items[] = ['label' => 'Админпанель', 'url' => ['/admin']];
            $items[] =
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->email . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>';
        } else {
            if (Yii::$app->user->isGuest){
                $items[] = ['label' => 'Войти', 'url' => ['/site/login']];

            }

        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => $items,

        ]);
        NavBar::end();
} ?>
<header class="container-fluid p-0">
    <nav class="nav-container navbar navbar-expand-lg p-0">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto" href="#"><img src="../img/logo.svg"></a>
            <button class="navbar-dark bg-dark navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="menu-ul justify-content-between mw-100 w-100 navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item text-center">
                        <a class="nav-link" aria-current="page" href="#AboutUs">О нас</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link" href="#HowToGet">Как добраться?</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link" href="#MasterClassContainer">Мастер-классы</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link" href="#Events">Мероприятия</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link" href="#Contacts">Контакты</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container-fluid main-background p-0">
    <div class="main-shadow p-0 container-fluid">
        <div class="main container" id="Main">
            <h1>Гончарная мастерская<br>
                №1 в городе</h1>
            <p>Мы ежедневно проводим мастер-классы по гончарному делу для детей и взрослых, занимаемся
                организацией творческих мероприятий и праздников.</p>

            <form method="get" action="#Form">
                <button class="MainButton">Записаться</button>
            </form>
        </div>
    </div>
</div>
<div class="wave container-fluid p-0 pb-5">
    <img class="wave-img" src="../img/volna.svg">
</div>

<div class="about-us container p-0" id="AboutUs">
    <div class="about-us-head text-center about-us-blob d-flex flex-column justify-content-center">
        <h2>Почему выбирают именно нас?</h2>
        <h3>Наши преимущества</h3>
    </div>
    <p class="text-center mx-auto">В гончарной мастерской на мастер-классе по гончарному делу вы сможете сделать
        собственное изделие из глины -
        никаких ограничений!</p>

    <div class="container container-items  justify-content-around text-center">
        <div class="row-about-us">
            <div class="about-us-item order-0">
                <img src="../img/advantages/1.svg">
                <p>Мы расположены в 2 минутах ходьбы от метро</p>
            </div>
            <div class="about-us-item order-1">
                <img src="../img/advantages/2.svg">
                <p>Качественные инструменты и экологичные материалы</p>
            </div>
        </div>
        <div class="row-about-us-2">
            <div class="about-us-item order-2">
                <img src="../img/advantages/3.svg">
                <p>Создавайте что вам хочется, в нашей мастерской!</p>
            </div>
            <div class="about-us-item order-3">
                <img src="../img/advantages/4.svg">
                <p>Уютная атмосфера и опытные мастера</p>
            </div>
        </div>
    </div>
</div>

<div class="howtoget container p-0" id="HowToGet">
    <div class="howtoget-head text-center howtoget-blob d-flex flex-column justify-content-center">
        <h2>Мы находимся здесь</h2>
    </div>
</div>
<!--Карта-->
<div class="map">
    <script type="text/javascript" charset="utf-8" async
            src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A07b9e553a36f442e3e9726cff4108ff6c058749a1e729dca6dea6b0ac30e1432&amp;width=100%&amp;height=500&amp;lang=ru_RU&amp;scroll=true">
    </script>
</div>


<div class="background-container">
    <!--Начало фона-->
    <div class="master-class-container p-0" id="MasterClassContainer">
        <div class="master-class-head text-center master-class-blob d-flex flex-column justify-content-center">
            <h2>Мастер-классы по гончарному делу каждый день</h2>
            <p>В стоимость мастер-класса уже включены материалы и обжиг</p>
        </div>

        <?= ListView::widget([
                //Вывод мастер классов
            'options' => ['class' => 'justify-content-center row-master-class'],
            'itemOptions' => ['tag' => 'div', 'class' => 'item'],
            'dataProvider' => $dataProvider,
            'itemView' => '_item',
            'layout' => '{items}'

        ]) ?>

    </div>
    <div class="events-container" id="Events">
        <div class="events-head text-center events-blob d-flex flex-column justify-content-center">
            <h2>Творческие мероприятия</h2>
            <h3>Наша гончарная мастерская - лучшая идея для события любого масштаба!</h3>
        </div>
        <p class="events-main-text text-center mx-auto">Не знаете, где отметить ваш праздник, корпоратив, провести
            свидание, просто культурно отдохнуть? Тогда наша гончарная мастерская - лучшая идея для интересного
            проведения события любого масштаба!</p>

        <?= ListView::widget([
                //Вывод творческих мероприятий
            'dataProvider' => $eventsDataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => '_events_item',
            'layout' => '{items}'
        ]) ?>

    </div>

    <div class="work-background p-0 container-fluid" id="WorkOffer">
        <div class="work-container d-flex justify-content-center flex-column text-center align-items-center"
             id="#WorkOffer">
            <h4>Хотите стать частью нашей команды?</h4>
            <p>Звоните по телефону <a href="tel:+7 (999) 923 93 39">+7 (999) 923 93 39</a></p>
            <p>Пишите на почту <a href="mailto:gonmasterskaya@yandex.ru">gonmasterskaya@yandex.ru</a></p>
        </div>
    </div>
    <!--Конец фона-->
</div>

<div class="GuestsWorksContainer" id="GuestsWorksContainer">
    <div class="guests-works-head text-center guests-works-blob d-flex flex-column justify-content-center">
        <h2>Работы наших гостей</h2>
        <p>Посетив наши мастер-классы вы сможете воплотить все
            ваши идеи!</p>
    </div>
</div>
<div id="CarouselGuestsWorks" class="carousel slide p-0" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#CarouselGuestsWorks" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#CarouselGuestsWorks" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#CarouselGuestsWorks" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
    </div>
    <!--Изображения должны быть одинаковых размеров-->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../img/slider/1.png" class="w-100 d-block" alt="carousel-image">
        </div>
        <div class="carousel-item">
            <img src="../img/slider/2.png" class="w-100 d-block" alt="carousel-image">
        </div>
        <div class="carousel-item">
            <img src="../img/slider/3.png" class="w-100  d-block" alt="carousel-image">
        </div>
    </div>
</div>


<div class="form-container" id="Form">
    <div class="form-head text-center form-blob d-flex flex-column justify-content-center">
        <h2>Запишитесь в гончарную мастерскую прямо сейчас!</h2>
        <p>Просто заполните форму и мы с вами свяжемся!</p>
    </div>
    <div class="d-flex justify-content-end">
        <div class="form-background container-fluid p-0"></div>
        <form id="feedback-form" class="feedback-form  d-flex flex-column align-items-end justify-content-center" action="<?php echo \yii\helpers\Url::to('feedback_form/create') ?>"
              method="POST">
            <input maxlength="60" required type="text" name="name" id="name" placeholder="Ваше имя">
            <input maxlength="20" required type="tel" class="form-tel" name="tel" id="tel" placeholder="Ваш телефон">
            <select required name="services" id="services">
                <option value="" selected>Что вас интересует?</option>
                <option value="Мастер классы">Мастер классы</option>
                <option value="Организация мероприятий">Организация мероприятий</option>
                <option value="Другое">Другое</option>
            </select>
            <button class="align-self-center"  type="submit">Записаться</button>
        </form>

    </div>
</div>


<footer class="container-fluid p-0">
    <div class="footer-container" id="Contacts">
        <div class="contacts-social align-items-center d-flex justify-content-between">
            <ul class="contacts-info">
                <li>
                    <h3>Контакты</h3>
                </li>
                <li>
                    <a href="tel:+7 (999) 923 93 39">Телефон: +7 (999) 923 93 39</a>
                </li>
                <li>
                    <a href="mailto:gonmasterskaya@yandex.ru">Почта: gonmasterskaya@yandex.ru</a>
                </li>
                <li>
                    <p class="m-0">Адрес: Санкт-Петрбург, пр.<br> Стачек, д. 23а</p>
                </li>
            </ul>
            <div class="col-footer">
                <a href="#Main">
                    <img src="../img/footerlogo.svg" class="footer-logo" alt="footer-logo">
                </a>
                <p class="copyright">© Гончарная мастерская</p>
            </div>

            <ul class="social-networks-info">
                <li>
                    <h3>Соц. сети</h3>
                </li>
                <li>
                    <a href="https://vk.com/gonmasterskaya">vk.com/gonmasterskaya</a>
                </li>
                <li>
                    <a href="https://www.instagram.com/gonmasterskaya">@gonmasterskaya</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
<script src="../../bootstrap/js/bootstrap.js"></script>
<script src="../../js/phone_pattern.js"></script>
</body>

</html>