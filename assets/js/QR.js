
document.getElementById("showQr").style.display = "none";

function Qr() {
    //let data = orderQr;
    let size = '150x150';

    //let imag = '<img src="https://api.qrserver.com/v1/create-qr-code/?data='+data+'&amp;size='+size+'" alt="qr" title="qr" />';

    
    document.getElementById("showQr").style.display = "block";
    //document.getElementById("showQr").innerHTML = imag;
    document.getElementById("qrButton").style.display = "none";
    
  }