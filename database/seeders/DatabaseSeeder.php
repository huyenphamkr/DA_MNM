<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Database\Seeders\DB;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $data_role = [
            [
                'name' => 'Supper Admin',
                'description' => 'Admin',                
            ],
            [
                'name' => 'Admin',
                'description' => 'Employee',                
            ],            
            [
                'name' => 'Member',
                'description' => 'Employee',                
            ],
        ];
        $data_user = [
            [
                'name' => 'Admin',
                'email' => 'admin@localhost.com',
                'role_id' => 1,
                'password' => bcrypt('123'),
                'address' => 'HCM',
                'phone_number' => '0366135030',
                'gender' => 'female',
                'active' => 1,       

            ],
            [
                'name' => 'Employee',
                'email' => 'employee@gmail.com',
                'role_id' => 2,
                'password' => bcrypt('123'),
                'address' => 'HCM',
                'phone_number' => '0366135030',
                'gender' => 'male', 
                'active' => 1,        
            ],
        ];
        $data_supplier = [
            [
                'name' => 'Nhà Cung Cấp TPHCM',
                'address' => 'HCM',
                'phone_number' => '0366135030',
                'active' => 1,       

            ],
            [
                'name' => 'Nhà Cung Cấp Bến Tre',
                'address' => 'Bến Tre',
                'phone_number' => '0843739379',
                'active' => 1,       

            ],
            [
                'name' => 'Nhà Cung Cấp Hà Nội',
                'address' => 'HCM',
                'phone_number' => '0843455652',
                'active' => 1,       

            ],
        ];
        $data_status = [
            [
                'name' => 'Chờ Xác Nhận',
                'description' => 'Đơn hàng khách hàng đã đặt hàng chưa qua xử lý',       

            ],
            [
                'name' => 'Đã Xác Nhận',
                'description' => 'Đơn hàng đã được xác nhận thành công (khách hàng có mua hàng)',       

            ],
            [
                'name' => 'Đang đóng gói',
                'description' => '​Đơn hàng đang được chuẩn bị và đóng gói sản phẩm',     

            ],            
            [
                'name' => 'Đang giao',
                'description' => 'Đơn hàng đang được chuyển đi cho khách hàng',     

            ],            
            [
                'name' => 'Thành công',
                'description' => '​Đơn hàng đã được giao thành công cho khách hàng.',     

            ],
            [
                'name' => 'Khách Hàng hủy đơn',
                'description' => 'Khách hàng hủy không mua hàng nữa',
            ],
            [
                'name' => 'Admin hủy đơn',
                'description' => 'Đơn hàng đã bị hủy bởi Admin',
            ],
        ];
        $data_category = [
            [
                'name' => 'Trang trí',
                'description' => 'Các phụ kiện nhập khẩu từ các hãng thiết kế nội thất uy tín của Australia mang lại điểm nhấn đặc biệt sang trọng cho không gian nội thất',
                'image' => 'image/cate-5.jpg',
            ],
            [
                'name' => 'Phòng Ngủ',
                'description' => 'Các sản phẩm giường ngủ da thật của MILD được bọc bằng chất liệu da bò Ý mềm mại, 
                cao cấp với khung sườn của sản phẩm sử dụng vật liệu thân thiện với môi trường, được chế tạo cẩn thận nhằm đảm bảo chất lượng và tuổi thọ.
                Với thiết kế độc đáo và đẳng cấp, giường ngủ da thật của MILD mang lại sự thoải mái tuyệt đối trong không gian đẳng cấp',
                'image' => 'image/cate-4.jpg',
            ],
            [
                'name' => 'Phòng Làm Việc',
                'description' => 'Các sản phẩm dành cho phòng làm việc được bọc bằng chất liệu cao cấp 
                với khung sườn của sản phẩm sử dụng vật liệu thân thiện với môi trường, được chế tạo cẩn thận nhằm đảm bảo chất lượng và tuổi thọ.
                Với thiết kế độc đáo và đẳng cấp.',
                'image' => 'image/cate-3.jpg',
            ],
            [
                'name' => 'Phòng Khách',
                'description' => 'Nét hiện đại cho căn hộ là lựa chọn thông minh cho phòng khách sang trọng, tiện nghi và đẳng cấp. 
                Được thiết kế có tính năng độc đáo, tiện lợi, chắc chắn sẽ đem đến những phút giây thư giãn tuyệt vời mỗi khi trở về nhà.',
                'image' => 'image/cate-2.jpg',
            ],
            [
                'name' => 'Phòng Ăn',
                'description' => 'Mỗi khoảnh khắc quây quần bên bàn ăn luôn là những phút giây đầm ấm tuyệt đẹp.
                Với chất liệu mẫu mã đa dạng cùng thiết kế độc đáo, từng sản phẩm của Cozy hướng tới kiến tạo không gian sang trọng nhưng cũng vô cùng đầm ấm và tinh tế.',
                'image' => 'image/cate-1.jpg',
            ],
        ];

        $data_product = [
            [
                'category_id'=>5,
                'name'=>'Bàn ăn 6 người',
                'description'=>'description',
                'image'=>'image/product/ban_an_6_nguoi.jpg',
                'amount'=>10,
                'price'=>1200000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>4,
                'name'=>'Bàn phòng khách',
                'description'=>'description',
                'image'=>'image/product/ban.jpg',
                'amount'=>250,
                'price'=>500000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>3,
                'name'=>'Bàn ghế bệt',
                'description'=>'description',
                'image'=>'image/product/banghebet.jpg',
                'amount'=>140,
                'price'=>1400000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>2,
                'name'=>'Bàn trang điểm',
                'description'=>'description',
                'image'=>'image/product/bantrangdiem1.jpg',
                'amount'=>50,
                'price'=>500000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>1,
                'name'=>'Bộ 5 khung tranh treo tường',
                'description'=>'description',
                'image'=>'image/product/5khungtranhtreotuong.jpg',
                'amount'=>80,
                'price'=>500000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>1,
                'name'=>'Bộ 11 khung tranh treo tường',
                'description'=>'description',
                'image'=>'image/product/11khungtranhtreotuong.jpg',
                'amount'=>80,
                'price'=>1000000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>1,
                'name'=>'Đèn đọc sách',
                'description'=>'description',
                'image'=>'image/product/den.png',
                'amount'=>25,
                'price'=>150000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>1,
                'name'=>'Đèn thả trần trang trí',
                'description'=>'description',
                'image'=>'image/product/den1.jpg',
                'amount'=>50,
                'price'=>200000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>1,
                'name'=>'Đồng hồ Shouse',
                'description'=>'description',
                'image'=>'image/product/dongho1.jpg',
                'amount'=>350,
                'price'=>1150000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>1,
                'name'=>'Đồng hồ treo tường',
                'description'=>'description',
                'image'=>'image/product/dongho.png',
                'amount'=>100,
                'price'=>100000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>1,
                'name'=>'Ghế xích đu',
                'description'=>'description',
                'image'=>'image/product/ghexichdu.jpg',
                'amount'=>10,
                'price'=>500000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>1,
                'name'=>'Gương treo tường',
                'description'=>'description',
                'image'=>'image/product/guong.jpg',
                'amount'=>100,
                'price'=>100000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>1,
                'name'=>'Thảm phòng khách loại 1',
                'description'=>'description',
                'image'=>'image/product/tham.jpg',
                'amount'=>50,
                'price'=>100000,
                'unit'=>'cái',             
            ],            
            [
                'category_id'=>1,
                'name'=>'Thảm phòng khách loại 2',
                'description'=>'description',
                'image'=>'image/product/tham1.jpg',
                'amount'=>50,
                'price'=>70000,
                'unit'=>'cái',             
            ],            
            [
                'category_id'=>1,
                'name'=>'Thảm phòng khách loại 3',
                'description'=>'description',
                'image'=>'image/product/tham2.jpg',
                'amount'=>50,
                'price'=>40000,
                'unit'=>'cái',             
            ],            
            [
                'category_id'=>1,
                'name'=>'Thảm phòng khách loại 4',
                'description'=>'description',
                'image'=>'image/product/tham3.jpg',
                'amount'=>50,
                'price'=>20000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>1,
                'name'=>'Xích đu hình bán cầu giọt nước',
                'description'=>'description',
                'image'=>'image/product/xichdubancau.jpg',
                'amount'=>200,
                'price'=>1000000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>2,
                'name'=>'Bàn trang điểm phòng ngủ loại 1',
                'description'=>'description',
                'image'=>'image/product/bantrangdiem.jpg',
                'amount'=>10,
                'price'=>2500000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>2,
                'name'=>'Bàn trang điểm phòng ngủ loại 2',
                'description'=>'description',
                'image'=>'image/product/bantrangdiem1.jpg',
                'amount'=>10,
                'price'=>1500000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>2,
                'name'=>'Giường ngủ loại 1',
                'description'=>'description',
                'image'=>'image/product/giuong.jpg',
                'amount'=>100,
                'price'=>17000000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>2,
                'name'=>'Giường ngủ loại 2',
                'description'=>'description',
                'image'=>'image/product/giuong1.jpg',
                'amount'=>50,
                'price'=>15000000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>2,
                'name'=>'Giường ngủ loại 3',
                'description'=>'description',
                'image'=>'image/product/giuong2.jpg',
                'amount'=>50,
                'price'=>10000000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>2,
                'name'=>'Tủ đầu giường loại 1',
                'description'=>'description',
                'image'=>'image/product/tudaugiuong.jpg',
                'amount'=>100,
                'price'=>8000000,
                'unit'=>'cái',             
            ],            
            [
                'category_id'=>2,
                'name'=>'Tủ đầu giường loại 2',
                'description'=>'description',
                'image'=>'image/product/tudaugiuong1.jpg',
                'amount'=>100,
                'price'=>5000000,
                'unit'=>'cái',             
            ],            
            [
                'category_id'=>2,
                'name'=>'Tủ quần áo loại 1',
                'description'=>'description',
                'image'=>'image/product/tuquanao.jpg',
                'amount'=>60,
                'price'=>15000000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>2,
                'name'=>'Tủ quần áo loại 2',
                'description'=>'description',
                'image'=>'image/product/tuquanao1.jpg',
                'amount'=>100,
                'price'=>12000000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>2,
                'name'=>'Tủ quần áo loại 3',
                'description'=>'description',
                'image'=>'image/product/tuquanao2.jpg',
                'amount'=>100,
                'price'=>10000000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>3,
                'name'=>'Bàn làm việc loại 1',
                'description'=>'description',
                'image'=>'image/product/banlamviec.jpg',
                'amount'=>25,
                'price'=>2550000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>3,
                'name'=>'Bàn làm việc loại 2',
                'description'=>'description',
                'image'=>'image/product/banlamviec1.jpg',
                'amount'=>15,
                'price'=>2000000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>3,
                'name'=>'Bàn làm việc loại 3',
                'description'=>'description',
                'image'=>'image/product/banlamviec2.jpg',
                'amount'=>25,
                'price'=>1800000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>3,
                'name'=>'Ghế văn phòng loại 1',
                'description'=>'description',
                'image'=>'image/product/ghevanphong.jpg',
                'amount'=>10,
                'price'=>250000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>3,
                'name'=>'Ghế văn phòng loại 2',
                'description'=>'description',
                'image'=>'image/product/ghevanphong1.jpg',
                'amount'=>20,
                'price'=>220000,
                'unit'=>'cái',             
            ],
            [
                'category_id'=>3,
                'name'=>'Ghế văn phòng loại 3',
                'description'=>'description',
                'image'=>'image/product/ghevanphong2.jpg',
                'amount'=>5,
                'price'=>200000,
                'unit'=>'cái',             
            ],            
            [
                'category_id'=>3,
                'name'=>'Tủ kệ sách loại 1',
                'description'=>'description',
                'image'=>'image/product/tukesach1.jpg',
                'amount'=>5,
                'price'=>500000,
                'unit'=>'cái',             
            ],            
            [
                'category_id'=>3,
                'name'=>'Tủ kệ sách loại 2',
                'description'=>'description',
                'image'=>'image/product/tukesach2.jpg',
                'amount'=>35,
                'price'=>300000,
                'unit'=>'cái',             
            ],            
            [
                'category_id'=>3,
                'name'=>'Tủ kệ sách loại 3',
                'description'=>'description',
                'image'=>'image/product/tukesach3.jpg',
                'amount'=>25,
                'price'=>100000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>4,
                'name'=>'Bàn ghế loại 1',
                'description'=>'description',
                'image'=>'image/product/banghe1.jpg',
                'amount'=>25,
                'price'=>2000000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>4,
                'name'=>'Bàn ghế loại 2',
                'description'=>'description',
                'image'=>'image/product/banghe2.jpg',
                'amount'=>250,
                'price'=>1900000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>4,
                'name'=>'Bàn loại 1',
                'description'=>'description',
                'image'=>'image/product/ban1.jpg',
                'amount'=>250,
                'price'=>300000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>4,
                'name'=>'Bàn loại 2',
                'description'=>'description',
                'image'=>'image/product/ban2.jpg',
                'amount'=>25,
                'price'=>200000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>4,
                'name'=>'Bàn loại 3',
                'description'=>'description',
                'image'=>'image/product/ban3.jpg',
                'amount'=>25,
                'price'=>150000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>4,
                'name'=>'Sofa loại 1',
                'description'=>'description',
                'image'=>'image/product/sofa.jpg',
                'amount'=>250,
                'price'=>2550000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>4,
                'name'=>'Sofa loại 2',
                'description'=>'description',
                'image'=>'image/product/sofa1.jpg',
                'amount'=>200,
                'price'=>2350000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>4,
                'name'=>'Sofa loại 3',
                'description'=>'description',
                'image'=>'image/product/sofa2.jpg',
                'amount'=>100,
                'price'=>2000000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>4,
                'name'=>'Tủ giày dép loại 1',
                'description'=>'description',
                'image'=>'image/product/tugiaydep1.jpg',
                'amount'=>20,
                'price'=>1000000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>4,
                'name'=>'Tủ giày dép loại 2',
                'description'=>'description',
                'image'=>'image/product/tugiaydep2.jpg',
                'amount'=>33,
                'price'=>500000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>4,
                'name'=>'Tủ tivi loại 1',
                'description'=>'description',
                'image'=>'image/product/tutivi1.jpg',
                'amount'=>25,
                'price'=>1000000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>4,
                'name'=>'Tủ tivi loại 2',
                'description'=>'description',
                'image'=>'image/product/tutivi2.jpg',
                'amount'=>25,
                'price'=>900000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>4,
                'name'=>'Tủ tivi loại 3',
                'description'=>'description',
                'image'=>'image/product/tutivi3.jpg',
                'amount'=>25,
                'price'=>500000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>4,
                'name'=>'Tủ trưng bày',
                'description'=>'description',
                'image'=>'image/product/tutrungbay.jpg',
                'amount'=>250,
                'price'=>230000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>5,
                'name'=>'Bộ bàn ăn gỗ',
                'description'=>'description',
                'image'=>'image/product/bobanangho.jpg',
                'amount'=>25,
                'price'=>10000000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>5,
                'name'=>'Bộ bàn ăn hiện đại',
                'description'=>'description',
                'image'=>'image/product/bobananhiendai.jpg',
                'amount'=>25,
                'price'=>15000000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>5,
                'name'=>'Tủ bếp cao cấp',
                'description'=>'description',
                'image'=>'image/product/tubepcaocap.jpg',
                'amount'=>95,
                'price'=>10000000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>5,
                'name'=>'Tủ bếp chữ I',
                'description'=>'description',
                'image'=>'image/product/tubepchu_i.jpg',
                'amount'=>55,
                'price'=>10000000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>5,
                'name'=>'Tủ bếp gỗ chữ L',
                'description'=>'description',
                'image'=>'image/product/tubepgochu_l.jpg',
                'amount'=>65,
                'price'=>18550000,
                'unit'=>'cái',             
            ],                        
            [
                'category_id'=>5,
                'name'=>'Tủ trữ đồ nhà bếp',
                'description'=>'description',
                'image'=>'image/product/tutrudonhabep.jpg',
                'amount'=>250,
                'price'=>17500000,
                'unit'=>'cái',             
            ],
        ];

        $data_orders = [
            [
                'user_id'=>4,
                'date'=>'',
                'total'=>200,
                'note'=>'',
                'payment'=>'',	
            ],
        ];

        $data_ordesdetail = [
            [
                'order_id'=>4,
                'product_id'=>4,
                'status_id'=>4,
                'quantity'=>4,
                'price'=>4,
            ],
        ];

        $data_purchases = [
            [
                'user_id'=>4,
                'supplier_id'=>1,
                'date'=>'',
                'total'=>300,
                'note'=>'',
                'paymen'=>'',
            ],
        ];

        $data_purchasedetail = [
            [
                'purchase_id'=>1,
                'product_id'=>1,
                'quantity'=>1,
                'price'=>1,
            ],
        ];

        //DB::table('roles')->insert($data_role);
        //DB::table('users')->insert($data_user);
        //DB::table('supplier')->insert($data_supplier);
       // DB::table('status')->insert($data_status);data_category
       //DB::table('category')->insert($data_category);

    }
}
