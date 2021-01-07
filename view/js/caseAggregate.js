class CaseAggregate {
    constructor() {
        this.statConfirmed = document.getElementById("confirmed-value");
        this.statReleased = document.getElementById("released-value");
        this.stateDeceased = document.getElementById("deceased-value");
    }

    thousandSeparator(num) {
        var num_parts = num.toString().split(".");
        num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        return num_parts.join(".");
    }

    showData(confirmed, released, deceased) {
        this.statConfirmed.innerHTML = this.thousandSeparator(confirmed);
        this.statReleased.innerHTML = this.thousandSeparator(released);
        this.stateDeceased.innerHTML = this.thousandSeparator(deceased);
    }
}