<div class="container justify-content-center mt-5">
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-center">
            <h2><strong>Covid-19 Cases</strong></h2>
        </div>
        <div class="d-flex flex-row justify-content-center">
            <div class="m-3">
                <a class="tablink border-bottom border-primary border-5" onclick="openContent(this, 'overall')"><strong>Overall</strong></a>
            </div>
            <div class="m-3">
                <a class="tablink" onclick="openContent(this, 'regional')"><strong>Regional</strong></a>
            </div>
        </div>

    </div>
</div>

<!-- overall -->
<div class="container mt-3 tabs" id="overall">
    <div class="d-flex flex-column">
        <div class="d-flex flex-row justify-content-between">
            <div class="d-flex flex-row ">
                <div class="btn-group px-3">
                    <button class="btn btn-outline-secondary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Filter <i class="fas fa-filter"></i></button>
                </div>
                <div class="btn-group px-3">
                    <button class="btn btn-outline-secondary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Short <i class="fas fa-sort-amount-down"></i></button>
                </div>
            </div>
            <div>
                <form method="GET" action="<?php echo $upPrefix; ?>admin/data/add">
                    <input type="submit" name="" value="ADD DATA" class="btn btn-md bg-dark text-white">
                </form>
            </div>
        </div>
        <div class="mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Comfirmed</th>
                        <th scope="col">Released</th>
                        <th scope="col">Deceased</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- regional -->
<div class="container mt-3 tabs" id="regional" style="display: none;">
    <div class="d-flex flex-column">
        <div class="d-flex flex-column align-self-center col-sm-2 mb-5">
            <p class="d-flex justify-content-center">Choose a province</p>
            <select class="col-sm-5 custom-select form-control">
                <option selected>Seoul</option>
            </select>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <div class="d-flex flex-row ">
                <div class="btn-group px-3">
                    <button class="btn btn-outline-secondary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Filter <i class="fas fa-filter"></i></button>
                </div>
                <div class="btn-group px-3">
                    <button class="btn btn-outline-secondary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Short <i class="fas fa-sort-amount-down"></i></button>
                </div>
            </div>
            <div>
                <form method="GET" action="<?php echo $upPrefix; ?>admin/data/add">
                    <input type="submit" name="" value="ADD DATA" class="btn btn-md bg-dark text-white">
                </form>
            </div>
        </div>
        <div class="mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">province</th>
                        <th scope="col">Comfirmed</th>
                        <th scope="col">Released</th>
                        <th scope="col">Deceased</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>