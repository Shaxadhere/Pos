<?php
include_once('../../config.php');
getHeader("Dashboard", 'header.php');


?>

<div class="row">
    <div class="col-md-6">
        <div id="userformscroll" class="scrollbar-primary pos-relative ht-350 bd">
            <div class="pd-20">
                <form method="post" action="<?= $_HTMLROOTURI ?>/Models/Admin/Customers.php" autocomplete="chrome-off">
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
                        <label>Customer Name</label>
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
                            <label>Address</label>
                            <input type="text" required="Address is required" name="Address" class="form-control" placeholder="Suite, Apt..etc">
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
                            <label for="inputEmail4">State</label><br>
                            <input id="theStates" type="text" required="State is required" name="State" class="form-control" placeholder="State">
                            <?php

                            if (isset($_GET['State'])) {
                                $State = $_GET['State'];
                                echo "<span for='error' style='color:red;font-size: 12px;'>$State</span>";
                            }

                            ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">City</label><br>
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
                            <input id="PostalCode" type="text" required="Postal Code is required" name="PostalCode" class="form-control" placeholder="PostalCode">
                            <?php

                            if (isset($_GET['PostalCode'])) {
                                $PostalCode = $_GET['PostalCode'];
                                echo "<span for='error' style='color:red;font-size: 12px;'>$PostalCode</span>";
                            }

                            ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Landmark</label><br>
                            <input id="landmark" type="text" name="Landmark" class="form-control" placeholder="Landmark">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="Email" class="form-control" placeholder="abc@example.com">
                            <?php

                            if (isset($_GET['Email'])) {
                                $Email = $_GET['Email'];
                                echo "<span for='error' style='color:red;font-size: 12px;'>$Email</span>";
                            }

                            ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Mobile</label>
                            <input type="phone" required="Mobile is required" name="Mobile" class="form-control" placeholder="Mobile number">
                            <?php

                            if (isset($_GET['Mobile'])) {
                                $Mobile = $_GET['Mobile'];
                                echo "<span for='error' style='color:red;font-size: 12px;'>$Mobile</span>";
                            }

                            ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Phone</label>
                            <input type="phone" name="Phone" class="form-control" placeholder="Phone number">
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

                    <input type="text" name="Note" class="form-control" id="Note" placeholder="Amount Paid">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3>PKR 89.00</h3>
                        <span><strong>Return:</strong> 34.00</span>

                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">

        <div class="input-group">
           
                <form class="search" method="post" action="index.html">
                    <input type="text" name="q" placeholder="Search..." class="form-control" />
                    <ul class="results">
                        <li><a href="index.html">Search Result #1<br /><span>Description...</span></a></li>
                        <li><a href="index.html">Search Result #2<br /><span>Description...</span></a></li>
                        <li><a href="index.html">Search Result #3<br /><span>Description...</span></a></li>
                        <li><a href="index.html">Search Result #4</a></li>
                    </ul>
                </form>
            </section>
        </div>

        <br>
        <div id="scroll1" class="scrollbar-lg pos-relative ht-300 bd">
            <div class="pd-20">
                <li class="list-group-item d-flex align-items-center">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="tx-13 tx-inverse tx-semibold mg-b-0">Product Name</h6>
                            <span class="d-block tx-11 text-muted">Category / Company</span>
                        </div>
                        <div class="col-md-4">
                            <div class="row" style="font-size:16px">
                                <div class="col-md-4">
                                    <span>+</span>
                                </div>
                                <div class="col-md-4">
                                    <span>1</span>
                                </div>
                                <div class="col-md-4">
                                    <span>-</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <span style="padding:30px; font-size:16px">12.00</span>
                        </div>
                    </div>
                </li>

            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <span><strong>Goods and Services Tax 13%</strong></span>
                    </div>
                    <div class="col-md-6">
                        <span style="text-align:right; float:right">PKR 89.00</span>
                    </div>
                    <div class="col-md-6">
                        <span><strong>Total Amount</strong></span>
                    </div>
                    <div class="col-md-6">
                        <span style="float:right; float:right">PKR 89.00</span>
                    </div>
                    </br>
                    </br>
                    <div class="col-md-6">

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-danger" style="width:150px">Empty Cart</button>
                            <input type="button" class="btn btn-primary" style="width:284px" value="Check Out" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    getFooter('footer.php');
    ?>
    <script>
        $('#textboxProduct').on('input', function() {
            alert(this.value);
            $.ajax({
                type: "POST",
                url: "ProductView?uuid=" + uuid,
                success: function(response) {
                    $('#modelForm').empty();
                    $('#modelForm').append(response);
                },
                error: function(e) {
                    alert(e);
                }
            })
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