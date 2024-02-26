<?php

/*
secretKey = h04n7eoPm9gAI/xLdLRoS8I4bL5uNWbdwa5e9VFZxHo= (provided by E2Pay) ---> 3lN1j3/tpRwmgcQFoq9/pyzgP77aRY7MBFhEIfiXQZ4=
Signature = Base64(HMAC-SHA256(<secretKey>, StringToSign))
StringToSign ==>
buffer.append(methodService);//Method Service
buffer.append("\n");
buffer.append(bankId);//Bank ID ---> 00000010
buffer.append("\n");
buffer.append(bankRefNo);//Bank Refference No
buffer.append("\n");
buffer.append(bankChannel);//Bank Channel ---> 6017
buffer.append("\n");
buffer.append(custId);//Customer ID
buffer.append("\n");
buffer.append(date);//Date
*/

/*
{
 "bankChannel" : "6017",
 "bankId" : "00000010",
 "bankRefNo" : "202311150005",
 "custAccNo" : "1111111111",
 "custId" : "081234000001",
 "dateTrx" : "2023-11-15T11:40:00Z",
 "payeeCode" : "10002",
 "productCode" : "1006"
}
*/




$StringToSign = "";
$StringToSign .= "purchase";
$StringToSign .= "\n";
$StringToSign .= "00000010";
$StringToSign .= "\n";
$StringToSign .= "202311150007";
$StringToSign .= "\n";
$StringToSign .= "6017";
$StringToSign .= "\n";
$StringToSign .= "081234000001";
$StringToSign .= "\n";
$StringToSign .= "2023-11-15T11:40:00+0700";

echo "purchase<br>00000010<br>202311150007<br>6017<br>081234000001<br>2023-11-15T11:40:00+0700";
// vyixhchiHnKowtRzIB3jUpeB02MIBZ1+BH3tUy4f0N0=










//echo $StringToSign;

/*
postpaidProduct
00000010

6017

2023-11-15T11:40:00+0700

14QE0qf8q9zIDRxFEAlgu1k3kMJBTPyeXugtXN+hbbs=
*/


//echo "postpaidProduct<br>00000010<br><br>6017<br><br>2023-11-15T11:40:00+0700";
// vyixhchiHnKowtRzIB3jUpeB02MIBZ1+BH3tUy4f0N0=



//echo "purchase<br>00000010<br>202311150005<br>6017<br>081234000001<br>2023-11-15T11:40:00+0700";
// AnsbRnGiG0vY7HAcQUUn7yRnPeBsVX5aGUeIWMRx1OM=

//echo "inquiry<br>00000010<br>202311150005<br>6017<br>081234000001<br>2023-11-15T11:40:00+0700";
// DhfaL3rTE2NhMl5nEzUJXTj3mgt6NszC5gOynsNrtAs=


/* API Biller : /bg/restful/prepaidProduct

prepaidProduct
00000010
202311150005
6017
081234000001
2023-11-15T11:40:00+0700

vyixhchiHnKowtRzIB3jUpeB02MIBZ1+BH3tUy4f0N0=
*/




echo "<br><br>";

echo base64_encode(hash_hmac('sha256', $StringToSign, '3lN1j3/tpRwmgcQFoq9/pyzgP77aRY7MBFhEIfiXQZ4=', true));

/*
{
 "bankChannel" : "6017",
 "bankId" : "00000010",
 "bankRefNo" : "202311150005",
 "custAccNo" : "1111111111",
 "custId" : "081234000001",
 "dateTrx" : "2023-11-15T11:40:00Z",
 "payeeCode" : "10002",
 "productCode" : "1006"
}
*/
?>