<?php
use yii\helpers\Url;
Yii::setAlias('@frontendUrl', Url::base().'/frontend/web');
Yii::setAlias('@backendUrl', Url::base().'/backend/web');
Yii::setAlias('@apiUrl', Url::base().'/api/web');
