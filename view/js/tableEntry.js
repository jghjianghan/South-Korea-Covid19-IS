class TableEntry {
    /**
     * 
     * @param {object} entryData Data JSON dari server
     */
    constructor(entryData) {
        this.date = entryData.date;
        this.newCase = entryData.newCase;
        this.confirmed = entryData.confirmed;
        this.released = entryData.released;
        this.deceased = entryData.deceased;
    }

    // constructor(date, newCase, confirmed, released, deceased) {
    //     this.date = date;
    //     this.newCase = newCase;
    //     this.confirmed = confirmed;
    //     this.released = released;
    //     this.deceased = deceased;
    // }

    /**
     * Memformat data entry ke dalam baris tabel yang bisa ditampilkan
     * @return object tr yang merupakan tampilan dari entri
     */
    renderRow() {
        let row = document.createElement("tr");

        //date
        let col = document.createElement("td");
        col.textContent = this.date;
        row.appendChild(col);

        //new case
        col = document.createElement("td");
        col.textContent = this.newCase;
        row.appendChild(col);

        //confirmed
        col = document.createElement("td");
        col.textContent = this.confirmed;
        row.appendChild(col);

        //released
        col = document.createElement("td");
        col.textContent = this.released;
        row.appendChild(col);

        //deceased
        col = document.createElement("td");
        col.textContent = this.deceased;
        row.appendChild(col);

        return row;
    }
}