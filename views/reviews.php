


<section class="bg-color1 my-5 mx-5 px-5 py-5 text-light font1" style="padding:auto; margin:auto;">
<form id="review-form">
  
<label for="orderid" class="fontsize1 " style="margin-left:41.5%; ">Select an Order ID: </label>

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
</section>
