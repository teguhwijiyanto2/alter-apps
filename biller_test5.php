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
purchase
00000010
202401220003
6017
081234000001
2024-01-22T12:00:00+0700

NclrIYDKNqnaoXHIJ03V3ccNP3LJPcrRHXAMQNr19Uk=
*/

$StringToSign = "";
$StringToSign .= "getDepositBalance";
$StringToSign .= "\n";
$StringToSign .= "00000010";
$StringToSign .= "\n";
//$StringToSign .= ""; // "2024013000001";
$StringToSign .= "\n";
$StringToSign .= "6017";
$StringToSign .= "\n";
//$StringToSign .= "\n"; // "081234000001";
$StringToSign .= "\n";
$StringToSign .= "2024-01-22T12:00:00+0700"; // "2024-01-22T12:00:00+0700";

echo "getDepositBalance<br>00000010<br><br>6017<br><br>2024-01-22T12:00:00+0700";
// vyixhchiHnKowtRzIB3jUpeB02MIBZ1+BH3tUy4f0N0=

echo "<br><br>";

echo base64_encode(hash_hmac('sha256', $StringToSign, '3lN1j3/tpRwmgcQFoq9/pyzgP77aRY7MBFhEIfiXQZ4=', true));


/*
getDepositBalance
00000010

6017

2024-01-22T12:00:00+0700



nXroUxlRB4m/Wu+wd8J0OvUceC6NpfEb/fMCvohPHtM=
*/


?>