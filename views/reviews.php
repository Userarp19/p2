
<section class=" mx-5 my-5 text-light font1  py-1 px-1 " style="background-color:#382020;">

<script>

</script>
<div>
  <!-- <label for="sort" class="font1 fontsize1 " style="margin-left:30%; ">Sort by:</label>
  
  <select id="sort" onchange="sortReviews()">
    <option value="low-to-high">Rating: Low to High</option>
    <option value="high-to-low">Rating: High to Low</option>
  </select>-->

  <button id="review-form-toggle" class="button">Leave a Review</button>
</div>
<div id="reviews" >  


 
</div>



<?php


if((!isset($_SESSION['user_id'])) and (!isset($_SESSION['user_name']))){?>
  <div id="review-form-container" class=" mb-5 text-light font1" style="background-color:#4b0d0d; 
  width:400px; height:400px; text-align:center; padding-right:7%; padding-top:10%;" >
  <a  href="<?=base_url.'producto/loginRegistrar'?>" role="button">
    <button type="button"  class="button">Log-in to Review your Orders</button>
</a>
  </div>
  <?php }else {?>
  <div id="review-form-container" class=" mb-5 text-light font1" style="background-color:#4b0d0d;" >


<form id="review-form">
  
<label for="orderid" class="fontsize1 " style="margin-left:30%; ">Select an Order ID: </label>

        <select id="order-select" name="order-select" style=""></select>

          
          </select>   

 <input type="hidden" id="user-id" name="user-id" value="<?php echo $_SESSION['user_id']; ?>">

 <br><br>
  <div class="rating-container fontsize1 " style=" text-align: center;">
  <label for="rating">Rate your Expirience:</label><br>
    <div class="rate">
      <input type="radio" id="star5" name="rating" value="5" />
      <label for="star5" title="5 stars"></label>
      <input type="radio" id="star4" name="rating" value="4" />
      <label for="star4" title="4 stars"></label>
      <input type="radio" id="star3" name="rating" value="3" />
      <label for="star3" title="3 stars"></label>
      <input type="radio" id="star2" name="rating" value="2" />
      <label for="star2" title="2 stars"></label>
      <input type="radio" id="star1" name="rating" value="1" />
      <label for="star1" title="1 star"></label>
    </div>
  </div>
<div style="margin-left:20%; margin-right:20%; text-align: center; ">
    <label for="comment" class="fontsize1 ">Leave a comment:</label><br><br>
      <textarea name="comment" id="comment" placeholder="Tell us about your experience..."></textarea>

      <input type="submit" value="Submit">
</div>
  
</form>

</div>
<?php } ?>


</section>
<script src="<?=base_url.'assets/js/scriptAPI.js'?>" type="module"></script>