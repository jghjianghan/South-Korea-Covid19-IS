<div class="container row justify-content-center position-absolute start-50 translate-middle">
    <div class="card col-md-6 mt-5 position-absolute">
        <h2 class="text-center mt-3">Input Data</h2>
        <div class="card-body mx-5 px-3">
            <form method="POST" action="<?php echo $upPrefix; ?>admin/data/add">
                <div class="form-group row my-3 d-flex justify-content-between">
                    <label for="example-date-input" class="col-5 col-form-label fs-5">Date</label>
                    <div class="col-sm-5 mt-1" style="font-size: 20px;">
                        <?php
                        // date_default_timezone_set("Asia/Seoul");
                        // $date = date("j  F  Y");
                        // echo $date;
                        ?>
                         <input class="form-control" type="date" style="border: none; border-bottom: 1px solid black; border-radius: 0" id="date" name="date" required>
                    </div>
                </div>
                <div class="form-group row mt-3 mb-4 d-flex justify-content-between">
                    <label class="col-sm col-form-label fs-5">Choose a Province</label>
                    <div class="col-sm-5 d-flex flex-row-reverse">
                        <select class="form-select" id="region" name="region">
                            <?php
                            foreach ($provinces as $name) {
                                echo "<option value='" . $name . "'>" . $name . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row d-flex justify-content-between">
                    <label class="col-sm col-form-label fs-5">Number of Tested Case </label>
                    <div class="col-sm-3">
                        <input type="number" value="0" min="0" class="form-control text-center" id="testedCases" name="testedCases">
                    </div>
                </div>
                <div class="form-group row d-flex justify-content-between">
                    <label class="col-sm col-form-label fs-5">Number of Negative Case </label>
                    <div class="col-sm-3">
                        <input type="number" value="0" min="0" class="form-control text-center" id="negativeCases" name="negativeCases">
                    </div>
                </div>
                <div class="form-group row d-flex justify-content-between">
                    <label class="col-sm col-form-label fs-5">Number of Confirmed Case </label>
                    <div class="col-sm-3">
                        <input type="number" value="0" min="0" class="form-control text-center" id="confirmedCases" name="confirmedCases">
                    </div>
                </div>
                <div class="form-group row d-flex justify-content-between">
                    <label class="col-sm col-form-label fs-5">Number of Released Case </label>
                    <div class="col-sm-3">
                        <input type="number" value="0" min="0" class="form-control text-center" id="releasedCases" name="releasedCases">
                    </div>
                </div>
                <div class="form-group row d-flex justify-content-between">
                    <label class="col-sm col-form-label fs-5">Number of Deceased Case </label>
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