<?php

use app\assets\SiteBundle;

/**
 * @var \app\models\Entity\Person $person
 * @var $info
 */

SiteBundle::register($this);
$this->title = 'Свадьба Вано & Юлии';
?>


<div class="clouds"></div>

<div id="fullpage">
    <div class="section header">
        <div class="content">
            <span class="inv_title">ПРИГЛАШЕНИЕ НА СВАДЬБУ</span>
            <div class="logo">
                <span class="he">Вано</span><br>
                <span>&</span><br>
                <span class="she">Юлия</span><br>
            </div>
            <div class="date">
                <span class="month">Май</span>
                <span class="day">05</span>
                <span class="year">2022</span>
            </div>
            <div class="counter-block">
                <div class="counter">
                    <div class="el">
                        <div class="day"></div>
                        <div class="label">Дней</div>
                    </div>
                    <div class="el">
                        <div class="hour"></div>
                        <div class="label">Часов</div>
                    </div>
                    <div class="el">
                        <div class="min"></div>
                        <div class="label">Минут</div>
                    </div>
                    <div class="el">
                        <div class="sec"></div>
                        <div class="label">Секунд</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($person && $person->status == false):?>
        <div class="section info-block inviting">
            <div class="content">
                <p class="text">
                    <?= $person->text ?>
                </p>
                <div class="control">
                    <button id="b_success" class="btn">Принять</button>
                </div>
            </div>
        </div>
    <?php endif;?>

    <div class="section info-block">
        <div class="content">
            <div class="title">КОГДА</div>
            <div class="when">четверг 05.05.2022 в 15:00</div>
        </div>
    </div>

    <div class="section info-block plan">
        <div class="content">
            <div class="title">КАК</div>
            <div>
                <p>Для наших иногородних гостей будет предоставлен уютный  коттедж,  так же на территории Иваново Подворья на 3 дня и 2 ночи с 04.05.2022 с 16:00- 06.05. 2022- 20:00.</p>
                <p>Все необходимое для комфортного время препровождения предоставляется.</p>
                <p>Мы не привязываемся к дресс-коду по цвету Вашего наряда , но хотим напомнить, что Весенняя погодка в Санкт-Петербурге переменчива, не забывайте, что наряд должен быть не только безупречный,  но и комфортный.
                </p>
            </div>
        </div>
    </div>
    <div class="section info-block plan">
        <div class="content">
            <div class="title">ГДЕ</div>
            <div>
                <p>Наш праздник пройдет в прекрасном месте. Усадьба «Иваново Подворье» по адресу : Разъезжая ул., 13, лит. А, Токсово, Ленинградская обл., 188664. Парковки много и она бесплатная.</p>
                <p>Церемония пройдет так же на территории Усадьбы ровно в 16:00, поэтому просим приехать немного заранее,  угоститься бокальчиком игристого,  попробовать замечательные закуски на фуршете и оставить свое пожелание молодожёнам  в Welcome zone.</p>
            </div>
        </div>
    </div>

    <div class="section info-block map">
        <div class="content">
            <div class="title">КАРТА</div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1986.7031675910282!2d30.52247761597521!3d60.135979353125926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4697ceae98f170e7%3A0xa63713f9951b4eb5!2z0KPRgdCw0LTRjNCx0LAg0JjQstCw0L3QvtCy0L4g0J_QvtC00LLQvtGA0YzQtQ!5e0!3m2!1sru!2s!4v1643645077159!5m2!1sru!2s" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>
