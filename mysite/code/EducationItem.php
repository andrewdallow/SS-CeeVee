<?php

/**
 * Description of EducationItem
 *
 * @author Andrew Dallow
 */
class EducationItem extends DataObject {
    private static $db = array(
        'Institution' => 'Varchar',
        'Qualification' => 'Text',
        'QualificationDate' => 'Date',
        'QualificationDescrp' => 'HTMLText'
    );
    
    private static $has_one = array(
        'CVPage' => 'CVPage'
    );
    
    private static $summary_fields = array (
        'Institution' => 'Institution',
        'Qualification' => 'Qualification'
    );
    
    public function getCMSFields() {
        return FieldList::create(array(
            TextField::create('Institution'),
            TextField::create('Qualification'),
            DateField::create('QualificationDate','Date Received')
                    ->setConfig('showcalendar', true),            
            HtmlEditorField::create('QualificationDescrp', 'Description')            
            ));
    }
}

