<div class="container justify-content-center mt-5">
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-center">
            <h2><strong>Covid-19 Cases</strong></h2>
        </div>
        <div class="d-flex flex-row justify-content-center">
            <div class="m-3 d-inline-block category-title">
                <a href="<?php echo $upPrefix; ?>admin/dataOverall" class="tablink"><strong>Overall</strong></a>
            </div>
            <div class="m-3 d-inline-block category-title">
                <a class="tablink border-bottom border-primary border-5"><strong>Regional</strong></a>
            </div>
        </div>

    </div>
</div>

<div class="container mt-3 tabs" id="regional">
    <div class="d-flex flex-column">
        <div class="d-flex flex-column align-self-center col-sm-2 mb-5">
            <p class="d-flex justify-content-center">Choose a Province</p>
            <select class="col-sm-12 form-select">
                <option>Busan</option>
                <option>Chungcheongbuk-do</option>
                <option>Chungcheongnam-do</option>
                <option>Daegu</option>
                <option>Daejeon</option>
                <option>Gangwon-do</option>
                <option>Gwangju</option>
                <option>Gyeonggi-do</option>
                <option>Gyeongsangbuk-do</option>
                <option>Gyeongsangnam-do</option>
                <option>Incheon</option>
                <option>Jeju-do</option>
                <option>Jeollabuk-do</option>
                <option>Jeollanam-do</option>
                <option>Sejong</option>
                <option selected>Seoul</option>
                <option>Ulsan</option>
            </select>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <div class="d-flex flex-row ">
                <div class="dropdown px-3">
                    <button class="btn btn-outline-secondary" type="button" id="SortRegional" data-bs-toggle="dropdown">Sort <i class="fas fa-sort-amount-down"></i></button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <form method="GET" action="<?php echo $upPrefix; ?>admin/data/add">
                    <input type="submit" name="" value="Add Data" class="btn btn-md bg-dark text-white">
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