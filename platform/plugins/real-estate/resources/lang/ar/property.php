<?php

return [
    'name' => 'العقارات & السيارات',
    'properties' =>  'العقارات & السيارات',
    'create' => 'عقار جديد',
    'edit' => 'تحرير العقار',
    'form' => [
        'main_info' => 'المعلومات العامة',
        'basic_info' => 'المعلومات الأساسية',
        'name' => 'العنوان',
        'type' => 'النوع',
        'images' => 'الصور',
        'location' => 'موقع العقار',
        'number_bedroom' => 'عدد الغرف',
        'number_bathroom' => 'عدد الحمامات',
        'house_type' =>  'نوع المنزل',
        'number_floor' => 'عدد الطوابق',
        'square' => 'المساحة :unit',
        'price' => 'السعر',
        'features' => 'الميزات',
        'project' => 'المشروع',
        'date' => 'تاريخ المعلومات',
        'currency' => 'العملة',
        'city' => 'المدينة',
        'period' => 'الفترة',
        'category' => 'الفئة',
        'latitude' => 'خط العرض',
        'latitude_helper' => 'اذهب إلى هنا للحصول على خط العرض من العنوان.',
        'longitude' => 'خط الطول',
        'longitude_helper' => 'اذهب إلى هنا للحصول على خط الطول من العنوان.',
        'categories' => 'الفئات',
        'images_upload_placeholder' => 'اسحب الملفات هنا أو انقر لتحميل.',
        'content' => 'المحتوى',
    ],
    'statuses' => [
        'not_available' => 'غير متاح',
        'pre_sale' => 'إعداد للبيع',
        'selling' => 'البيع',
        'sold' => 'تم البيع',
        'renting' => 'الإيجار',
        'rented' => 'تم الإيجار',
        'building' => 'الإنشاء',
    ],
    'types' => [
        'sale' => 'للبيع',
        'rent' => 'للايجار',
    ],
    'periods' => [
        'day' => 'يومي',
        'week' => 'أسبوعي',
        'month' => 'شهري',
        'year' => 'سنوي',
    ],
    'moderation_status' => 'حالة الإشراف',
    'moderation-statuses' => [
        'pending' => 'قيد الانتظار',
        'approved' => 'موافق عليه',
        'rejected' => 'مرفوض',
    ],
    'renew_notice' => 'تجديد تلقائي (ستتم إعادة الشحن خلال :days أيام)؟',
    'distance_key' => 'مفتاح المسافة بين المرافق',
    'never_expired' => 'غير منتهي الصلاحية؟',
    'select_project' => 'حدد مشروعاً...',
    'account' => 'الحساب',
    'select_account' => 'حدد حساباً...',
    'expire_date' => 'تاريخ انتهاء الصلاحية',
    'never_expired_label' => 'غير منتهي الصلاحية',
    'active_properties' => 'العقارات النشطة',
    'pending_properties' => 'العقارات قيد الانتظار',
    'expired_properties' => 'العقارات منتهية الصلاحية',
    'import_properties' => 'استيراد العقارات',
    'export_properties' => 'تصدير العقارات',
    'duplicate_property_successfully' => 'تم تكرار العقار بنجاح!',
    'duplicate' => 'تكرار',
    'views' => 'المشاهدات',
    'unique_id' => 'الرقم المميز',
    'private_notes' => 'الملاحظات الخاصة',
    'private_notes_helper' => 'الملاحظات الخاصة مرئية فقط للمالك ولن تظهر على الواجهة الأمامية.',
    'floor_plans' => [
        'title' => 'خطط الطوابق',
        'name' => 'اسم',
        'description' => 'الوصف',
        'image' => 'الصورة',
        'bedrooms' => 'الغرف',
        'bedrooms_placeholder' => 'أدخل عدد الغرف',
        'bathrooms' => 'الحمامات',
        'bathrooms_placeholder' => 'أدخل عدد الحمامات',
        'image_placeholder' => 'أدخل رابط الصورة. مثلاً: https://example.com/image.jpg',
    ],
    'status_moderation' => [
        'approve' => 'موافقة',
        'reject' => 'رفض',
        'approve_title' => 'موافقة على العقار',
        'approve_message' => 'هل أنت متأكد أنك تريد الموافقة على هذا العقار؟ لا يمكن التراجع عن هذه الخطوة.',
        'reject_title' => 'رفض العقار',
        'reject_message' => 'هل أنت متأكد أنك تريد رفض هذا العقار؟ لا يمكن التراجع عن هذه الخطوة.',
        'reject_reason' => 'أدخل سبب الرفض',
        'approved' => 'تم الموافقة على العقار بنجاح!',
        'rejected' => 'تم رفض العقار بنجاح!',
        'reason_rejected' => 'سبب الرفض',
    ],
];
