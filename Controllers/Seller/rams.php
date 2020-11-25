<?php
include_once('../../config.php');
getHeader("Products", "header.php");
?>

<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="dashboard-one.html#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">RAMs</li>
             </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
    </div>
</div>

<h5 id="section4" class="mg-b-10">RAMs</h5>
        <div data-label="Example" class="df-example demo-table">
          <table id="example4" class="table">
            <thead>
              <tr>
                <th class="wd-20p">Name</th>
                <th class="wd-25p">Position</th>
                <th class="wd-20p">Office</th>
                <th class="wd-15p">Extn</th>
                <th class="wd-20p">Salary</th>
              </tr>
            </thead>
          </table>
        </div><!-- df-example -->
        


<?php
getFooter("footer.php");
?>
 <script>
      $(function(){
        'use strict'

        $('#example4').DataTable({
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>