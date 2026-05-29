<?php

function getServices(): array
{
    return [
        [
            'slug' => 'vbhxh-dien-tu',
            'title' => 'Ví bảo hiểm xã hội điện tử',
            'description' => 'Kê khai, nộp và quản lý hồ sơ bảo hiểm xã hội trực tuyến nhanh gọn, đúng quy định.',
            'icon' => 'file',
        ],
        [
            'slug' => 'mysign',
            'title' => 'Mysign',
            'description' => 'Ký số từ xa trên mọi thiết bị, tối ưu quy trình phê duyệt và vận hành nội bộ.',
            'icon' => 'signature',
        ],
        [
            'slug' => 'hop-dong-dien-tu',
            'title' => 'Hợp đồng điện tử',
            'description' => 'Tạo, gửi, ký và lưu trữ hợp đồng tập trung với đầy đủ giá trị pháp lý.',
            'icon' => 'contract',
        ],
        [
            'slug' => 'hoa-don-dien-tu',
            'title' => 'Hóa đơn điện tử',
            'description' => 'Phát hành, quản lý và tra cứu hóa đơn điện tử dễ dàng cho kế toán doanh nghiệp.',
            'icon' => 'invoice',
        ],
        [
            'slug' => 'chu-ky-so-ca',
            'title' => 'Chữ ký số CA',
            'description' => 'Giải pháp chứng thư số an toàn cho thuế, hải quan, bảo hiểm và giao dịch điện tử.',
            'icon' => 'shield',
        ],
        [
            'slug' => 'quan-ly-nha-thuoc',
            'title' => 'Quản lý nhà thuốc',
            'description' => 'Quản lý tồn kho, bán hàng, đơn thuốc và kết nối dữ liệu theo chuẩn ngành dược.',
            'icon' => 'store',
        ],
        [
            'slug' => 'ke-toan-viettel',
            'title' => 'Kế toán Viettel',
            'description' => 'Phần mềm kế toán trực tuyến giúp tổng hợp số liệu, báo cáo và quản trị tài chính.',
            'icon' => 'chart',
        ],
    ];
}

function getBenefits(): array
{
    return [
        ['title' => 'Tiết kiệm thời gian', 'description' => 'Rút ngắn thao tác thủ công và giảm vòng lặp phê duyệt.', 'icon' => 'time'],
        ['title' => 'Tự động hóa quy trình', 'description' => 'Kết nối dữ liệu liền mạch giữa các bộ phận vận hành.', 'icon' => 'automation'],
        ['title' => 'Bảo mật cao', 'description' => 'Mã hóa, phân quyền và kiểm soát truy cập theo vai trò.', 'icon' => 'secure'],
        ['title' => 'Chuẩn pháp lý', 'description' => 'Đáp ứng quy định về giao dịch điện tử và lưu trữ chứng từ.', 'icon' => 'legal'],
        ['title' => 'Hỗ trợ 24/7', 'description' => 'Đội ngũ kỹ thuật sẵn sàng đồng hành trong quá trình sử dụng.', 'icon' => 'support'],
        ['title' => 'Dễ sử dụng', 'description' => 'Giao diện rõ ràng, phù hợp cả người dùng không chuyên CNTT.', 'icon' => 'easy'],
    ];
}

function getProcessSteps(): array
{
    return [
        ['step' => '01', 'title' => 'Đăng ký', 'description' => 'Tiếp nhận nhu cầu và thông tin doanh nghiệp.'],
        ['step' => '02', 'title' => 'Tư vấn', 'description' => 'Đề xuất gói giải pháp phù hợp với quy mô vận hành.'],
        ['step' => '03', 'title' => 'Kích hoạt', 'description' => 'Cấu hình tài khoản, chứng thư và luồng phê duyệt.'],
        ['step' => '04', 'title' => 'Sử dụng', 'description' => 'Đào tạo nhanh để đội ngũ đưa vào vận hành hằng ngày.'],
        ['step' => '05', 'title' => 'Hỗ trợ', 'description' => 'Theo dõi, xử lý yêu cầu và tối ưu định kỳ.'],
    ];
}

function getStats(): array
{
    return [
        ['value' => 10000, 'suffix' => '+', 'label' => 'khách hàng'],
        ['value' => 99, 'suffix' => '%', 'label' => 'hài lòng'],
        ['value' => 24, 'suffix' => '/7', 'label' => 'hỗ trợ'],
        ['value' => 15, 'suffix' => '+', 'label' => 'năm kinh nghiệm'],
    ];
}

function getFaqs(): array
{
    return [
        [
            'question' => 'Hóa đơn điện tử là gì?',
            'answer' => 'Hóa đơn điện tử là chứng từ được tạo, lập, gửi, nhận và lưu trữ bằng phương tiện điện tử, có giá trị pháp lý khi đáp ứng đúng quy định.',
        ],
        [
            'question' => 'Chữ ký số hoạt động thế nào?',
            'answer' => 'Chữ ký số xác thực danh tính người ký bằng chứng thư số, đảm bảo tính toàn vẹn và không thể phủ nhận của giao dịch điện tử.',
        ],
        [
            'question' => 'Có hỗ trợ cài đặt không?',
            'answer' => 'Đội kỹ thuật hỗ trợ kích hoạt, cấu hình ban đầu, hướng dẫn sử dụng và đồng hành trong quá trình vận hành.',
        ],
        [
            'question' => 'Bảo mật ra sao?',
            'answer' => 'Hệ thống áp dụng mã hóa dữ liệu, phân quyền người dùng, nhật ký truy cập và các quy trình giám sát an toàn thông tin.',
        ],
    ];
}

function getPricingPlans(): array
{
    return [
        [
            'name' => 'Essential',
            'price' => '299.000đ',
            'description' => 'Phù hợp hộ kinh doanh và doanh nghiệp mới bắt đầu số hóa.',
            'features' => ['1 dịch vụ cốt lõi', 'Hỗ trợ kích hoạt', 'Tài liệu hướng dẫn'],
        ],
        [
            'name' => 'Growth',
            'price' => '699.000đ',
            'description' => 'Gói tối ưu cho doanh nghiệp cần đồng bộ nhiều nghiệp vụ.',
            'features' => ['3 dịch vụ tích hợp', 'Tư vấn quy trình', 'Hỗ trợ ưu tiên'],
            'featured' => true,
        ],
        [
            'name' => 'Enterprise',
            'price' => 'Liên hệ',
            'description' => 'Thiết kế riêng cho tập đoàn, chuỗi chi nhánh và hệ thống lớn.',
            'features' => ['Tích hợp API', 'SLA theo hợp đồng', 'Quản lý tập trung'],
        ],
    ];
}

function getTestimonials(): array
{
    return [
        [
            'name' => 'Nguyễn Minh Anh',
            'role' => 'Giám đốc tài chính',
            'quote' => 'Bộ giải pháp giúp phòng kế toán và nhân sự xử lý chứng từ nhanh hơn, rõ trạng thái hơn.',
        ],
        [
            'name' => 'Trần Hoàng Nam',
            'role' => 'Quản lý CNTT',
            'quote' => 'Quá trình kích hoạt gọn, đội hỗ trợ nắm nghiệp vụ và phản hồi rất nhanh khi cần.',
        ],
        [
            'name' => 'Lê Thu Hà',
            'role' => 'Chuỗi bán lẻ',
            'quote' => 'Hợp đồng điện tử và chữ ký số giúp rút ngắn thời gian xử lý với đối tác ở nhiều tỉnh thành.',
        ],
    ];
}
