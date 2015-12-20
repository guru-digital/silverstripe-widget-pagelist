<?php

class PageListingWidget extends Widget
{

    private static $db       = array(
    );

    private static $has_many = array(
        'RelatedPages' => 'RelatedPage'
    );

    /**
     * @var string
     */
    private static $title = "Page Listing Widget";

    /**
     * @var string
     */
    private static $cmsTitle = "Widget to display page list";

    /**
     * @var string
     */
    private static $description = "Widget which displays a list of pages under a selected page.";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab("Root.Main", new TextField('WidgetLabel', 'Widget Label'), "Enabled");
        $fields->addFieldToTab("Root.Main", new TextField('WidgetName', 'Widget Name'), "Enabled");

        $fields->removeByName('RelatedPages');
        if ($this->ID) {
            $config            = GridFieldConfig_RelationEditor::create();
            $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
                'Page.Title'        => 'Page',
                'ShowChildren.Nice' => 'Show Children'
            ));
            $relatedPagesField = new GridField(
                    'RelatedPage', // Field name
                    'Related pages', // Field title
                    $this->RelatedPages(), $config
            );
            $fields->addFieldToTab('Root.RelatedPages', $relatedPagesField);
        } else {
            $relatedPagesField = TextField::create('RelatedPage')->setTitle('Related page')->setDisabled(true)->setValue('You can add pages once you have saved the record for the first time.');
            $fields->addFieldToTab('Root.Main', $relatedPagesField);
        }
        return $fields;
    }

    public function Title()
    {
        return $this->WidgetLabel;
    }
}
