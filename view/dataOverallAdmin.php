<div class="data-head-wrapper mx-auto">
        <div class="sub-title">Covid-19 Cases</div>
        <div class="my-3">
            <div class="d-inline-block category-title current-category">
                <a href="<?php echo $upPrefix; ?>admin/dataOverall">Overall</a>
            </div>
            <div class="d-inline-block category-title">
                <a href="<?php echo $upPrefix; ?>admin/dataRegional">Regional</a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3 tabs" id="overall">
    <div class="d-flex flex-column">
        <div class="d-flex flex-row justify-content-between">
            <div class="d-flex flex-row ">
                <?php
                    include "view/component/caseTableSortDropdown.php";
                ?>
            </div>
            <div>
                <form method="GET" action="<?php echo $upPrefix; ?>admin/data/add">
                    <input type="submit" name="" value="+ Add Data" class="btn btn-md bg-dark text-white">
                </form>
            </div>
        </div>
        <div class="my-3">
            <?php
                include "view/component/caseTable.php";
            ?>
        </div>
    </div>
</div>