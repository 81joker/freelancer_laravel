<?php

namespace Botble\RealEstate\Forms\Settings;

use Botble\Base\Forms\FieldOptions\OnOffFieldOption;
use Botble\Base\Forms\Fields\OnOffCheckboxField;
use Botble\Base\Forms\Fields\OnOffField;
use Botble\RealEstate\Facades\RealEstateHelper;
use Botble\RealEstate\Http\Requests\Settings\AccountSettingRequest;
use Botble\Setting\Forms\SettingForm;

class AccountSettingForm extends SettingForm
{
    public function setup(): void
    {
        parent::setup();

        $this
            ->setSectionTitle(trans('plugins/real-estate::settings.account.name'))
            ->setSectionDescription(trans('plugins/real-estate::settings.account.description'))
            ->setValidatorClass(AccountSettingRequest::class)
            ->add('real_estate_enabled_login', 'onOffCheckbox', [
                'label' => trans('plugins/real-estate::settings.account.form.real_estate_enabled_login'),
                'value' => RealEstateHelper::isLoginEnabled(),
                'attr' => [
                    'data-bb-toggle' => 'collapse',
                    'data-bb-target' => '.auth-settings',
                ],
            ])
            ->add('open_fieldset_auth_settings', 'html', [
                'html' => sprintf(
                    '<fieldset class="auth-settings form-fieldset"
                    data-bb-value="1"
                    style="display: %s"/>',
                    old('real_estate_enabled_login', RealEstateHelper::isLoginEnabled()) ? 'block' : 'none',
                ),
            ])
            ->add('real_estate_enabled_register', 'onOffCheckbox', [
                'label' => trans('plugins/real-estate::settings.account.form.real_estate_enabled_register'),
                'value' => RealEstateHelper::isRegisterEnabled(),
            ])
            ->add(
                'verify_account_email',
                OnOffField::class,
                OnOffFieldOption::make()
                    ->label(trans('plugins/real-estate::settings.account.form.verify_account_email'))
                    ->helperText(trans('plugins/real-estate::settings.account.form.verify_account_email_helper'))
                    ->value(setting('verify_account_email', false))
            )
            ->add(
                'real_estate_make_account_phone_number_required',
                OnOffCheckboxField::class,
                OnOffFieldOption::make()
                    ->label(trans('plugins/real-estate::settings.account.form.make_account_phone_number_required'))
                    ->helperText(trans('plugins/real-estate::settings.account.form.make_account_phone_number_required_helper'))
                    ->value((bool) setting('real_estate_make_account_phone_number_required', false))
            )
            ->add(
                'real_estate_hide_username_in_registration_page',
                OnOffCheckboxField::class,
                OnOffFieldOption::make()
                    ->label(trans('plugins/real-estate::settings.account.form.hide_username_in_registration_page'))
                    ->helperText(trans('plugins/real-estate::settings.account.form.hide_username_in_registration_page_helper'))
                    ->value((bool) setting('real_estate_hide_username_in_registration_page', false))
            )
            ->add('real_estate_enable_credits_system', 'onOffCheckbox', [
                'label' => trans('plugins/real-estate::settings.account.form.enable_credits_system'),
                'value' => RealEstateHelper::isEnabledCreditsSystem(),
            ])
            ->add('enable_post_approval', 'onOffCheckbox', [
                'label' => trans('plugins/real-estate::settings.account.form.enable_post_approval'),
                'value' => setting('enable_post_approval', true),
            ])
            ->add('real_estate_max_filesize_upload_by_agent', 'number', [
                'label' => trans('plugins/real-estate::settings.account.form.max_upload_filesize'),
                'value' => RealEstateHelper::maxFilesizeUploadByAgent(),
                'attr' => [
                    'placeholder' => trans('plugins/real-estate::settings.account.form.max_upload_filesize_placeholder', [
                        'size' => RealEstateHelper::maxFilesizeUploadByAgent(),
                    ]),
                ],
            ])
            ->add('real_estate_max_property_images_upload_by_agent', 'number', [
                'label' => trans('plugins/real-estate::settings.account.form.max_property_images_upload_by_agent'),
                'value' => RealEstateHelper::maxPropertyImagesUploadByAgent(),
            ])
            ->add(
                'real_estate_enable_account_verification',
                OnOffCheckboxField::class,
                OnOffFieldOption::make()
                    ->label(trans('plugins/real-estate::settings.account.form.enable_account_verification'))
                    ->helperText(trans('plugins/real-estate::settings.account.form.enable_account_verification_help'))
                    ->value((bool) setting('real_estate_enable_account_verification', false))
            )
            ->add('close_fieldset_auth_settings', 'html', [
                'html' => '</fieldset>',
            ])
            ->add('property_expired_after_days', 'number', [
                'label' => trans('plugins/real-estate::settings.account.form.property_expired_after_days'),
                'value' => RealEstateHelper::propertyExpiredDays(),
            ])
            ->add('real_estate_enable_wishlist', 'onOffCheckbox', [
                'label' => trans('plugins/real-estate::settings.account.form.enable_wishlist'),
                'value' => setting('real_estate_enable_wishlist', true),
            ])
            ->add('real_estate_hide_agency_phone', 'onOffCheckbox', [
                'label' => trans('plugins/real-estate::settings.account.form.hide_agency_phone'),
                'value' => setting('real_estate_hide_agency_phone', false),
            ])
            ->add('real_estate_hide_agency_email', 'onOffCheckbox', [
                'label' => trans('plugins/real-estate::settings.account.form.hide_agency_email'),
                'value' => setting('real_estate_hide_agency_email', false),
            ])
            ->add('real_estate_hide_agent_info_in_property_detail_page', 'onOffCheckbox', [
                'label' => trans('plugins/real-estate::settings.account.form.hide_agent_info_in_property_detail_page'),
                'value' => RealEstateHelper::hideAgentInfoInPropertyDetailPage(),
            ])
            ->add('real_estate_disabled_public_profile', 'onOffCheckbox', [
                'label' => trans('plugins/real-estate::settings.account.form.disabled_public_profile'),
                'value' => RealEstateHelper::isDisabledPublicProfile(),
            ]);
    }
}
