<div class="col-xl-3 hidden-xl">
    <!-- widget -->
    <div class="widget">
        <h4 class="mb-30">Katalog</h4>
        <div class="accordion" id="accordionExample">
            <div class="list">
                <a href="javascript:void(0)">Accessories <span>(0)</span></a>
                <button class="float-right text-right" type="button" data-toggle="collapse" data-target="#collapse-1">
                    <span class="float-right"><i class="fal fa-angle-right"></i></span>
                </button>
                <div id="collapse-1" class="collapse show">
                    <div class="sidebar-list">
                        <ul>
                            <li><a href="shop3.html">Camera 1</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="list">
                <a href="javascript:void(0)">Char & Table <span>(10)</span></a>
                <button class="float-right text-right" type="button" data-toggle="collapse" data-target="#collapse-2">
                    <span class="float-right"><i class="fal fa-angle-right"></i></span>
                </button>
                <div id="collapse-2" class="collapse">
                    <div class="sidebar-list">
                        <ul>
                            <li><a href="shop.html">Chair <span>(30)</span></a></li>
                            <li><a href="shop4.html">Clothing <span>(45)</span></a></li>
                            <li><a href="shop4.html">Decore <span>(20)</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="list">
                <a href="javascript:void(0)">Handbag <span>(10)</span></a>
                <button class="float-right text-right" type="button" data-toggle="collapse" data-target="#collapse-3">
                    <span class="float-right"><i class="fal fa-angle-right"></i></span>
                </button>
                <div id="collapse-3" class="collapse">
                    <div class="sidebar-list">
                        <ul>
                            <li><a href="shop4.html">Camerass <span>(1)</span></a></li>
                            <li><a href="shop4.html">Gift Cards <span>(5)</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="list">
                <a href="javascript:void(0)">Kids <span>(15)</span></a>
                <button class="float-right text-right" type="button" data-toggle="collapse" data-target="#collapse-4">
                    <span class="float-right"><i class="fal fa-angle-right"></i></span>
                </button>
                <div id="collapse-4" class="collapse">
                    <div class="sidebar-list">
                        <ul>
                            <li><a href="shop3.html">Lightings <span>(1)</span></a></li>
                            <li><a href="shop3.html">Managed <span>(5)</span></a></li>
                            <li><a href="shop3.html">Printers <span>(32)</span></a></li>
                            <li><a href="shop3.html">Shoes <span>(32)</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget mt-50">
        <h4 class="mb-30">Filter By Price</h4>
        <div class="price-filter">
            <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 46.4%;"></div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                    style="left: 15%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                    style="left: 60%;"></span>
                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 45%;"></div>
            </div>
            <div class="filter-form-submit mt-35">
                <button id="resetButton">Reset</button>
                <input type="text" id="price" hidden>
                <div class="filter-price d-inline-block pl-20">Price: <input type="button" id="amount"
                        value="$75 - $300"></div>
            </div>
        </div>
    </div>
    {{-- <div class="widget mt-50">
        <h4 class="mb-30">Filter By Color</h4>
        <ul class="color-list">
            <li style="background-color: #000;"></li>
            <li style="background-color: #1E73BE;"></li>
            <li style="background-color: #FFD700;"></li>
            <li style="background-color: #C9C9C9;"></li>
            <li style="background-color: #008000;"></li>
            <li style="background-color: #FFFF00;"></li>
            <li style="background-color: #FFFFFF;"></li>
            <li style="background-color: #DD3333;"></li>
        </ul>
    </div> --}}
    <div class="widget mt-30">
        <h4 class="mb-30">Promo</h4>
        <div class="size-link">
            <a href="javascript:void(0)" class="promo" data-promo="bundlings">Bundling</a>
            <a href="javascript:void(0)" class="promo" data-promo="grosirs">Grosir</a>
            <a href="javascript:void(0)" class="promo" data-promo="discount">Discount</a>
            <input type="" id="promo_" hidden>
        </div>
    </div>
    {{-- <div class="widget mt-50">
        <h4 class="mb-30">Bundling</h4>
        <div class="post-box">
            <ul id="bundling">
                <li>
                    <div class="post-img">
                        <img src="{{ asset('mazia') }}/img/product/1.jpg" class="w-100" alt="">
                    </div>
                    <div class="post-img-desc">
                        <a href="single-product-4.html">Capitalize on low hanging fruit to</a>
                        <div class="price">$250.00</div>
                    </div>
                </li>

            </ul>
        </div>
    </div> --}}
    <div class="widget mt-30">
        <h4 class="mb-30">Popular Tags</h4>
        <div class="category-list">
            <ul id="list_tags"></ul>
            <input type="" id="tag_" hidden>
        </div>
    </div>
</div>

@push('js')
<script>
    $(function() {
        var minPrice = 75;
        var maxPrice = 300;
        var delayTimer;
        $("#slider-range").slider({
            range: true,
            min: 1,
            max: 1000,
            values: [minPrice, maxPrice],
            slide: function(event, ui) {
                $("#amount").val("Rp." + ui.values[0] + "K - Rp." + ui.values[1] + "K");
                $("#price").val(ui.values[0]+"000" + "," + ui.values[1]+"000");
                clearTimeout(delayTimer);
                delayTimer = setTimeout(function() {
                    getData(per_page, page);
                }, 500); // Delay in milliseconds
            }
        });

        $("#amount").val("Rp." + $("#slider-range").slider("values", 0) +"K - Rp." + $("#slider-range").slider("values", 1)) + "K";

        $("#resetButton").click(function() {
            $("#slider-range").slider("values", [minPrice, maxPrice]);
            $("#amount").val("Rp." + minPrice + "K - Rp." + maxPrice + "K");
        });
    });
    $("#price").val('');
    $("#promo_").val('');

    $('.promo').click(function() {
        var $this = $(this);
        var promo = $this.data('promo');

        // Check if the element already has the applied styles
        if ($this.hasClass('active')) {
            // Remove the styles
            $this.removeClass('active').css({
                'border': '',
                'color': '',
                'background-color': ''
            });
            $("#promo_").val('');
        } else {
            // Reset styles for all .promo elements
            $('.promo').removeClass('active').css({
                'border': '',
                'color': '',
                'background-color': ''
            });

            $("#promo_").val(promo);

            // Apply styles to the clicked element
            $this.addClass('active').css({
                'border': '2px solid #e174b8',
                'color': '#fff',
                'background-color': '#f16aac'
            });
        }

        setTimeout(function() {
        getData(per_page, page);
        }, 500); // Delay in milliseconds
    });

    let tags = ["CHAYRA DRESS","CIPUT RAJUT","DASTER NAISHA","GAMIS","GAMIS NAISHA","KAOS KAKI","KHIMAR PASHMINA","LILA DRESS","SADIYA GAMIS","SET","SQUARE","TISYA BERGO","jilbab","maskerkain","pashmina syari","pashminaceruti","pashminacerutisyari","pashminasyari"];
    $.each(tags, function (indexInArray, valueOfElement) {
        valueOfElement = valueOfElement.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
        $('#list_tags').append('<li><a href="javascript:void(0)" class="tag" data-tag="'+valueOfElement+'">'+valueOfElement+'</a></li>');
    });

    $('#list_tags').on('click','.tag',function() {
        var $this = $(this);
        var tag = $this.data('tag');

        // Check if the element already has the applied styles
        if ($this.hasClass('active')) {
            // Remove the styles
            $this.removeClass('active').css({
                'border': '',
                'color': '',
                'background-color': ''
            });
            $("#tag_").val('');
        } else {
            // Reset styles for all .tag elements
            $('.tag').removeClass('active').css({
                'border': '',
                'color': '',
                'background-color': ''
            });

            // Apply styles to the clicked element
            $this.addClass('active').css({
                'border': '2px solid #e174b8',
                'color': '#fff',
                'background-color': '#f16aac'
            });
            $("#tag_").val(tag);
        }

        setTimeout(function() {
            getData(per_page, page);
        }, 500); // Delay in milliseconds
    });

</script>
@endpush