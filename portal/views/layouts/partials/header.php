<div class="navUser">
    <div class="container">
        <div class="row">
            <div class="collapse navbar-collapse" id="collapse-userui">
                <ul class="nav navbar-nav navbar-left">

                    <?php if (Yii::$app->user->isGuest) : ?>
                        <li><?php echo $HTML::a('<i class="fa fa-user"></i> Login', ['/auth/login']) ?></li>
                        <li><?php echo $HTML::a('<i class="fa fa-sign-in"></i> Sign Up', ['/registration/agreement']) ?></li>
                    <?php else: ?>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"><span
                                    class="caret"></span><?php echo Yii::$app->user->identity->username; ?></a>
                            <ul class="dropdown-menu">
                                <li><?php echo $HTML::a('<i class="fa fa-user"></i> My Profile', ['/account/profile']) ?></li>
                                <li><?php echo $HTML::a('<i class="fa fa-sign-out"></i> Logout', ['/auth/logout']) ?></li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span>ENG</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">ZH-HK</a></li>
                            <li><a href="#">ENG</a></li>
                        </ul>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><?php echo $HTML::img('@web/img/ui/fb_share.png') ?></a></li>
                    <li><a href="#"><?php echo $ICON::show('mobile') ?>+852 21523988</a></li>
                    <li><a href="#"><?php echo $ICON::show('envelope') ?>Email Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>