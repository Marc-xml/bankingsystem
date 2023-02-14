

// function computeResults(){
    

// var button = document.getElementById('calculate');
// var UIinterest = document.getElementById('interest').value;
// var UIamount = document.getElementById('amount').value;
// var UIyears = document.getElementById('years').value;
// console.log(UIamount);
// console.log(UIinterest);
// console.log(UIyears);
//     //calculate
//     var principal = parseFloat(UIamount);
//     var CalculateInterest = parseFloat(UIinterest) / 100 /12;
//     var calculatePayements =parseFloat(UIyears)/ 12;

//     //calculate monthly payament
//     var x = Math.pow(1 * CalculateInterest, calculatePayements);
//     var monthly = (principal *CalculateInterest*x );
//     var monthlyPayement = Math.round(monthly);
//     console.log(monthlyPayement);
    

//     //calculate interest
//     var totalInterest = Math.round(UIamount*(UIinterest/100)*UIyears);
    
//     //calculate total payement
//     var totalPyaments = totalInterest+UIamount;

//     //shopw results

//    let payementresult =  document.getElementById("paymentresult");
//     payementresult.innerText =  monthlyPayement;
//    let interestresult =  document.getElementById("interestresult");
//     interestresult.innerText =  totalInterest;
//    let totalresults =  document.getElementById("totalresult");
//     totalresults.innerText = totalPyaments;
  
// }
function computeResults(){
    //The global constants of some class functions(value) are determined using the following three line codes
    const amount = document.querySelector('#amount').value;
    const interest_rate = document.querySelector('#interest_rate').value;
    const months = document.querySelector('#months').value;
    
    //The interest rate has been calculated.
    //The total amount of interest per month has been calculated by the following calculation.
    //That calculation is stored in a constant called "interest"
    const interest = (amount * (interest_rate * 0.01)) / months;
    
    //The bottom line calculates how much to pay each month.
    //Here the total amount is divided by the month (which you will input) and the monthly interest is added to it.
    //All these calculations are stored in a constant called "payment".     
    let payment = ((amount / months) + interest).toFixed(2); 
    
    //regedit to add a comma after every three digits
    //That is, a comma (,) will be added after every three numbers.
    //Example 50,000
    payment = payment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); 
    
    //With the help of innerHTML, the information stored in the "payment" is displayed on the webpage.
    document.querySelector('#paymentresult').innerHTML = `${payment}`
    document.querySelector('#interestresult').innerHTML = `${interest}`
    document.querySelector('#totaltresult').innerHTML = parseInt(amount+interest);
    }