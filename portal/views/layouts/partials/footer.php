<div class="footer">
    <div class="container">
        <div class="row clearfix">
            <div class="text-right fright">
                <li><?php echo $HTML::img('@web/img/ui/credits.png') ?>
                    <span>
                        <?php echo(!empty(Yii::$app->user->identity->membership->membership_current_points)
                            ? Yii::$app->user->identity->membership->membership_current_points
                            :
                            0) ?> Credits
                    </span>
                </li>
                <li class="add-credits"><?php echo $HTML::img('@web/img/ui/addcredits.png') ?>
                    <span>Add Credits</span>
                </li>
                <li><?php echo $HTML::img('@web/img/ui/notify.png') ?><span>Notification</span></li>
            </div>
            <div class="fleft">© 2015 iDeal. All Rights Reserved.</div>
        </div>
    </div>
</div>