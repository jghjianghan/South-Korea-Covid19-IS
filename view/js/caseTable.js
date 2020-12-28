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
        let links = document.querySelectorAll("li.dropdown-item");
        for (let i of links) {
            i.addEventListener("click", this.sortEntry);
            // console.log(i.id);
        }
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
        this.entries.push(new TableEntry(data1));
        this.entries.push(new TableEntry(data2));
        this.entries.push(new TableEntry(data3));
        this.entries.push(new TableEntry(data4));
        this.entries.push(new TableEntry(data5));

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
        let sortId = event.target.id;

        console.log(this);

        switch (sortId) {
            case "dateA":
                this.entries.sort((a, b) => {
                    return a.date - b.date;
                });
                break;
            case "dateD":
                this.entries.sort((a, b) => {
                    return b.date - a.date;
                });
                break;
            case "newA":
                this.entries.sort((a, b) => {
                    return a.newCase - b.newCase;
                });
                break;
            case "newD":
                this.entries.sort((a, b) => {
                    return b.newCase - a.newCase;
                });
                break;
            case "conA":
                this.entries.sort((a, b) => {
                    return a.confirmed - b.confirmed;
                });
                break;
            case "conD":
                this.entries.sort((a, b) => {
                    return b.confirmed - a.confirmed;
                });
                break;
            case "relA":
                this.entries.sort((a, b) => {
                    return a.released - b.released;
                });
                break;
            case "relD":
                this.entries.sort((a, b) => {
                    return b.released - a.released;
                });
                break;
            case "decA":
                this.entries.sort((a, b) => {
                    return a.deceased - b.deceased;
                });
                break;
            case "decD":
                this.entries.sort((a, b) => {
                    return b.deceased - a.deceased;
                });
                break;
            default:
                this.entries.sort((a, b) => {
                    return a.date - b.date;
                });
        }


        //show entries on table
        //cleartable?
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