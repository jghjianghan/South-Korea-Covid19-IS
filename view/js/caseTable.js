class CaseTable {
    constructor() {
        this.table = document.getElementById("case-table");
        this.tableHead = this.table.querySelector("thead");
        this.tableBody = this.table.querySelector("tbody");

        //method binding
        this.initializeTable = this.initializeTable.bind(this);
        this.clearTable = this.clearTable.bind(this);
        this.sortEntry = this.sortEntry.bind(this);
        this.populateTable = this.populateTable.bind(this);

        //add event listener to all dropdown option
        let links = document.querySelectorAll(".sortLink");
        for (let i of links) {
            i.addEventListener("click", this.sortEntry);
        }
        //disable event on submenu
        let submenus = document.querySelectorAll("p.dropdown-item");
        for (let i of submenus) {
            i.addEventListener("click", (event) => event.stopPropagation());
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

    /**
     * Click event listener untuk mengurutkan data dan menampilkan kembali data yang sudah terurut
     * @param {Event} event
     */
    sortEntry(event) {
        //Sorting
        let column = event.target.dataset.column;
        let order = event.target.dataset.order;
        console.log(event.target);
        console.log(column)
        console.log(order)
        let sortFunc;

        switch (column) {
            case "date":
                console.log('tanggal');
                console.log(order);
                if (order === "asc") {
                    console.log('naik');
                    sortFunc = (a, b) => {
                        return a.date - b.date;
                    };
                } else if (order === "desc") {
                    console.log('turun');
                    sortFunc = (a, b) => {
                        return b.date - a.date;
                    };
                }
                break;
            case "newCase":
                if (order === "asc") {
                    sortFunc = (a, b) => {
                        return a.newCase - b.newCase;
                    };
                } else if (order === "desc") {
                    sortFunc = (a, b) => {
                        return b.newCase - a.newCase;
                    };
                }
                break;
            case "confirmed":
                if (order === "asc") {
                    sortFunc = (a, b) => {
                        return a.confirmed - b.confirmed;
                    };
                } else if (order === "desc") {
                    sortFunc = (a, b) => {
                        return b.confirmed - a.confirmed;
                    };
                }
                break;
            case "released":
                if (order === "asc") {
                    sortFunc = (a, b) => {
                        return a.released - b.released;
                    };
                } else if (order === "desc") {
                    sortFunc = (a, b) => {
                        return b.released - a.released;
                    };
                }
                break;
            case "deceased":
                if (order === "asc") {
                    sortFunc = (a, b) => {
                        return a.deceased - b.deceased;
                    };
                } else if (order === "desc") {
                    sortFunc = (a, b) => {
                        return b.deceased - a.deceased;
                    };
                }
                break;
        }
        this.entries.sort(sortFunc);

        //show entries on table
        this.clearTable();
        this.populateTable();
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