<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E_statement</title>
    <link rel="stylesheet" href="invoice_2.0\View\css\E_statement.css">
</head>
<body style="font-family:'Poppins'">
    <h3>INVOICE</h3>
    <div class="main">
        <p class="top-stat">STATEMENT OF ACCOUNT</p>
<!-- account details  -->
        <p class="account-details">
   <P>ACCOUNT NUMBER:XXXXXXXXX</P>
    <P>STATEMENT DATE:MMYYYDD</P>
    <P>PEROD COVERED:MMYYDD to MMYYDD</P>
        </p>

        <!-- client info  -->
        <div class="client-info">
            <p>DAVID SMITH</p>
            <p>11439 makepe streets</p>
            <p>Douala Cameroon</p>
        </div>

        <p class="top-head">ACCOUNT SUMMARY</p>

        <!-- account summary  -->
        <div class="account-summary">
            <p>Begining balance on MMDDYY:XXXXX</p>
            <p>Deposits and other transactions:XXX</p>
            <p>DATM and debit card subscriptions:XXX</p>
            <p>other subscriptions:XXX</p>
            <p>checks:XXX</p>
            <p>service fees:XXXX</p>
            <p>Ending balance on MMDDYY:XXXX</p>
        </div>

        <!-- transaction summary -->
        <p class="top-head">TRANSACTIONS</p>
        <table class="table">
   <tr>
          <th>Date</th>
          <th>Description</th>
          <th>Credit</th>
          <th>Deposit</th>
          <th>BALANCE</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-label = "S.no">1</td>
          <td data-label = "Name">marc</td>
          <td data-label = "Age">18</td>
          <td data-label = "Country" >cameroon</td>
          <td data-label = "tel" class="move">674159544</td>

        
        </tr>
        <tr>
        <td data-label = "S.no">1</td>
          <td data-label = "Name">marc</td>
          <td data-label = "Age">18</td>
          <td data-label = "Country">cameroon</td>
          <td data-label = "tel" class="move">674159544</td>
       
        </tr>
        <tr>
        <td data-label = "S.no">1</td>
          <td data-label = "Name">marc</td>
          <td data-label = "Age">18</td>
          <td data-label = "Country" >cameroon</td>
          <td data-label = "tel" class="move">674159544</td>
         
        </tr>
      </tbody>
   
    </table>
    </div>
</body>
</html>