<?php

/**
 * Description of SkillItem
 *
 * @author Andrew Dallow
 */
class SkillItem extends DataObject {
    private static $db = array(
        'SkillName' => 'Varchar',
        'Rating' => 'Varchar'
    );
    
    private static $has_one = array(
        'CVPage' => 'CVPage'
    );
    
    private static $summary_fields = array (
        'SkillName' => 'SkillName',
        'Rating' => 'Rating'
    );
    
    public function getCMSFields() {
        return FieldList::create(array(
            TextField::create('SkillName'),
            SliderField::create('Rating','Competency Level', 0, 100)           
            ));
    }
}
