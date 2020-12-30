<div class="container justify-content-center mt-5">
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
                    <option value="Busan" <?php if(isset($_POST['region']) && $_POST['region'] == 'Busan'){ echo "selected"; } ?> >Busan</option>
                    <option value="Chungcheongbuk-do" <?php if(isset($_POST['region']) && $_POST['region'] == 'Chungcheongbuk-do'){ echo "selected"; } ?> >Chungcheongbuk-do</option>
                    <option value="Chungcheongnam-do" <?php if(isset($_POST['region']) && $_POST['region'] == 'Chungcheongnam-do'){ echo "selected"; } ?> >Chungcheongnam-do</option>
                    <option value="Daegu" <?php if(isset($_POST['region']) && $_POST['region'] == 'Daegu'){ echo "selected"; } ?> >Daegu</option>
                    <option value="Daejeon" <?php if(isset($_POST['region']) && $_POST['region'] == 'Daejeon'){ echo "selected"; } ?> >Daejeon</option>
                    <option value="Gangwon-do" <?php if(isset($_POST['region']) && $_POST['region'] == 'Gangwon-do'){ echo "selected"; } ?> >Gangwon-do</option>
                    <option value="Gwangju" <?php if(isset($_POST['region']) && $_POST['region'] == 'Gwangju'){ echo "selected"; } ?> >Gwangju</option>
                    <option value="Gyeonggi-do" <?php if(isset($_POST['region']) && $_POST['region'] == 'Gyeonggi-do'){ echo "selected"; } ?> >Gyeonggi-do</option>
                    <option value="Gyeongsangbuk-do" <?php if(isset($_POST['region']) && $_POST['region'] == 'Gyeongsangbuk-do'){ echo "selected"; } ?> >Gyeongsangbuk-do</option>
                    <option value="Gyeongsangnam-do" <?php if(isset($_POST['region']) && $_POST['region'] == 'Gyeongsangnam-do'){ echo "selected"; } ?> >Gyeongsangnam-do</option>
                    <option value="Incheon" <?php if(isset($_POST['region']) && $_POST['region'] == 'Incheon'){ echo "selected"; } ?> >Incheon</option>
                    <option value="Jeju-do" <?php if(isset($_POST['region']) && $_POST['region'] == 'Jeju-do'){ echo "selected"; } ?> >Jeju-do</option>
                    <option value="Jeollabuk-do" <?php if(isset($_POST['region']) && $_POST['region'] == 'Jeollabuk-do'){ echo "selected"; } ?> >Jeollabuk-do</option>
                    <option value="Jeollanam-do" <?php if(isset($_POST['region']) && $_POST['region'] == 'Jeollanam-do'){ echo "selected"; } ?> >Jeollanam-do</option>
                    <option value="Sejong" <?php if(isset($_POST['region']) && $_POST['region'] == 'Sejong'){ echo "selected"; } ?> >Sejong</option>
                    <option value="Seoul" <?php if(isset($_POST['region']) && $_POST['region'] == 'Seoul'){ echo "selected"; } ?> >Seoul</option>
                    <option value="Ulsan" <?php if(isset($_POST['region']) && $_POST['region'] == 'Ulsan'){ echo "selected"; } ?> >Ulsan</option>
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