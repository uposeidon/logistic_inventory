<template>
  <div class="banner-area">
      <div class="banner structure">
        <h2 class="product-title">WOLFGANG PUCK-Organic Soup - Free Range Chicken Noodle, 1 ( 14.5 OZ )</h2>
        <div class="product-info">
          <div class="product product-1">
            <span>
              Highest Profit Opportunity &nbsp;&nbsp;&nbsp;<i class="fa fa-question-circle qp-3"></i>
              <p class="fa-question-circle-qp3">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </span>
            <h5>Amazon CA$Nan</h5>
          </div>
          <div class="product product-2">
            <span>
              Product's Demand Level &nbsp;&nbsp;&nbsp;<i class="fa fa-question-circle qp-4"></i>
              <p class="fa-question-circle-qp4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </span>
            <!-- <h5>Amazon CA$Nan</h5> -->
            <h1>N/A</h1>
          </div>
          <div class="product product-3">
            <span>
              Expenses &nbsp;&nbsp;&nbsp;<i class="fa fa-question-circle qp-5"></i>
              <p class="fa-question-circle-qp5">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </span>
            <!-- <h5>Amazon CA$Nan</h5> -->
            <h1>N/A</h1>
          </div>
          <div class="product product-4">
            <span>
              Profit &nbsp;&nbsp;&nbsp;<i class="fa fa-question-circle qp-6"></i>
              <p class="fa-question-circle-qp6">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </span>
            <!-- <h5>Amazon CA$Nan</h5> -->
            <h1>N/A</h1>
          </div>
          <div class="product product-5">
            <!-- <div class="product-status-not-rec">
                <span>Not <b>Recommended</b></span>
            </div>
            <span class="status-mesg">Couldn’t Located Market price</span> -->
            <div class="product-status-rec">
                <span>Product <b>Recommended</b></span>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
import "../../assets/css/banner.css";
import $ from 'jquery';

export default {
  name: "Banner",
  mounted () {
    $('.qp-3').hover(function(){
      $('.fa-question-circle-qp3').show();
    });

    $('.qp-3').mouseout(function(){
      $('.fa-question-circle-qp3').hide();
    });


    $('.qp-4').hover(function(){
      $('.fa-question-circle-qp4').show();
    });

    $('.qp-4').mouseout(function(){
      $('.fa-question-circle-qp4').hide();
    });

    $('.qp-5').hover(function(){
      $('.fa-question-circle-qp5').show();
    });

    $('.qp-5').mouseout(function(){
      $('.fa-question-circle-qp5').hide();
    });

    $('.qp-6').hover(function(){
      $('.fa-question-circle-qp6').show();
    });

    $('.qp-6').mouseout(function(){
      $('.fa-question-circle-qp6').hide();
    });
  }
};
</script>