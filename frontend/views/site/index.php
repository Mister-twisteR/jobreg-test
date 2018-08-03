<?php

/* @var $this yii\web\View */

$this->title = 'Test Job Listing Application';
?>
<div class="listing">

    <?php if (isset($listing)) : ?>
    <?php foreach ($listing as $item) : ?>
        <div class="item flex">
            <div class="thumb_logo flex"><img src="<?= $item->logo; ?>" alt="<?= $item->title.', '.$item->city; ?>"></div>

            <div class="description flex">
                <p><?= \common\components\Helper::excerpt($item->body); ?></p>
                <div class="position"><?= $item->title; ?></div>
            </div>

            <div class="details flex">
                <div class="detail">City: <span class="city"><?= strtolower($item->city); ?></span></div>
                <div class="detail">Number of positions: <?= $item->numberOfPositions; ?></div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php else : ?>
        <div class="absent-block">There is no vacancies</div>
    <?php endif; ?>

</div>
