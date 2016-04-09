<div class="modal fade product-page-modal add-credit-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-body">
                <a class="close" data-dismiss="modal">×</a>
                <div class="row credit-rm">
                    <div class="col-xs-6">My Credits:</div>
                    <div class="col-xs-6">
                        <?php echo(!empty(Yii::$app->user->identity->membership->membership_current_points)
                            ? Yii::$app->user->identity->membership->membership_current_points
                            :
                            0) ?> Credits Credits
                    </div>
                </div>
                <ul class="row credit-list">
                    <li class="credit-value" data-content="1">
                        <div class="col-xs-6">1 Credit</div>
                        <div class="col-xs-6">$ 1</div>
                    </li>
                    <li class="credit-value" data-content="50">
                        <div class="col-xs-6">50 Credits</div>
                        <div class="col-xs-6">$ 50</div>
                    </li>
                    <li class="credit-value" data-content="100">
                        <div class="col-xs-6">100 Credits</div>
                        <div class="col-xs-6">$ 98</div>
                    </li>
                    <li class="credit-value" data-content="500">
                        <div class="col-xs-6">500 Credits</div>
                        <div class="col-xs-6">$ 490</div>
                    </li>
                    <li class="credit-value" data-content="1000">
                        <div class="col-xs-6">1000 Credits</div>
                        <div class="col-xs-6">$ 950</div>
                    </li>
                    <li class="credit-value" data-content="999999">
                        <div class="col-xs-6">999999 Credits</div>
                        <div class="col-xs-6">$ 999,999</div>
                    </li>
                </ul>
                <input type="hidden" name="credits_to_add" id="credits_to_add" value="0">
                <button href="#" class="btn btn-primary btn-danger" id="add-credit-button">Add Credit</button>
            </div>

        </div>
    </div>
</div>