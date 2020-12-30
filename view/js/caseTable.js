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
        fetch('data/overall').then(response => response.text()) //contoh
            .then(text => {
                // this.entries.push(text);
                console.log(this.entries);
            });

        //data dummy
        let data1 = {
            date: "date",
            newCase: "20",
            confirmed: "2",
            released: "3",
            deceased: "4",
        };
        let data2 = {
            date: "datf0",
            newCase: "35",
            confirmed: "25",
            released: "2",
            deceased: "4",
        };
        let data3 = {
            date: "datf1",
            newCase: "14",
            confirmed: "10",
            released: "7",
            deceased: "9",
        };
        let data4 = {
            date: "datf2",
            newCase: "6",
            confirmed: "9",
            released: "5",
            deceased: "4",
        };
        let data5 = {
            date: "datf3",
            newCase: "8",
            confirmed: "22",
            released: "9",
            deceased: "3",
        };
        // let entry = new TableEntry(data);
        this.entries.push(new TableEntry(data1.date, data1.newCase, data1.confirmed, data1.released, data1.deceased));
        this.entries.push(new TableEntry(data2.date, data2.newCase, data2.confirmed, data2.released, data2.deceased));
        this.entries.push(new TableEntry(data3.date, data3.newCase, data3.confirmed, data3.released, data3.deceased));
        this.entries.push(new TableEntry(data4.date, data4.newCase, data4.confirmed, data4.released, data4.deceased));
        this.entries.push(new TableEntry(data5.date, data5.newCase, data5.confirmed, data5.released, data5.deceased));

        this.populateTable();
    }

    populateTable() {
        for (let i of this.entries) {
            // console.log(i);
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
                        return a.date.localeCompare(b.date);
                    };
                } else if (order === "desc") {
                    console.log('turun');
                    sortFunc = (a, b) => {
                        return b.date.localeCompare(a.date);
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