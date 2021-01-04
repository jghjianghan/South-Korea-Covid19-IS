class dataRegionalManager extends dataOverallManager{
    constructor() {
        this.provinceDropdown = document.getElementById("");
        super();
        
        this.onProvinceChange = this.onProvinceChange.bind(this);
    }

    fetchData() {
        let entries = [];

        fetch('data/regional').then(response => response.json()) // TODO tambahin param di url buat selected province
            .then(json => {
                for (let i of json) {
                    entries.push(new DailyData(i.date, i.newCase, i.confirmed, i.released, i.deceased));
                }

                this.chartManager.showData(entries);
                this.agregateManager.showData(entries);
                this.tableManager.showData(entries);
            });
    }

    onProvinceChange() {
        this.fetchData();
    }
}