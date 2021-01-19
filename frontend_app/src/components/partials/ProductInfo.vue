<template>
    <div>
        <div class="product-info-area">
            <div class="product-infos">
                <div class="product-info-title">
                    <h2>Product Information</h2>
                    <p>Product Description</p>
                </div>
                <div class="product-details-area">
                    <div class="product-details">
                        <div class="product-details-row-1">
                            <div class="product-details-sec product-details-sec-1">
                                <h6>Product Identifiers & Specs</h6>
                                <table>
                                    <tr>
                                        <td id="ttl">AID: </td><td id="ttl-det">AID322812001</td>
                                    </tr>
                                    <tr>
                                        <td id="ttl">ASIN: </td><td id="ttl-det">AID322812001</td>
                                    </tr>
                                    <tr>
                                        <td id="ttl">EAN: </td><td id="ttl-det">AID322812001</td>
                                    </tr>
                                    <tr>
                                        <td id="ttl">UPC: </td><td id="ttl-det">AID322812001</td>
                                    </tr>
                                    <tr>
                                        <td id="ttl">Model: </td><td id="ttl-det">1234-bc</td>
                                    </tr>
                                    <tr>
                                        <td id="ttl">Brand: </td><td id="ttl-det">Syson</td>
                                    </tr>
                                    <tr>
                                        <td id="ttl">Color: </td><td id="ttl-det">red</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="product-details-sec product-details-sec-2">
                                <h6>Product Dimensions</h6>
                                <table>
                                    <tr>
                                        <td id="ttl">Width: </td><td id="ttl-det">100x120</td>
                                    </tr>
                                    <tr>
                                        <td id="ttl">Length: </td><td id="ttl-det">16.7 in.</td>
                                    </tr>
                                    <tr>
                                        <td id="ttl">Height: </td><td id="ttl-det">6.7 in</td>
                                    </tr>
                                    <tr>
                                        <td id="ttl">Weight: </td><td id="ttl-det">123456</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="product-details-sec product-details-sec-3">
                                <h6>Shipping Dimensions</h6>
                                <table>
                                    <tr>
                                        <td id="ttl">Width: </td><td id="ttl-det">100x120</td>
                                    </tr>
                                    <tr>
                                        <td id="ttl">Length: </td><td id="ttl-det">16.7 in.</td>
                                    </tr>
                                    <tr>
                                        <td id="ttl">Height: </td><td id="ttl-det">6.7 in</td>
                                    </tr>
                                    <tr>
                                        <td id="ttl">Weight: </td><td id="ttl-det">123456</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="product-additional-details">
                            <div class="button-title">
                                <h6 id="ds"><i class="fa fa-caret-right" id="ai"></i>&nbsp;View Additional Attributes</h6>
                            </div>
                            <div class="product-additional">
                                <div class="product-details-sec product-details-sec-4">
                                    <table>
                                        <tr>
                                            <td id="ttl">Width: </td><td id="ttl-det">100x120</td>
                                        </tr>
                                        <tr>
                                            <td id="ttl">Length: </td><td id="ttl-det">16.7 in.</td>
                                        </tr>
                                        <tr>
                                            <td id="ttl">Height: </td><td id="ttl-det">6.7 in</td>
                                        </tr>
                                        <tr>
                                            <td id="ttl">Weight: </td><td id="ttl-det">123456</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="product-details-sec product-details-sec-5">
                                    <table>
                                        <tr>
                                            <td id="ttl">Width: </td><td id="ttl-det">100x120</td>
                                        </tr>
                                        <tr>
                                            <td id="ttl">Length: </td><td id="ttl-det">16.7 in.</td>
                                        </tr>
                                        <tr>
                                            <td id="ttl">Height: </td><td id="ttl-det">6.7 in</td>
                                        </tr>
                                        <tr>
                                            <td id="ttl">Weight: </td><td id="ttl-det">123456</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="product-details-sec product-details-sec-6">
                                    <table>
                                        <tr>
                                            <td id="ttl">Width: </td><td id="ttl-det">100x120</td>
                                        </tr>
                                        <tr>
                                            <td id="ttl">Length: </td><td id="ttl-det">16.7 in.</td>
                                        </tr>
                                        <tr>
                                            <td id="ttl">Height: </td><td id="ttl-det">6.7 in</td>
                                        </tr>
                                        <tr>
                                            <td id="ttl">Weight: </td><td id="ttl-det">123456</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-image-area">
                        <div class="product-image">
                            <img src="../../assets/images/product.jpg" alt=""/>
                        </div>
                        <div class="product-for-extra">
                            <p>Not the item you were looking for ?</p>
                            <button class="">Find more items matching your search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import '../../assets/css/productinfo.css';
import $ from 'jquery';

export default {
    name: 'ProductInfo',
    mounted(){
        $('#ds').click(function(){
            if ($('#ai').attr('class') == 'fa fa-caret-right'){
                $('#ai').attr('class', '');
                $('#ai').attr('class', 'fa fa-caret-down');

                $("#ds")
                .attr('unselectable', 'on')
                .css({
                    'user-select': 'none',
                    'MozUserSelect': 'none'
                })
                .on('selectstart', false)
                .on('mousedown', false);

                 setTimeout(function(){
                     $('.product-additional').hide(1000);
                }, 1000);
            }else{
                $('#ai').attr('class', '');
                $('#ai').attr('class', 'fa fa-caret-right');

                $("#ds")
                .attr('unselectable', 'on')
                .css({
                    'user-select': 'none',
                    'MozUserSelect': 'none'
                })
                .on('selectstart', false)
                .on('mousedown', false);

                 setTimeout(function(){
                     $('.product-additional').show(1000);
                }, 1000);
            }
        });
    }
}
</script>