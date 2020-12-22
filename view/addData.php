<div class="container row justify-content-center position-absolute start-50 translate-middle">
    <div class="card col-md-6 mt-5 position-absolute">
        <h2 class="text-center mt-3">Input Data</h2>
        <div class="card-body mx-5 px-3">
            <form method="GET" action="<?php echo $upPrefix; ?>admin/data">
                <div class="form-group row my-3 d-flex justify-content-between">
                    <label for="example-date-input" class="col-5 col-form-label fs-5">Date</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="date" style="border: none; border-bottom: 1px solid black; border-radius: 0" id="Date">
                    </div>
                </div>
                <div class="form-group row mt-3 mb-4 d-flex justify-content-between">
                    <label class="col-sm-5 col-form-label fs-5">Choose a Province</label>
                    <div class="col-sm-5 d-flex flex-row-reverse">
                        <select class="form-select" id="Regional">
                            <option selected>Seoul</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row  d-flex justify-content-between">
                    <label class="col-sm-5 col-form-label fs-5">Number of Confirmed Case </label>
                    <div class="col-sm-3">
                        <input type="number" value="0" min="0" class="form-control text-center" id="ConfirmCases">
                    </div>
                </div>
                <div class="form-group row  d-flex justify-content-between">
                    <label class="col-sm-5 col-form-label fs-5">Number of Released Case </label>
                    <div class="col-sm-3">
                        <input type="number" value="0" min="0" class="form-control text-center" id="ReleasedCases">
                    </div>
                </div>
                <div class="form-group row  d-flex justify-content-between">
                    <label class="col-sm-5 col-form-label fs-5">Number of Deceased Case </label>
                    <div class="col-sm-3">
                        <input type="number" value="0" min="0" class="form-control text-center" id="DeceasedCases">
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="ADD DATA" class="btn btn-lg bg-dark text-white">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="background"></div>