class CaseTable {
    constructor() {
        this.table = document.getElementById("case-table");
        this.tableHead = this.table.querySelector("thead");
        this.tableBody = this.table.querySelector("tbody");

        //add event listener to all dropdown option
        let links = document.querySelectorAll("li.dropdown-item");
        for (let i of links) {
            i.addEventListener("click", this.sortEntry);
            console.log(i.id);
        }
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
        let entry = new TableEntry(data);
        this.tableBody.appendChild(entry.renderRow());
        this.tableBody.appendChild((new TableEntry(data2)).renderRow());
        this.tableBody.appendChild((new TableEntry(data3)).renderRow());
        this.tableBody.appendChild((new TableEntry(data4)).renderRow());
        this.tableBody.appendChild((new TableEntry(data5)).renderRow());
    }

    /**
     * Click event listener untuk mengurutkan data dan menampilkan kembali data yang sudah terurut
     * @param {Event} event
     */
    sortEntry(event) {
        this.table = document.getElementById("case-table");
        this.tableBody = this.table.querySelector("tbody");

         //data dummy
         let sortArray = [
             {
            date: "date",
            newCase: "20",
            confirmed: "2",
            released: "3",
            deceased: "4",
        },
 {
            date: "datf0",
            newCase: "35",
            confirmed: "25",
            released: "2",
            deceased: "4",
        },
   {
            date: "datf1",
            newCase: "14",
            confirmed: "10",
            released: "7",
            deceased: "9",
        },
   {
            date: "datf2",
            newCase: "6",
            confirmed: "9",
            released: "5",
            deceased: "4",
        },
        {
            date: "datf3",
            newCase: "8",
            confirmed: "22",
            released: "9",
            deceased: "3",
        }];



        //Sorting
        let sortId = event.target.id;

        switch(sortId) {
            case "dateA":
                sortArray.sort((a, b) => {
                    return a.date - b.date;
                });
              break;
            case "dateD":
                sortArray.sort((a, b) => {
                return b.date - a.date;
                });
                break;
            case "newA":
                sortArray.sort((a, b) => {
                    return a.newCase - b.newCase;
                });
                break;
            case "newD":
                sortArray.sort((a, b) => {
                    return b.newCase - a.newCase;
                    });
                break;
            case "conA":
                sortArray.sort((a, b) => {
                    return a.confirmed - b.confirmed;
                });
                break;
            case "conD":
                sortArray.sort((a, b) => {
                    return b.confirmed - a.confirmed;
                    });
                break;
            case "relA":
                sortArray.sort((a, b) => {
                    return a.released - b.released;
                });
                break;
            case "relD":
                sortArray.sort((a, b) => {
                    return b.released - a.released;
                    });
                break;
            case "decA":
                sortArray.sort((a, b) => {
                    return a.deceased - b.deceased;
                });
                break;
            case "decD":
                sortArray.sort((a, b) => {
                    return b.deceased - a.deceased;
                });
                break;
            default:
                sortArray.sort((a, b) => {
                    return a.date - b.date;
                });
          }
         
          //show entries on table
          //cleartable?
          for(let i=0;i<sortArray.length;i++){
            let data = new TableEntry(sortArray[i]);
            this.tableBody.appendChild(data.renderRow());
          }
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