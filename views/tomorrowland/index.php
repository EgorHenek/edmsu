<?php
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Специальный проект EDM.SU посвящённый крупнейшему фестивалю - Tomorrowland 2015'
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'TomorrowLand, EDM, Trance, House, Music, Электронная музыка'
]);
$this->registerLinkTag([
    'rel' => 'image_src',
    'content' => '../tomorrow/images/background/page-top.jpg',
]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tomorrowland 2015</title>
    <meta name="author" content="Egor Henek">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <?php $this->head() ?>
    <!-- Custom Styles -->
    <link href="../tomorrow/css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="../tomorrow/js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
    <?php $this->beginBody() ?>

    <!-- Preloader -->
    <div id="preloader">
        <div id="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="lading"></div>
        </div>
    </div><!-- /#preloader -->
    <!-- Preloader End-->

    <!-- Main Menu -->
    <div id="main-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">

        <div class="navbar-header">
            <!-- responsive navigation -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Открыть навигацию</span>
                <i class="fa fa-bars"></i>
            </button> <!-- /.navbar-toggle -->

        </div> <!-- /.navbar-header -->

        <nav class="collapse navbar-collapse">
            <!-- Main navigation -->
            <ul id="headernavigation" class="nav navbar-nav">
                <li class="active"><a href="#page-top">Главная</a></li>	
                <li><a href="#about">О фестивале</a></li>
                <li><a href="#lineup">Line-up</a></li>
                <li><a href="#subscribe">Подписаться на новости</a></li>
                <li><a href="#contact">Социальные сети</a></li>
                <li><a href="../" class="external">Вернуться на EDM.SU</a></li>
                <li><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
                    <div class="yashare-auto-init external"
                        data-yashareL10n="ru"
                        data-yashareType="small"
                        data-yashareQuickServices="vkontakte,facebook,twitter"
                        data-yashareTheme="counter"
                        data-yashareLink="<?= Url::canonical() ?>"
                        data-yashareTitle="TomorrowLand 2015 специальный проект EDM.SU"
                        data-yashareDescription="Специальный проект EDM.SU посвящённый крупнейшему фестивалю - Tomorrowland 2015"
                        data-yashareImage="<?= '../tomorrow/images/background/page-top.jpg' ?>"
                    ></div></li>
            </ul> <!-- /.nav .navbar-nav -->
        </nav> <!-- /.navbar-collapse  -->
    </div><!-- /#main-menu -->
    <!-- Main Menu End -->

    <!-- Page Top Section -->
    <section id="page-top" class="section-style" data-background-image="../tomorrow/images/background/page-top.jpg">
        <div class="pattern height-resize">
            <div class="container">
                <h1 class="site-title">
                    TomorrowLand 2015
                </h1><!-- /.site-title -->
                <h3 class="section-name">
                    <span>
                        Live трансляций на EDM.SU
                    </span>
                </h3><!-- /.section-name -->
                <h2 class="section-title">
                    Скоро
                </h2><!-- /.Section-title  -->
                <div id="time_countdown" class="time-count-container">

                    <div class="col-sm-3">
                        <div class="time-box">
                            <div class="time-box-inner dash days_dash animated" data-animation="rollIn" data-animation-delay="300">
                                <span class="time-number">
                                    <span class="digit">0</span>
                                    <span class="digit">0</span>
                                    <span class="digit">0</span>
                                </span>
                                <span class="time-name">Дней</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="time-box">
                            <div class="time-box-inner dash hours_dash animated" data-animation="rollIn" data-animation-delay="600">
                                <span class="time-number">
                                    <span class="digit">0</span>
                                    <span class="digit">0</span>	
                                </span>
                                <span class="time-name">Часов</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="time-box">
                            <div class="time-box-inner dash minutes_dash animated" data-animation="rollIn" data-animation-delay="900">
                                <span class="time-number">
                                    <span class="digit">0</span>
                                    <span class="digit">0</span>
                                </span>
                                <span class="time-name">Минут</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="time-box">
                            <div class="time-box-inner dash seconds_dash animated" data-animation="rollIn" data-animation-delay="1200">
                                <span class="time-number">
                                    <span class="digit">0</span>
                                    <span class="digit">0</span>
                                </span>
                                <span class="time-name">Секунд</span>
                            </div>
                        </div>
                    </div>
                </div><!-- /.time-count-container -->

                <p class="time-until">
                    <span>Время до начала</span>
                </p><!-- /.time-until -->

                <div class="next-section">
                    <a class="go-to-about"><span></span></a>
                </div><!-- /.next-section -->

            </div><!-- /.container -->
        </div><!-- /.pattern -->		
    </section><!-- /#page-top -->
    <!-- Page Top Section  End -->


    <!-- About Us Section -->
    <section id="about" class="section-style" data-background-image="../tomorrow/images/background/about-us.jpg">
        <div class="pattern height-resize"> 
            <div class="container">
                <h3 class="section-name">
                    <span>
                        О фестивале
                    </span>
                </h3><!-- /.section-name -->
                <p class="section-description">
                    Tomorrowland - это фестиваль электронной музыки и один из самых крупных фестивалей в Европе. Его уникальная психоделическая карнавальная атмосфера сопровождается электронной и танцевальной музыкой.
                    В 2015 фестиваль пройдёт в 11 раз. Даты: Пятница 24/07 – Воскресенье 26/07.
                </p><!-- /.section-description -->

                <div class="team-container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div align="center"><iframe width="640" height="360" src="https://www.youtube.com/embed/8L7LuXlETkw?rel=0" frameborder="0" allowfullscreen></iframe></div>
                        </div><!-- /.col-sm-12 -->
                    </div><!-- /.row -->

                </div><!-- /.team-container -->

                <div class="next-section">
                    <a class="go-to-lineup"><span></span></a>
                </div><!-- /.next-section -->

            </div><!-- /.container -->
        </div><!-- /.pattern -->
    </section><!-- /#about -->
    <!-- About Us Section End -->

    <!-- Line-up Us Section -->
    <section id="lineup" class="section-style" data-background-image="../tomorrow/images/background/lineup.jpg">
        <div class="pattern height-resize"> 
            <div class="container">
                <h3 class="section-name">
                    <span>
                        Line-up артистов
                    </span>
                </h3><!-- /.section-name -->
                <?php $items = [
                    [
                        'url' => '..\tomorrow\images\lineup\0053_tml_host_announce_minus_labelversion.jpeg',
                        'src' => '..\tomorrow\images\lineup\0053_tml_host_announce_minus_labelversion.jpeg',
                        'options' => array('title' => 'Minus')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\0053_tml_host_announce_paradise_b.jpg_0.jpeg',
                        'src' => '..\tomorrow\images\lineup\0053_tml_host_announce_paradise_b.jpg_0.jpeg',
                        'options' => array('title' => 'Paradise')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\cocoon.png',
                        'src' => '..\tomorrow\images\lineup\cocoon.png',
                        'options' => array('title' => 'Vinyl only')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\derrick_carter_host_announcement_tlbe_v2.png',
                        'src' => '..\tomorrow\images\lineup\derrick_carter_host_announcement_tlbe_v2.png',
                        'options' => array('title' => 'Family and the Friends')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\1507756_10152954053044177_4848964578527239207_n.jpg',
                        'src' => '..\tomorrow\images\lineup\1507756_10152954053044177_4848964578527239207_n.jpg',
                        'options' => array('title' => 'Ketaloco')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\revealed_host_announcement_tlbe_v4.jpeg',
                        'src' => '..\tomorrow\images\lineup\revealed_host_announcement_tlbe_v4.jpeg',
                        'options' => array('title' => 'Hardwell presents Revealed on Saturday')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\full_on_host_announcement_tlbe.png',
                        'src' => '..\tomorrow\images\lineup\full_on_host_announcement_tlbe.png',
                        'options' => array('title' => 'Ferry Corsten presents Full On on Saturday')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\weplayhouse.png',
                        'src' => '..\tomorrow\images\lineup\weplayhouse.png',
                        'options' => array('title' => 'We Play House Recordings on Saturday the 25th')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\kozzmozz_host_announcement_tl_be1.png',
                        'src' => '..\tomorrow\images\lineup\kozzmozz_host_announcement_tl_be1.png',
                        'options' => array('title' => 'Kozzmozz on Saturday the 25th')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\pussy_lounge_host_announcement_tlbe_v2.png',
                        'src' => '..\tomorrow\images\lineup\pussy_lounge_host_announcement_tlbe_v2.png',
                        'options' => array('title' => 'Pussy Lounge on Sunday')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\versuz.png',
                        'src' => '..\tomorrow\images\lineup\versuz.png',
                        'options' => array('title' => 'Versuz on Sunday')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\11009158_10153052988059177_598984965190385858_n.jpg',
                        'src' => '..\tomorrow\images\lineup\11009158_10153052988059177_598984965190385858_n.jpg',
                        'options' => array('title' => 'Forma.T on Sunday')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\11041879_10153067832569177_1637382537484580981_o.jpg',
                        'src' => '..\tomorrow\images\lineup\11041879_10153067832569177_1637382537484580981_o.jpg',
                        'options' => array('title' => 'Bakermat & Friends on Sunday')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\10924194_10153071765224177_4360814720772030457_o.jpg',
                        'src' => '..\tomorrow\images\lineup\10924194_10153071765224177_4360814720772030457_o.jpg',
                        'options' => array('title' => 'Star Warz on Saturday')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\dave_clarke_host_announcement_tlbe_v2.png',
                        'src' => '..\tomorrow\images\lineup\dave_clarke_host_announcement_tlbe_v2.png',
                        'options' => array('title' => 'Dave Clarke on Sunday')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\barong_family_host_announcement_tlbe_v1.png',
                        'src' => '..\tomorrow\images\lineup\barong_family_host_announcement_tlbe_v1.png',
                        'options' => array('title' => 'Barong Family on Sunday')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\smashthehouse.png',
                        'src' => '..\tomorrow\images\lineup\smashthehouse.png',
                        'options' => array('title' => 'Smash The House on Sunday')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\mazdastage_0.png',
                        'src' => '..\tomorrow\images\lineup\mazdastage_0.png',
                        'options' => array('title' => 'Mazda Journey Island at Tomorrowland')
                    ],
                    [
                        'url' => '..\tomorrow\images\lineup\11336858_10153124568879177_210458519095767227_o.jpg',
                        'src' => '..\tomorrow\images\lineup\11336858_10153124568879177_210458519095767227_o.jpg',
                        'options' => array('title' => 'Mainstage Lineup')
                    ],
                ];?>
                <?= dosamigos\gallery\Carousel::widget(['items' => $items]); ?>

                <div class="next-section">
                    <a class="go-to-subscribe"><span></span></a>
                </div><!-- /.next-section -->

            </div><!-- /.container -->
        </div><!-- /.pattern -->
    </section><!-- /#about -->
    <!-- About Us Section End -->

    <!-- Subscribe Section -->
    <section id="subscribe" class="section-style" data-background-image="../tomorrow/images/background/newsletter.jpg">
        <div class="pattern height-resize">
            <div class="container">
                <h3 class="section-name">
                    <span>
                        Предупредить меня о начале
                    </span>
                </h3><!-- /.section-name -->
                <p class="section-description">
                    Подпишись на новости или добавь события в свой Google календарь и мы предупредим тебя о начале трансляции
                </p><!-- /.section-description -->

                <form class="news-letter" method="post">
                    <p class="alert-success"></p>
                    <p class="alert-warning"></p>

                    <div class="subscribe-hide">
                        <input class="form-control" type="email" id="subscribe-email" name="subscribe-email" placeholder="Email Address"  required>
                        <button  type="submit" id="subscribe-submit" class="btn"><i class="fa fa-envelope"></i></button>
                        <span id="subscribe-loading" class="btn"> <i class="fa fa-refresh fa-spin"></i> </span>
                        <div class="subscribe-error"></div>
                    </div><!-- /.subscribe-hide -->
                    <div class="subscribe-message"></div>
                </form><!-- /.news-letter -->

                <div class="social-btn-container">
                    <span class="social-btn-box">
                        <a href="https://www.google.com/calendar/event?action=TEMPLATE&hl=ru&text=Tomorrowland%202015.%20%D0%94%D0%B5%D0%BD%D1%8C%201&dates=20150724T100000%2F20150724T230000&location=%D0%91%D1%83%D0%BC%2C%20%D0%91%D0%B5%D0%BB%D1%8C%D0%B3%D0%B8%D1%8F&ctz=Europe%2FMoscow&details=%D0%94%D0%B5%D0%BD%D1%8C%201.%20%D0%9F%D1%80%D1%8F%D0%BC%D0%B0%D1%8F%20%D1%82%D1%80%D0%B0%D0%BD%D1%81%D0%BB%D1%8F%D1%86%D0%B8%D1%8F%20%D0%BD%D0%B0%20http%3A%2F%2Fedm.su%2Ftomorrowland" class="facebook-btn">
                            24.07</a>
                    </span><!-- /.social-btn-box -->

                    <span class="social-btn-box">
                        <a href="https://www.google.com/calendar/event?action=TEMPLATE&hl=ru&text=Tomorrowland%202015.%20%D0%94%D0%B5%D0%BD%D1%8C%202.&dates=20150725T100000%2F20150725T230000&location=%D0%91%D1%83%D0%BC%2C%20%D0%91%D0%B5%D0%BB%D1%8C%D0%B3%D0%B8%D1%8F&ctz=Europe%2FMoscow&details=%D0%94%D0%B5%D0%BD%D1%8C%202.%20%D0%9F%D1%80%D1%8F%D0%BC%D0%B0%D1%8F%20%D1%82%D1%80%D0%B0%D0%BD%D1%81%D0%BB%D1%8F%D1%86%D0%B8%D1%8F%20%D0%BD%D0%B0%20http%3A%2F%2Fedm.su%2Ftomorrowland" class="twitter-btn">
                            25.07</a>
                    </span><!-- /.social-btn-box -->

                    <span class="social-btn-box">
                            <a href="https://www.google.com/calendar/event?action=TEMPLATE&hl=ru&text=Tomorrowland%202015.%20%D0%94%D0%B5%D0%BD%D1%8C%203.&dates=20150726T100000%2F20150726T220000&location=%D0%91%D1%83%D0%BC%2C%20%D0%91%D0%B5%D0%BB%D1%8C%D0%B3%D0%B8%D1%8F&ctz=Europe%2FMoscow&details=%D0%94%D0%B5%D0%BD%D1%8C%203.%20%D0%9F%D1%80%D1%8F%D0%BC%D0%B0%D1%8F%20%D1%82%D1%80%D0%B0%D0%BD%D1%81%D0%BB%D1%8F%D1%86%D0%B8%D1%8F%20%D0%BD%D0%B0%20http%3A%2F%2Fedm.su%2Ftomorrowland" class="linkedin-btn">
                                26.07</a>
                    </span><!-- /.social-btn-box -->
                </div><!-- /.social-btn-container -->

                <div class="next-section">
                    <a class="go-to-contact"><span></span></a>
                </div><!-- /.next-section -->

            </div><!-- /.container -->
        </div><!-- /.pattern -->

    </section><!-- /#subscribe -->
    <!-- Subscribe Section End -->



    <!-- Contact Section -->
    <section id="contact" class="section-style" data-background-image="../tomorrow/images/background/contact.jpg">
        <div class="pattern height-resize">
            <div class="container">
                <h3 class="section-name">
                    <span>
                        Tomorrowland в социальных сетях
                    </span>
                </h3><!-- /.section-name -->

                <p class="section-description">
                    Официальные страницы Tomorrowland в социальных сетях. Подпишись, чтобы всегда быть в курсе событий.
                </p><!-- /.section-description -->

                <div class="social-btn-container">
                    <span class="social-btn-box">
                        <a href="http://twitter.com/tomorrowland" class="twitter-btn">
                            <i class="fa fa-twitter"></i></a>
                        </span><!-- /.social-btn-box -->

                        <span class="social-btn-box">
                            <a href="https://www.facebook.com/tomorrowland" class="facebook-btn"><i class="fa fa-facebook"></i></a>
                        </span><!-- /.social-btn-box -->

                        <span class="social-btn-box">
                            <a href="http://www.youtube.com/user/TomorrowlandChannel" class="youtube-btn"><i class="fa fa-youtube"></i></a>
                        </span><!-- /.social-btn-box -->
                </div><!-- /.social-btn-container -->

                <div class="next-section">
                    <a class="go-to-page-top"><span></span></a>
                </div><!-- /.next-section -->

            </div><!-- /.container -->
        </div><!-- /.pattern -->
    </section><!-- /#contact -->
    <!-- Contact Section End -->

    <!-- Footer Section -->
        <footer id="footer-section">
            <p class="copyright">
                &copy; <a href="http://edm.su/">Henek</a> 2015, Все права защищены
            </p>
        </footer>
        <!-- Footer Section End -->

        <?php $this->endBody() ?>
        <!-- Modernizr js -->
        <script type="text/javascript" src="../tomorrow/js/modernizr-2.8.0.min.js"></script>
        <!-- Plugins -->
        <script type="text/javascript" src="../tomorrow/js/plugins.js"></script>
        <!-- Custom JavaScript Functions -->
        <script type="text/javascript" src="../tomorrow/js/functions.js"></script>
        <!-- Custom JavaScript Functions -->
        <script type="text/javascript" src="../tomorrow/js/jquery.ajaxchimp.min.js"></script>
    </body>
</html>
<?php $this->endPage() ?>
