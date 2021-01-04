class dataRegionalManager{
    constructor() {
        this.startDate = document.getElementById("dateFrom");
        this.endDate = document.getElementById("dateTo");
        this.provinceDropdown = document.getElementById("region");

        this.chartManager = new CaseChart();
        this.agregateManager = new CaseAggregate();
        this.tableManager = new CaseTable();

        // method binding
        this.fetchData = this.fetchData.bind(this);

        // set event listener
        this.provinceDropdown.addEventListener("change", this.fetchData);

        // initialize data
        this.fetchData();
    }

    fetchData() {

        let entries = [];
        
        let url = 'data/overall';
        let urlAggregate = 'data/aggregate'

        let hasDate = false

        // set date param
        if (this.startDate.value !== "" && this.endDate.value !== "") {
            let ds = new Date(this.startDate.value);
            let de = new Date(this.endDate.value);
            if (ds > de) {
                //input error handling
                console.log("start date must not be later than end date");
                return;
            } else {
                hasDate = true
                url += '?start=' + this.startDate.value + '&end=' + this.endDate.value;
                urlAggregate += '?start=' + this.startDate.value + '&end=' + this.endDate.value;
            }
        }

        // set province param
        if(this.provinceDropdown.value !== "") {
            if(hasDate) {
                url += '&'
                urlAggregate += '&'
            }
            else {
                url += '?'
                urlAggregate += '?'
            }
            url += 'province=' + this.provinceDropdown.value
            urlAggregate += 'province=' + this.provinceDropdown.value
        }

        fetch(url).then(response => response.json())
            .then(json => {
                for (let i of json) {
                    entries.push(new DailyData(i.date, i.newCase, i.confirmed, i.released, i.deceased));
                }
                
                this.chartManager.showData(entries);
                this.tableManager.showData(entries);
            });

        fetch(urlAggregate).then(response => response.json())
            .then(json => {
                this.agregateManager.showData(json.confirmed, json.released, json.deceased);
            });
        
    }
}