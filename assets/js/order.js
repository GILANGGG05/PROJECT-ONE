console.log("JS CONNECTED");

document.addEventListener("DOMContentLoaded", function(){

    /* ====================== USERID CHECK ====================== */
    let userid = document.getElementById("userid");
    if(userid){
        userid.addEventListener("keyup", function(){
            console.log("User ID diketik");
            let id = this.value;
            if(id.length > 5){
                document.getElementById("nickname").innerText = "Nickname : ProPlayer_" + id.slice(-3);
            } else {
                document.getElementById("nickname").innerText = "Nickname : -";
            }
        });
    }

    /* ====================== DIAMOND ====================== */
    let diamonds = document.querySelectorAll(".diamond");
    let sumDiamond = document.getElementById("sumDiamond");
    let sumPrice = document.getElementById("sumPrice");

    diamonds.forEach(d=>{
        d.onclick = function(){
            diamonds.forEach(x => x.classList.remove("active"));
            this.classList.add("active");

            if(sumDiamond) sumDiamond.innerText = this.innerText.split("💎")[0].trim() + " 💎";
            if(sumPrice) sumPrice.innerText = "Rp" + this.getAttribute("data-price");
        }
    });

    /* ====================== PAYMENT ====================== */
    let payments = document.querySelectorAll(".payment");
    let sumPay = document.getElementById("sumPay");

    payments.forEach(p=>{
        p.onclick = function(){
            payments.forEach(x => x.classList.remove("active"));
            this.classList.add("active");
            if(sumPay) sumPay.innerText = this.innerText;
        }
    });

}); // end DOMContentLoaded

/* ====================== MODAL ====================== */
function showModal(){
    let diamond = document.getElementById("sumDiamond").innerText;
    let payment = document.getElementById("sumPay").innerText;
    let price = document.getElementById("sumPrice").innerText;

    if(diamond == "-" || payment == "-" || price == "-"){
        alert("Harap pilih diamond dan metode pembayaran!");
        return;
    }

    document.getElementById("modalText").innerHTML =
    `
    Diamond : ${diamond} <br>
    Payment : ${payment} <br>
    Total   : ${price}
    `;

    document.getElementById("modal").style.display = "flex";
}

function closeModal(){
    document.getElementById("modal").style.display = "none";
}

/* ====================== ORDER ====================== */
function confirmOrder(){

    let userid = document.getElementById("userid").value;
    let serverid = document.getElementById("serverid").value;
    let wa = document.getElementById("wa").value;

    // Validasi
    if(!userid || !serverid || !wa){
        alert("Harap lengkapi semua data!");
        return;
    }

    let sumDiamond = document.getElementById("sumDiamond");
    let sumPay = document.getElementById("sumPay");
    let sumPrice = document.getElementById("sumPrice");

    let diamond = sumDiamond ? sumDiamond.innerText.replace("💎", "").trim() : "";
    let payment = sumPay ? sumPay.innerText : "";
    let total = sumPrice ? sumPrice.innerText.replace("Rp", "") : "";

    // Ambil nickname
    let nicknameDiv = document.getElementById("nickname");
    let nickname = nicknameDiv ? nicknameDiv.innerText.replace("Nickname : ", "") : "";

    // Ambil game dari summary
    let gameElement = document.querySelector(".summary-item span:last-child");
    let game = gameElement ? gameElement.innerText : "Mobile Legends";

    console.log("Sending data:", {
        user_id: userid,
        server_id: serverid,
        game: game,
        nickname: nickname,
        diamond: diamond,
        payment: payment,
        total: total,
        wa: wa
    });

    fetch("../process/order.php",{
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: 
            "user_id="+encodeURIComponent(userid)+
            "&server_id="+encodeURIComponent(serverid)+
            "&game="+encodeURIComponent(game)+
            "&nickname="+encodeURIComponent(nickname)+
            "&diamond="+encodeURIComponent(diamond)+
            "&payment="+encodeURIComponent(payment)+
            "&total="+encodeURIComponent(total)+
            "&wa="+encodeURIComponent(wa)
    })
    .then(res => res.text())
    .then(res => {
        console.log("Response:", res);
        if(res.trim() == "success"){
            alert("Pesanan berhasil disimpan!");
            closeModal();

            // Tampilkan QRIS
            let qrisDiv = document.getElementById("qrisArea");
            if(qrisDiv){
                qrisDiv.innerHTML = '<h3>Scan QRIS untuk pembayaran:</h3><img src="../assets/img/qris.png" style="width:250px; border-radius:10px;">';
            }

        } else {
            alert("Error: " + res);
        }
    })
    .catch(err => {
        console.error(err);
        alert("Terjadi error, silahkan coba lagi.");
    });
}