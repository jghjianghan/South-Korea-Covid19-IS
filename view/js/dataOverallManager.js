class dataOverallManager {
    constructor() {
        this.startDate = document.getElementById("dateFrom");
        this.endDate = document.getElementById("dateTo");
        this.chartManager = new CaseChart();
        this.agregateManager = new CaseAggregate();
        this.tableManager = new CaseTable();

        // method binding
        this.fetchData = this.fetchData.bind(this);
        this.onDateChange = this.onDateChange.bind(this);

        // initialize data
        this.fetchData();
    }

    fetchData() {

        let entries = [];

        fetch('data/overall').then(response => response.json())
            .then(json => {
                for (let i of json) {
                    entries.push(new DailyData(i.date, i.newCase, i.confirmed, i.released, i.deceased));
                }
                
                this.chartManager.showData(entries);
                this.agregateManager.showData(entries);
                this.tableManager.showData(entries);
            });
        
    }

    onDateChange() {
        
        this.fetchData();
    }
}