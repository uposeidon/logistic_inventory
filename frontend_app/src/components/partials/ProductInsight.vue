<template>
  <div class="product-insight-area">
    <div class="product-insight">
      <h2>Product Insights Across Selected Markets</h2>
      <div class="product-insight-data">
        <table class="table">
          <thead>
            <tr>
                <th scope="col"></th>
                <th id="cursor-type" scope="col">Marketplace</th>
                <th scope="col">Market Price &nbsp;<i id="market_price" class="fa fa-sort"></i></th>
                <th scope="col">Expenses &nbsp;<i class="fa fa-sort"></i></th>
                <th scope="col">Profit &nbsp;<i class="fa fa-sort"></i></th>
                <th scope="col">Competition &nbsp;<i class="fa fa-sort"></i></th>
                <th scope="col">Demand &nbsp;<i class="fa fa-sort"></i></th>
                <th scope="col">Recommendation &nbsp;<i class="fa fa-sort"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th id="sign">+</th>
              <td id="company"> <img width="50" src="../../assets/images/amazon-xs.png" alt=""/> &nbsp;&nbsp;eBay Au</td>
              <td id="market_price">$549.99&nbsp;<i class="fa fa-external-link"></i></td>
              <td id="expenses"><i class="fa fa-plus-square"></i>&nbsp;$33.71</td>
              <td id="profit">$894.55</td>
              <td id="competetion"><i class="fa fa-plus-square"></i>&nbsp;Low</td>
              <td>Medium</td>
              <td id="recc"><i class="fa fa-plus-square"></i>&nbsp;Recommended</td>
            </tr>
            <tr>
              <th id="sign">+</th>
              <td id="company"> <img width="50" src="../../assets/images/amazon-xs.png" alt=""/> &nbsp;&nbsp;eBay UK</td>
              <td id="market_price">$549.99&nbsp;<i class="fa fa-external-link"></i></td>
              <td id="expenses"><i class="fa fa-plus-square"></i>&nbsp;$33.71</td>
              <td id="profit">$894.55</td>
              <td id="competetion"><i class="fa fa-plus-square"></i>&nbsp;Low</td>
              <td>Medium</td>
              <td id="recc"><i class="fa fa-plus-square"></i>&nbsp;Recommended</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import "../../assets/css/productinsight.css";
import $ from 'jquery';

export default {
  name: "ProductInsight",
  mounted () {
      $('.insight-qs').hover(function(){
          $('#insithDetails').show();
      });

      $('.insight-qs').mouseout(function(){
          $('#insithDetails').hide();
      });

      $('th[scope=col]').click(function(){
          let a = $(this).text();
          if (a === "Market Price"){
              alert();
          }
      })
  },
};
</script>