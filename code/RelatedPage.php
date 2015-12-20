<?php

/**
 * @property Boolean $ShowChildren
 * @property PageListingWidget $PageListingWidget
 * @property Page $Page
 */
class RelatedPage extends DataObject
{

    private static $db      = array(
        'ShowChildren' => 'Boolean'
    );
    private static $has_one = array(
        'PageListingWidget' => 'PageListingWidget',
        'Page'              => 'Page'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('PageListingWidgetID');
        $fields->addFieldToTab('Root.Main', new TreeDropdownField("PageID", "Related page", "SiteTree"));
        $showChildrenField = new CheckboxField("ShowChildren", "Show Children");
        $showChildrenField->setDescription("If ticked, links to the selected pages children are shown.<br/>If not ticked, a link to the selected page is shown");
        $fields->addFieldToTab('Root.Main', $showChildrenField);
        return $fields;
    }
}
