<?php
include_once('../../config.php');
getHeader("Dashboard", 'header.php');


?>
<style>
    .btn-group,
    .btn-group-vertical {
        position: relative;
        display: inline-flex;
        vertical-align: middle;
        transform: translate(19px, 0px);
    }

    button.pro-name {
        background: unset;
        border: unset;
        color: #0180fb;
        padding: unset;
    }

    button.pro-name:hover {
        color: #0168fa;
        background-color: unset;
        border-color: unset;
    }

    .increase-decrease button.btn.btn-primary,
    button.pro-name:active {
        color: #0168fa !important;
        background-color: unset !important;
        border-color: unset !important;
        box-shadow: unset !Important;
    }

    .increase-decrease button.btn.btn-primary,
    button.pro-name:focus {
        color: #0168fa !important;
        background-color: unset !important;
        border-color: unset !important;
        box-shadow: unset !Important;
    }

    button.pro-name span {
        font-size: 18px !IMPORTANT;
    }

    .search {
        position: relative;
        margin: 0 auto;
        width: 100%;
    }

    .search input {
        height: 37px !important;
        background: white url(https://cssdeck.com/uploads/media/items/5/5JuDgOa.png) 8px 12px no-repeat !important;
    }
</style>


<div class="row">
    <div class="col-md-6">
        <div id="userformscroll" class="scrollbar-primary pos-relative ht-350 bd">
            <div class="pd-20">

                <!------------Start Of Form------------>

                <form method="post" id="checkoutForm">
                    <?php

                    if (isset($_GET['error'])) {
                        $error = $_GET['error'];
                    }

                    if (!empty($error)) {
                        echo "<span for='error' style='color:red'>$error</span>";
                        echo "<br>";
                    }

                    ?>
                    <div class="form-group">
                        <label>Customer Name<span style="color:red">*</span></label>
                        <input type="text" required="Customer Name is Required" name="CustomerName" class="form-control" id="CustomerName" placeholder="Ali Sethi.. etc">
                        <?php

                        if (isset($_GET['CustomerName'])) {
                            $CustomerName = $_GET['CustomerName'];
                            echo "<span for='error' style='color:red;font-size: 12px;'>$CustomerName</span>";
                        }

                        ?>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Address<span style="color:red">*</span></label>
                            <input type="text" required="Address is required" name="Address" class="form-control" id="Address" placeholder="Suite, Apt..etc">
                            <?php

                            if (isset($_GET['Address'])) {
                                $Address = $_GET['Address'];
                                echo "<span for='error' style='color:red;font-size: 12px;'>$Address</span>";
                            }

                            ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">State<span style="color:red">*</span></label><br>
                            <input id="theStates" type="text" required="State is required" name="State" class="form-control" placeholder="State">
                            <?php

                            if (isset($_GET['State'])) {
                                $State = $_GET['State'];
                                echo "<span for='error' style='color:red;font-size: 12px;'>$State</span>";
                            }

                            ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">City<span style="color:red">*</span></label><br>
                            <input id="theCities" type="text" required="City is required" name="City" class="form-control" placeholder="City">
                            <?php

                            if (isset($_GET['City'])) {
                                $City = $_GET['City'];
                                echo "<span for='error' style='color:red;font-size: 12px;'>$City</span>";
                            }

                            ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Postal Code</label><br>
                            <input id="PostalCode" type="text" name="PostalCode" class="form-control" placeholder="PostalCode">
                            <?php

                            if (isset($_GET['PostalCode'])) {
                                $PostalCode = $_GET['PostalCode'];
                                echo "<span for='error' style='color:red;font-size: 12px;'>$PostalCode</span>";
                            }

                            ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Landmark</label><br>
                            <input id="Landmark" type="text" name="Landmark" class="form-control" placeholder="Landmark">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Email</label>
                            <input id="Email" type="email" name="Email" class="form-control" placeholder="abc@example.com">
                            <?php

                            if (isset($_GET['Email'])) {
                                $Email = $_GET['Email'];
                                echo "<span for='error' style='color:red;font-size: 12px;'>$Email</span>";
                            }

                            ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Mobile<span style="color:red">*</span></label>
                            <input type="phone" id="Mobile" required="Mobile is required" name="Mobile" class="form-control" placeholder="Mobile number">
                            <?php

                            if (isset($_GET['Mobile'])) {
                                $Mobile = $_GET['Mobile'];
                                echo "<span for='error' style='color:red;font-size: 12px;'>$Mobile</span>";
                            }

                            ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Phone</label>
                            <input type="phone" id="Phone" name="Phone" class="form-control" placeholder="Phone number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Fax</label>
                        <input type="text" name="Fax" class="form-control" id="Fax" placeholder="Fax number">
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Note</label>
                        <input type="text" name="Note" class="form-control" id="Note" placeholder="Any notes..">
                    </div>

            </div>
        </div>

        <br>
        <div class="card">
            <div class="card-body">
                <div class="form-group">

                    <input type="text" name="AmountPaid" class="form-control" id="AmountPaid" placeholder="Amount Paid">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3 id="totalbilllabel">PKR 00.00</h3>
                        <span id="returnamountlabel"><strong>Return:</strong> 00.00</span>

                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">



        <div class="search">
            <input type="text" id="searchProduct" name="searchProduct" placeholder="Search..." class="form-control" />
            <ul class="results" id="searchProductResults">
                <li>type something..</li>
            </ul>
        </div>
        </section>


        <br>
        <div id="scroll1" class="scrollbar-lg pos-relative ht-300 bd">
            <div class="pd-20 row" style="padding: 20px 20px 0px 20px;">
                <div class="col-md-6">
                    <span style="font-weight:bold">Product</span>
                </div>
                <div class="col-md-3">
                    <span style="font-weight:bold">QTY</span>
                </div>
                <div class="col-md-3">
                    <span style="font-weight:bold">Unit Price</span>
                </div>

            </div>
            <div class="pd-20" id="itemslist"></div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <span><strong>Goods and Services Tax 17%</strong></span>
                    </div>
                    <div class="col-md-6">
                        <span style="text-align:right; float:right" id="gst">PKR 00.00</span>
                    </div>
                    <div class="col-md-6">
                        <span><strong>Total Amount</strong></span>
                    </div>
                    <div class="col-md-6">
                        <span style="float:right; float:right" id="totalpricelabel">PKR 00.00</span>
                    </div>
                    </br>
                    </br>
                    <div class="col-md-6">

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" id="emptyCart" class="btn btn-danger" style="width:150px">Empty Cart</button>
                            <button type="button" id="checkOut" class="btn btn-primary blue-checkout" style="width:284px">Check Out</button>
                            </form>


                            <!------------End Of Form------------>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="pos-absolute t-10 r-10">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header" style="background: #1068fa;">
                <h6 class="tx-inverse tx-14 mg-b-0 mg-r-auto" style="color:white">Notification</h6>
                <small style="color:white">Just now</small>
                <button type="button" class="ml-2 mb-1 close tx-normal" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <span id='toastMsg'></span>
            </div>
        </div>
    </div>


    <?php
    getFooter('footer.php');
    if(isset($_REQUEST['Success'])){
        echo "<script>";
        echo "$('#toastMsg').html('$_REQUEST[Success]');";
        echo "$('.toast').toast({delay: 4000});";
        echo "$('.toast').toast('show');";
        echo "</script>";
    }
    ?>

    
    <script>
        //When invoice is empty
        if ($('#itemslist').is(':empty')) {
            $('#itemslist').append(
                "<span id='empty'><center><span>Products will appear here after you add them to cart</span><hr class='mg-y-20'></center></span>"
            );
        }

        //On Checkout Button is pressed
        $('#checkOut').click(function() {

            var customerName = $('#CustomerName').val();
            var address = $('#Address').val();
            var city = $('#theCities').val();
            var state = $('#theStates').val();
            var email = $('#Email').val();
            var mobile = $('#Mobile').val();
            var postalCode = $('#PostalCode').val();
            var landmark = $('#Landmark').val();
            var phone = $('#Phone').val();
            var fax = $('#Fax').val();
            var note = $('#Note').val();

            var productIds = $('.productIds').map(function() {
                return $(this).val();
            }).get();

            var qtys = $('.qtys').map(function() {
                return $(this).val();
            }).get();

            var prices = $('.prices').map(function() {
                return $(this).html();
            }).get();

            var amountPaid = $('#AmountPaid').val();

            var status = true;

            if (customerName.length == 0) {
                status = false;
                if (!($('#customerNameError').length)) {
                    $('#CustomerName').after("<span id='customerNameError' style='color:red; font-size:12px;'>Customer Name is Required</span>");
                }
            }
            if (customerName.length != 0) {
                status = true;
                $('#customerNameError').remove();
            }

            if (address.length == 0) {
                status = false;
                if (!($('#AddressError').length)) {
                    $('#Address').after("<span id='AddressError' style='color:red; font-size:12px;'>Address is Required</span>");
                }
            }
            if (address.length != 0) {
                status = true;
                $('#AddressError').remove();
            }

            if (city.length == 0) {
                status = false;
                if (!($('#CityError').length)) {
                    $('#theCities').after("<span id='CityError' style='color:red; font-size:12px;'>City is Required</span>");
                }
            }
            if (city.length != 0) {
                status = true;
                $('#CityError').remove();
            }

            if (state.length == 0) {
                status = false;
                if (!($('#StateError').length)) {
                    $('#theStates').after("<span id='StateError' style='color:red; font-size:12px;'>State is Required</span>");
                }
            }
            if (state.length != 0) {
                status = true;
                $('#StateError').remove();
            }

            if (mobile.length == 0) {
                status = false;
                if (!($('#MobileError').length)) {
                    $('#Mobile').after("<span id='MobileError' style='color:red; font-size:12px;'>Mobile is Required</span>");
                }
            }
            if (mobile.length != 0) {
                status = true;
                $('#MobileError').remove();
            }

            if (amountPaid.length == 0) {
                status = false;
                if (!($('#AmountPaidError').length)) {
                    $('#AmountPaid').after("<span id='AmountPaidError' style='color:red; font-size:12px;'>Please enter the amount paid</span>");
                }
            }
            if (amountPaid.length != 0) {
                status = true;
                $('#AmountPaidError').remove();
            }

            if ($('.qtys').length == 0) {
                status = false;
                if (!($('#zeroProductsError').length)) {
                    $('#empty').empty();
                    $('#itemslist').append(
                        "<span id='zeroProductsError' style='color:red;'><center><span>Please add some products to cart first</span><hr class='mg-y-20'></center></span>"
                    );
                }
            }


            if (status) {
                $.ajax({
                    type: "POST",
                    url: "<?= $_HTMLROOTURI ?>/Models/Pos?CustomerName=" +
                        customerName +
                        "&Address=" +
                        address +
                        "&PostalCode=" +
                        postalCode +
                        "&Landmark=" +
                        landmark +
                        "&City=" +
                        city +
                        "&State=" +
                        state +
                        "&Phone=" +
                        phone +
                        "&Fax=" +
                        fax +
                        "&Note=" +
                        note +
                        "&Email=" +
                        email +
                        "&Mobile=" +
                        mobile +
                        "&ProductIds=" +
                        productIds +
                        "&Qtys=" +
                        qtys +
                        "&Prices=" +
                        prices +
                        "&AmountPaid=" +
                        amountPaid,
                    contentType: 'application/json; charset=utf-8',
                    success: function(response) {
                        var res = JSON.parse(response);
                        $('#totalpricelabel').html("PKR " + res[0] + ".00");
                        $('#returnamountlabel').html("<strong>Return: </strong>" + res[1] + ".00");
                        $('#gst').html("PKR " + res[2] + ".00");
                        $('#totalbilllabel').html("PKR " + res[3] + ".00");
                        $('#toastMsg').html(customerName + "'s order with " + res[3] + " rupees was successfully checked out")
                        $(".toast").toast({
                            delay: 4000
                        });
                        $(".toast").toast('show');
                        $('#CustomerName').val('');
                        $('#Address').val('');
                        $('#theCities').val('');
                        $('#theStates').val('');
                        $('#Email').val('');
                        $('#Mobile').val('');
                        $('#PostalCode').val('');
                        $('#Landmark').val('');
                        $('#Phone').val('');
                        $('#Fax').val('');
                        $('#Note').val('');
                        $('#AmountPaid').val('');
                        $('#itemslist').empty();
                        $('#itemslist').append(
                            "<span id='empty'><center><span>Products will appear here after you add them to cart</span><hr class='mg-y-20'></center></span>"
                        );

                        setTimeout(function() {
                            $('#totalpricelabel').html("PKR 0.00");
                            $('#returnamountlabel').html("<strong>Return: </strong>0.00");
                            $('#gst').html("PKR 0.00");
                            $('#totalbilllabel').html("PKR 0.00");
                        }, 4000);


                    },
                    error: function(e) {
                        alert(e);
                    }
                })
            }
        });

        //On Empty Cart Button Pressed
        $('#emptyCart').click(function() {
            $('#itemslist').empty();
            $('#itemslist').append(
                "<span id='empty'><center><span>Products will appear here after you add them to cart</span><hr class='mg-y-20'></center></span>"
            );
            $('#totalpricelabel').html("PKR 0.00");
            $('#returnamountlabel').html("<strong>Return: </strong>0.00");
            $('#gst').html("PKR 0.00");
            $('#totalbilllabel').html("PKR 0.00");
        });

        //On key up getting search results from server
        $('#searchProduct').on('input', function() {
            input = this.value;
            $.ajax({
                type: "POST",
                url: "ProductSearch?input=" + input,
                success: function(response) {
                    $('#searchProductResults').empty();
                    $('#searchProductResults').append(response);
                },
                error: function(e) {
                    alert(e);
                }
            })
        });

        //On press enter select the insert the first product in the billing section
        $('#searchProduct').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                if ($(".index0").length) {
                    var uuid = $(".index0").attr('value');
                    var prices = $('.prices').map(function() {
                        return $(this).html();
                    }).get();

                    $.ajax({
                        type: "POST",
                        url: "ProductSearchFetch?uuid=" + uuid + "&Prices=" + prices,
                        success: function(response) {
                            $('#empty').empty();
                            $('#zeroProductsError').empty();
                            var res = JSON.parse(response);
                            $('#itemslist').append(res[0]);
                            $('#totalpricelabel').html("PKR " + res[1] + ".00");
                            $('#gst').html("PKR " + res[3] + ".00");
                            $('#totalbilllabel').html("PKR " + res[2] + ".00");
                        },
                        error: function(e) {
                            alert(e);
                        }
                    })
                } else {
                    document.getElementById(".index0").innerHTML = "not found!";
                }
            }
        });

        /////////////////States/////////////////
        var substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substrRegex;
                matches = [];
                substrRegex = new RegExp(q, 'i');
                $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });

                cb(matches);
            };
        };

        var states = ['Sindh', 'Punjab', 'Balochistan', 'KPK'];

        $('#theStates').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'states',
            source: substringMatcher(states)
        });

        ///////////////////City/////////////////
        var substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substrRegex;
                matches = [];
                substrRegex = new RegExp(q, 'i');
                $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });

                cb(matches);
            };
        };

        var cities = [
            'Karachi',
            'Lahore',
            'Sialkot City',
            'Faisalabad',
            'Rawalpindi',
            'Peshawar',
            'Saidu Sharif',
            'Multan',
            'Gujranwala',
            'Islamabad',
            'Quetta',
            'Bahawalpur',
            'Sargodha',
            'New Mirpur',
            'Chiniot',
            'Sukkur',
            'Larkana',
            'Shekhupura',
            'Jhang City',
            'Rahimyar Khan',
            'Gujrat',
            'Kasur',
            'Mardan',
            'Mingaora',
            'Dera Ghazi Khan',
            'Nawabshah',
            'Sahiwal',
            'Mirpur Khas',
            'Okara'
        ]

        $('#theCities').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'cities',
            source: substringMatcher(cities)
        });

        const scroll1 = new PerfectScrollbar('#scroll1', {
            suppressScrollX: true
        });


        const userformscroll = new PerfectScrollbar('#userformscroll', {
            suppressScrollX: true
        });
    </script>