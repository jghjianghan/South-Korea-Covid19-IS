<div class="container mt-3 tabs" id="regional">
    <div class="d-flex flex-column">
        <div class="d-flex flex-column align-self-center col-sm-3 mb-5">
            <p class="d-flex justify-content-center">Choose a Province</p>
            <select class="col-sm-12 form-select" id="region" name="region">
                <?php
                foreach ($provinces as $province) {
                    if (isset($_POST['region']) && $_POST['region'] == $province) {
                        echo "<option value='" . $province . "' selected>" . $province . "</option>";
                    } else {
                        echo "<option value='" . $province . "'>" . $province . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
</div>