<div class="container row justify-content-center position-absolute start-50 translate-middle">
    <div class="card col-md-6 mt-5 position-absolute">
        <h2 class="text-center mt-3">Input Data</h2>
        <div class="card-body mx-5 px-3">
            <form method="POST" action="<?php echo $upPrefix; ?>admin/data/add">
                <div class="form-group row mt-3 mb-4 d-flex justify-content-between">
                    <label class="col-sm-5 col-form-label fs-5">Choose a Province</label>
                    <div class="col-sm-5 d-flex flex-row-reverse">
                        <select class="form-select" id="region" name="region">
                            <!-- <option value="Busan">Busan</option>
                            <option value="Chungcheongbuk-do">Chungcheongbuk-do</option>
                            <option value="Chungcheongnam-do">Chungcheongnam-do</option>
                            <option value="Daegu">Daegu</option>
                            <option value="Daejeon">Daejeon</option>
                            <option value="Gangwon-do">Gangwon-do</option>
                            <option value="Gwangju">Gwangju</option>
                            <option value="Gyeonggi-do">Gyeonggi-do</option>
                            <option value="Gyeongsangbuk-do">Gyeongsangbuk-do</option>
                            <option value="Gyeongsangnam-do">Gyeongsangnam-do</option>
                            <option value="Incheon">Incheon</option>
                            <option value="Jeju-do">Jeju-do</option>
                            <option value="Jeollabuk-do">Jeollabuk-do</option>
                            <option value="Jeollanam-do">Jeollanam-do</option>
                            <option value="Sejong">Sejong</option>
                            <option value="Seoul">Seoul</option>
                            <option value="Ulsan">Ulsan</option> -->
                            <?php
                                echo var_dump($arrProv);
                                foreach($arrProv as $name){
                                    echo "<option value=".$name.">".$name."</option>";
                                }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row  d-flex justify-content-between">
                    <label class="col-sm-5 col-form-label fs-5">Number of Tested Case </label>
                    <div class="col-sm-3">
                        <input type="number" value="0" min="0" class="form-control text-center" id="testedCases" name="testedCases">
                    </div>
                </div>
                <div class="form-group row  d-flex justify-content-between">
                    <label class="col-sm-5 col-form-label fs-5">Number of Negative Case </label>
                    <div class="col-sm-3">
                        <input type="number" value="0" min="0" class="form-control text-center" id="negativeCases" name="negativeCases">
                    </div>
                </div>
                <div class="form-group row  d-flex justify-content-between">
                    <label class="col-sm-5 col-form-label fs-5">Number of Confirmed Case </label>
                    <div class="col-sm-3">
                        <input type="number" value="0" min="0" class="form-control text-center" id="confirmedCases" name="confirmedCases">
                    </div>
                </div>
                <div class="form-group row  d-flex justify-content-between">
                    <label class="col-sm-5 col-form-label fs-5">Number of Released Case </label>
                    <div class="col-sm-3">
                        <input type="number" value="0" min="0" class="form-control text-center" id="releasedCases" name="releasedCases">
                    </div>
                </div>
                <div class="form-group row  d-flex justify-content-between">
                    <label class="col-sm-5 col-form-label fs-5">Number of Deceased Case </label>
                    <div class="col-sm-3">
                        <input type="number" value="0" min="0" class="form-control text-center" id="deceasedCases" name="deceasedCases">
                    </div>
                </div>
                <div class="form-group text-center text-danger">
                    <?php echo $message; ?>
                </div>
                <div class="form-group text-center">
                    <button type="button" onclick="window.location.href='<?php echo $upPrefix; ?>admin/dataOverall'" class="btn btn-lg bg-dark text-white">CANCEL</button>
                    <button type="submit" class="btn btn-lg bg-dark text-white">ADD DATA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="background"></div>