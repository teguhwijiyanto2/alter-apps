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

StringToSign ==>
inquiry						purchase
00000005					00000010
201803070001				202311140001
6017						6017
807400010001				081234000001
2018-09-17T18:27:00+0700	2023-11-14T19:38:00+0700
*Signature= nR6u+RtpLKGuXqDt2BFG1+Px47RE+9BTXe9fQ4uGdvw=
68b252d07f4dc0a5011744e48c5e6972311ed125edc18e52f610b2ef940cbcad
68b252d07f4dc0a5011744e48c5e6972311ed125edc18e52f610b2ef940cbcad
*/

//$StringToSign = "inquiry\n00000005\n201803070001\n6017\n807400010001\n2018-09-17T18:27:00+0700";
//$StringToSign = "inquiry0000000520180307000160178074000100012018-09-17T18:27:00+0700";

// nR6u+RtpLKGuXqDt2BFG1+Px47RE+9BTXe9fQ4uGdvw=

// 4.3.1 Mobile Prepaid / eWallet / Data Plan (hal 16)

/*
{
 "bankChannel" : "6017",
 "bankId" : "10000001",
 "bankRefNo" : "202010100001",
 "custAccNo" : "1111111111",
 "custId" : "081234000001",
 "dateTrx" : "2020-03-15T16:07:00Z",
 "payeeCode" : "10002",
 "productCode" : "1006"
}

*/

//echo hash_hmac('sha256', 'The quick brown fox jumped over the lazy dog.', 'secret');

//echo base64_encode(hash_hmac('sha256', '$StringToSign', 'h04n7eoPm9gAI/xLdLRoS8I4bL5uNWbdwa5e9VFZxHo='));

/*
Untuk date di header formatnya seperti ini : 2024-05-05T16:20:12+0700
Sedangkan di request body seperti ini : 2023-08-09T12:00:00Z
*/


//$StringToSign = "inquiry\n00000005\n201803070001\n6017\n807400010001\n2018-09-17T18:27:00+0700";

/*
$StringToSign = "inquiry
\n
00000005
\n
201803070001
\n
6017
\n
807400010001
\n
2018-09-17T18:27:00+0700";
*/





/*
$StringToSign = "";
$StringToSign .= "inquiry";
$StringToSign .= "\n";
$StringToSign .= "00000005"; //bankId
$StringToSign .= "\n";
$StringToSign .= "201803070001"; //bankRefNo
$StringToSign .= "\n";
$StringToSign .= "6017"; //bankChannel
$StringToSign .= "\n";
$StringToSign .= "807400010001"; //custId
$StringToSign .= "\n";
$StringToSign .= "2018-09-17T18:27:00+0700"; //dateTrx
*/

/*
{
 "bankChannel" : "6017",
 "bankId" : "00000010",
 "bankRefNo" : "202401100001",
 "custAccNo" : "1111111111",
 "custId" : "081234000001",
 "dateTrx" : "2024-01-10T11:40:00Z",
 "payeeCode" : "10002",
 "productCode" : "1006"
}
*/

/*
$StringToSign = "";
$StringToSign .= "inquiry";
$StringToSign .= "\n";
$StringToSign .= "00000010";
$StringToSign .= "\n";
$StringToSign .= "202401100001";
$StringToSign .= "\n";
$StringToSign .= "6017";
$StringToSign .= "\n";
$StringToSign .= "081234000001";
$StringToSign .= "\n";
$StringToSign .= "2024-01-10T11:40:00Z";
// Ja0uXSPM5fto1tVQMGVyNk9SltaYJ57w3Yz3dAH+fsY=
*/

/*
inquiry
00000010
202401100001
6017
081234000001
2024-01-10T11:40:00Z
*/


$StringToSign = "";
$StringToSign .= "inquiry";
$StringToSign .= "\n";
$StringToSign .= "00000005";
$StringToSign .= "\n";
$StringToSign .= "201803070001";
$StringToSign .= "\n";
$StringToSign .= "6017";
$StringToSign .= "\n";
$StringToSign .= "807400010001";
$StringToSign .= "\n";
$StringToSign .= "2018-09-17T18:27:00+0700";

//echo $StringToSign;



echo "inquiry<br>00000005<br>201803070001<br>6017<br>807400010001<br>2018-09-17T18:27:00+0700";

echo "<br><br>";

echo base64_encode(hash_hmac('sha256', $StringToSign, '3lN1j3/tpRwmgcQFoq9/pyzgP77aRY7MBFhEIfiXQZ4=', true));
//dSUGChtOGJzELDp5w9Ilwg6k7tFN+M6P8gjNssxSWgw=

/*
inquiry
00000005
201803070001
6017
807400010001
2018-09-17T18:27:00+0700


{
 "bankChannel" : "6017",
 "bankId" : "00000005",
 "bankRefNo" : "201803070001",
 "custAccNo" : "1111111111",
 "custId" : "807400010001",
 "dateTrx" : "2018-09-17T18:27:00Z",
 "payeeCode" : "10002",
 "productCode" : "1006"
}

*/

?>