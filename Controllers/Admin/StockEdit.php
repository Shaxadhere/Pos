<?php
include_once('../../config.php');
include_once('../../Models/Admin/StocksModel.php');

$model = new StockModel();

if (isset($_GET['uuid'])) {
    $uuid = $_GET['uuid'];
    $fetched = $model->View($uuid);
    $stock = mysqli_fetch_array($fetched);
}
?>
<style>
    span {
        cursor: pointer;
    }

    .minus,
    .plus {
        width: 20px;
        height: 33px;
        background: #f2f2f2;
        border-radius: 4px;
        padding: 8px 5px 8px 5px;
        border: 1px solid #ddd;
        display: inline-block;
        vertical-align: middle;
        text-align: center;
    }

    input {
        height: 34px;
        width: 100px;
        text-align: center;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
        display: inline-block;
        vertical-align: middle;
    }
</style>

<form method="post" action="<?= $_HTMLROOTURI ?>/Models/Admin/Stock.php" id="editStockForm">
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Stock</h6>
                <button type="button" class="close" data-dismiss="modal" onclick="window.location.reload()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                   

                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" value="<?= $stock[0] ?>" name="id">

                                <div class='col-md-6'>
                                    <h6>Product Code:</h6>
                                    <p><?= $stock[2] ?></p>
                                </div>
                                <div class='col-md-6'>
                                    <h6>Product Name:</h6>
                                    <p><?= $stock[3] ?></p>
                                </div>

                                <div class='col-md-6'>
                                    <h6>Price:</h6>
                                    <p><?= $stock[4] ?></p>
                                </div>

                                <div class='col-md-6'>
                                    <h6>Quantity:</h6>
                                    <div class="number">
                                        <span class="minus">-</span>
                                        <input type="number" value="<?= $stock[1] ?>" min="<?= $stock[1] ?>" name="Quantity" />
                                        <span class="plus">+</span>
                                    </div>
                                </div>


                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary tx-13" name="editStock" value="Save">
                
            </div>
        </div>
    </div>
</div>
</form>
<script>
    $(document).ready(function() {
        $('#viewDetails').modal('show');
    });

    $(document).ready(function() {
        $('.minus').click(function() {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function() {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });
</script>