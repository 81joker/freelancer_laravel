<?php

return [
    'name' => 'الاستشارات',
    'edit' => 'عرض الاستشارة',
    'statuses' => [
        'read' => 'مقروء',
        'unread' => 'غير مقروء',
    ],
    'phone' => 'الهاتف',
    'ip_address' => 'عنوان IP',
    'content' => 'التفاصيل',
    'consult_information' => 'معلومات الاستشارة',
    'email' => [
        'header' => 'البريد الإلكتروني',
        'title' => 'استشارة جديدة من موقعك',
        'success' => 'تم إرسال الاستشارة بنجاح!',
        'failed' => 'لا يمكن إرسال الطلب حاليًا، يرجى المحاولة لاحقًا!',
    ],
    'form' => [
        'name' => [
            'required' => 'الاسم مطلوب',
        ],
        'email' => [
            'required' => 'البريد الإلكتروني مطلوب',
            'email' => 'عنوان البريد الإلكتروني غير صالح',
        ],
        'content' => [
            'required' => 'الرسالة مطلوبة',
        ],
    ],
    'consult_sent_from' => 'تم إرسال معلومات هذه الاستشارة من',
    'time' => 'الوقت',
    'consult_id' => 'معرّف الاستشارة',
    'form_name' => 'الاسم',
    'form_email' => 'البريد الإلكتروني',
    'form_phone' => 'الهاتف',
    'mark_as_read' => 'وضع علامة كمقروء',
    'mark_as_unread' => 'وضع علامة كغير مقروء',
    'new_consult_notice' => 'لديك <span class="bold">:count</span> استشارات جديدة',
    'view_all' => 'عرض الكل',
    'project' => 'المشروع',
    'property' => 'العقار',
    'custom_field' => [
        'name' => 'الحقول المخصصة',
        'create' => 'إنشاء حقل مخصص',
        'type' => 'النوع',
        'required' => 'إلزامي',
        'placeholder' => 'النص التوضيحي',
        'order' => 'الترتيب',
        'options' => 'الخيارات',
        'option' => [
            'label' => 'التسمية',
            'value' => 'القيمة',
            'add' => 'إضافة خيار جديد',
        ],
        'enums' => [
            'types' => [
                'text' => 'نص',
                'number' => 'رقم',
                'dropdown' => 'قائمة منسدلة',
                'checkbox' => 'مربع اختيار',
                'radio' => 'زر اختيار',
                'textarea' => 'حقل نصي متعدد',
                'date' => 'تاريخ',
                'datetime' => 'التاريخ والوقت',
                'time' => 'وقت',
            ],
        ],
    ],
];
