class DailyData {
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
}