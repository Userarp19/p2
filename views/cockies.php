


<section class=" container-fluid px-5 py-5">
    <div class="px-5 bg-color1 text-color2 text-center pt-5 pb-5" style="height: 100%;" >  
        <?=$valorcockie?><br>
        
        <div class=" col-12 mt-3" >
                  <div>
                    <button type="button" id="qrButton" class="btn btn-dark" onclick="Qr()">QrCode</button>
                  </div>
                  <div class="allqr">

                 

                    <div id="showQr" class="qrcode1">
                      <img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?=$cockQR?>'&amp;size=150x150" alt="qr" title="qr" />
                    </div>
                  </div>
                  
                </div>
    </div>

</section>

<script src="<?=base_url.'assets/js/QR.js'?>"></script>

 
