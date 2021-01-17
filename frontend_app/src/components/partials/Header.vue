<template>
<div>
    <div class="header-bottom">
        <div class="header-bottom-left">
            <span>
              Product indentifier &nbsp;&nbsp;<i class="fa fa-question-circle qp-1"></i>
              <p class="fa-question-circle-qp-1">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </span>
            <select class="header-bottom-left-dd">
                <option value="B081P49HJZ">B081P49HJZ</option>
                <option value="B081P49HJZ">B081P49HJZ</option>
                <option value="B081P49HJZ">B081P49HJZ</option>
            </select>
        </div>
        <div class="header-bottom-right">
            <span>
              Identifying Type &nbsp;&nbsp;<i class="fa fa-question-circle qp-2"></i>
              <p class="fa-question-circle-qp-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </span>
            <select class="header-bottom-right-dd">
                <option value="B081P49HJZ">B081P49HJZ</option>
                <option value="B081P49HJZ">B081P49HJZ</option>
                <option value="B081P49HJZ">B081P49HJZ</option>
            </select>
        </div>
        <button></button>
    </div>
  </div>
</template>

<script>
import "../../assets/css/header.css";
import $ from 'jquery';

export default {
  name: "Header",
  mounted () {
    $('.qp-1').hover(function(){
      $('.fa-question-circle-qp-1').show();
    });
    $('.qp-1').mouseout(function(){
      $('.fa-question-circle-qp-1').hide();
    });

    $('.qp-2').hover(function(){
      $('.fa-question-circle-qp-2').show();
    });
    $('.qp-2').mouseout(function(){
      $('.fa-question-circle-qp-2').hide();
    });
  }
};
</script>