
class Comment {
    constructor(oneComment) {

        this.userName = oneComment.Pracownik;
        this.comment = oneComment.Komentarz;
        this.salary = Number(oneComment.Kat1);
        this.opportunities = Number(oneComment.Kat2);
        this.benefits = Number(oneComment.Kat3);
        this.people = Number(oneComment.Kat4);
        this.atmosphere = Number(oneComment.Kat5);


    }
    avarage() {
        return ((this.salary + this.opportunities + this.benefits + this.people + this.atmosphere)/5).toFixed(1);
    }
    getCard() {
        var rateSalary = 
        "<div class=\"dropdown-item\">\
            <div>"+this.salary.toFixed(1)+" wypłata</div>\
            <div class=\"progress\">\
                <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: "+this.salary/5*100+"%\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>\
            </div>\
        </div>\
        ";
        var rateOpportunities = 
        "<div class=\"dropdown-item\">\
            <div>"+this.opportunities.toFixed(1)+" możliwości</div>\
            <div class=\"progress\">\
                <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: "+this.opportunities/5*100+"%\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>\
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
            <div>"+this.people.toFixed(1)+" ludzie</div>\
            <div class=\"progress\">\
                <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: "+this.people/5*100+"%\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>\
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
                        <button class=\"btn btn-primary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">średnia = "+this.avarage()+"</button>\
                        <div class=\"dropdown-menu\">\
                        "+rateSalary+"\
                        <div class=\"dropdown-divider\"></div>\
                        "+rateOpportunities+"\
                        <div class=\"dropdown-divider\"></div>\
                        "+rateBenefits+"\
                        <div class=\"dropdown-divider\"></div>\
                        "+ratePeople+"\
                        <div class=\"dropdown-divider\"></div>\
                        "+rateAtmosphere+"\
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
