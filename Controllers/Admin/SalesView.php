<?php
include_once('../../config.php');
include_once('../../Models/Admin/SalesModel.php');

$model = new SalesModel();

if (isset($_GET['uuid'])) {
    $uuid = $_GET['uuid'];
    $fetched = $model->getInvoice($uuid);
}
?>
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Customer Details</h6>
                <button type="button" class="close" data-dismiss="modal" onclick="window.location.reload()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header"><strong>Invoice Dated:</strong> 2020-12-10</div>
                    <div class="card-body">
                        <div class="row">
                            <div data-label="Example" class="df-example demo-table" style="width:100% !important;">
                                <div class="table-responsive">
                                    <table class="table table-primary table-hover table-striped mg-b-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $count = 1;
                                            while ($sale = mysqli_fetch_array($fetched)) {

                                                echo "<tr>";
                                                echo "<th scope='row'>$count</th>";
                                                echo "<td>" . $sale['0'] . "</td>";
                                                echo "<td>" . $sale[1] . "</td>";
                                                echo "<td>150</td>";
                                                echo "</tr>";
                                                $count = $count + 1;
                                            }

                                            ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td><strong>Total Bill:</strong></td>
                                                <td></td>
                                                <td><strong>1280</strong></td>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- table-responsive -->

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnDelete" value="<?= $sale[0] ?>" class="btn btn-danger tx-13" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#viewDetails').modal('show');
        });
    </script>