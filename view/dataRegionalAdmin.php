<div class="data-head-wrapper mx-auto">
        <div class="sub-title">Covid-19 Cases</div>
        <div class="my-3">
            <div class="d-inline-block category-title">
                <a href="<?php echo $upPrefix; ?>admin/dataOverall">Overall</a>
            </div>
            <div class="d-inline-block category-title current-category">
                <a href="<?php echo $upPrefix; ?>admin/dataRegional">Regional</a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3 tabs" id="regional">
    <div class="d-flex flex-column">
        <div class="d-flex flex-column align-self-center col-sm-3 mb-5">
            <p class="d-flex justify-content-center">Choose a Province</p>
            <form method="POST" action="<?php echo $upPrefix; ?>admin/dataRegional">
                <select class="col-sm-12 form-select" id="region" name="region" onchange='this.form.submit()'>
                    <?php
                        foreach($provinces as $province){
                            if(isset($_POST['region']) && $_POST['region'] == $province){
                                echo "<option value='" . $province . "' selected>" . $province . "</option>";
                            }else{
                                echo "<option value='" . $province . "'>" . $province . "</option>";
                            }
                            
                        }
                    ?>
                </select>
            </form>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <div class="d-flex flex-row ">
                <div class="dropdown px-3">
                    <button class="btn btn-outline-secondary btn-hover-darkgrey" type="button" id="SortRegional" data-bs-toggle="dropdown">Sort <i class="fas fa-sort-amount-down"></i></button>
                    <ul class="dropdown-menu multi-level">

                        <li class="dropdown-submenu">
                        <a  class="dropdown-item" tabindex="-1" href="#">Date</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">Ascending <i class="fas fa-arrow-up"></i></li>
                                <li class="dropdown-item">Descending <i class="fas fa-arrow-down"></i></li>
                        </ul>
                        </li>

                        <li class="dropdown-submenu">
                        <a  class="dropdown-item" tabindex="-1" href="#">New Cases</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">Ascending <i class="fas fa-arrow-up"></i></li>
                                <li class="dropdown-item">Descending <i class="fas fa-arrow-down"></i></li>
                        </ul>
                        </li>

                        <li class="dropdown-submenu">
                        <a  class="dropdown-item" tabindex="-1" href="#">Confirmed</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">Ascending <i class="fas fa-arrow-up"></i></li>
                                <li class="dropdown-item">Descending <i class="fas fa-arrow-down"></i></li>
                        </ul>
                        </li>

                        <li class="dropdown-submenu">
                        <a  class="dropdown-item" tabindex="-1" href="#">Released</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">Ascending <i class="fas fa-arrow-up"></i></li>
                                <li class="dropdown-item">Descending <i class="fas fa-arrow-down"></i></li>
                        </ul>
                        </li>

                        <li class="dropdown-submenu">
                        <a  class="dropdown-item" tabindex="-1" href="#">Deceased</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">Ascending <i class="fas fa-arrow-up"></i></li>
                                <li class="dropdown-item">Descending <i class="fas fa-arrow-down"></i></li>
                        </ul>
                        </li>

                    </ul>
                </div>
            </div>
            <div>
                <form method="GET" action="<?php echo $upPrefix; ?>admin/data/add">
                    <input type="submit" name="" value="+ Add Data" class="btn btn-md bg-dark text-white">
                </form>
            </div>
        </div>
        <div class="my-3">
            <table class="table table-striped text-center table-hover">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">New Case</th>
                        <th scope="col">Confirmed</th>
                        <th scope="col">Released</th>
                        <th scope="col">Deceased</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($message as $key => $row) {
                    echo '
                        <tr>
                            <td scope="row"> ' . $row->getDate() . ' </td>
                            <td> ' . $row->getNewCase() . ' </td>
                            <td> ' . $row->getConfirmed() . ' </td>
                            <td> ' . $row->getReleased() . ' </td>
                            <td> ' . $row->getDeceased() . ' </td>
                        </tr>
                    ';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>