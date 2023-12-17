<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <title>Thông báo đặt hàng | FURNITURE</title>
</head>

<body
    style="background-color: #e7eff8; font-family: trebuchet,sans-serif; margin-top: 0; box-sizing: border-box; line-height: 1.5;">
<div class="container-fluid">
    <div class="container" style="background-color: #e7eff8; width: 600px; margin: auto;">
        <div class="col-12 mx-auto" style="width: 580px;  margin: 0 auto;">

            <div class="row">
                <div class="container-fluid">
                    <div class="row" style="background-color: #e7eff8; height: 10px;">

                    </div>
                </div>
            </div>

            <div class="row"
                 style="height: 100px; padding: 10px 20px; line-height: 90px; background-color: white; box-sizing: border-box;">
                
                <h1 class="pl-2"
                    style="color: orange; line-height: 30px; float: left; padding-left: 20px; font-size: 40px; font-weight: 500;">
                    FURNITURE
                </h1>
            </div>

            <div class="row" style="background-color: #00509d; height: 200px; padding: 35px; color: white;">
                <div class="container-fluid">
                    <h3 class="m-0 p-0 mt-4" style="margin-top: 0; font-size: 28px; font-weight: 500;">
                        <strong style="font-size: 32px;">Thông báo đơn hàng</strong>
                        <br>
                       Cảm ơn bạn đã mua hàng!
                    </h3>
                    <div class="row mt-5" style="margin-top: 35px; display: flex;">
                        <div class="col-6"
                             style="margin-bottom: 25px; flex: 0 0 50%; width: 50%; box-sizing: border-box;">
                            <b><?php echo e($user->name); ?></b>
                            <br>
                            <span>
                                <a style="color: white !important;" href="mailto:<?php echo e($user->email); ?>" target="_blank"><?php echo e($user->email); ?></a>
                            </span>
                            <br>
                            <span><?php echo e($user->phone_number); ?></span>
                        </div>
                        <div class="col-6" style="flex: 0 0 50%; width: 50%; box-sizing: border-box;">
                            <b>Ngày đặt hàng:</b> <?php echo e(date('d/m/yy H:i', strtotime($order->date))); ?>

                            <br>
                            <p style="color: white"><b >Địa chỉ:</b> <?php echo e($user->address); ?></p>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 p-4" style="background-color: white; margin-top: 15px; padding: 20px;">
                <table>
                    <tr>
                        <td>
                            <img
                                src="https://ci6.googleusercontent.com/proxy/8eUxMUXMkvgUKX8veBCRQM5N7-jXP0Wx8KjQLaGDch2DnV_5HYw9PMgJXsoqgSR_jonTY9jAftWPKNsN5W9cUUneQ9hz7IhxH4rIXNzHMm0ijbsNjHB9m7g6XfJJ=s0-d-e1-ft#https://www.bambooairways.com/reservation/common/hosted-images/tickets.jpg"
                                alt="">
                        </td>

                        <?php if($order->payment == "Thanh toán khi nhận hàng"): ?>
                            <td class="pl-3" style=" padding-left:15px;">
                                <span class="d-inline"
                                      style="color:#424853; font-family:trebuchet,sans-serif; font-size:16px; font-weight:normal; line-height:22px;">
                                      Bạn sẽ thanh toán khi nhận hàng. Chúng tôi vừa bàn giao đơn đặt hàng của bạn cho một đối tác vận chuyển.
                                </span>
                            </td>
                        <?php endif; ?>

                        

                    </tr>
                </table>
            </div>

            <div class="row mt-2" style="margin-top: 15px;">
                <div class="container-fluid">
                    <div class="row pl-3 py-2" style="background-color: #f4f8fd; padding: 10px 0 10px 20px;">
                        <b>Chi tiết đơn hàng</b>
                    </div>
                    <div class="row pl-3 py-2" style="background-color: #fff; padding: 10px 20px 10px 20px;">
                        <table class="table table-sm table-hover"
                               style="text-align: left;  width: 100%; margin-bottom: 5px; border-collapse: collapse;">
                            <thead>
                            <tr>
                                <th style="padding: 5px 0;">SẢN PHẨM</th>
                                <th style="padding: 5px 20px 5px 0; text-align: right;">TỔNG TIỀN</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                            
                                <tr>
                                    <td style="border-top: 1px solid #dee2e6; padding: 5px 0;">
                                        <?php echo e($orderDetail->name . ' (x' . $orderDetail->pivot->quantity . ')'); ?>

                                    </td>
                                    <td style="border-top: 1px solid #dee2e6; padding: 5px 20px 5px 0; text-align: right;">
                                        <?php echo e(number_format($orderDetail->pivot->price*$orderDetail->pivot->quantity, 0, ',', '.')); ?> VND
                                        
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mt-2" style="margin-top: 15px;">
                <div class="container-fluid">
                    <div class="row pl-3 py-2" style="background-color: #f4f8fd; padding: 10px 0 10px 20px;">
                        <b>Chi tiết thanh toán</b>
                    </div>
                    <div class="row pl-3 py-2"
                         style="background-color: #fff; font-size: 18px; padding: 2px 20px 10px 20px;">
                        <div class="col-12 p-0">
                            <hr style="border-top: 1px solid #0000001a;">
                            <table class="mt-2 w-100"
                                   style="font-size: 16px; width: 100%; text-align: left;  margin-bottom: 5px;">
                                
                                <tr>
                                    <td class="">Tạm tính</td>
                                    <td class="pr-3 text-right" style="text-align: right; padding-right: 20px;">
                                        <?php echo e(number_format(str_replace(',', '', number_format(str_replace(',', '', $subtotal))), 0, ',', '.')); ?> VND
                                    </td>
                                </tr>
                                <tr style="font-size: 18px;">
                                    <td><b>Tổng tiền</b></td>
                                    <td class="pr-3 text-right" style="text-align: right; padding-right: 20px;">
                                        <b><?php echo e(number_format(str_replace(',', '', number_format(str_replace(',', '', $total))), 0, ',', '.')); ?> VND</b>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 mb-4" style="margin-top: 15px; margin-bottom: 25px;">
                <div class="container-fluid">
                    <div class="row pl-3 py-2" style="background-color: #f4f8fd; padding: 10px 0 10px 20px;">
                        <b style="color: #00509d; font-size: 18px;">Thông tin thêm</b>
                    </div>
                    <div class="row pl-3 py-2" style="background-color: #fff; padding: 10px 20px;">
                        <p>Quý khách có thể kiểm tra hình thức bên ngoài của sản phẩm (nhãn hiệu, model, màu sắc, số lượng,...) 
                            trước khi thanh toán và có thể từ chối nhận hàng nếu không hài lòng. Vui lòng không kích hoạt một
                            thiết bị điện-điện tử hoặc dùng thử sản phẩm.</p>

                        <p>Nếu sản phẩm có dấu hiệu hư hỏng/bể vỡ hoặc không đúng với thông tin trên
                            website, vui lòng liên hệ với cửa hàng trong vòng 48h kể từ thời điểm nhận hàng
                            hỗ trợ.</p>

                        <p>Quý khách vui lòng giữ lại hóa đơn, hộp sản phẩm và phiếu bảo hành (nếu có) để đổi trả hoặc bảo hành khi
                            cần thiết.</p>

                        <p>Bạn có thể tham khảo trang Trung tâm trợ giúp hoặc liên hệ với cửa hàng bằng cách để lại lời nhắn tại
                            Trang liên hệ hoặc gửi thư tại đây.</p>

                        <b>FURNITURE xin trân trọng cảm ơn quý khách!</b>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="container-fluid">
                    <div class="row" style="background-color: #e7eff8; height: 10px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/checkout/email.blade.php ENDPATH**/ ?>