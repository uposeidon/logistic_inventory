<!-- Shaumik G. -->
<template>
  <div class="product-insight-area">
    <div class="product-insight">
      <h2>Product Insights Across Selected Markets</h2>
      <div class="product-insight-data">
        <div class="data-table">
          <div class="table-header">
            <div class="table-header-row tble-row-1"></div>
            <div class="table-header-row tble-row-2">Marketplace</div>
            <div class="table-header-row tble-row-3">Market Price &nbsp;<i id="market_price" class="fa fa-sort"></i></div>
            <div class="table-header-row tble-row-4">Expenses &nbsp;<i class="fa fa-sort"></i></div>
            <div class="table-header-row tble-row-5">Profit &nbsp;<i class="fa fa-sort"></i></div>
            <div class="table-header-row tble-row-6">Competition &nbsp;<i class="fa fa-sort"></i></div>
            <div class="table-header-row tble-row-7">Demand &nbsp;<i class="fa fa-sort"></i></div>
            <div class="table-header-row tble-row-8">Recommendation &nbsp;<i class="fa fa-sort"></i></div>
            <div class="table-header-row tble-row-9"></div>
          </div>
          <div class="table-body">



            <!-- loop data -->
            <div class="table-data">
              <div class="table-bpdy-row tbl-body-row-1">+</div>
              <div class="table-bpdy-row tbl-body-row-2" id="company">
                <img width="50" src="../../assets/images/amazon-xs.png" alt=""/> &nbsp;&nbsp;eBay Au
              </div>
              <div class="table-bpdy-row">
                $549.99&nbsp;<i class="fa fa-external-link"></i>
              </div>
              <div class="table-bpdy-row" id="expenses">
                <i class="fa fa-plus-square"></i>&nbsp;$33.71
              </div>
              <div class="table-bpdy-row" id="profit">$894.55</div>
              <div class="table-bpdy-row" id="competetion">Low</div>
              <div class="table-bpdy-row">Medium</div>
              <div class="table-bpdy-row" id="recc"><i class="fa fa-plus-square" id="recc-icon"></i>&nbsp;&nbsp;Recommended</div>
              <div class="table-bpdy-row tbl-body-row-9"></div>
            </div>
            <div id="table-collasping" class="table-collasp-on-load">
              <div class="tab-area">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Expensen Breakdown</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Competeive Analysis</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Algopix Recommendation</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                  <div class="competitive-analysis-area">
                    <div class="competitive-analysis-area-left">


                      <div class="competitive-analysis-header-area">
                        <div class="comp-left comp">
                          <h4>$1,323.35</h4>
                          <p>Market Price (Lowest offering from a reputable seller)</p>
                        </div>
                        <div class="comp-right comp cmp-2">
                          <h4>70-79% Positive</h4>
                          <p>Sellers rating (33 Total ratings)</p>
                        </div>
                      </div>

                      <div class="competetive-offer">
                        <h5>Competitive Offerings</h5>
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col"></th>
                              <th scope="col">Price</th>
                              <th scope="col">Seller’s Rating</th>
                              <th scope="col">Fulfillment</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">Buy Box Offering</th>
                              <td>N/A</td>
                              <td>N/A</td>
                              <td>N/A</td>
                            </tr>
                            <tr>
                              <th scope="row">Lowest Offering</th>
                              <td>$1,323.35</td>
                              <td>70-79% Positive (33 Total ratings)</td>
                              <td>Merchant</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                      <div class="comepetive-offer-bottom">
                        <div class="completetive-bottom cmpt-1">
                          <h3>2,077</h3>
                          <p>Best Seller Ranking</p>
                          <h3>In <a href="">Hair Care</a></h3>
                        </div>
                        <div class="completetive-bottom cmpt-2">
                          <h3>B081P49HJZ</h3>
                          <p>Local ASIN</p>
                        </div>
                      </div>

                    </div>

                    <div class="competitive-analysis-area-right">
                      <div class="competitive-analysis-right">
                        <h4>1</h4>
                        <h6>Offerings</h6>
                      </div>
                      <div class="competitive-analysis-right">
                        <h4><i class="fa fa-minus-circle"></i>&nbsp;FBA</h4>
                        <h6>Not sold via FBA</h6>
                      </div>
                      <div class="competitive-analysis-right">
                        <h4><i class="fa fa-minus-circle"></i>&nbsp;Amazon</h4>
                        <h6>Not offered by Amazon</h6>
                      </div>
                    </div>
                  </div>


                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="algo-recommendation-area">
                    <h6 id="title">Recommended</h6>
                    <h5>How does Algopix recommend products:</h5>
                    <b id="desc">To make sure you have the best chance of success, Algopix recommends:</b>

                    <div class="algo-recommendation-area-result">
                      <div class="recoom recoom-result-1">
                        <h6>Products with a</h6>
                        <h5>Medium or High Demand</h5>
                      </div>
                      <div class="recoom recoom-result-2">
                          <h6>Products that have at least a</h6>
                          <h3>15% &nbsp;<i class="fa fa-sort-up"></i></h3>
                          <h6>Profit margin according to the purchase price and associated costs.</h6>
                      </div>
                      <div class="recoom recoom-result-3">
                        <h6>Highest recommended buying price to reach a 15% profit margin</h6>
                        <h3>$697.48</h3>
                        <h6>If your supplier has that item, this is your negotiation target price</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
            <!-- loop data -->

            
          </div>
        </div>
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

      // $('th[scope=col]').click(function(){
      //     let a = $(this).text();
      //     if (a === "Market Price"){
      //         alert();
      //     }
      // })

      $('.tbl-body-row-1').click(function(){
        let symbol = $('.tbl-body-row-1').text();
        
        if (symbol === '+') {
          $('.tbl-body-row-1').text('-')
          $('#table-collasping').removeClass('table-collasp-on-load');
          $('#table-collasping').addClass('table-collasp-2');
        }else{
          $('.tbl-body-row-1').text('+')
          $('#table-collasping').removeClass('table-collasp-2');
          $('#table-collasping').addClass('table-collasp-on-load');
        }
      });
  },
};
</script>