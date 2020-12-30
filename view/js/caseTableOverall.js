class CaseTable {
    constructor() {
        this.table = document.getElementById("case-table");
        this.tableHead = this.table.querySelector("thead");
        this.tableBody = this.table.querySelector("tbody");
        let datePicker = document.querySelectorAll("input[type=date]");
        if (datePicker.length > 0) {
            this.startDate = datePicker[0];
            this.endDate = datePicker[1];
        }
        this.chosenColumn = "date";
        this.chosenOrder = "desc";

        //method binding
        this.initializeTable = this.initializeTable.bind(this);
        this.clearTable = this.clearTable.bind(this);
        this.sortEvent = this.sortEvent.bind(this);
        this.populateTable = this.populateTable.bind(this);
        this.sortEntry = this.sortEntry.bind(this);
        this.filterTable = this.filterTable.bind(this);

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
        if (datePicker.length > 0) {
            this.startDate.addEventListener("change", this.filterTable);
            this.endDate.addEventListener("change", this.filterTable);
        }

        //Array to store the table data
        this.entries = [];

        this.initializeTable();
    }

    /**
     * Method untuk fetch data dari server, lalu menampilkan semua data dalam tabel
     */
    initializeTable() {
        //fetch data
        fetch('data/overall').then(response => response.json())
            .then(json => {
                this.entries = [];
                for (let i of json) {
                    this.entries.push(new TableEntry(i.date, i.newCase, i.confirmed, i.released, i.deceased));
                }

                this.populateTable();
            });
    }

    populateTable() {
        for (let i of this.entries) {
            this.tableBody.appendChild(i.renderRow());
        }
    }

    filterTable() {
        if (this.startDate.value !== "" && this.endDate.value !== "") {
            let ds = new Date(this.startDate.value);
            let de = new Date(this.endDate.value);
            if (ds > de) {
                //input error handling
                console.log("start date must not be later than end date");
                return;
            }
        }

        fetch('data/overall?start=' + this.startDate.value + '&end=' + this.endDate.value).then(response => response.json())
            .then(json => {
                this.entries = [];

                for (let i of json) {
                    this.entries.push(new TableEntry(i.date, i.newCase, i.confirmed, i.released, i.deceased));
                }

                this.clearTable();
                this.sortEntry();
                this.populateTable();
            });
    }

    /**
     * Click event listener untuk mengurutkan data dan menampilkan kembali data yang sudah terurut
     * @param {Event} event
     */
    sortEvent(event) {
        //Sorting
        this.column = event.target.dataset.column;
        this.order = event.target.dataset.order;
        this.sortEntry();

        //show entries on table
        this.clearTable();
        this.populateTable();
    }

    sortEntry() {
        let sortFunc;
        switch (this.column) {
            case "date":
                if (this.order === "asc") {
                    sortFunc = (a, b) => {
                        return a.date - b.date;
                    };
                } else if (this.order === "desc") {
                    sortFunc = (a, b) => {
                        return b.date - a.date;
                    };
                }
                break;
            case "newCase":
                if (this.order === "asc") {
                    sortFunc = (a, b) => {
                        return a.newCase - b.newCase;
                    };
                } else if (this.order === "desc") {
                    sortFunc = (a, b) => {
                        return b.newCase - a.newCase;
                    };
                }
                break;
            case "confirmed":
                if (this.order === "asc") {
                    sortFunc = (a, b) => {
                        return a.confirmed - b.confirmed;
                    };
                } else if (this.order === "desc") {
                    sortFunc = (a, b) => {
                        return b.confirmed - a.confirmed;
                    };
                }
                break;
            case "released":
                if (this.order === "asc") {
                    sortFunc = (a, b) => {
                        return a.released - b.released;
                    };
                } else if (this.order === "desc") {
                    sortFunc = (a, b) => {
                        return b.released - a.released;
                    };
                }
                break;
            case "deceased":
                if (this.order === "asc") {
                    sortFunc = (a, b) => {
                        return a.deceased - b.deceased;
                    };
                } else if (this.order === "desc") {
                    sortFunc = (a, b) => {
                        return b.deceased - a.deceased;
                    };
                }
                break;
        }
        this.entries.sort(sortFunc);
    }

    /**
     * Method untuk menghapus semua baris dalam tabel
     */
    clearTable() {
        while (this.tableBody.firstChild) {
            this.tableBody.removeChild(this.tableBody.firstChild);
        }
    }
}

new CaseTable();