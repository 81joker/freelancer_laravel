<?php

namespace Database\Seeders;

use ArchiElite\Announcement\Models\Announcement;
use Botble\Base\Supports\BaseSeeder;
use Botble\Setting\Facades\Setting;
use Carbon\Carbon;

class AnnouncementSeeder extends BaseSeeder
{
    public function run(): void
    {
        Announcement::query()->truncate();

        $announcements = [
            'Explore Our Exciting New Property Listings Now Available in Prime Locations!',
            'Join Us for Exclusive Open House Events This Weekend and Find Your Perfect Home!',
            'Take Advantage of Limited-Time Offers on Luxury Homes with Stunning Features!',
            'Discover Your Dream Home with Our Latest Listings and Personalized Services!',
        ];

        $now = Carbon::now();

        foreach ($announcements as $key => $value) {
            Announcement::query()->create([
                'name' => sprintf('Announcement %s', $key + 1),
                'content' => $value,
                'start_date' => $now,
                'dismissible' => true,
            ]);
        }

        $settings = [
            'announcement_max_width' => 80,
            'announcement_max_width_unit' => '%',
            'announcement_text_color' => '#fff',
            'announcement_background_color' => 'transparent',
            'announcement_text_alignment' => 'start',
            'announcement_dismissible' => false,
            'announcement_placement' => 'theme',
            'announcement_autoplay' => true,
            'announcement_autoplay_delay' => 5000,
        ];

        Setting::delete(array_keys($settings));

        Setting::set($settings)->save();
    }
}
