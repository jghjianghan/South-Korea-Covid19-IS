class CaseTable {
    constructor() {
        this.tableBody = document.querySelector("tbody");
        this.chosenColumn = "date";
        this.chosenOrder = "desc";
        this.entries = [];

        //method binding
        this.populate = this.populate.bind(this);
        this.clearTable = this.clearTable.bind(this);
        this.sortTable = this.sortTable.bind(this);
        this.sortEvent = this.sortEvent.bind(this);
        this.showData = this.showData.bind(this);

        //add event listener to all dropdown option
        let links = document.querySelectorAll(".sortLink");
        for (let i of links) {
            i.addEventListener("click", this.sortEvent);
        }
        //disable event on submenu
        let submenus = document.querySelectorAll("p.dropdown-item");
        for (let i of submenus) {
            i.addEventListener("click", (event) => event.stopPropagation());
        }
    }

    showData(entries) {
        this.entries = entries;
        this.chosenColumn =
            this.sortTable();
        this.populate();
    }

    populate() {
        this.clearTable();
        for (let i of this.entries) {
            let row = document.createElement("tr");

            //date
            let col = document.createElement("td");
            let tempDate = new Date(i.date);
            col.textContent = tempDate.getDate() + "/" + (tempDate.getMonth() + 1) + "/" + tempDate.getFullYear();
            row.appendChild(col);

            //new case
            col = document.createElement("td");
            col.textContent = i.newCase;
            row.appendChild(col);

            //confirmed
            col = document.createElement("td");
            col.textContent = i.confirmed;
            row.appendChild(col);

            //released
            col = document.createElement("td");
            col.textContent = i.released;
            row.appendChild(col);

            //deceased
            col = document.createElement("td");
            col.textContent = i.deceased;
            row.appendChild(col);

            this.tableBody.appendChild(row);
        }
    }

    sortEvent(event) {
        this.chosenColumn = event.target.dataset.column;
        this.chosenOrder = event.target.dataset.order;
        this.sortTable();
        this.populate();
    }

    sortTable() {
        let sortFunc;
        switch (this.chosenColumn) {
            case "date":
                if (this.chosenOrder === "asc") {
                    sortFunc = (a, b) => {
                        let da = new Date(a.date);
                        let db = new Date(b.date);
                        return da - db;
                    };
                } else if (this.chosenOrder === "desc") {
                    sortFunc = (a, b) => {
                        let da = new Date(a.date);
                        let db = new Date(b.date);
                        return db - da;
                    };
                }
                break;
            case "newCase":
                if (this.chosenOrder === "asc") {
                    sortFunc = (a, b) => {
                        return a.newCase - b.newCase;
                    };
                } else if (this.chosenOrder === "desc") {
                    sortFunc = (a, b) => {
                        return b.newCase - a.newCase;
                    };
                }
                break;
            case "confirmed":
                if (this.chosenOrder === "asc") {
                    sortFunc = (a, b) => {
                        return a.confirmed - b.confirmed;
                    };
                } else if (this.chosenOrder === "desc") {
                    sortFunc = (a, b) => {
                        return b.confirmed - a.confirmed;
                    };
                }
                break;
            case "released":
                if (this.chosenOrder === "asc") {
                    sortFunc = (a, b) => {
                        return a.released - b.released;
                    };
                } else if (this.chosenOrder === "desc") {
                    sortFunc = (a, b) => {
                        return b.released - a.released;
                    };
                }
                break;
            case "deceased":
                if (this.chosenOrder === "asc") {
                    sortFunc = (a, b) => {
                        return a.deceased - b.deceased;
                    };
                } else if (this.chosenOrder === "desc") {
                    sortFunc = (a, b) => {
                        return b.deceased - a.deceased;
                    };
                }
                break;
        }
        this.entries.sort(sortFunc);
    }

    clearTable() {
        while (this.tableBody.firstChild) {
            this.tableBody.removeChild(this.tableBody.firstChild);
        }
    }
}