class dataRegionalAdminManager {
    constructor() {
        this.provinceDropdown = document.getElementById("region");

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

        let url = '../data/regional';

        // set province param
        if (this.provinceDropdown.value !== "") {
            url += '?province=' + this.provinceDropdown.value
        }
        console.log(url);

        fetch(url).then(response => response.json())
            .then(json => {
                for (let i of json) {
                    entries.push(new DailyData(i.date, i.newCase, i.confirmed, i.released, i.deceased));
                }

                this.tableManager.showData(entries);
            });
    }
}

new dataRegionalAdminManager();