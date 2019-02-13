<?php

/* @var $this yii\web\View */
/* @var $node \app\models\SubElements */


$this->title = 'Тестовое задание';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?=$this->title?></h1>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <ul>
                <?php
                foreach ($result as $node){
                    echo $node->getHtml();
                }
                ?>
                </ul>
            </div>
        </div>

    </div>
</div>
