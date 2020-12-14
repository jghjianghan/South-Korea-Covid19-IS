<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-7">
                <div class="card" style="height: 550px;">
                    <h2 class="text-center mt-5">Input Data</h2>
                    <div class="card-body mx-5 p-5">
                        <form action="">
                            <div class="form-group row my-3 d-flex justify-content-between">
                                <label class="col-sm-5 col-form-label">Date</label>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-group row my-3 d-flex justify-content-between">
                                <label class="col-sm-5 col-form-label">Chose a Province</label>
                                <div class="col-sm-5 d-flex flex-row-reverse">
                                    <select class="custom-select form-control" id="">
                                        <option selected>Seoul</option>
                                      </select>
                                </div>
                            </div>
                            <div class="form-group row my-3 d-flex justify-content-between">
                                <label class="col-sm-5 col-form-label">Number of Confirm Chase </label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-group row my-3 d-flex justify-content-between">
                                <label class="col-sm-5 col-form-label">Number of Released Chase </label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-group row my-3 d-flex justify-content-between">
                                <label class="col-sm-5 col-form-label">Number of Deceased Chase </label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-group text-center my-5">
                                <input type="submit" name="" value="ADD DATA" class="btn btn-lg bg-dark text-white">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>