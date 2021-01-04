class CaseAggregate{
    constructor(){
        this.statConfirmed = document.getElementById("confirmed-value");
        this.statReleased = document.getElementById("released-value");
        this.stateDeceased = document.getElementById("deceased-value");
    }
    
    showData(confirmed, released, deceased){
        this.statConfirmed.innerHTML = confirmed;
        this.statReleased.innerHTML = released;
        this.stateDeceased.innerHTML = deceased;
    }
}