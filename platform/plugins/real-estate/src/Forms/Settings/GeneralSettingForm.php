<?php

namespace Botble\RealEstate\Forms\Settings;

use Botble\Base\Forms\FieldOptions\LabelFieldOption;
use Botble\Base\Forms\FieldOptions\MultiChecklistFieldOption;
use Botble\Base\Forms\FieldOptions\OnOffFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\HtmlField;
use Botble\Base\Forms\Fields\LabelField;
use Botble\Base\Forms\Fields\MultiCheckListField;
use Botble\Base\Forms\Fields\OnOffCheckboxField;
use Botble\Base\Forms\Fields\OnOffField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextField;
use Botble\RealEstate\Enums\ProjectStatusEnum;
use Botble\RealEstate\Enums\PropertyStatusEnum;
use Botble\RealEstate\Enums\PropertyTypeEnum;
use Botble\RealEstate\Facades\RealEstateHelper;
use Botble\RealEstate\Http\Requests\Settings\GeneralSettingRequest;
use Botble\Setting\Forms\SettingForm;

class GeneralSettingForm extends SettingForm
{
    public function setup(): void
    {
        parent::setup();

        $this
            ->setSectionTitle(trans('plugins/real-estate::settings.general.name'))
            ->setSectionDescription(trans('plugins/real-estate::settings.general.description'))
            ->addCustomField('multiCheckList', MultiCheckListField::class)
            ->setValidatorClass(GeneralSettingRequest::class)
            ->add(
                'real_estate_enabled_projects',
                OnOffField::class,
                OnOffFieldOption::make()
                    ->label(trans('plugins/real-estate::settings.general.form.enabled_projects'))
                    ->value(RealEstateHelper::isEnabledProjects())
                    ->helperText(trans('plugins/real-estate::settings.general.form.enabled_projects_helper'))
                    ->toArray()
            )
            ->add(
                'real_estate_enabled_property_types[]',
                MultiCheckListField::class,
                MultiChecklistFieldOption::make()
                    ->label(trans('plugins/real-estate::settings.general.form.enabled_property_types'))
                    ->choices(PropertyTypeEnum::labels())
                    ->selected(RealEstateHelper::enabledPropertyTypes())
                    ->toArray()
            )
            ->add('real_estate_square_unit', SelectField::class, [
                'label' => trans('plugins/real-estate::settings.general.form.square_unit'),
                'choices' => [
                    '' => trans('plugins/real-estate::settings.general.form.square_unit_none'),
                    'm²' => trans('plugins/real-estate::settings.general.form.square_unit_meter'),
                    'ft2' => trans('plugins/real-estate::settings.general.form.square_unit_feet'),
                    'yd2' => trans('plugins/real-estate::settings.general.form.square_unit_yard'),
                ],
                'selected' => setting('real_estate_square_unit', 'm²'),
            ])
            ->add('real_estate_display_views_count_in_detail_page', OnOffField::class, [
                'label' => trans('plugins/real-estate::settings.general.form.display_views_count_in_detail_page'),
                'value' => setting('real_estate_display_views_count_in_detail_page', false),
            ])
            ->add(
                'label_real_estate_hide_properties',
                LabelField::class,
                LabelFieldOption::make()
                    ->label(trans('plugins/real-estate::settings.general.form.hide_properties_in_statuses'))
                    ->toArray()
            )
            ->add('real_estate_hide_properties_in_statuses[]', MultiCheckListField::class, [
                'label' => false,
                'choices' => PropertyStatusEnum::labels(),
                'value' => old('real_estate_hide_properties_in_statuses', RealEstateHelper::exceptedPropertyStatuses()),
                'inline' => true,
            ])
            ->add(
                'label_real_estate_hide_projects',
                LabelField::class,
                LabelFieldOption::make()
                    ->label(trans('plugins/real-estate::settings.general.form.hide_projects_in_statuses'))
                    ->toArray()
            )
            ->add('real_estate_hide_projects_in_statuses[]', MultiCheckListField::class, [
                'label' => false,
                'choices' => ProjectStatusEnum::labels(),
                'value' => old('real_estate_hide_projects_in_statuses', RealEstateHelper::exceptedProjectsStatuses()),
                'inline' => true,
            ])
            ->add('real_estate_enable_review_feature', OnOffField::class, [
                'label' => trans('plugins/real-estate::settings.general.form.enable_review_feature'),
                'value' => RealEstateHelper::isEnabledReview(),
                'attr' => [
                    'data-bb-toggle' => 'collapse',
                    'data-bb-target' => '.review-settings',
                ],
            ])
            ->add('open_fieldset_reviews_setting', HtmlField::class, [
                'html' => sprintf(
                    '<fieldset class="review-settings form-fieldset"
                    data-bb-value="1"
                    style="display: %s"/>',
                    old('real_estate_enable_review_feature', RealEstateHelper::isEnabledReview() ? 'block' : 'none')
                ),
            ])
            ->add('real_estate_reviews_per_page', TextField::class, [
                'label' => trans('plugins/real-estate::settings.general.form.reviews_per_page'),
                'value' => setting('real_estate_reviews_per_page', 10),
            ])
            ->add('close_fieldset_reviews_setting', HtmlField::class, [
                'html' => '</fieldset>',
            ])
            ->add('real_estate_enabled_custom_fields_feature', OnOffField::class, [
                'label' => trans('plugins/real-estate::settings.general.form.enable_custom_fields'),
                'value' => RealEstateHelper::isEnabledCustomFields(),
                'attr' => [
                    'data-bb-toggle' => 'collapse',
                    'data-bb-target' => '.custom-fields-settings',
                ],
            ])
            ->add('open_fieldset_custom_fields_setting', HtmlField::class, [
                'html' => sprintf(
                    '<fieldset class="custom-fields-settings form-fieldset"
                    data-bb-value="1"
                    style="display: %s"/>',
                    old(
                        'real_estate_enabled_custom_fields_feature',
                        RealEstateHelper::isEnabledCustomFields() ? 'block' : 'none'
                    )
                ),
            ])
            ->add(
                'label_fieldset_custom_fields_setting',
                LabelField::class,
                LabelFieldOption::make()
                    ->label(trans('plugins/real-estate::settings.general.form.mandatory_fields_at_consult_form'))
                    ->toArray()
            )
            ->add('real_estate_mandatory_fields_at_consult_form[]', MultiCheckListField::class, [
                'label' => false,
                'choices' => RealEstateHelper::getMandatoryFieldsAtConsultForm(),
                'value' => old(
                    'real_estate_mandatory_fields_at_consult_form',
                    RealEstateHelper::enabledMandatoryFieldsAtConsultForm()
                ),
                'inline' => true,
            ])
            ->add(
                'label_real_estate_mandatory_fields_at_consult_form',
                LabelField::class,
                LabelFieldOption::make()
                    ->label(trans('plugins/real-estate::settings.general.form.hide_fields_at_consult_form'))
                    ->toArray(),
            )
            ->add('real_estate_hide_fields_at_consult_form[]', MultiCheckListField::class, [
                'label' => false,
                'choices' => RealEstateHelper::getMandatoryFieldsAtConsultForm(),
                'value' => old(
                    'real_estate_hide_fields_at_consult_form',
                    RealEstateHelper::getHiddenFieldsAtConsultForm()
                ),
                'inline' => true,
            ])
            ->add('close_fieldset_custom_fields_setting', 'html', [
                'html' => '</fieldset>',
            ])
            ->add(
                'real_estate_auto_generate_unique_id',
                OnOffCheckboxField::class,
                OnOffFieldOption::make()
                    ->label(trans('plugins/real-estate::settings.general.form.auto_generate_unique_id'))
                    ->value($targetValue = setting('real_estate_auto_generate_unique_id', false))
            )
            ->addOpenCollapsible('real_estate_auto_generate_unique_id', '1', $targetValue == '1')
            ->add(
                'real_estate_unique_id_format',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/real-estate::settings.general.form.unique_id_format'))
                    ->value(setting('real_estate_unique_id_format'))
                    ->helperText(trans('plugins/real-estate::settings.general.form.unique_id_format_helper'))
            )
            ->addCloseCollapsible('real_estate_auto_generate_unique_id', '1')
            ->add(
                'real_estate_show_all_custom_fields_in_form_by_default',
                OnOffCheckboxField::class,
                OnOffFieldOption::make()
                    ->label(trans('plugins/real-estate::settings.general.form.show_all_custom_fields_in_form_by_default'))
                    ->helperText(trans('plugins/real-estate::settings.general.form.show_all_custom_fields_in_form_by_default_helper'))
                    ->value(setting('real_estate_show_all_custom_fields_in_form_by_default', false))
            );
    }
}
