class TableEntry {
    /**
     * 
     * @param {object} entryData Data JSON dari server
     */
    constructor(entryData){
        this.entryData = entryData
    }

    /**
     * Memformat data entry ke dalam baris tabel yang bisa ditampilkan
     * @return object tr yang merupakan tampilan dari entri
     */
    renderRow(){
        let row = document.createElement("tr");

        //date
        let col = document.createElement("td");
        col.textContent = this.entryData.date;
        row.appendChild(col);

        //new case
        col = document.createElement("td");
        col.textContent = this.entryData.newCase;
        row.appendChild(col);

        //confirmed
        col = document.createElement("td");
        col.textContent = this.entryData.confirmed;
        row.appendChild(col);

        //released
        col = document.createElement("td");
        col.textContent = this.entryData.released;
        row.appendChild(col);
        
        //deceased
        col = document.createElement("td");
        col.textContent = this.entryData.deceased;
        row.appendChild(col);

        return row;
    }
}