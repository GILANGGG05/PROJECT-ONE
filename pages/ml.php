<!DOCTYPE html>
<html>
<head>

<title>Top Up Mobile Legends</title>

<style>

body{
background:#050a18;
color:white;
font-family:Arial;
margin:0;
}

/* CONTAINER */

.container{
max-width:1200px;
margin:auto;
padding:30px;
display:grid;
grid-template-columns:2fr 1fr;
gap:25px;
}

/* HEADER */

.banner{
display:flex;
align-items:center;
gap:15px;
margin-bottom:20px;
}

.banner img{
width:80px;
border-radius:10px;
}

.banner h1{
color:#00eaff;
margin:0;
}

/* CARD */

.card{
background:#0f172a;
padding:20px;
border-radius:12px;
margin-bottom:20px;
box-shadow:0 0 10px rgba(0,234,255,0.2);
}

.card-title{
color:#00eaff;
margin-bottom:15px;
}

/* INPUT */

input{
width:100%;
padding:12px;
border-radius:8px;
border:none;
background:#020617;
color:white;
margin-bottom:10px;
}

/* NICKNAME */

.nickname{
background:#020617;
padding:10px;
border-radius:8px;
margin-top:5px;
color:#00eaff;
font-size:14px;
}

/* DIAMOND */

.diamond-grid{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:12px;
}

.diamond{
background:#020617;
padding:15px;
border-radius:10px;
cursor:pointer;
text-align:center;
transition:0.3s;
}

.diamond:hover{
transform:scale(1.05);
box-shadow:0 0 10px #00eaff;
}

.diamond.active{
border:2px solid #00eaff;
box-shadow:0 0 20px #00eaff;
}

/* PAYMENT */

.payment-grid{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:10px;
}

.payment{
background:#020617;
padding:12px;
border-radius:8px;
cursor:pointer;
text-align:center;
transition:0.3s;
}

.payment:hover{
box-shadow:0 0 10px #00eaff;
}

.payment.active{
border:2px solid #00eaff;
}

/* SUMMARY */

.summary{
background:#0f172a;
padding:20px;
border-radius:12px;
position:sticky;
top:20px;
}

.summary h3{
color:#00eaff;
}

.summary-item{
display:flex;
justify-content:space-between;
margin-bottom:10px;
}

/* BUTTON */

.order-btn{
width:100%;
padding:15px;
border:none;
border-radius:10px;
background:linear-gradient(90deg,#00eaff,#0077ff);
color:white;
font-size:16px;
margin-top:20px;
cursor:pointer;
}

.order-btn:hover{
box-shadow:0 0 15px #00eaff;
}

/* MODAL */

.modal{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.8);
display:none;
align-items:center;
justify-content:center;
}

.modal-box{
background:#0f172a;
padding:30px;
border-radius:10px;
width:300px;
text-align:center;
}

.modal button{
margin-top:15px;
padding:10px 20px;
border:none;
border-radius:8px;
background:#00eaff;
cursor:pointer;
}

</style>

</head>

<body>

<div class="container">

<!-- LEFT -->

<div>

<div class="banner">
<img src="../img/ml.jpg">
<div>
<h1>Mobile Legends</h1>
<p>Top Up Diamond Cepat & Murah</p>
</div>
</div>

<div class="card">

<div class="card-title">1. Masukkan User ID</div>

<input id="userid" placeholder="User ID">
<input id="serverid" placeholder="Server ID">

<div id="nickname" class="nickname">Nickname : -</div>

</div>

<div class="card">

<div class="card-title">2. Pilih Diamond</div>

<div class="diamond-grid">

<div class="diamond" data-price="20000">86 💎<br>Rp20.000</div>
<div class="diamond" data-price="38000">172 💎<br>Rp38.000</div>
<div class="diamond" data-price="55000">257 💎<br>Rp55.000</div>
<div class="diamond" data-price="72000">344 💎<br>Rp72.000</div>
<div class="diamond" data-price="90000">429 💎<br>Rp90.000</div>
<div class="diamond" data-price="105000">514 💎<br>Rp105.000</div>
<div class="diamond" data-price="150000">706 💎<br>Rp150.000</div>
<div class="diamond" data-price="200000">878 💎<br>Rp200.000</div>
<div class="diamond" data-price="250000">1050 💎<br>Rp250.000</div>

</div>

</div>

<div class="card">

<div class="card-title">3. Metode Pembayaran</div>

<div class="payment-grid">

<div class="payment">💰 DANA</div>
<div class="payment">💜 OVO</div>
<div class="payment">🟢 GoPay</div>
<div class="payment">📱 QRIS</div>
<div class="payment">🏦 BCA</div>
<div class="payment">🏦 BRI</div>

</div>

</div>

<div class="card">

<div class="card-title">4. Nomor WhatsApp</div>

<input id="wa" placeholder="08xxxxxxxx">

</div>

</div>

<!-- RIGHT -->

<div class="summary">

<h3>Ringkasan Pesanan</h3>

<div class="summary-item">
<span>Game</span>
<span>Mobile Legends</span>
</div>

<div class="summary-item">
<span>Diamond</span>
<span id="sumDiamond">-</span>
</div>

<div class="summary-item">
<span>Pembayaran</span>
<span id="sumPay">-</span>
</div>

<div class="summary-item">
<span>Total</span>
<span id="sumPrice">-</span>
</div>

<button class="order-btn" onclick="showModal()">Beli Sekarang</button>

</div>

</div>

<!-- MODAL -->

<div id="modal" class="modal">

<div class="modal-box">

<h3>Konfirmasi Pesanan</h3>

<p id="modalText"></p>

<button onclick="confirmOrder()">Konfirmasi Pembayaran</button>

</div>

</div>

<script>

let diamonds=document.querySelectorAll(".diamond");
let payments=document.querySelectorAll(".payment");

let sumDiamond=document.getElementById("sumDiamond");
let sumPay=document.getElementById("sumPay");
let sumPrice=document.getElementById("sumPrice");

/* DIAMOND */

diamonds.forEach(d=>{

d.onclick=function(){

diamonds.forEach(x=>x.classList.remove("active"));

this.classList.add("active");

sumDiamond.innerText=this.innerText;

sumPrice.innerText=this.innerText.split("Rp")[1];

}

});

/* PAYMENT */

payments.forEach(p=>{

p.onclick=function(){

payments.forEach(x=>x.classList.remove("active"));

this.classList.add("active");

sumPay.innerText=this.innerText;

}

});

/* FAKE NICKNAME CHECK */

document.getElementById("userid").onkeyup=function(){

let id=this.value;

if(id.length>5){

document.getElementById("nickname").innerText="Nickname : ProPlayer_"+id.slice(-3);

}else{

document.getElementById("nickname").innerText="Nickname : -";

}

}

/* MODAL */

function showModal(){

let text="Diamond : "+sumDiamond.innerText+
"\nPayment : "+sumPay.innerText+
"\nTotal : "+sumPrice.innerText;

document.getElementById("modalText").innerText=text;

document.getElementById("modal").style.display="flex";

}

/* SEND WHATSAPP */

function confirmOrder(){

let userid = document.getElementById("userid").value;
let serverid = document.getElementById("serverid").value;
let wa = document.getElementById("wa").value;

let diamond = sumDiamond.innerText;
let payment = sumPay.innerText;
let total = sumPrice.innerText;

fetch("../process/order.php",{
method:"POST",
headers:{
"Content-Type":"application/x-www-form-urlencoded"
},
body:
"user_id="+userid+
"&server_id="+serverid+
"&diamond="+diamond+
"&payment="+payment+
"&total="+total+
"&wa="+wa
})
.then(res=>res.text())
.then(res=>{

if(res=="success"){
alert("Pesanan berhasil disimpan!");
}else{
alert(res);
}

});

}
</script>

</body>
</html>