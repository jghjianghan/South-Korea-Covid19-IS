<div class="page-content">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="home-carousel-content carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo $upPrefix; ?>view/img/slider1.png" alt="First slide">
            </div>
            <div class="home-carousel-content carousel-item">
            <img class="d-block w-100" src="<?php echo $upPrefix; ?>view/img/slider2.png" alt="Second slide">
            </div>
            <div class="home-carousel-content carousel-item">
            <img class="d-block w-100" src="<?php echo $upPrefix; ?>view/img/slider3.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <br>

    <div class="home-stat">
        <div class="sub-title">Statistics</div>
        <br>
        <div class="row">
            <div class="col stat-content">
                <div class="stat-title">Confirmed</div>
                <div class="stat-value"><?php echo number_format($aggregate->confirmed); ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col stat-content">
                <div class="stat-title">Tested</div>
                <div class="stat-value"><?php echo number_format($aggregate->tested); ?></div>
            </div>
            <div class="col stat-content">
                <div class="stat-title">Negative</div>
                <div class="stat-value"><?php echo number_format($aggregate->negative); ?></div>
            </div>
            <div class="col stat-content">
                <div class="stat-title">Released</div>
                <div class="stat-value"><?php echo number_format($aggregate->released); ?></div>
            </div>
            <div class="col stat-content">
                <div class="stat-title">Deceased</div>
                <div class="stat-value"><?php echo number_format($aggregate->deceased); ?></div>
            </div>
            <div>
                <p align="right">Last updated: <?php echo $date;?></p>
            </div>
        </div>
    </div>

    <br>

    <div class="home-info">
        <div class="sub-title">Other Informations</div>
        <br>
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="<?php echo $upPrefix; ?>view/img/mask.png" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">Tips for wearing a mask</h4>
                    <p class="card-text">
                        <ul>
                            <li>Clean your hands before you put your mask on, as well as before and after you take it off, and after you touch it at any time.</li>
                            <li>Make sure it covers both your nose, mouth and chin.</li>
                            <li>When you take off a mask, store it in a clean plastic bag, and every day either wash it if it’s a fabric mask, or dispose of a medical mask in a trash bin.</li>
                            <li>Don’t use masks with valves.</li>
                        </ul>
                    </p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="<?php echo $upPrefix; ?>view/img/social-distancing.png" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">Social distancing</h4>
                    <p class="card-text">
                        Social distancing, also called “physical distancing,” means keeping a 
                        safe space between yourself and other people who are not from your household.
                        To practice social or physical distancing, stay at least 6 feet 
                        (about 2 arms’ length) from other people who are not from your 
                        household in both indoor and outdoor spaces. Social distancing should be 
                        practiced in combination with other everyday preventive actions to reduce the 
                        spread of COVID-19.
                    </p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="<?php echo $upPrefix; ?>view/img/sanitize.png" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">Keep your hands clean!</h4>
                    <p class="card-text">
                        Keeping hands clean is one of the most important steps we can take to 
                        avoid getting sick and spreading germs to others. Washing and sanitizing 
                        hands regularly can keep you healthy and prevent the spread of respiratory and 
                        diarrheal infections (including Coronavirus) from one person to the next.
                    </p>
                </div>
            </div>
        </div>
        
    </div>
</div>
