<?php

/**
 * Description of WorkItem
 *
 * @author Andrew Dallow
 */
class WorkItem extends DataObject {
    private static $db = array(
        'Company' => 'Varchar',
        'Position' => 'Text',
        'StartDate' => 'Date',
        'EndDate' => 'Date',
        'PresentDay' => 'Boolean',
        'JobDescrp' => 'HTMLText'
    );
    
    private static $has_one = array(
        'CVPage' => 'CVPage'
    );
    
    private static $summary_fields = array (
        'Company' => 'Company',
        'Position' => 'Position'
    );
    
    public function getCMSFields() {
        return FieldList::create(array(
            TextField::create('Company'),
            TextField::create('Position'),
            DateField::create('StartDate')
                    ->setConfig('showcalendar', true),
            FieldGroup::create(
                DateField::create('EndDate')
                    ->setConfig('showcalendar', true),   
                CheckboxField::create('PresentDay', 'Present Day?') ),
            HtmlEditorField::create('JobDescrp', 'Description')            
            ));
    }
}

