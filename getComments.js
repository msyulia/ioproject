
class Comment {
    constructor(oneComment) {
        this.userName = oneComment.userName;
        this.comment = oneComment.comment;
        this.salary = oneComment.salary;
        this.opportunities = oneComment.opportunities;
        this.benefits = oneComment.benefits;
        this.workplace = oneComment.workplace;
        this.atmosphere = oneComment.atmosphere;
    }
    avarage() {
        return ((this.salary + this.opportunities + this.benefits + this.workplace + this.atmosphere)/5).toFixed(1);
    }
    getCard() {
        var rateSalary = 
        "<div class=\"dropdown-item\">\
            <div>"+this.salary.toFixed(1)+" wynagrodzenie</div>\
            <div class=\"progress\">\
                <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: "+this.salary/5*100+"%\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>\
            </div>\
        </div>\
        ";
        var rateOpportunities = 
        "<div class=\"dropdown-item\">\
            <div>"+this.opportunities.toFixed(1)+" atmosfera</div>\
            <div class=\"progress\">\
                <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: "+this.opportunities/5*100+"%\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>\
            </div>\
        </div>\
        ";
        var rateBenefits = 
        "<div class=\"dropdown-item\">\
            <div>"+this.benefits.toFixed(1)+" miejsce pracy</div>\
            <div class=\"progress\">\
                <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: "+this.benefits/5*100+"%\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>\
            </div>\
        </div>\
        ";
        var rateWorkplace = 
        "<div class=\"dropdown-item\">\
            <div>"+this.workplace.toFixed(1)+" szanse rozwoju</div>\
            <div class=\"progress\">\
                <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: "+this.workplace/5*100+"%\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>\
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
        var commentsOut = 
        "<div class=\"card card-body\" style=\"margin-top: 10px\"> \
            <div class=\"row\">\
                <div class=\"col\">\
                    <h4 class=\"card-title\">"+this.userName+"</h4>\
                </div>\
                <div class=\"col\">\
                    <div class=\"btn-group\" style=\"float: right\">\
                        <button class=\"btn btn-primary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">średnia: "+this.avarage()+"</button>\
                        <div class=\"dropdown-menu\">\
                        "+rateSalary+"\
                        <div class=\"dropdown-divider\"></div>\
                        "+rateAtmosphere+"\
                        <div class=\"dropdown-divider\"></div>\
                        "+rateBenefits+"\
                        <div class=\"dropdown-divider\"></div>\
                        "+rateWorkplace+"\
                        <div class=\"dropdown-divider\"></div>\
                        "+rateOpportunities+"\
                    </div>\
                </div>\
            </div>\
        </div>\
        <p class=\"card-text\">"+this.comment+"</p>\
        </div>";
        return commentsOut;
    }
}
function getComments(comments){
    commentsOut = "";
    comments.forEach(element => {
        var c = new Comment(element);
        commentsOut += c.getCard();
    });
    document.getElementById("commentsContainer").innerHTML = commentsOut;
}
window.onload = function() {
    var arr = new Array(
        {userName: "Janusz", comment: "Nie mam zdania o tym pracodawcy. Porażka.", salary: 1, opportunities: 1, benefits: 1, workplace: 2, atmosphere: 1},
        {userName: "Grażyna", comment: "Atmosfera nie jest zła, pozostałe rzeczy na minus.", salary: 2, opportunities: 2, benefits: 2, workplace: 2, atmosphere: 3},
        {userName: "Sebastian", comment: "Dobre wynagrodzenie oraz świetny zespół - praca to czysta przyjemność.", salary: 4, opportunities: 5, benefits: 4, workplace: 4, atmosphere: 5},
        {userName: "Jessica", comment: "Świetna lokalizacja. Szkoda tylko, że ludzie nie są milsi.", salary: 3, opportunities: 3, benefits: 2, workplace: 4, atmosphere: 3},
    );
    getComments(arr);
}