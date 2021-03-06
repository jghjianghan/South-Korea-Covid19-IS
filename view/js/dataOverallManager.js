class dataOverallManager {
    constructor() {
        this.startDate = document.getElementById("dateFrom");
        this.endDate = document.getElementById("dateTo");
        this.invalidMessage = document.getElementById("invalid-message");
        this.resetDateBtn = document.getElementById("dateReset");

        this.chartManager = new CaseChart();
        this.agregateManager = new CaseAggregate();
        this.tableManager = new CaseTable();

        // method binding
        this.fetchData = this.fetchData.bind(this);
        this.resetDate = this.resetDate.bind(this);

        // set event listener
        this.startDate.addEventListener("change", this.fetchData);
        this.endDate.addEventListener("change", this.fetchData);
        this.resetDateBtn.addEventListener("click", this.resetDate);

        // initialize data
        this.fetchData();
    }

    fetchData() {

        let entries = [];

        let url = 'data/overall';
        let urlAggregate = 'data/aggregate'

        if (this.startDate.value !== "" && this.endDate.value !== "") {
            let ds = new Date(this.startDate.value);
            let de = new Date(this.endDate.value);
            if (ds > de) {
                //input error handling
                this.invalidMessage.style.visibility = 'visible'
                console.log("start date must not be later than end date");
                return;
            } else {
                this.invalidMessage.style.visibility = 'hidden'
            }
        } else {
            this.invalidMessage.style.visibility = 'hidden'
        }

        url += '?start=' + this.startDate.value + '&end=' + this.endDate.value;
        urlAggregate += '?start=' + this.startDate.value + '&end=' + this.endDate.value;

        fetch(url).then(response => response.json())
            .then(json => {
                for (let i of json) {
                    entries.push(new DailyData(i.date, i.newCase, i.confirmed, i.released, i.deceased));
                }

                this.chartManager.showData(entries);
                this.tableManager.showData(entries);
            });
        console.log("urlA = " + urlAggregate);
        fetch(urlAggregate).then(response => response.json())
            .then(json => {
                console.log(json);
                this.agregateManager.showData(json.confirmed, json.released, json.deceased);
            });

    }

    resetDate() {
        this.startDate.value = "";
        this.endDate.value = "";
        this.fetchData();
    }
}

new dataOverallManager();