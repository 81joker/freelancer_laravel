<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Page\Models\Page;
use Botble\Theme\Database\Traits\HasThemeOptionSeeder;

class ThemeOptionSeeder extends BaseSeeder
{
    use HasThemeOptionSeeder;

    public function run(): void
    {
        $this->uploadFiles('general');

        $this->createThemeOptions([
            'site_title' => 'Flex Home',
            'seo_description' => 'Find your favorite homes at Flex Home',
            'copyright' => '©%Y Flex Home is Proudly Powered by Botble Team.',
            'favicon' => 'logo/favicon.png',
            'logo' => 'logo/logo.png',
            'cookie_consent_message' => 'Your experience on this site will be improved by allowing cookies ',
            'cookie_consent_learn_more_url' => '/cookie-policy',
            'cookie_consent_learn_more_text' => 'Cookie Policy',
            'homepage_id' => Page::query()->value('id'),
            'blog_page_id' => Page::query()->skip(1)->value('id'),
            'properties_list_page_id' => Page::query()->skip(6)->value('id'),
            'projects_list_page_id' => Page::query()->skip(7)->value('id'),
            'home_banner' => 'general/home-banner.jpg',
            'breadcrumb_background' => 'general/breadcrumb-background.jpg',
            'address' => 'North Link Building, 10 Admiralty Street, 757695 Singapore',
            'hotline' => '18006268',
            'email' => 'sale@botble.com',
            'primary_font' => 'Nunito Sans',
            'about-us' => '<p>Founded on August 28, 1993 (formerly known as Truong Thinh Phat Construction Co., Ltd.), Flex Home operates in the field of real estate business, building villas for rent.</p><br />
<p>With the slogan &quot;Breaking time, through space&quot; with a sustainable development strategy, taking Real Estate as a focus area, Flex Home is constantly connecting between buyers and sellers in the field.</p><p>Real estate, bringing people closer together, over the distance of time and space, is a reliable place for real estate investment - an area that is constantly evolving over time.</p>',
            'newsletter_popup_enable' => true,
            'newsletter_popup_image' => $this->filePath('general/newsletter-image.jpg'),
            'newsletter_popup_title' => 'Let’s join our newsletter!',
            'newsletter_popup_subtitle' => 'Weekly Updates',
            'newsletter_popup_description' => 'Do not worry we don’t spam!',
            'social_links' => [
                [
                    [
                        'key' => 'social-name',
                        'value' => 'Facebook',
                    ],
                    [
                        'key' => 'social-icon',
                        'value' => 'fab fa-facebook',
                    ],
                    [
                        'key' => 'social-url',
                        'value' => 'https://facebook.com',
                    ],
                ],
                [
                    [
                        'key' => 'social-name',
                        'value' => 'Twitter',
                    ],
                    [
                        'key' => 'social-icon',
                        'value' => 'fab fa-twitter',
                    ],
                    [
                        'key' => 'social-url',
                        'value' => 'https://twitter.com',
                    ],
                ],
                [
                    [
                        'key' => 'social-name',
                        'value' => 'Youtube',
                    ],
                    [
                        'key' => 'social-icon',
                        'value' => 'fab fa-youtube',
                    ],
                    [
                        'key' => 'social-url',
                        'value' => 'https://youtube.com',
                    ],
                ],
            ],
            'social_sharing' => [
                [
                    ['key' => 'social', 'value' => 'facebook'],
                    ['key' => 'icon', 'value' => 'ti ti-brand-facebook'],
                ],
                [
                    ['key' => 'social', 'value' => 'x'],
                    ['key' => 'icon', 'value' => 'ti ti-brand-x'],
                ],
                [
                    ['key' => 'social', 'value' => 'pinterest'],
                    ['key' => 'icon', 'value' => 'ti ti-brand-pinterest'],
                ],
                [
                    ['key' => 'social', 'value' => 'linkedin'],
                    ['key' => 'icon', 'value' => 'ti ti-brand-linkedin'],
                ],
                [
                    ['key' => 'social', 'value' => 'whatsapp'],
                    ['key' => 'icon', 'value' => 'ti ti-brand-whatsapp'],
                ],
                [
                    ['key' => 'social', 'value' => 'email'],
                    ['key' => 'icon', 'value' => 'ti ti-mail'],
                ],
            ],
        ]);
    }
}
