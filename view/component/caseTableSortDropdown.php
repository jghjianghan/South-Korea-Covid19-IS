<div class="dropdown">
    <button class="btn btn-outline-secondary btn-hover-darkgrey" type="button" id="dropdownMenu1" data-toggle="dropdown">
        Sort <i class="fas fa-sort-amount-up-alt"></i>
    </button>
    <ul class="dropdown-menu multi-level">
        <?php
            $tableColumns = ["date", "newCase", "confirmed", "released", "deceased"];
            $columnLabels = ["Date", "New Cases", "Confirmed", "Released", "Deceased"];

            for($i=0; $i<count($tableColumns); $i++){
        ?>
            <li class="dropdown-submenu" style="cursor: pointer;">
                <p class="dropdown-item" tabindex="-1"><?php echo $columnLabels[$i];?></p>
                <ul class="dropdown-menu">
                    <li class="dropdown-item sortLink" data-column="<?php echo $tableColumns[$i];?>" data-order="asc">Ascending <i class="fas fa-sort-amount-up-alt"></i></li>
                    <li class="dropdown-item sortLink" data-column="<?php echo $tableColumns[$i];?>" data-order="desc">Descending <i class="fas fa-sort-amount-down-alt"></i></li>
                </ul>
            </li>
        <?php
            }
        ?>
    </ul>
</div>