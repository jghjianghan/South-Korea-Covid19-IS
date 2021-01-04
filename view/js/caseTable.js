class CaseTable{
    constructor(chosenColumn, chosenOrder, entries) {
        this.tableBody = this.table.querySelector("tbody");
        this.chosenColumn = chosenColumn;
        this.chosenOrder = chosenOrder;
        this.entries = entries;

        //method binding
        this.showData = this.showData.bind(this);
        this.clearTable = this.clearTable.bind(this);
        this.sortTable = this.sortTable.bind(this);

    }

    showData(entries){
        for (let i of entries) {
            this.tableBody.appendChild(i.renderRow());
        }
    }

    sortTable(){
        let sortFunc;
        switch (this.chosenColumn) {
            case "date":
                if (this.chosenOrder === "asc") {
                    sortFunc = (a, b) => {
                        return a.date - b.date;
                    };
                } else if (this.order === "desc") {
                    sortFunc = (a, b) => {
                        return b.date - a.date;
                    };
                }
                break;
            case "newCase":
                if (this.chosenOrder === "asc") {
                    sortFunc = (a, b) => {
                        return a.newCase - b.newCase;
                    };
                } else if (this.chosenOrder === "desc") {
                    sortFunc = (a, b) => {
                        return b.newCase - a.newCase;
                    };
                }
                break;
            case "confirmed":
                if (this.chosenOrder === "asc") {
                    sortFunc = (a, b) => {
                        return a.confirmed - b.confirmed;
                    };
                } else if (this.order === "desc") {
                    sortFunc = (a, b) => {
                        return b.confirmed - a.confirmed;
                    };
                }
                break;
            case "released":
                if (this.chosenOrder === "asc") {
                    sortFunc = (a, b) => {
                        return a.released - b.released;
                    };
                } else if (this.chosenOrder === "desc") {
                    sortFunc = (a, b) => {
                        return b.released - a.released;
                    };
                }
                break;
            case "deceased":
                if (this.chosenOrder === "asc") {
                    sortFunc = (a, b) => {
                        return a.deceased - b.deceased;
                    };
                } else if (this.chosenOrder === "desc") {
                    sortFunc = (a, b) => {
                        return b.deceased - a.deceased;
                    };
                }
                break;
        }
        this.entries.sort(sortFunc);
    }

    clearTable(){
        while (this.tableBody.firstChild) {
            this.tableBody.removeChild(this.tableBody.firstChild);
        }
    }
}