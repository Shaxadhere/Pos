<?php

include_once('config.php');


?>

<!-- Header search -->
<div class="header-search" style="margin-top:5px">
    <form action="/Home/SearchBar?Length=4" class="search" data-ajax="true" data-ajax-mode="replace" data-ajax-update="#searchResult" id="form0" method="post"> <input type="search" class="form-control " name="q" id="q" placeholder="&#xf002  Search stores,coupons and products..." autocomplete="off" style="border-radius:50px 50px 50px 50px;width:325px;font-family: FontAwesome;">
        <ul class="search-ac" id="result-suggestion">
            <li><img src="/Images/Store/RXYlriEcKqd66dpzTA0482vzwxIUbjQVvD8kXb2kL2VFq5VhzCcS8l9p1Zou9jA09Sb2FEch7fSGGqJ1c1U9HynJ3iSym8L11u67.png" /><a href="/stores_/amie-skin-care" id="index-0" data-href="/search/amie-skin-care" class="index0">Amie Skin Care<br><span></span></a></li>
            <li><img src="/Images/Store/ZD7hmDi772jusFs4CyoKxsGnigjurvDenteqxBcjwCsGUviK4j08RB66xkyFUnfbZEHy0B6AVEOuAA2ny90I54WmXItND7ZIWQgP.png" /><a href="/stores_/stdcheck" id="index-0" data-href="/search/stdcheck" class="index0">STDCheck<br><span></span></a></li>
            <li><img src="/Images/Store/ojj3N0NNnb6xSKHkX7GuiUaSHSwoeF8kTMzOqwuERJzmbwutZfkoJm73I0Vu3Z8hCmeGKtu1cBd9VogLYDYzVja6f6FZaAbsaRjp.png" /><a href="/stores_/approved-vitamins" id="index-0" data-href="/search/approved-vitamins" class="index0">Approved Vitamins<br><span></span></a></li>

        </ul>
    </form>
    <script type="text/javascript" src="/Scripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#q").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $.ajax({
                    type: "GET",
                    url: "/Home/SearchBar?q=" + value,
                    async: true,
                    success: function(text) {
                        var res = text;
                        $('#result-suggestion').html(text);
                    }
                });
            });
        });
        $('#q').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                if ($(".index0").length) {
                    var form = $(".index0");
                    var link = form.attr('data-href');
                    window.location.href = link;
                } else {
                    document.getElementById(".index0").innerHTML = "not found!";
                }
            }
        });
    </script>
</div>
<!-- /Header search -->