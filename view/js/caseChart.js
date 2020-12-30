class CaseChart {
    constructor() {
        this.dateFrom = document.getElementById("dateFrom")
        this.dateTo = document.getElementById("dateTo")


        //method binding
        this.initializeChart = this.initializeChart.bind(this);
        this.populateChart = this.populateChart.bind(this);

        //Array to store the table data
        // this.entries = [];
        this.dates = [];
        this.newCases = [];

        this.initializeChart();
    }

    /**
     * Method untuk fetch data dari server, lalu menampilkan semua data dalam tabel
     */
    initializeChart() {
        //fetch data
        fetch('chart/overall').then(response => response.json()) //contoh
            .then(json => {
                for (let i of json) {
                    // this.entries.push(new ChartEntry(i.date, i.newCases));
                    this.dates.push(i.date);
                    this.newCases.push(i.newCases);
                }

                // console.log(this.entries);
                // let i = json[0];
                // console.log(i);
                // this.entries.push(new TableEntry(i.date, i.newCase, i.confirmed, i.released, i.deceased));

                this.populateChart();
            });
    }

    populateChart() {
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: this.dates,
            datasets: [
                {
                label: "Number of Cases",
                backgroundColor: "#0275D8",
                data: this.newCases
                    }
                ]
            }
            });
    }

}

new CaseChart();