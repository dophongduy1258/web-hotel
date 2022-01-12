<style type="text/css">
    @media(max-width:767px) {
        body {
            padding-bottom: 30px;
        }
    }
</style>
<div class="content-product-detail">
    <div class="container">
        <div class="detail-product">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12 images-product-detail">
                    <div class="zoom-image targetarea">
                        <img alt="" class="cloudzoom" id="zoom-fancybox" src="{$data.img_1}"
                            data-cloudzoom="zoomImage: '{$data.img_1}'">
                    </div>
                    <div class="thumbs">
                        <div>
                            {if $data.img_1 != ''}
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="{$data.img_1}"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '{$data.img_1}' , zoomImage: '{$data.img_1}' ">
                                    <input class="hide" id="link_img" type="text" value="{$data.img_1}" />
                                </div>
                            {/if}
                            {if $data.img_2 != ''}
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="{$data.img_2}"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '{$data.img_2}' , zoomImage: '{$data.img_2}' ">
                                </div>
                            {/if}
                            {if $data.img_3 != ''}
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="{$data.img_3}"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '{$data.img_3}' , zoomImage: '{$data.img_3}' ">
                                </div>
                            {/if}
                            {if $data.img_4 != ''}
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="{$data.img_4}"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '{$data.img_4}' , zoomImage: '{$data.img_4}' ">
                                </div>
                            {/if}
                            {if $data.img_5 != ''}
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="{$data.img_5}"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '{$data.img_5}' , zoomImage: '{$data.img_5}' ">
                                </div>
                            {/if}
                            {if $data.img_6 != ''}
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="{$data.img_6}"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '{$data.img_6}' , zoomImage: '{$data.img_6}' ">
                                </div>
                            {/if}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 infomation-product-detail">
                    <div class="wrap-scroll-detail">
                        <div class="scroll-detail">
                            <h1 class="title">{$data.name}</h1>
                            <span class="ma-sp"><b>SKU:</b> {$data.sku_code}{if isset($session.fullname_client)}<button
                                        type="button" class="btn-share" product_id="{$data.id}" id="btnCopy">Chia
                                    sẻ</button>{/if}</span>
                            <div class="clear"></div>
                            <div class="info">{$data.short_description}</div>
                            {if $data.decrement > 0}
                                <p class="old-price-detail">Giá gốc: <span>{$data.price|number_format:"0":".":","}
                                        vnđ</span></p>
                            {/if}
                            <p class="price-detail">{$data.price_decrement|number_format:"0":".":","} vnđ</p>
                            <div class="clear"></div>
                            <div class="size">
                                <label class="col-md-2 col-sm-3">Số lượng:</label>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control input-sm quantity-size" id="quantity" type="number" min=1
                                        value="1" />
                                    {* <select class="form-control input-sm quantity-size" id="quantity">
                                            {for $foo=1 to $data.on_stock max=100}
                                                <option value="{$foo}">{$foo}</option>
                                            {/for}
                                        </select> *}
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                            <div class="color hide">
                                <label class="col-md-2 col-sm-3">Màu sắc</label>
                                <div class="col-md-10 col-sm-9">
                                    <ul>
                                        <li class="select_product active">
                                            <a href="" title=""><span style="background-color:#007000"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#ff0000"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#0080ff"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#ff0000"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#0080ff"></span></a>
                                        </li>
                                        <li class="select_product">
                                            <a href="" title=""><span style="background-color:#007000"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#ff0000"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#0080ff"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#ff0000"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#0080ff"></span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <input class="hide" id="title" type="text" value="{$data.name}" />
                        <input class="hide" id="price" type="text" value="{$data.price}" />
                        <input class="hide" id="unique_id" type="text" value="{$data.unique_id}" />
                        <input class="hide" id="decrement" type="text" value="{$data.decrement}" />
                        <input class="hide" id="link" type="text"
                            value="{$rewrite_url}{$data.product_link}-p{$data.unique_id}/{if isset($session.username_client)}{$session.username_client}{/if}" />
                        <div class="action">
                            <!-- Load lại cái hình ảnh đại diện để làm sự kiện thêm vào giỏ hàng cho đẹp =)) -->
                            <div class="img_add_cart">
                                {if $data.img_1 != ''}
                                    <img alt="" src="{$data.img_1}" />
                                {/if}
                            </div>
                            <!-- End -->

                            <button type="button" class="btn btn-add-cart btn-width" product_id="{$data.id}"
                                id="add_cart">Thêm vào giỏ hàng</button>
                            <button type="button" class="btn btn-key btn-width" product_id="{$data.id}" id="buy_now">MUA
                                NGAY</button>
                            <div class="clear"></div>
                        </div>
                        <div class="box_addcart_success">
                            <img src="{$domain}images/addcart_success.png" alt="" class="img-responsive" />
                            <p>Đã thêm vào giỏ</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-detail">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Mô tả sản phẩm</a></li>
                {* <li class=""><a href="#tab2" data-toggle="tab">Thông tin chi tiết</a></li> *}
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <div class="content">
                        {*<p><span style="font-size: 20px;"><strong>Thông tin sản phẩm:</strong></span></p>
                        <p>&nbsp;</p>*}
                        {$data.description}
                    </div>
                    {* <div class="content">
                        <p><span style="font-size: 20px;"><strong>Thông tin sản phẩm:</strong></span></p>
                        <p>&nbsp;</p>
                        <p><span style="font-size: 14px;">• Tên sản phẩm: Lavabo đá tự nhiên cao cấp Naston
                                LDTN001</span></p>
                        <p><span style="font-size: 14px;">• Mã số:&nbsp;<strong>LDTN001</strong></span></p>
                        <p><span style="font-size: 14px;">• Màu sắc: Hồng</span></p>
                        <p><span style="font-size: 14px;">• Cân nặng: 8kg</span></p>
                        <p><span style="font-size: 14px;">• Thương hiệu:&nbsp;<strong>NASTON</strong></span></p>
                        <p><span style="font-size: 14px;">• Kích thước: 410x410x140mm</span></p>
                        <p><span style="font-size: 14px;">• Chất liệu:&nbsp;<strong>đá tự nhiên</strong></span></p>
                        <p><span style="font-size: 14px;">•&nbsp;Xuất sứ: Yên Bái -&nbsp; Việt Nam</span></p>
                        <p><span style="font-size: 14px;">• Công dụng: Lavabo đá tự nhiên (bồn rửa mặt đá tự nhiên)
                                thường được dùng trong trang trí nội thất nhà tắm, spa, nhà hàng, khách sạn,… hoặc lắp
                                đặt ở ngoài trời, lối đi hay bất cứ nơi nào trong không gian nhà bạn miễn phù hợp với
                                quan cảnh xung quanh. Bồn rửa bằng đá được làm tỉ mỉ và giữ nguyên nét đẹp nguyên thủy
                                của đá tự nhiên.</span></p>
                        <p>&nbsp;</p>
                        <p style="text-align: center;"><img
                                src="https://static.azone.vn/17588/picture/2021/06/08/l-4--1623139473.jpg" alt=""></p>
                        <p style="text-align: center;">&nbsp;</p>
                        <p style="text-align: center;"><em><strong><span style="font-size: 14px;">LAVABO ĐÁ TỰ NHIÊN CAO
                                        CẤP&nbsp;<span style="color: rgb(0, 0, 255);"><a style="color: rgb(0, 0, 255);"
                                                href="../"
                                                target="_blank">NASTON</a></span>&nbsp;LDTN001</span></strong></em></p>
                        <p>&nbsp;</p>
                        <p><span style="font-size: 14px;">- Đã từ lâu,&nbsp;<span style="color: rgb(0, 0, 255);"><a
                                        style="color: rgb(0, 0, 255);" href="../lavabo-da-tu-nhien-a559555/"
                                        target="_blank"><strong>Lavabo đá tự
                                            nhiên</strong></a></span><strong>&nbsp;</strong>vốn được đánh giá cao và ưa
                                chuộng sử dụng nhiều ở các biệt thự cao cấp, các khu resort, khách sạn... Bên cạnh việc
                                dùng làm bồn rửa mặt tại phòng tắm,&nbsp;<strong>lavabo đá tự nhiên</strong>&nbsp;còn
                                dùng trong các spa, khách sạn, nhà hàng cao cấp làm tôn lên vẻ đẹp cho không gian thêm
                                trang nhã, sang trọng.</span></p>
                        <p>&nbsp;</p>
                        <p style="text-align: center;"><img
                                src="https://static.azone.vn/17588/picture/2021/06/08/l-3--1623139484.jpg" alt=""></p>
                        <p>&nbsp;</p>
                        <p style="text-align: center;"><em><strong><span style="font-size: 14px;">LAVABO ĐÁ TỰ NHIÊN CAO
                                        CẤP&nbsp;<span style="color: rgb(0, 0, 255);"><a style="color: rgb(0, 0, 255);"
                                                href="../"
                                                target="_blank">NASTON</a></span>&nbsp;LDTN001</span></strong></em></p>
                        <p>&nbsp;</p>
                        <p><span style="font-size: 14px;">- Ngày nay,&nbsp;<strong>lavabo đá tự nhiên</strong>&nbsp;lại
                                được nhiều gia đình lựa chọn nhiều hơn bởi vẻ đẹp và sự tinh tế của nó. Các sản phẩm chế
                                tác từ đá tự nhiên nói chung và&nbsp;<strong>Lavabo đá tự nhiên</strong>&nbsp;nói riêng
                                luôn được đánh giá cao bởi sự mộc mạc, bình dị, gần gũi với thiên nhiên, làm cho không
                                gian thêm tươi mới, đầy nhựa sống.</span></p>
                        <p>&nbsp;</p>
                        <p><strong><span style="font-size: 20px;">Lavabo đá tự nhiên được sản xuất như thế
                                    nào?</span></strong></p>
                        <p><span style="font-size: 14px;">- Chậu rửa (lavabo) được làm từ 100% đá tự nhiên nguyên khối,
                                qua bàn tay tài hoa của các nghệ nhân chế tác vô cùng công phu và tỉ mỉ, trải qua nhiều
                                công đoạn để tạo thành chiếc lavabo tuyệt đẹp mà vẫn giữ lại gần như nguyên vẹn nét đẹp
                                nguyên thủy của đá tự nhiên.</span></p>
                        <p>&nbsp;</p>
                        <p style="text-align: center;"><img
                                src="https://static.azone.vn/17588/picture/2021/06/05/unnamed-1622866654.jpg" alt=""
                                width="748" height="461"></p>
                        <p style="text-align: center;">&nbsp;</p>
                        <p align="center"><span style="font-size: 14px;"><strong><em>Khai thác đá tự nhiên sản xuất
                                        lavabo</em></strong></span></p>
                        <p align="center">&nbsp;</p>
                        <p style="text-align: left;">-&nbsp;<span style="font-size: 14px;"><strong>Lavabo đá tự
                                    nhiên</strong>&nbsp;được làm từ chất liệu đá tự nhiên nguyên khối cao cấp như đá
                                Onyx, đá Marble, đá cuội,… qua tuyển chọn kĩ càng, cùng quy trình thiết kế và sản xuất
                                được giám sát nghiêm ngặt. Hình dạng, kích thước và vân đá của mỗi sản phẩm Lavabo đá tự
                                nhiên là hoàn toàn khác&nbsp;nhau do phụ thuộc vào phôi đá tự nhiên tạo thành sản
                                phẩm.</span></p>
                        <p style="text-align: left;">&nbsp;</p>
                        <p style="text-align: center;"><img
                                src="https://static.azone.vn/17588/picture/2021/06/05/khai-thac-da-tu-nhien-1622866781.jpg"
                                alt=""></p>
                        <p style="text-align: left;">&nbsp;</p>
                        <p align="center"><span style="font-size: 14px;"><strong><em>Phôi đá được chọn lọc để sản xuất
                                        lavabo</em></strong></span></p>
                        <p align="center">&nbsp;</p>
                        <p>-<span style="font-size: 14px;">&nbsp;Sau khi khai thác từ khối đá lớn, phôi đá được chọn lọc
                                sẽ được đưa về xưởng gia công. Tại đây, các người thợ lành nghề tiến hành gia công tỉ
                                mỉ, khéo léo qua các giai đoạn cắt, đục, đẽo, khoét lỗ, mài, đánh bóng sáng phía trong,
                                bo tròn xung quanh viền... bằng máy móc chuyên dụng để tạo thành những chiếc Lavabo hoàn
                                thiện với đường nét tinh tế, hài hoà.</span></p>
                        <p>&nbsp;</p>
                        <p><img src="https://static.azone.vn/17588/picture/2021/06/08/l-1--1623139483.jpg" alt=""></p>
                        <p style="text-align: center;">&nbsp;</p>
                        <p style="text-align: center;"><em><strong><span style="font-size: 14px;">LAVABO ĐÁ TỰ NHIÊN CAO
                                        CẤP&nbsp;<span style="color: rgb(0, 0, 255);"><a style="color: rgb(0, 0, 255);"
                                                href="../"
                                                target="_blank">NASTON</a></span>&nbsp;LDTN001</span></strong></em></p>
                        <p>&nbsp;</p>
                        <p><strong>- Lavabo đá tự nhiên</strong>&nbsp;sử dụng công nghệ sản xuất thủ công, gia công với
                            độ tinh xảo, thẩm mỹ ngày càng cao,đáp ứng mọi nhu cầu trang trí, làm hài lòng ngay cả những
                            khách hàng khó tính nhất.&nbsp;Do được chế tác hoàn toàn bằng thủ công, tỉ mỉ từng đường
                            nét, vì thế nên kích thước và trọng lượng của sản phẩm&nbsp;sẽ có sai số nhỏ không đáng kể.
                        </p>
                        <p style="text-align: left;">&nbsp;</p>
                        <p style="text-align: center;"><img
                                src="https://static.azone.vn/17588/picture/2021/06/05/1-1622867304.jpg" alt=""></p>
                        <p style="text-align: left;">&nbsp;</p>
                        <p style="text-align: left;"><span style="font-size: 14px;">- Vân đá là một nét đẹp đặc biệt và
                                độc đáo của&nbsp;<strong>Lavabo đá tự nhiên&nbsp;</strong>mà các loại lavabo thông
                                thường không có được. Vân, vệt, và những vết rạn trong mỗi khối đá được hình thành qua
                                kiến tạo địa chất hàng triệu năm. Bởi từng chiếc Lavabo được làm từ một khối đá khác
                                nhau, tuỳ thuộc vị trí cắt của phôi đá nên vân đá cũng hoàn toàn ngẫu nhiên, không tồn
                                tại 2 chiếc Lavabo giống nhau, điều này tạo nên vẻ đẹp độc nhất vô nhị
                                cho&nbsp;<strong>Lavabo đá tự nhiên</strong>.</span></p>
                    </div> *}
                </div>
                <!--other info-->
                <div class="tab-pane" id="tab2">
                    <div class="content">
                        <div class="content">
                            <table class="table table-key">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Mô tả</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Tên sản phẩm</strong></td>
                                        <td>Lavabo đá tự nhiên cao cấp Naston LDTN001</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mã số</strong></td>
                                        <td>LDTN001</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Thương hiệu</strong></td>
                                        <td>NASTON</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Màu sắc</strong></td>
                                        <td>Hồng</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Cân nặng</strong></td>
                                        <td>8kg</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kích thước</strong></td>
                                        <td>410x410x140mm</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Chất liệu</strong></td>
                                        <td>đá tự nhiên</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Xuất sứ</strong></td>
                                        <td>Yên Bái - Việt Nam</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--other info-->
            </div>
        </div>
    </div>
</div>