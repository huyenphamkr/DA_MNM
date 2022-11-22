<?php
return [
    [
        'label' => 'Trang Chủ',
        'route' => 'admin/home',
        'icon' => 'fa-home'
    ],
    [
        'label' => 'Quản Lý Danh Mục',
        'route' => 'admin/category/list',
        'icon' => 'fa-bars',
        'items' => [
            [
                'label' => 'Danh Sách Danh Mục',
                'route' => 'admin/category/list',
            ],
            [
                'label' => 'Thêm Danh Mục',
                'route' => 'admin/category/add',
            ]
        ]
    ],
    [
        'label' => 'Quản Lý Sản Phẩm',
        'route' => 'admin/product/list',
        'icon' => 'fa-couch',
        'items' => [
            [
                'label' => 'Danh Sách Sản Phẩm',
                'route' => 'admin/product/list',
            ],
            [
                'label' => 'Thêm Sản Phẩm',
                'route' => 'admin/product/add',
            ]
        ]
    ],
    [
        'label' => 'Quản Lý Slide',
        'route' => 'admin/slide/list',
        'icon' => 'fa-images',
        'items' => [
            [
                'label' => 'Danh Sách Slide',
                'route' => 'admin/slide/list',
            ],
            [
                'label' => 'Thêm Slide',
                'route' => 'admin/slide/add',
            ]
        ]
    ],
    [
        'label' => 'Quản Lý Đơn Đặt Hàng',
        'route' => 'admin/orders/list',
        'icon' => 'fa-folder-open',
        'items' => [
            [
                'label' => 'Danh Sách Đơn Đặt Hàng',
                'route' => 'admin/orders/list',
            ],
            [
                'label' => 'Thêm Đơn Đặt Hàng',
                'route' => 'admin/orders/add',
            ]
        ]
    ],
    [
        'label' => 'Quản Lý Phiếu Nhập',
        'route' => 'admin/purchases/list',
        'icon' => 'fa-clipboard',
        'items' => [
            [
                'label' => 'Danh Sách Phiếu Nhập',
                'route' => 'admin/purchase/list',
            ],
            [
                'label' => 'Thêm Phiếu Nhập',
                'route' => 'admin/purchase/add',
            ]
        ]
    ],
    [
        'label' => 'Quản Lý Người Dùng',
        'route' => 'admin/account/list',
        'icon' => 'fa-user',
        'items' => [
            [
                'label' => 'Danh Sách Người Dùng',
                'route' => 'admin/account/list',
            ],
            [
                'label' => 'Thêm Người Dùng',
                'route' => 'admin/account/add',
            ]
        ]
    ],
    [
        'label' => 'Quản Lý Nhà Cung Cấp',
        'route' => 'admin/supplier/list',
        'icon' => 'fa-truck',
        'items' => [
            [
                'label' => 'Danh Sách Nhà Cung Cấp',
                'route' => 'admin/supplier/list',
            ],
            [
                'label' => 'Thêm Nhà Cung Cấp',
                'route' => 'admin/supplier/add',
            ]
        ]
    ],
    [
        'label' => 'Thống Kê',
        'route' => 'admin/statistic/list',
        'icon' => 'fa-chart-bar',
        'items' => [
            [
                'label' => 'Thống kê doanh thu',
                'route' => 'admin/statistic/list',
            ],
            [
                'label' => 'Thêm Nhà Cung Cấp',
                'route' => 'admin/supplier/add',
            ]
        ] 
    ],
]
?>