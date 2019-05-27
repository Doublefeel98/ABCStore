@extends('abcstore.layout.master')
@section('title','Thanh toán')
@section('main')
<!-- Categorie Menu & Slider Area Start Here -->
<div class="main-page-banner home-3">
    <div class="container">
        <div class="row">
            <!-- Vertical Menu Start Here -->
            <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                <div class="vertical-menu mb-all-30">
                    <nav>
                        <ul class="vertical-menu-list">
                            <li>
                                <a href="shop.html"><span><img src="img/vertical-menu/4.png" alt="menu-icon"></span>Điện
                                    thoại</a>
                            </li>
                            <li>
                                <a href="shop.html"><span><img src="img/vertical-menu/8.png" alt="menu-icon"></span>Máy
                                    tính bảng</a>
                            </li>
                            <li>
                                <a href="shop.html"><span><img src="img/vertical-menu/9.png"
                                            alt="menu-icon"></span>Laptop</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Vertical Menu End Here -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Categorie Menu & Slider Area End Here -->
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="index.html">Trang chủ</a></li>
                <li class="active"><a href="checkout.html">Thanh Toán</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- checkout-area start -->
<div class="checkout-area pb-100 pt-15 pb-sm-60">
    <div class="container">
        <form method="post">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="checkbox-form mb-sm-40">
                    <h3>Chi tiết hóa đơn</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-30">
                                <label>Họ Tên<span class="required">*</span></label>
                                <input name="cus_name" type="text" placeholder="Nhập họ tên" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-30">
                                <label>Email <span class="required">*</span></label>
                                <input name="cus_email" type="email" placeholder="Nhập email" required/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-30">
                                <label>SĐT <span class="required">*</span></label>
                                <input name="cus_phone" type="text" placeholder="Nhập số điện thoại" required/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-30">
                                <label>CMND <span class="required">*</span></label>
                                <input name="cus_identity_card" type="text" placeholder="Nhập số chứng minh nhân dân" required/>
                            </div>
                        </div>
                        <!-- <div class="col-md-12">
                            <div class="order-notes">
                                <div class="checkout-form-list">
                                    <label>Ghi chú</label>
                                    <textarea id="checkout-mess" cols="30" rows="10"
                                        placeholder="Yêu cầu khác (Không bắt buộc)"></textarea>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="your-order">
                    <h3>Đơn hàng của bạn</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Sản Phẩm</th>
                                    <th class="product-total">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $item)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                                {{$item->name}} {{$item->attributes['propt_ram']}} gb {{$item->attributes['propt_rom']}} {{$item->attributes['propt_color']}} 
                                            <span class="product-quantity"> × {{$item->quantity}}</span>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">{{number_format($item->price*$item->quantity,0,',','.')}} VNĐ</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Tổng số sản phẩm</th>
                                    <td><span class="amount">{{$totalquantity}}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Tổng tiền</th>
                                    <td><span class=" total amount">{{number_format($totalprice,0,',','.')}} VNĐ</span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="text-right">
                            <button class="btn btn-primary" type="submit">
                                Thanh Toán
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>
<!-- checkout-area end -->
@endsection
@section('scriptjs')
<script>

</script>
@endsection