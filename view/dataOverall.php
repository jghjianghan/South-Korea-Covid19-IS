<div class="page-content">

    <div class="data-head-wrapper mx-auto">
        <div class="sub-title">Covid-19 Cases</div>
        <div class="my-3">
            
            <div class="d-inline-block category-title current-category">
                <a href="<?php echo $upPrefix; ?>dataOverall">Overall</a>
            </div>
            <div class="d-inline-block category-title">
                <a href="<?php echo $upPrefix; ?>dataRegional">Regional</a>
            </div>
        </div>
    </div>

    <div>
        <span class="mx-3">From</span>
        <input type="date">
        <span class="mx-3">To</span>
        <input type="date">
    </div>

    <div class="table">
        <canvas id="bar-chart" width="800" height="200"></canvas>
    </div>
    
    <div class="row">
        <div class="col stat-content">
            <div class="stat-title">CONFIRMED</div>
            <div class="stat-value"><?php echo $result->getConfirmed()?></div>
        </div>
        <div class="col stat-content">
            <div class="stat-title">RELEASED</div>
            <div class="stat-value"><?php echo $result->getReleased()?></div>
        </div>
        <div class="col stat-content">
            <div class="stat-title">DECEASED</div>
            <div class="stat-value"><?php echo $result->getDeceased()?></div>
        </div>
    </div>

    <div class="my-5">
        <div class="float-right">
            <button type="button" class="btn btn-outline-secondary btn-hover-darkgrey">
                Sort
                <i class="fa fa-caret-down"></i>
            </button>
        </div>
    </div>

    <br><br>

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">New Cases</th>
                <th scope="col">Confirmed</th>
                <th scope="col">Released</th>
                <th scope="col">Deceased</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<script>
    new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
        labels: ["1/1/20","2/1/20","3/1/20","4/1/20","5/1/20","6/1/20","7/1/20","8/1/20","9/1/20","10/1/20",
        "11/1/20","12/1/20","13/1/20","14/1/20","15/1/20",,"16/1/20","17/1/20","18/1/20","19/1/20","20/1/20"],
    datasets: [
        {
        label: "Number of Cases",
        backgroundColor: "#0275D8",
        data: [2478,5267,734,784,433,2478,5267,734,784,433,2478,5267,734,784,433, 2478,5267,734,784,433, 500]
            }
        ]
    }
    });
</script>