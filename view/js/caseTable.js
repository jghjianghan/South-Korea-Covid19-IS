class CaseTable{
    constructor(){
        this.table = document.getElementById("case-table");
        this.sortOptionDropdown = null;
        
        this.showAllEntry = this.showAllEntry.bind(this);

        this.showAllEntry();

    }
    showAllEntry(){
        let data = {
            date: "date",
            newCase: "1",
            confirmed: "2",
            released: "3",
            deceased: "4",
        };
        let entry = new TableEntry(data);
        this.table.appendChild(entry.renderRow())
    }

    getAllEntry(){
        //fetch data
    }

    sortEntry(){
        
    }
}

new CaseTable();