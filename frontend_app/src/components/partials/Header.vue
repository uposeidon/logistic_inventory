<template>
  <div class="header-area structure">
    <div class="header-dropdow-area">
      <select class="header-dropdown">
          <option value="ASIN">ASIN</option>
          <option value="UPC">UPC</option>
      </select>
    </div>
    <div class="header-bottom">
        <div class="header-bottom-left">
            <span>Product indentifier &nbsp;&nbsp;<i class="fa fa-question-circle"></i></span>
            <select class="header-bottom-left-dd">
                <option value="B081P49HJZ">B081P49HJZ</option>
                <option value="B081P49HJZ">B081P49HJZ</option>
                <option value="B081P49HJZ">B081P49HJZ</option>
            </select>
        </div>
        <div class="header-bottom-right">
            <span>Product indentifier &nbsp;&nbsp;<i class="fa fa-question-circle"></i></span>
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

export default {
  name: "Header",
};
</script>