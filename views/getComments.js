/**
 * Klasa reprezentująca jeden komentarz
 * @class
 * @param {Object} commentElements Obiekt o liczbowych polach Pracownik,Komentarz,Kat1,Kat2,Kat3,Kat4,Kat5
 */
class Comment {
    constructor(commentElements) {

        this.userName = commentElements.Pracownik;
        this.comment = commentElements.Komentarz;
        this.salary = Number(commentElements.Kat1);
        this.atmosphere = Number(commentElements.Kat2);
        this.benefits = Number(commentElements.Kat3);
        this.people = Number(commentElements.Kat4);
        this.possibilities = Number(commentElements.Kat5);
    }
    /**
     * Oblicza średnią ze wszystkich ocen
     * @returns {string} Średnią zaokrągloną do jednego miejsca po przecinku.
     */
    avarage() {
        return ((this.salary + this.atmosphere + this.benefits + this.people + this.possibilities
        )/5).toFixed(1);
    }
    /**
     * Funkcja reprezentuje finalny wygląd jednego komentarza
     * @returns {string} Kod html bloku jednego komentarza
     */
    getCard() {
        var rateSalary = 
        "<div class=\"dropdown-item\">\
            <div>"+this.salary.toFixed(1)+" wynagrodzenie</div>\
            <div class=\"progress\">\
                <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: "+this.salary/5*100+"%\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>\
            </div>\
        </div>\
        ";
        var rateAtmosphere = 
        "<div class=\"dropdown-item\">\
            <div>"+this.atmosphere.toFixed(1)+" atmosfera</div>\
            <div class=\"progress\">\
                <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: "+this.atmosphere/5*100+"%\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>\
            </div>\
        </div>\
        ";
        var rateBenefits = 
        "<div class=\"dropdown-item\">\
            <div>"+this.benefits.toFixed(1)+" benefity</div>\
            <div class=\"progress\">\
                <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: "+this.benefits/5*100+"%\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>\
            </div>\
        </div>\
        ";
        var ratePeople = 
        "<div class=\"dropdown-item\">\
            <div>"+this.people.toFixed(1)+" miejsce pracy</div>\
            <div class=\"progress\">\
                <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: "+this.people/5*100+"%\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>\
            </div>\
        </div>\
        ";
        var ratePossibilities = 
        "<div class=\"dropdown-item\">\
            <div>"+this.possibilities.toFixed(1)+" możliwości rozwoju</div>\
            <div class=\"progress\">\
                <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: "+this.possibilities/5*100+"%\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>\
            </div>\
        </div>\
        ";
        var commentsOut = 
        "<div class=\"card card-body\" style=\"margin-top: 10px\"> \
            <div class=\"row\">\
                <div class=\"col\">\
                <i class=\"fa fa-user prefix green-text\"></i>\
                </div>\
                <div class=\"col\">\
                    <div class=\"btn-group\" style=\"float: right\">\
                        <button class=\"btn btn-primary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"><i class=\"fa fa-star prefix yellow-text\"></i> "+this.avarage()+"</button>\
                        <div class=\"dropdown-menu\">\
                        "+rateSalary+"\
                        <div class=\"dropdown-divider\"></div>\
                        "+rateAtmosphere+"\
                        <div class=\"dropdown-divider\"></div>\
                        "+rateBenefits+"\
                        <div class=\"dropdown-divider\"></div>\
                        "+ratePeople+"\
                        <div class=\"dropdown-divider\"></div>\
                        "+ratePossibilities
                        +"\
                    </div>\
                </div>\
            </div>\
        </div>\
        <p class=\"card-text\">"+this.comment+"</p>\
        </div>";
        return commentsOut;
    }
}
/**
 * Funkcja przypisuje kod html każdego z komentarzy do środka elementu o Id commentContainer
 * @param  {Object} comments Tablica obiektów o liczbowych polach Pracownik,Komentarz,Kat1,Kat2,Kat3,Kat4,Kat5
 */
function getComments(comments){
    commentsOut = "";
    comments.forEach(element => {
        var c = new Comment(element);
        commentsOut += c.getCard();
    });
    document.getElementById("commentsContainer").innerHTML = commentsOut;
}
