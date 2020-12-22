class CaseTable {
    constructor() {
        this.table = document.getElementById("case-table");
        this.tableHead = this.table.querySelector("thead");
        this.tableBody = this.table.querySelector("tbody");

        //add event listener to all dropdown option
        // let links = document.querySelectorAll("li.dropdown-item");
        // for (let i of links) {
        //     i.addEventListener("click", this.sortEntry);
        // }
        this.entries = [];

        //method binding
        this.showAllEntry = this.showAllEntry.bind(this);
        this.clearTable = this.clearTable.bind(this);

        this.showAllEntry();
    }

    /**
     * Method untuk fetch data dari server, lalu menampilkan semua data dalam tabel
     */
    showAllEntry() {
        //fetch data
        fetch('data/overall').then(response => response.text()) //contoh
            .then(text => {
                this.entries.push(text);
                console.log(this.entries);
            });

        //data dummy
        let data = {
            date: "date",
            newCase: "1",
            confirmed: "2",
            released: "3",
            deceased: "4",
        };
        let data2 = {
            date: "datf",
            newCase: "2",
            confirmed: "1",
            released: "4",
            deceased: "3",
        };
        let entry = new TableEntry(data);
        this.tableBody.appendChild(entry.renderRow());
        this.tableBody.appendChild((new TableEntry(data2)).renderRow());
    }

    /**
     * Click event listener untuk mengurutkan data dan menampilkan kembali data yang sudah terurut
     * @param {Event} event
     */
    sortEntry(event) {
        console.log(event.currentTarget.dataset.value) //contoh
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