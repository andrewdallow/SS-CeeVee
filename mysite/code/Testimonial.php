<?php

/**
 * Description of Testimonial
 *
 * @author Andrew Dallow
 */
class Testimonial extends DataObject {
    private static $db = array(
        'Name' => 'Varchar',
        'Testimonial' => 'Text'
    );
    
    private static $has_one = array(
        'CVPage' => 'CVPage'
    );
    
    private static $summary_fields = array (
        'Name' => 'Name',
        'Testimonial' => 'Testimonial'
    );
    
    
    public function getCMSFields() {
        return FieldList::create(array(
            TextField::create('Name'),
            TextareaField::create('Testimonial')         
            ));
    }
}

