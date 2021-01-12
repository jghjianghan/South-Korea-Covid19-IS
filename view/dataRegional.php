<div class="page-content">

    <div class="data-head-wrapper mx-auto">
        <div class="sub-title">Covid-19 Cases</div>
        <div class="my-3">
            <div class="d-inline-block category-title">
                <a href="<?php echo $upPrefix; ?>dataOverall">Overall</a>
            </div>
            <div class="d-inline-block category-title current-category">
                <a href="<?php echo $upPrefix; ?>dataRegional">Regional</a>
            </div>
        </div>
    </div>


    <?php
        include $upPrefix."view/component/provinceDropdown.php";
    ?>

    <div>
        <span class="mx-3">From</span>
        <input type="date" id='dateFrom'>
        <span class="mx-3">To</span>
        <input type="date" id='dateTo'>
        <i class="fa fa-times ml-2" style="cursor: pointer;" id="dateReset"></i>
        <span class='text-danger ml-3' id='invalid-message' style='visibility:hidden'>
            <i class='fa fa-exclamation-triangle'></i>
             Invalid date. Starting date must be earlier than ending date.
        </span>
    </div>

    
    <div class="table">
        <canvas id="bar-chart" width="800" height="200"></canvas>
    </div>
    
    <div class="row">
        <div class="col stat-content">
            <div class="stat-title">CONFIRMED</div>
            <div class="stat-value" id="confirmed-value">608514</div>
        </div>
        <div class="col stat-content">
            <div class="stat-title">RELEASED</div>
            <div class="stat-value" id="released-value">588559</div>
        </div>
        <div class="col stat-content">
            <div class="stat-title">DECEASED</div>
            <div class="stat-value" id="deceased-value">8854</div>
        </div>
    </div>

    <div class="my-5">
        <div class="float-left">
            <?php
                include "view/component/caseTableSortDropdown.php";
            ?>
        </div>
     </div>

    <br><br>

    <?php
        include "view/component/caseTable.php";
    ?>
</div>
