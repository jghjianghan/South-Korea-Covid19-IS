class TableEntry {
    /**
     * 
     * @param {string} date Tanggal Pencatatan
     * @param {int} newCase jumlah pertambahan kasus positif pada tanggal tersebut
     * @param {int} confirmed jumlah kasus positif kumulatif sampai dengan tanggal tersebut
     * @param {int} released jumlah pasien sembuh kumulatif sampai dengan tanggal tersebut
     * @param {int} deceased jumlah pasien meninggal dunia kumulatif sampai dengan tanggal tersebut
     */
    constructor(date, newCase, confirmed, released, deceased) {
        this.date = new Date(date);
        this.newCase = newCase;
        this.confirmed = confirmed;
        this.released = released;
        this.deceased = deceased;
    }

    /**
     * Memformat data entry ke dalam baris tabel yang bisa ditampilkan
     * @return object <tr> yang merupakan tampilan dari entri
     */
    renderRow() {
        let row = document.createElement("tr");

        //date
        let col = document.createElement("td");
        col.textContent = this.date.getDate() + "/" + (this.date.getMonth() + 1) + "/" + this.date.getFullYear();
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