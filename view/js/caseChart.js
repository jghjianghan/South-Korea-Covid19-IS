class CaseChart {
    constructor() {
        this.chartObj = new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: [], //put date here
                datasets: [{
                    label: "Number of Cases",
                    backgroundColor: "#0275D8",
                    data: [] //put case data here
                }]
            }
        });

        //method binding
        this.showData = this.showData.bind(this);
    }

    /**
     * Menampilkan data kasus yang diberikan ke bar chart
     * @param {DailyData[]} listData Array dari DailyData
     */
    showData(listData) {
        this.chartObj.data.labels = [];
        this.chartObj.data.datasets[0].data = [];

        for (let i of listData) {
            this.chartObj.data.labels.push(i.date.getDate() + "-" + (i.date.getMonth() + 1) + "-" + i.date.getFullYear());
            this.chartObj.data.datasets[0].data.push(i.newCase);
        }
        this.chartObj.update();
    }
}