<!-- Shaumik G. -->
<template>
    <div class="product-sales-area">
        <div class="product-sales">
            <div class="product-sales-header">
                <h2>Last 30 Days Product Sales Performance <i class="fa fa-youtube-play" style="color:#F4CB17" data-toggle="modal" data-target="#videoModal"></i></h2>
            </div>
            <div class="product-sales-table">
                <div class="product-sales-table-header">
                    <div class="poduct-sl-hd hd-row-1"></div>
                    <div class="poduct-sl-hd hd-row-2"></div>
                    <div class="poduct-sl-hd hd-row-3">
                        Estimated unit sales per month <i class="fa fa-question-circle "></i>
                    </div>
                    <div class="poduct-sl-hd hd-row-4">
                        Estimated revenues per month <i class="fa fa-question-circle "></i>
                    </div>
                </div>
                <div class="product-sales-table-body slaes-border">
                    <div class="poduct-sl-bd bd-row-1">
                        <img src="../../assets/images/amazon-xs.png" alt="" width="45"/> <span>Amazon UK</span>
                    </div>
                    <div class="poduct-sl-bd bd-row-2">
                        <div class="progress" style="border-radius:none">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                            <span class="sr-only">70% Complete</span>
                            </div>
                        </div>
                    </div>
                    <div class="poduct-sl-bd bd-row-3">150</div>
                    <div class="poduct-sl-bd bd-row-4">$150,000</div>
                </div>
                <!-- total calculation -->
                <div class="product-sales-table-body">
                    <div class="poduct-sl-bd bd-row-1 title-for-total">
                        Total
                    </div>
                    <div class="poduct-sl-bd bd-row-2">
                        
                    </div>
                    <div class="poduct-sl-bd bd-row-3 spm">417</div>
                    <div class="poduct-sl-bd bd-row-4 erpm">$461,700</div>
                </div>
                <!-- total calulation -->
            </div>
        </div>
        <VideoModal/>
    </div>
</template>

<script>

import VideoModal from '../modals/VideoModal';
import '../../assets/css/product-sales.css';
// import $ from 'jquery';
import 'bootstrap/dist/js/bootstrap';

export default {
    name: 'ProductSales',
    components: {
        'VideoModal': VideoModal
    },
}
</script>