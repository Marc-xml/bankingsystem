

function computeResults(){
    

    var button = document.getElementById('calculate');
var UIinterest = document.getElementById('interest').value;
var UIamount = document.getElementById('amount').value;
var UIyears = document.getElementById('years').value;
console.log(UIamount);
console.log(UIinterest);
console.log(UIyears);
    //calculate
    var principal = parseFloat(UIamount);
    var CalculateInterest = parseFloat(UIinterest) / 100 /12;
    var calculatePayements =parseFloat(UIyears) * 12;

    //calculate monthly payament
    var x = Math.pow(1 * CalculateInterest, calculatePayements);
    var monthly = (principal * x *CalculateInterest ) / (x-1);
    var monthlyPayement = Math.round(monthly);
    console.log(monthlyPayement);
    

    //calculate interest
    var totalInterest = Math.round(monthly / calculatePayements - principal);
    
    //calculate total payement
    var totalPyaments = Math.round(monthly * calculatePayements);

    //shopw results

   let payementresult =  document.getElementById("paymentresult");
    payementresult.innerText =  monthlyPayement;
   let interestresult =  document.getElementById("interestresult");
    interestresult.innerText =  totalInterest;
   let totalresults =  document.getElementById("totalresult");
    totalresults.innerText = totalPyaments;
  
}