class dataOverallAdminManager {
    constructor() {
        this.tableManager = new CaseTable();

        // method binding
        this.fetchData = this.fetchData.bind(this);

        // initialize data
        this.fetchData();
    }

    fetchData() {
        let entries = [];

        let url = '../data/overall';

        fetch(url).then(response => response.json())
            .then(json => {
                for (let i of json) {
                    entries.push(new DailyData(i.date, i.newCase, i.confirmed, i.released, i.deceased));
                }

                this.tableManager.showData(entries);
            });
    }
}

new dataOverallAdminManager();